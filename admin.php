<?php

// start session or resume existing one
session_start();
// get the database connection
include("inc/db.php");


//myDump($_SESSION, 0);

// empty string, will be filled after login or logout
$message = "";

if (isset($_POST['myLogout'])) {
    // someone used a logout form


    // die("boooooooo");

    // wipe session data completely
    session_destroy();
    // reload
    header("location:" . $_SERVER['PHP_SELF']);
}

// if key 'loggedin' NOT exists
if (!isset($_SESSION['loggedin'])) {
    // then create it and set to false (default: user is not logged in)
    $_SESSION['loggedin'] = false;
}

// get data from a posted (login) form
if (isset($_POST['myLogin'])) {

    // get posted data from user from login form
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    // query
    $q = "SELECT * from admin_login WHERE user_email = '$user_email' AND user_password = '$user_password' ";
    $qResult = mysqli_query($conn, $q);

    $row = mysqli_fetch_assoc($qResult);


    $user_id = $row['ID'];
    var_dump($user_id);
    //die();


    $insertTimeQuery = "INSERT INTO admin_login VALUES ('', $user_id , NOW())";
    $insertTimeQueryResult = mysqli_query($conn, $insertTimeQuery);


    // run query

    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));

    // fetch data

    $results = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {

        $_SESSION['loggedin'] = true;
        $_SESSION['logindetails'] = $results;

        // redirect to signin.php
        header("location:admin.php");
    } else {
        ("deze gegevens zijn al bekend in de database graag andere gegevens kiezen");
    }

    // compare with from input

    //Check username and password submitted by the user against stored username and password

    if ($user_email == $_POST['user_email'] && $user_password == $_POST['user_password']) {
        // correct username and password
        // user will be logged in
        $_SESSION['loggedin'] = true;

        // optional, reload the page
        header("location:index.php");
        exit;
    } else {
        $message = "Wrong login!";
    }
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Positionering">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Signup/Signin</title>
</head>

<body>



    <body>
        <?php
        // if message is NOT empty, then print it
        if ($message != "") {
            echo $message;
        }
        ?>
        <?php
        if ($_SESSION['loggedin'] == true) {
        ?>
            <form action="" method="post">
                <input type="submit" value="Logout" name="myLogout">
            </form>
        <?php
        } else {
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="container">
                    <label for="email"><b class="info">e-mail</b></label>
                    <input type="email" name="user_email" placeholder="Enter Your email">
                    <b class="info">Password:</b> <input type="user_password" name="user_password" value="test"><br>
                    <!-- Repeat password: <input type="password"  name="user_password_repeat" value="test"  ><br><br>  -->
                    <p><b class="white">By creating an account you agree to our</b><a href="https://safety.google/principles/">Terms & Privacy</a>.</p>
                    </label>
                    <div class="clearfix">
                        <input type="submit" name="myLogin" value="Login!">
                        <button type="button" class="cancelbtn">Cancel</button>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>
    </body>

</html>