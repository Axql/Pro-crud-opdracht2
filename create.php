<?php

include('config.php');

// DSN staat voor data sourcename
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo "er is een verbinding met de database gemaakt";
} catch (PDOException $e) {
    echo "er is helaas geen verbinding met de DB";
    echo $e->getMessage();
}

$sql = "INSERT INTO Pizza ( Id,
                                formaat
                                ,saus
                                ,toppings
                                ,kruiden
                             )
        VALUES                  (null,
                                :maat
                                ,:saus
                                ,:topping
                                ,:kruiden);";

//maakt de query gereed met de prepare method 
$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['Id'],PDO::PARAM_INT);
$statement->bindValue(':maat', $_POST['maat'], PDO::PARAM_STR);
$statement->bindValue(':saus', $_POST['saus'], PDO::PARAM_STR);
$statement->bindValue(':topping', $_POST['topping'], PDO::PARAM_STR);
$statement->bindValue(':kruiden', $_POST['kruiden'], PDO::PARAM_STR);

// vuur de query af op de databse
$statement->execute();

//hiermee sturen wij automatisch door naar de pagina read.php
header('location: read.php');

echo var_dump($_POST);