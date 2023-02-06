<?php

include('config.php');

// DSN staat voor data sourcename
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo "er is een verbinding met de database gemaakt";
} catch(PDOException $e)
{
    echo "er is helaas geen verbinding met de DB";
    echo $e ->getMessage();
}

 $sql = "INSERT INTO Persoon (Id 
                                ,voornaam
                                ,tussenvoegsel
                                ,achternaam
                                ,telefoonNummer
                                ,Straatnaam
                                ,HuisNummer
                                ,Woonplaats
                                ,Postcode
                                ,Landnaam)
        VALUES                  (NULL
                                ,:voornaam
                                ,:tussenvoegsel
                                ,:lastname
                                ,:telefoonNummer
                                ,:Straatnaam
                                ,:HuisNummer
                                ,:Woonplaats
                                ,:Postcode
                                ,:Landnaam);";

//maakt de query gereed met de prepare method 
$statement = $pdo -> prepare($sql);

$statement->bindValue(':voornaam', $_POST['voornaam'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':telefoonNummer', $_POST['telefoonNummer'], PDO::PARAM_STR);
$statement->bindValue(':Straatnaam', $_POST['Straatnaam'], PDO::PARAM_STR);
$statement->bindValue(':HuisNummer', $_POST['HuisNummer'], PDO::PARAM_STR);
$statement->bindValue(':Woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
$statement->bindValue(':Postcode', $_POST['Postcode'], PDO::PARAM_STR);
$statement->bindValue(':Landnaam', $_POST['Landnaam'], PDO::PARAM_STR);
// vuur de query af op de databse
$statement-> execute();

//hiermee sturen wij automatisch door naar de pagina read.php
header('location: read.php');