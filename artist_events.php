<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Artist's events</title>
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

  $artistID = $_GET['tea'];

  $sql2 = 'SELECT e.event_id, e.name,e.venue, e.schedule '
  . 'FROM dbprj_events e '
  . 'WHERE e.event_id IN (SELECT event_id FROM dbprj_performs WHERE artist_id = :aid) '
  . 'ORDER BY e.schedule DESC, e.event_id ASC ';

  $stmt2 = $pdo->prepare($sql2);
  $stmt2->execute([ ':aid' => $artistID ]);
  $result2 = $stmt2->fetchAll();

  echo '<table>';
  echo '<tr>';
  echo '<th>Event Name</th>';
  echo '<th>Venue</th>';
  echo '<th>Schedule</th>';
  echo '</tr>';

  foreach ($result2 as $row) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['name']) . '</td>';
    echo '<td>' . htmlspecialchars($row['venue']) . '</td>';
    echo '<td>' . htmlspecialchars($row['schedule']) . '</td>';
    echo '</tr>';
  }
  ?>
</body>
</html>
