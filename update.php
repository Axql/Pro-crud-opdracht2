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
        $sql = "UPDATE Pizza
                SET 
                    formaat = :maat,
                    saus = :saus,
                    toppings = :topping,
                    kruiden = :kruiden,
                    Id = :Id
                WHERE Id = :Id";

        // Roep de prepare-method aan van het PDO-object $pdo
        $statement = $pdo->prepare($sql);

        // We moeten de placeholders een waarde geven in de sql-query
        $statement->bindValue(':Id', $_POST['Id'],PDO::PARAM_INT);
        $statement->bindValue(':maat', $_POST['maat'], PDO::PARAM_STR);
        $statement->bindValue(':saus', $_POST['saus'], PDO::PARAM_STR);
        $statement->bindValue(':topping', $_POST['topping'], PDO::PARAM_STR);
        $statement->bindValue(':kruiden', $_POST['kruiden'], PDO::PARAM_STR);

      
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

$sql = "SELECT * FROM Pizza WHERE Id = :Id";


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
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <h1>PDO CRUD 1</h1>

    

    <form action="update.php" method="post">
        <label for="maat">Kies uw formaat: </label>
        <select name="maat" id="maat">
            <option value="20cm">20cm</option>
            <option value="25cm">25cm</option>
            <option value="30cm">30cm</option>
            <option value="35cm">35cm</option>
            <option value="40cm">40cm</option>
        </select>
        <label for="saus">Kies uw saus: </label>
        <select name="saus" id="saus">
            <option value="spicy tomatensaus">spicy tomatensaus</option>
            <option value="bbq-saus">bbq-saus</option>
            <option value="creme fraiche">creme fraiche</option>
        </select>

        <p>toppings</p>
        <input type="radio" id="topping" name="topping" value="vegan">
        <label for="vegan">vegan</label><br>
        <input type="radio" id="topping" name="topping" value="vegatarisch">
        <label for="vegatarisch">vegatarisch</label><br>
        <input type="radio" id="topping" name="topping" value="vlees">
        <label for="vlees">vlees</label>
        <br>
        <input type="checkbox" id="kruiden" name="kruiden" value="peterselie">
        <label for="peterselie"> peterselie</label><br>
        <input type="checkbox" id="kruiden" name="kruiden" value="oregano">
        <label for="oregano"> oregano</label><br>
        <input type="checkbox" id="kruiden" name="kruiden" value="chili-flakes">
        <label for="chili-flakes">chili-flakes</label><br>
        <input type="checkbox" id="kruiden" name="kruiden" value="peper">
        <label for="peper">Peper</label><br>
        <input type="hidden" name="Id" value="<?php echo $result->Id; ?>">
        <input type="submit" value="Submit">
    </form>
</body>

</html>