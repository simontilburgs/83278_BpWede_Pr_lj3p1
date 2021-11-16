<?php

include("inc/db.php");


if (isset($_GET['provinciecat'])) {
    $provinciecat = $_GET['provinciecat'];
} else {
    $provinciecat = 0;
}


$Limburg = 0;
$Gelderland = 0;
$Noord_Brabant = 0;
$Overijssel = 0;
$Noord_Holland = 0;
$Groningen = 0;
$Drenthe = 0;
$Zeeland = 0;
$Utrecht = 0;
$Zuid_Holland = 0;

// create empty array to store houses from the database
$houssesHomePage = array();

//$houseHomePageSQl = "SELECT * FROM `all_houses`  ;";

$houseHomePageSQl = "SELECT * FROM `all_houses` WHERE `ProvincieID` = $provinciecat ;";

$resultHomePage = mysqli_query($conn, $houseHomePageSQl) or die(mysqli_error);

while ($resultsHomePage = mysqli_fetch_assoc($resultHomePage)) {
    $houssesHomePage[] = $resultsHomePage;
}



$provinciesHomePage = array();

$provincieHomePageSQl = "SELECT * FROM `all_provincies` ;";

//$houseHomePageSQl = "SELECT * FROM `all_houses` WHERE `ProvincieID` = $provinciecat ;";

$resultprovincieHomePage = mysqli_query($conn, $provincieHomePageSQl) or die(mysqli_error);

while ($resultsprovincieHomePage = mysqli_fetch_assoc($resultprovincieHomePage)) {
    $provinciesHomePage[] = $resultsprovincieHomePage;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">

    <title>Document</title>
</head>

<body>

    <div class="main-container">

        <div class="topnav" id="myTopnav">
            <a href="index.php">Index</a>
            <?php
            foreach ($provinciesHomePage as $provincieHomePage) {
            ?>

                <a href=" index.php?provinciecat=<?php echo $provincieHomePage['ProvincieID']; ?>"><?php echo $provincieHomePage['Provincie_name']; ?></a>

            <?php
            }
            ?>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>

        </div>

        <div class="all-houses">
            <?php
            foreach ($houssesHomePage as $houseHomePage) {
            ?>
                <div class="one-house">
                    <img src="img/image1.png" class="house-img">
                    <div class="house-title">
                        <?php echo $houseHomePage['Straat']; ?>
                    </div>
                    <div class="house-text">
                        <?php echo $houseHomePage['Plaats']; ?>
                    </div>
                    <button class="house-go-to-btn">
                        <a href="index.php?provinciecat=<?php echo $houseHomePage['ProvincieID']; ?>"><?php echo $houseHomePage['Provincie_name']; ?></a>
                    </button>
                    <a class="extrabtn" href="inc/insert.php">Create</a>
                    <a class="extrabtn" href="inc/update.php?houseID=<?php echo $houseHomePage['ID']; ?>">Update</a>
                    <a class="extrabtn" href="inc/delete.php?houseID=<?php echo $houseHomePage['ID']; ?>">Delete</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>




<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>