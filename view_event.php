<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View event details</title>
    <style>
    th, td { border: 1px solid black; }
    </style>
  </head>
  <body>
    <?php
    include 'config.php';
    ?>
    <?php
      $pdo = new PDO("mysql:dbname=${config['dbname']};host=${config['host']};charset=utf8",
      $config['name'], $config['pass']);

      $eventID = $_GET['tea'];

      $sql = 'SELECT event_id, name, venue, schedule FROM dbprj_events '
      . 'WHERE event_id = :eid';

      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':eid' => $eventID ]);
      $result = $stmt->fetchAll();

      echo 'Name: ' . htmlspecialchars($result[0]['name']);
      echo '<br />';
      echo 'Venue: ' . htmlspecialchars($result[0]['venue']);
      echo '<br />';
      echo 'Schedule: ' . htmlspecialchars($result[0]['schedule']);
      echo '<br />';


      $talksql = 'SELECT COUNT(*) FROM dbprj_talks WHERE event_id = :eid';
      $stmt = $pdo->prepare($talksql);
      $stmt->execute([ ':eid' => $eventID ]);
      $result = $stmt->fetchAll();
      // count of 1 from talksql means event is a talk
      if (1 == $result[0][0]){
        $staffsql = 'SELECT event_id, staff FROM dbprj_talks WHERE event_id = :eid';
        $stmt = $pdo->prepare($staffsql);
        $stmt->execute([ ':eid' => $eventID ]);
        $result = $stmt->fetchAll();
        echo 'Staff: ' . htmlspecialchars($result[0]['staff']);
        echo '<br />';

        $equipmentsql = 'SELECT event_id, GROUP_CONCAT(equipment) '
        . 'FROM dbprj_equipments WHERE event_id = :eid';
        $stmt = $pdo->prepare($equipmentsql);
        $stmt->execute([ ':eid' => $eventID ]);
        $result = $stmt->fetchAll();
        echo 'Equipment: ' . htmlspecialchars($result[0]['GROUP_CONCAT(equipment)']);
      }

      $concertsql = 'SELECT COUNT(*) FROM dbprj_concerts WHERE event_id = :eid';
      $stmt = $pdo->prepare($concertsql);
      $stmt->execute([ ':eid' => $eventID ]);
      $result = $stmt->fetchAll();
      // count of 1 from $concertsql means event is a concert
      if (1 == $result[0][0]){
        $musicianssql = 'SELECT event_id, GROUP_CONCAT(musicians)'
        . ' FROM dbprj_concerts WHERE event_id = :eid';
        $stmt = $pdo->prepare($musicianssql);
        $stmt->execute([ ':eid' => $eventID ]);
        $result = $stmt->fetchAll();
        echo 'Musicians: ' . htmlspecialchars($result[0]['GROUP_CONCAT(musicians)']);
        echo '<br />';

        $instrumentssql = 'SELECT event_id, GROUP_CONCAT(instrument)'
        . ' FROM dbprj_instruments WHERE event_id = :eid';
        $stmt = $pdo->prepare($instrumentssql);
        $stmt->execute([ ':eid' => $eventID ]);
        $result = $stmt->fetchAll();
        echo 'Instruments: ' . htmlspecialchars($result[0]['GROUP_CONCAT(instrument)']);
      }

      $artistssql = 'SELECT name, gender '
      . 'FROM dbprj_artists '
      . 'WHERE artist_id IN (SELECT artist_id FROM dbprj_performs '
      . 'WHERE event_id = :eid) ORDER BY name ASC, artist_id ASC';
      $stmt = $pdo->prepare($artistssql);
      $stmt->execute([ ':eid' => $eventID ]);
      $result = $stmt->fetchAll();

      echo '<table>';
      echo '<tr>';
      echo '<th>Artist Name</th>';
      echo '<th>Gender</th>';
      echo '</tr>';

      foreach ($result as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
        echo '</tr>';
      }

      $ptscountsql = 'SELECT COUNT(*) FROM dbprj_concerts_parts WHERE event_id = :eid';
      $stmt = $pdo->prepare($ptscountsql);
      $stmt->execute([ ':eid' => $eventID ]);
      $result = $stmt->fetchAll();

      if (1 < $result[0][0]){
        echo '<tr>';
        echo '<th>Part number</th>';
        echo '<th>Person in charge</th>';
        echo '</tr>';

        $concertpartssql = 'SELECT part_no, pic FROM dbprj_concerts_parts WHERE event_id = :eid';
        $stmt = $pdo->prepare($concertpartssql);
        $stmt->execute([ ':eid' => $eventID ]);
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($row['part_no']) . '</td>';
          echo '<td>' . htmlspecialchars($row['pic']) . '</td>';
          echo '</tr>';
        }
      }

    ?>
  </body>
</html>
