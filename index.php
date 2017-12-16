
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gastenboek</title>
</head>
<body>
<form  enctype="multipart/form-data" action="" method="post">
    <label for="naam">Naam:</label>
    <input type="text" name="naam" placeholder="Naam"><br>
    <textarea name="beschrijving" placeholder="Beschrijving" cols="50" rows="5"></textarea><br>
    <input type="submit" name="submit" value="submit">
</form>


<?php
$dbc = new PDO('mysql:host=localhost;dbname=23136_database','root', 'root') or die ('Error connecting to database');
$stmt = $dbc->prepare("INSERT INTO gastenboek VALUES(?,?,?)");
$stmt->bindParam(1,$id);
$stmt->bindParam(2,$naam);
$stmt->bindParam(3,$beschrijving);


if(isset($_POST['submit']))   {

    $naam=htmlspecialchars($_POST['naam']);
    $beschrijving=htmlspecialchars($_POST['beschrijving']);


    $naam = preg_replace('/\bsukkel\b/',' *******', $naam);
    $beschrijving = preg_replace('/\bsukkel\b/',' *******', $beschrijving);



    $stmt->execute() or die ('cant query');
    echo 'Gelukt!';
}



$stmt = $dbc->prepare("SELECT * FROM gastenboek ORDER BY id DESC");
$stmt->execute() or die ('Error quering after PDO');
while ($row = $stmt->fetch()) {
    $naam = $row['naam'];
    $beschrijving = $row['beschrijving'];

    echo '<h1> ' . $naam .'  </h1>';
    echo '<br>';
    echo $beschrijving;
    echo '<br>';
}
$stms = null;
$dbc  = null;
?>







</body>
</html>
