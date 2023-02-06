<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo " er is verbinding gemaakt";
    }
} catch (PDOException $e) {
    $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        // Maak een update query voor het updaten van een record
        $sql = "UPDATE Persoon
                SET Id = :Id,
                    voornaam = :voornaam,
                    tussenvoegsel = :tussenvoegsel,
                    Achternaam = :lastname,
                    TelefoonNummer = :telefoonNummer,
                    Straatnaam = :Straatnaam,
                    huisNummer = :HuisNummer,
                    Woonplaats = :Woonplaats,
                    Postcode = :Postcode,
                    Landnaam = :Landnaam
                WHERE Id = :Id";

        // Roep de prepare-method aan van het PDO-object $pdo
        $statement = $pdo->prepare($sql);

        // We moeten de placeholders een waarde geven in de sql-query
        $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
        $statement->bindValue(':voornaam', $_POST['voornaam'], PDO::PARAM_STR);
        $statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
        $statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':telefoonNummer', $_POST['telefoonNummer'], PDO::PARAM_STR);
        $statement->bindValue(':Straatnaam', $_POST['Straatnaam'], PDO::PARAM_STR);
        $statement->bindValue(':HuisNummer', $_POST['HuisNummer'], PDO::PARAM_STR);
        $statement->bindValue(':Woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
        $statement->bindValue(':Postcode', $_POST['Postcode'], PDO::PARAM_STR);
        $statement->bindValue(':Landnaam', $_POST['Landnaam'], PDO::PARAM_STR);

      
        $statement->execute();

        echo "Het record is geupdate";
        header("Refresh:3; read.php");
    } catch (PDOException $e) {
        echo "Het record is niet geupdate";
        echo $e;
        header("Refresh:20; read.php");
    }
    exit();
}

$sql = "SELECT * FROM persoon WHERE Id = :Id";


$statement = $pdo->prepare($sql);
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <h1>PDO CRUD 1</h1>

    <form action="update.php" method="post">
    <label for="voornaam">Voornaam:</label><br>
        <input type="text" name="voornaam" id="voornaam" value="<?php echo $result->voornaam; ?>"><br><br>

        <label for="infix">tussenvoegsel </label><br>
        <input type="text" id="infix" name="infix" value="<?php echo $result->tussenvoegsel; ?>"> <br>

        <label for="lastname">achternaam </label><br>
        <input type="text" id="lastname" name="lastname" value="<?php echo $result->achternaam; ?>"> <br>

        <label for="telefoonNummer">telefoonNummer </label><br>
        <input type="text" id="telefoonNummer" name="telefoonNummer" value="<?php echo $result->TelefoonNummer; ?>"> <br>

        <label for="Straatnaam">Straatnaam </label><br>
        <input type="text" id="Straatnaam" name="Straatnaam" value="<?php echo $result->StraatNaam; ?>"> <br>

        <label for="HuisNummer">HuisNummer </label><br>
        <input type="text" id="HuisNummer" name="HuisNummer" value="<?php echo $result->huisnummer; ?>"> <br>

        <label for="Woonplaats">Woonplaats </label><br>
        <input type="text" id="Woonplaats" name="Woonplaats" value="<?php echo $result->Woonplaats; ?>"> <br>

        <label for="Postcode">Postcode </label><br>
        <input type="text" id="Postcode" name="Postcode" value="<?php echo $result->Postcode; ?>"> <br>

        <label for="Landnaam">Landnaam </label><br>
        <input type="text" id="Landnaam" name="Landnaam" value="<?php echo $result->Landnaam; ?>"> <br>
        <br>

        <input type="hidden" name="Id" value="<?php echo $result->Id; ?>">
        <input type="submit" value="Submit" class="button">
    </form>
</body>

</html>