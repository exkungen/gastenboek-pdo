<?php

define('HOST','localhost');
define('PASS','23136');
define('USER','exkungen');
define('DBNAME','23136_database');


if(isset($_POST['submit']) && strlen($_POST['beschrijving'] < 220))   {

    $dbc = new PDO('mysql:host=localhost;dbname=23136_database','root', 'root') or die ('Error connecting to database');
    $stmt = $dbc->prepare("INSERT INTO gastenboek VALUES(0,'$naam','$beschrijving')");
    $stmt->bindParam(':naam',$naam);
    $stmt->bindParam(':beschrijving',$beschrijving);

    $beschrijving=htmlspecialchars($_POST['beschrijving']);
    $naam=htmlspecialchars($_POST['naam']);


    $beschrijving = preg_replace('/\bsukkel\b/',' *******', $beschrijving);
    $naam = preg_replace('/\bsukkel\b/',' *******', $naam);


    $stmt->execute() or die ('cant query');
    echo 'Gelukt!';
}
else {
    echo 'Je beschrijving is te groot';
}