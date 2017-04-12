<?php
$port = 8889;
$username = "root";
$password = "root";
$name = "katter";
$connection = new PDO("mysql:host=localhost;dbname={$name};port={$port}", $username, $password);

$statement = $connection->prepare('SELECT * FROM utvalg ');

$statement->execute();

$liste = [];

while($row = $statement->fetch(PDO::FETCH_ASSOC)){

    $liste[] = $row;
}
