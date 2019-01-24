<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View all events</title>
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
      $sql = 'SELECT event_id, name, venue, schedule FROM dbprj_events '
      . 'ORDER BY name ASC, event_id ASC';

      $result = $pdo->query($sql);

      echo '<table>';
      echo '<tr>';
      echo '<th>Event Name</th>';
      echo '<th>Venue</th>';
      echo '<th>Schedule</th>';
      echo '<th>Performers</th>';
      echo '</tr>';

      foreach ($result as $row) {
        $loopsql = 'SELECT COUNT(*) AS count FROM dbprj_performs WHERE event_id = :eid';
        $stmt = $pdo->prepare($loopsql);
        $stmt->execute([ ':eid' => $row['event_id'] ]);
        $count_result = $stmt->fetchAll();

        echo '<tr>';
        $name = htmlspecialchars($row['name']);
        $eid = htmlspecialchars($row['event_id']);
        echo '<td>';
        echo '<a href="view_event.php?tea=' . $eid . '">' . $name . '</a>';
        echo '</td>';
        echo '<td>' . htmlspecialchars($row['venue']) . '</td>';
        echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
        echo '<td>' . htmlspecialchars($count_result[0][0]) . '</td>';
        echo '</tr>';
      }
    ?>
  </body>
</html>
