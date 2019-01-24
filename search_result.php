<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search result</title>
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
      $word = '%'.$_POST['word'].'%';
      $sql = 'SELECT name, venue, schedule FROM dbprj_events '
      .'WHERE name LIKE :word OR venue LIKE :word ORDER BY name ASC, event_id ASC';

      $stmt = $pdo->prepare($sql);
      $stmt->execute([ ':word' => $word ]);
      $result = $stmt->fetchAll();

      echo '<table>';
      echo '<tr>';
      echo '<th>Event Name</th>';
      echo '<th>Venue</th>';
      echo '<th>Schedule</th>';
      echo '</tr>';

      foreach ($result as $row) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['venue']) . '</td>';
        echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
        echo '</tr>';
      }
    ?>
  </body>
</html>
