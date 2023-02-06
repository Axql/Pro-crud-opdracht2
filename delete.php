<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try{
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if($pdo)
    {
        echo " er is verbinding gemaakt";
    }
} catch (PDOException $e)
{
    $e->getMessage();
}

$sql = "DELETE FROM Persoon 
        WHERE Id = :Id;";

$peppiekokkie = $pdo->prepare($sql);

$peppiekokkie->bindValue(':Id', $_GET['Id'],PDO::PARAM_INT);

$result = $peppiekokkie->execute();

if($result)
{
    echo "het record is verwijderd";
    header('Refresh:2.5; url=read.php');
}
else 
{
    echo "Het is record is niet verwijderd";
}