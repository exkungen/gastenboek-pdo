<?php

define('HOST','localhost');
define('PASS','23136');
define('USER','exkungen');
define('DBNAME','23136_database');


if(isset($_POST['submit']) && strlen($_POST['beschrijving'] < 220))   {
    $dbc = mysqli_connect(HOST,USER,PASS,DBNAME) or die ('cant connect to the database');
    $beschrijving = mysqli_real_escape_string($dbc,trim($_POST['beschrijving']));
    $naam = mysqli_real_escape_string($dbc,trim($_POST['naam']));

    $beschrijving=htmlspecialchars($_POST['beschrijving']);
    $naam=htmlspecialchars($_POST['naam']);


    $beschrijving = preg_replace('/\bsukkel\b/',' *******', $beschrijving);
    $naam = preg_replace('/\bsukkel\b/',' *******', $naam);

    $query = "INSERT INTO gastenboek VALUES(0,'$naam','$beschrijving')";
    $result = mysqli_query($dbc,$query) or die ('cant query');
    echo 'Gelukt!';
}
else {
    echo 'Je beschrijving is te groot';
}