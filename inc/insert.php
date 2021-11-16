<?php
include("db.php");

$errors = [];

if (isset($_POST['submit'])) {
    $Straat = $_POST['Straat'];
    $Plaats = $_POST['Plaats'];
    $PostCode = $_POST['PostCode'];
    $Provincie = $_POST['Provincie'];
    $Nummer = $_POST['Nummer'];
    $Kamers = $_POST['Kamers'];
    $Slaapkamers = $_POST['Slaapkamers'];
    $Bouwjaar = $_POST['Bouwjaar'];
    $Ligging = $_POST['Ligging'];
    $Oppervlakte = $_POST['Oppervlakte'];
    $Type = $_POST['Type'];
    $Datum = $_POST['Datum'];
    $Verkocht = $_POST['Verkocht'];
    $Prijs = $_POST['Prijs'];
    $img = $_POST['img'];
    $ProvincieID = $_POST['ProvincieID'];
    $Provincie_name = $_POST['Provincie_name'];

    if ($Straat == "") {
        $errors[] = "vul de straatnaam van je huis in";
    }

    if ($Plaats == "") {
        $errors[] = "vul de plaatsnaam van je huis in";
    }

    if ($PostCode == "") {
        $errors[] = "vul de PostCode van je huis in";
    }

    if ($Provincie == "") {
        $errors[] = "vul de provincie van je huis in";
    }

    if ($Nummer == "") {
        $errors[] = "vul het huisnummer van je huis in";
    }

    if ($Kamers == "") {
        $errors[] = "vul het aantal kamers van je huis in";
    }

    if ($Slaapkamers == "") {
        $errors[] = "vul het aantal slaapkamers van je huis in";
    }

    if ($Bouwjaar == "") {
        $errors[] = "vul het bouwjaar van je huis in";
    }

    if ($Ligging == "") {
        $errors[] = "vul de ligging  van je huis in";
    }

    if ($Oppervlakte == "") {
        $errors[] = "vul het oppervlakte van je huis in";
    }

    if ($Type == "") {
        $errors[] = "vul het type huis in bijv. rijteshuis of bungelow";
    }

    if ($Datum == "") {
        $errors[] = "vul de datum in sinds wanneer je huis te koop staat";
    }

    if ($Verkocht == "") {
        $errors[] = "vul met ja of nee in of je huis is verkocht";
    }

    if ($Prijs == "") {
        $errors[] = "vul de waarde van je huis in";
    }

    if ($img == "") {
        $errors[] = "hier kan je 1 image toevoegen als je wilt";
    }

    if ($ProvincieID == "") {
        $errors[] = "vul hier je provincieID in";
    }

    if ($Provincie_name == "") {
        $errors[] = "vul hier je provincieNaam nog maals in";
    }


    if (count($errors) == 0) {
        $createHouseSQL = "INSERT INTO `all_houses` VALUES ('', '$Straat' , '$Plaats','$PostCode' , '$Provincie' , '$Nummer', '$Kamers' , '$Slaapkamers', '$Bouwjaar' , '$Ligging' , '$Oppervlakte', '$Type' , '$Datum', '$Verkocht' , '$Prijs' , '$img', '$ProvincieID' , '$Provincie_name')";
        $result = mysqli_query($conn, $createHouseSQL) or die(mysqli_error($createHoueSQL));
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <title>Insert House</title>
</head>

<?php
// when errors occured, show them here
// use a foreach loop for this
if (isset($errors) && count($errors) > 0) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>";
        echo $error;
        echo "</li>";
    }
    echo "</ul>";
}
?>

<form action="insert.php" method="post">
    <div class="container">
        <label for="create"><b class="info">Lets Create your own dream house</b></label>
        <br>
        <br>
        <input type="text" name="Plaats" placeholder="vul hier je plaatsnaam in">
        <br>
        <br>
        <input type="text" name="PostCode" placeholder="vul hier je postcode in">
        <br>
        <br>
        <input type="text" name="Provincie" placeholder="vul hier je provincie is">
        <br>
        <br>
        <input type="text" name="Nummer" placeholder="vul hier je huisnummer in">
        <br>
        <br>
        <input type="text" name="Kamers" placeholder="vul hier het aantal kamers in">
        <br>
        <br>
        <input type="text" name="Slaapkamers" placeholder="vul hier je aantal slaapkamers in">
        <br>
        <br>
        <input type="text" name="Bouwjaar" placeholder="vul hier het bouwjaar van je huis/appartement in">
        <br>
        <br>
        <input type="text" name="Ligging" placeholder="vul hier de ligging van je huis/appartement in">
        <br>
        <br>
        <input type="text" name="Oppervlakte" placeholder="vul hier het oppervlakte van je huis/appartement in">
        <br>
        <br>
        <input type="text" name="Type" placeholder="vul hier het type in">
        <br>
        <br>
        <input type="data" name="Datum" placeholder="vul hier je datum in sinds dat je huis/appartement te koop staat">
        <br>
        <br>
        <input type="text" name="Verkocht" placeholder="vul hier in of je huis/appartement verkocht is of niet">
        <br>
        <br>
        <input type="text" name="Prijs" placeholder="vul hier de prijs in van je huis/appartement in">
        <br>
        <br>
        <input type="text" name="img" placeholder="vul hier een foto in (je mag dit leeg laten als je geen foto wilt toevoegen)">
        <br>
        <br>
        </label>
        <div class="clearfix">
            <br>
            <button name="submit" type="submit"> Lets create your own dream house</button>
        </div>
    </div>
</form>

</html>