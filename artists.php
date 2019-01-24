<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>All artists</title>
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

  $sql = 'SELECT artist_id, name, gender '
  . 'FROM dbprj_artists a '
  . 'ORDER BY name ASC, artist_id ASC';
  $result = $pdo->query($sql);
  echo '<table>';
  echo '<tr>';
  echo '<th>Artist name</th>';
  echo '<th>Gender</th>';
  echo '</tr>';
  foreach ($result as $row) {
    echo '<tr>';
    $name = htmlspecialchars($row['name']);
    $tid = htmlspecialchars($row['artist_id']);
    echo '<td>';
    echo '<a href="artist_events.php?tea=' . $tid . '">' . $name . '</a>';
    echo '</td>';
    echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
    echo '</tr>';
  }
  echo '</table>';
  ?>
</body>
</html>
