<?php
include("db.php");



if (isset($_POST['delete-house'])) {

    if (isset($_GET['houseID'])) {
        $info = $_GET['houseID'];
    }

    // echo $info;


    $deleteSQL = "DELETE FROM `all_houses` WHERE `ID` = $info ";
    // run query
    $result = mysqli_query($conn, $deleteSQL) or die(mysqli_error($deleteSQL));

    $deleteTest = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($deleteTest) > 1) {
        echo "succesfull";
    } else {
        echo "pech gehad";
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
    <title>DC Heroes</title>
</head>

<form action="" method="post">
    <div class="container">
        <label for="create"><b class="info">Lets delete that ugly house</b></label>

        </label>
        <div class="clearfix">
            <br>
            <button name="delete-house" type="submit"> click on this button to remove that ugly house</button>
        </div>
    </div>
</form>

<?php

?>

</html>