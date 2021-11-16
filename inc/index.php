<?php
include("db.php");
// check if there is a category in the URL
// if there is, grab it and select games from that category
// else, if not, grab'm all
if(isset($_GET['herocat']))
{
    $herocat = $_GET['herocat'];
}
else
{
    $herocat = 0;
}

$birdsofprey = 0 ;
$hive = 0 ;
$justice_league = 0 ;
$shazam_family = 0 ;
$suicidesquad = 0 ;

// create empty array to store games from the database
$heroes = array();
$HeroesExtra = array();
$teams= array();
$ShowReview = array();
$extrareview = array ();
$powers = array ();
$errors = [];
// define query to send
// herocat is false

$heroSQL = "SELECT * FROM `HeroInfo` WHERE `HeroesClass`  = $herocat ";

// run query
$result = mysqli_query($conn, $heroSQL) or die (mysqli_error);

// loop through results
// and add any game to 5 heroes array
while ($results = mysqli_fetch_assoc($result))
{
	$heroes[] = $results;

}

if(isset($_POST['submit']))
{

/*
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	die("end");
*/
	//Deze variable haalt de value van de hero uit de button.
	$heroCommentID = $_POST['submit'];

	//Dit is je text uit je text area.
	$review = $_POST['ReviewText'];
	
	//Dit is je  rating nummer.
	$Rating = $_POST['rating'];

	if($Rating == "")
    {
        $errors[] = "het is wel zo prettig als je je held een rating wilt geven";
    } 

	if($_POST['ReviewText'] == "")
    {
        $errors[] =  "nu je toch bezig bent kan je misschien dan ook een review schrijven? het duurt niet zo lang hoor";
    } 

	if(count($errors) == 0)
    {
	$ReviewSQL = "INSERT INTO `heroesreview` VALUES('', '$review' , '$heroCommentID', '$Rating' , NOW())";
	$ReviewSQlresult = mysqli_query($conn, $ReviewSQL);
	}

	if (isset($_POST['myLogout'])){
		// someone used a logout form
	  
	  
	   // die("boooooooo");
	  
		// wipe session data completely
		session_destroy();
		// reload
		header("location:index.php");
	  
	  }

}



$TeamSQL = "SELECT * FROM `teamnames` ";
$TeamResource = mysqli_query($conn, $TeamSQL) or die (mysqli_error);
while ($TeamResults = mysqli_fetch_assoc($TeamResource))
{
    $teams[] = $TeamResults;
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
  <link rel="shortcut icon" type="image/jpg" href="img/favicon.png"/>
	<title>DC Heroes</title>
</head>
<body>
<header id ="header">
		<div class="index">
			<a href ="index.php">DC Heroes</a>
    	</div>
</header>
<div class="main-container">

<?php
  // when errors occured, show them here
  // use a foreach loop for this
    if(isset($errors) && count($errors) > 0)
    {
        echo "<ul>";
        foreach($errors as $error ){
            echo "<li>";
            echo $error;
            echo "</li>";
        }
        echo "</ul>";
    }
?>

<div class="slider">
<div class="load">
  	<div id="main-left">
	Let's  me introduce to you the teams
	  	<div class="teams">
		  <ul class="teams">
			  <?php
			  foreach($teams as $team)
			  {
				  ?>
			<li><a href="index.php?herocat= <?php echo $team['TeamID']; ?>"><?php echo $team['TeamName']; ?></a></li>
			<div>
				<img class="heroimgextra2" src="img/<?php echo $team['TeamImg']; ?>" />
			</div>
			<?php
			  }
			?>
			<br>
			 use this link to create a account <a class="link" href="signup.php">Sign Up</a>.
			 <br>
        	 use this link to login <a class="link" href="signin.php">Sign In</a>. </p>
		  </ul>		  
		</div> 
	</div>

	<div id="main-right">

		let's have a look at the member you choose.
		<br>
		<br>

<?php
	
if(isset($_GET['heroId']))
{
	$info = $_GET['heroId']; 

	$extraSQL = "SELECT * FROM `HeroInfo` WHERE `HeroesID` = $info";

	// run query

	$gemiddeldeSQl = "SELECT Round(AVG(Rating),0) as gemiddelde FROM heroesreview WHERE `HeroesID` = $info ";
	$gemiddeldeSQlResult = mysqli_query($conn, $gemiddeldeSQl) or die (mysqli_error);

	$gemiddelde = [];
	while ($row = mysqli_fetch_assoc($gemiddeldeSQlResult))
	{
    $gemiddelde = $row;
	}

	$resource = mysqli_query($conn, $extraSQL) or die (mysqli_error);

	while ($ExtraResult = mysqli_fetch_assoc($resource))
	{
		$HeroesExtra[] = $ExtraResult;
	}

	$powersSQL = "SELECT `PowerDesc` FROM `powersinfo` NATURAL JOIN `heroes-powers` WHERE `HeroesID` = $info";

	$powerResource = mysqli_query($conn, $powersSQL) or die (mysqli_error);
	while ($powerResult = mysqli_fetch_assoc($powerResource))
	{
		$powers[] = $powerResult;
	}

	$LatestReviewSQL = "SELECT * FROM `heroesreview` WHERE `HeroesID` = $info  ORDER BY Time DESC limit 1 ";

	// run query
	$ReviewResult = mysqli_query($conn, $LatestReviewSQL) or die (mysqli_error);
	
	// loop through results
	// and add any game to 5 heroes array
	while ($reviewextra = mysqli_fetch_assoc($ReviewResult))
	{
		$extrareview[] = $reviewextra;
	}

//	var_dump($powers);
//	die();
}



foreach($HeroesExtra as $extra)
    {
        ?>
    <div class="Heroextra">
        <div>
            <h3 class ="HeroName"> <?php echo $extra['HeroesName']; ?></h3>
        </div>  
		<div class="HeroRating">
		
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="frmRate">		
			<fieldset>
				<div class="rate">

				<p>
			<?php
echo $gemiddelde['gemiddelde'];
 $stergemiddelde =  $gemiddelde['gemiddelde'];
			?>
			</p>
					<input type="radio" id="rating10" name="rating" value="10" />
					<label class="lblRating" for="rating10" title="5 stars"></label>

				    <input type="radio" id="rating9" name="rating" value="9" />
				    <label class="lblRating half" for="rating9" title="4 1/2 stars"></label>

				    <input type="radio" id="rating8" name="rating" value="8" />
				    <label class="lblRating" for="rating8" title="4 stars"></label>

				    <input type="radio" id="rating7" name="rating" value="7"  />
				    <label class="lblRating half" for="rating7" title="3 1/2 stars"></label>

				    <input type="radio" id="rating6" name="rating" value="6" />
				    <label class="lblRating" for="rating6" title="3 stars"></label>

				    <input type="radio" id="rating5" name="rating" value="5" />
				    <label class="lblRating half" for="rating5" title="2 1/2 stars"></label>

				    <input type="radio" id="rating4" name="rating" value="4" />
				    <label class="lblRating" for="rating4" title="2 stars"></label>

				    <input type="radio" id="rating3" name="rating" value="3" />
				    <label class="lblRating half" for="rating3" title="1 1/2 stars"></label>

				    <input type="radio" id="rating2" name="rating" value="2" />
				    <label class="lblRating" for="rating2" title="1 star"></label>

				    <input type="radio" id="rating1" name="rating" value="1" />
				    <label class="lblRating half" for="rating1" title="1/2 star"></label>

					<input type="radio" id="rating0" name="rating" value="0" />
				    <label class="lblRating" for="rating0" title="No star"></label>	
				</div>
			</fieldset>		
		</div>
		<div>
		<img class="heroimgextra" src="img/<?php echo $extra['HeroesImg']; ?>" />
		</div>
		<br>
		<div  class="powers">
		<p> Lets have a look at the 3 special powers this hero has. <p> 
		<?php
		foreach($powers as $power)
		{
			?>
		<?php echo $power['PowerDesc'] ?> <br>
		<?php
			  }
			?>

		</div>
<br>
<a class="extrabtn" href="insert.php">Create</a>
<a class="extrabtn" href="insert.php">Update</a>
<a class="extrabtn" href="delete.php?heroId=<?php echo $extra['HeroesID']; ?>">Delete</a>

<br>
		<br>
		<div>
			<h3 class="heroinfoextra"> <?php echo $extra['HeroesDescLong']; ?></h3> 
		</div>	
		<h3>Lets write a review</h3>
		<textarea class="reviewform" rows="4" cols="50" name="ReviewText" placeholder="enter your review here..."></textarea>	
		<br>		
		<button name="submit" type="submit" value="<?php echo $extra['HeroesID']?>">Klik hier</button>		
		<br>
		<br>
		<br>
		<h2> its review time :) <h2>
		<div class="ShowReview">
		<?php
		foreach($extrareview as $review)
    {
		?>
		<h3 class="text"> this the review you typed about the hero: <br> <?php echo $review['ReviewText']; ?>		<h3> 
		<h3 class="text"> The rating you gave the hero: <br> <?php echo $review['Rating']; ?>	  				<h3> 
		<h4 class="time"> The time the review is posted:<?php echo $review['Time']; ?>	<h4> 
		<?php
			  }
			?>
	 	</div>
	</div> 
		</form>
    <?php
    }    
?>
	</div>



	<div id="main-center">
		let's have a look at the members from your team.
		<br>
		<br>
<?php
foreach($heroes as $hero)
    {
        ?>
    <div class="Hero">
        <div>
            <h3 class ="heroname"> <?php echo $hero['HeroesName']; ?></h3>
        </div>  
		<div>
		<img class="heroimg" src="img/<?php echo $hero['HeroesImg']; ?>" />
		</div>
		<div>
			<h3 class="heroinfo"> <?php echo $hero['HeroesDescShort']; ?></h3> 
		</div>
		<br>
		<a class="button" href="index.php?herocat=<?php echo $hero['HeroesClass']; ?>&heroId=<?php echo $hero['HeroesID']; ?>">Info</a>
	</div>  
    <?php
    }    
?>
	</div>

</div>	
</div>
</div>
</body>
</html> 