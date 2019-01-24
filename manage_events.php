<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Manage events</title>
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
      . 'ORDER BY schedule DESC, event_id ASC';

      $result = $pdo->query($sql);

      echo '<table>';
      echo '<tr>';
      echo '<th>Event Name</th>';
      echo '<th>Venue</th>';
      echo '<th>Schedule</th>';
      echo '<th>Performers</th>';
      echo '<th>Add artist</th>';
      echo '</tr>';

      foreach ($result as $row) {
        $loopsql = 'SELECT COUNT(*) AS count, GROUP_CONCAT(artist_id) FROM dbprj_performs '
        . 'WHERE event_id = :eid';
        $stmt = $pdo->prepare($loopsql);
        $stmt->execute([ ':eid' => $row['event_id'] ]);
        $count_result = $stmt->fetchAll();

        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['venue']) . '</td>';
        echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
        echo '<td>' . htmlspecialchars($count_result[0]['count']) . '</td>';
        echo '<td>';

        echo '<form action="add_artist.php" method="get">';
        echo '<input type="hidden" name="event_id" value= "' . htmlspecialchars($row['event_id']) . '">';

        foreach ($count_result as $count_row) {
          echo '<input type="hidden" name="id[]" value="' . htmlspecialchars($count_row['GROUP_CONCAT(artist_id)']) . '">';
        }
        echo '<input type="submit" value="Add artist">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
      }
    ?>
  </body>
</html>
