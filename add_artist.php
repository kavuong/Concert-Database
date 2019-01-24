<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add artist</title>
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

  $eventID = $_GET['event_id'];
  $artistIDsArr = $_GET['id'];

  $arrImploded = implode(", ", $artistIDsArr);

  $sql = 'SELECT name, artist_id FROM dbprj_artists WHERE artist_id NOT IN ('.$arrImploded.') '
  . 'ORDER BY name ASC, artist_id ASC';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $count_result = $stmt->fetchAll();

  echo '<form action="save_artist.php" method="post">';
  echo '<input type="hidden" name="event_id" value="' . htmlspecialchars($eventID) . '">';

  echo '<label for="artist_list">Add artist:</label>';
  echo '<select name="artist_name" id="artist_list">';
  foreach($count_result as $option) {
    echo '<option value="' . $option['name'] . '" '
    . '>'
    . $option['name']
    . '</option>';
  }
  echo '</select><br>';
  echo '<input type="submit" value="Save">';
  echo '</form>';
  ?>
</body>
</html>
