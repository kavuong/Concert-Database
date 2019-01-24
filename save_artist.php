<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Record Saved</title>
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
        $eventID = $_POST['event_id'];
        $artist_name = $_POST['artist_name'];

        $sql = "SELECT artist_id FROM dbprj_artists WHERE name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([ ':name' => $artist_name ]);
        $row = $stmt->fetch();

        $insertsql = "INSERT INTO dbprj_performs VALUES (:aid, '$eventID')";
        $stmt = $pdo->prepare($insertsql);
        $stmt->execute([ ':aid' => $row[0]]);

        echo '<label>Artist Saved</label>';
      ?>
  </body>
</html>
