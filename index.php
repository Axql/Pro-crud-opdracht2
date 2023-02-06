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

    <form action="create.php" method="post"> 
          <label for="voornaam">voornaam </label> <br> 
          <input type="text" id="voornaam" name="voornaam"> <br>

          <label for="infix">tussenvoegsel </label><br>
          <input type="text" id="infix" name="infix"> <br>
          
          <label for="lastname">achternaam </label><br> 
          <input type="text" id="lastname" name="lastname"> <br> 

          <label for="telefoonNummer">telefoonNummer </label><br> 
          <input type="text" id="telefoonNummer" name="telefoonNummer"> <br> 

          <label for="Straatnaam">Straatnaam </label><br> 
          <input type="text" id="Straatnaam" name="Straatnaam"> <br> 

          <label for="HuisNummer">HuisNummer </label><br> 
          <input type="text" id="HuisNummer" name="HuisNummer"> <br> 

          <label for="Woonplaats">Woonplaats </label><br> 
          <input type="text" id="Woonplaats" name="Woonplaats"> <br> 

          <label for="Postcode">Postcode </label><br> 
          <input type="text" id="Postcode" name="Postcode"> <br> 

          <label for="Landnaam">Landnaam </label><br> 
          <input type="text" id="Landnaam" name="Landnaam"> <br> 
          <br>

          <input type="submit" value="Submit" class="button">
    </form>
</body>
</html>