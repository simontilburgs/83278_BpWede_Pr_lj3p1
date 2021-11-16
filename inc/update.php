<?php
include("db.php");

$posts = array();

$ID = "";
$Straat = "";
$Plaats = "";
$PostCode = "";
$Provincie = "";
$Nummer = "";
$Kamers = "";
$Slaapkamers = "";
$Bouwjaar = "";
$Ligging = "";
$Oppervlakte = "";
$Type = "";
$Datum = "";
$Verkocht = "";
$Prijs = "";
$img = "";
$Provincie_name = "";

function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['ID'];
    $posts[1] = $_POST['Straat'];
    $posts[2] = $_POST['Plaats'];
    $posts[3] = $_POST['PostCode'];
    $posts[4] = $_POST['Provincie'];
    $posts[5] = $_POST['Nummer'];
    $posts[6] = $_POST['Kamers'];
    $posts[7] = $_POST['Slaapkamers'];
    $posts[8] = $_POST['Bouwjaar'];
    $posts[9] = $_POST['Ligging'];
    $posts[10] = $_POST['Oppervlakte'];
    $posts[11] = $_POST['Type'];
    $posts[12] = $_POST['Datum'];
    $posts[13] = $_POST['Verkocht'];
    $posts[14] = $_POST['Prijs'];
    $posts[15] = $_POST['img'];
    $posts[16] = $_POST['Provincie_name'];

    return $posts;
}

if (isset($_POST['update-house'])) {
    $data = getPosts();
    $updateSQL = " UPDATE `all_houses` SET
    `Straat`='$data[1]',   
    `Plaats`='$data[2]',
    `PostCode`='$data[3]',
    `Provincie`='$data[4]',
    `Nummer`='$data[5]',
    `Kamers`='$data[6]',
    `Slaapkamers`='$data[7]',
    `Bouwjaar`='$data[8]',
    `Ligging`='$data[9]',
    `Oppervlakte`='$data[10]',
    `Type`='$data[11]',
    `Datum`='$data[12]',
    `Verkocht`='$data[13]',
    `Prijs`='$data[14]',
    `img`='$data[15]',
    `Provincie_name`='$data[16]'
    WHERE `ID` = '$data[0]' ";
    $update_result = mysqli_query($conn, $updateSQL) or die($updateSQL);
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

<form action="" method="post">
    <div class="container">
        <label for="update"><b class="info">Lets update da house</b></label>
        <br>
        <br>
        <input type="text" value="<?php echo $Straat ?>" name="Straat" placeholder="vul hier je straatnaam in">
        <br>
        <br>
        <input type="text" value="<?php echo $Plaats ?>" name="Plaats" placeholder="vul hier je plaatsnaam in">
        <br>
        <br>
        <input type="text" value="<?php echo $PostCode ?>" name="PostCode" placeholder="vul hier je postcode in">
        <br>
        <br>
        <input type="text" value="<?php echo $Provincie ?>" name="Provincie" placeholder="vul hier je provincie is">
        <br>
        <br>
        <input type="text" value="<?php echo $Nummer ?>" name="Nummer" placeholder="vul hier je huisnummer in">
        <br>
        <br>
        <input type="text" value="<?php echo $Kamers ?>" name="Kamers" placeholder="vul hier het aantal kamers in">
        <br>
        <br>
        <input type="text" value="<?php echo $Slaapkamers ?>" name="Slaapkamers" placeholder="vul hier je aantal slaapkamers in">
        <br>
        <br>
        <input type="text" value="<?php echo $Bouwjaar ?>" name="Bouwjaar" placeholder="vul hier het bouwjaar van je huis/appartement in">
        <br>
        <br>
        <input type="text" value="<?php echo $Ligging ?>" name="Ligging" placeholder="vul hier de ligging van je huis/appartement in">
        <br>
        <br>
        <input type="text" value="<?php echo $Oppervlakte ?>" name="Oppervlakte" placeholder="vul hier het oppervlakte van je huis/appartement in">
        <br>
        <br>
        <input type="text" value="<?php echo $Type ?>" name="Type" placeholder="vul hier het type in">
        <br>
        <br>
        <input type="data" value="<?php echo $Datum ?>" name="Datum" placeholder="vul hier je datum in sinds dat je huis/appartement te koop staat">
        <br>
        <br>
        <input type="text" value="<?php echo $Verkocht ?>" name="Verkocht" placeholder="vul hier in of je huis/appartement verkocht is of niet">
        <br>
        <br>
        <input type="text" value="<?php echo $Prijs ?>" name="Prijs" placeholder="vul hier de prijs in van je huis/appartement in">
        <br>
        <br>
        <input type="text" value="<?php echo $img ?>" name="img" placeholder="vul hier een foto in (je mag dit leeg laten als je geen foto wilt toevoegen)">
        <br>
        <br>
        <input type="text" value="<?php echo $Provincie_name ?>" name="Provincie_name" placeholder="vul hier je provincie naam is">
        <div class="clearfix">
            <br>
            <button name="update-house" type="submit"> Lets update da house</button>
        </div>
    </div>
</form>

</html>