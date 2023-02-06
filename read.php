<?php
include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try
{
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo)
    {
       // echo "er is een verbinding";
    }
    else 
    {
        echo "er is een error";
    }
}
catch(PDOException $e)
{
    echo $e -> getMessage();
}


$sql = "SELECT voornaam,tussenvoegsel,achternaam,TelefoonNummer,Straatnaam,huisnummer,woonplaats,postcode,Landnaam,id FROM Persoon";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// var_dump($result);


// echo $result[0]->Voornaam;
$row = "";

foreach($result as $info)
{
    $row .= "<tr>
                <td>$info->voornaam</td>
                <td>$info->tussenvoegsel</td>
                <td>$info->achternaam</td>
                <td>$info->TelefoonNummer</td>
                <td>$info->Straatnaam</td>
                <td>$info->huisnummer</td>
                <td>$info->woonplaats</td>
                <td>$info->postcode</td>
                <td>$info->Landnaam</td>
                <td>
                <a href='delete.php?Id=$info->id'>
                    <img src='img/b_drop.png' alt='cross'
                </td>
                <td>
                <a href='update.php?Id=$info->id'>
                    <img src='img/b_edit.png' alt='pen'
                </td>
            </tr>";
}
?>
<h3>persoonsgegevens</h3>
<a href="index.php">
    <input type="button" value="maak een nieuw record">
</a>
<table border="1">
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>TelefoonNummer</th>
        <th>Straatnaam</th>
        <th>huisnummer</th>
        <th>woonplaats</th>
        <th>postcode</th>
        <th>Landnaam</th>
        <th></th>
    </thead>
    <tbody>
           <?php echo $row ?>
    </tbody>
</table>
