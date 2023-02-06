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
    <h1>maak je eigen pizza</h1>

    <form action="create.php" method="post">
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
        <input type="submit" value="Submit">
    </form>
</body>

</html>