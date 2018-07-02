<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>You're In The Zone!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="css/styles.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
<a href="index.html">
	<img src="img/header.jpg" class="headImg">
</a>
<br>
<div class="container">

	<div class="row">
		
		<div class="col-sm-8" style="float: right;">
			<h1 class="colorful">CONGRATULATIONS</h1>
			<p>
				Your Information:<br>
				Username:       <?php echo $_SESSION["userName"]; ?> <br>
				Password:       <?php echo $_SESSION["password"]; ?> <br>
				First Name:     <?php echo $_SESSION["fName"]; ?> <br>
				Last Name:      <?php echo $_SESSION["lName"]; ?> <br>
				Address:        <?php echo $_SESSION["addr1"]; ?> <br>
				Address2:       <?php echo $_SESSION["addr2"]; ?> <br>
				City:           <?php echo $_SESSION["city"]; ?> <br>
				State:          <?php echo $_SESSION["state"]; ?> <br>
				Zip:            <?php echo $_SESSION["zip"]; ?> <br>
				Email:          <?php echo $_SESSION["email"]; ?> <br>
				Gender:         <?php echo $_SESSION["gender"]; ?> <br>
				Marital Status: <?php echo $_SESSION["marital"]; ?> <br>
				Date of Birth:  <?php echo $_SESSION["dob"]; ?> <br>
			</p>
		</div>	
		<div class="col-sm-4" id="sidebar">
			<div class="row">
			<a href="index.html">
				<img src="img/btnHome.png" class="regButton"/>
			</a>			
			<a href="Register.php">
				<img src="img/btnReg.png" class="regButton"/>
			</a>
			</div>
			<br>
			<div class="row">
				Register here to receive daily information on how to optimize your personal leisure time!
			</div>
		</div>
	
	</div>
	<footer>
		<div class="row" id="foot">
			<div class="col-sm-4">
				<a href="http://www.fitnessmenweekly.com/build-muscle" target="_blank">
					<img src="img/ad1.gif"/>
				</a>
				<a href="http://www.bodybuilding.com/store" target="_blank">
					<img src="img/ad2.gif"/>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="http://www.maxworkouts.com/exercise_program" target="_blank">
					<img src="img/ad3.gif"/>
				</a>
				<a href="http://www.getthisripped.com" target="_blank">
					<img src="img/ad4.gif"/>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="http://www.healthyeatingright.us" target="_blank">
					<img src="img/ad5.gif"/>
				</a>
				<a href="http://www.nowloss.com/how-to-get-ripped.htm" target="_blank">
					<img src="img/ad6.gif"/>
				</a>
			</div>
		</div>
	</footer>
</div>


<div>
	<img src="img/lounge.png" id="lounge1"/>
	<img src="img/lounge2.png" id="lounge2"/>
	<img src="img/golf.png" id="golf"/>
	<img src="img/chair.png" id="chair"/>
</div>

</body>
</html>
