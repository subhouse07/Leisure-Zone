<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Leisure Zone - Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" initial-scale=1">
	<link href="css/jquery-ui-lightness.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
	<link href="css/styles.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/regvalidate.js"></script>
	<link rel="icon" type="image/png" href="img/icon.png">
</head>
<body>
	<?php
		$userName = $password = $rptPass = $fName = $lName = $addr1 = $addr2 = $city = $state = $zip 
		= $phone = $email = $gender = $marital = $dob = "";
		
		$userNamErr = $passwordErr = $rptPassErr = $fNameErr = $lNameErr = $addr1Err = $addr2Err 
		= $cityErr = $stateErr = $zipErr = $phoneErr = $emailErr = $genderErr = $maritalErr = $dobErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valid = true;
			$userName = test_input($_POST["userName"]);
			if (empty($userName)) {
				$userNameErr = "Username required";
				$valid = false;
			} else {
				if (strlen($userName) < 6) {
					$userNameErr = "Minimum of 6 chars";
					$valid = false;
				} else if (strlen($userName) > 50) {
					$userNameErr = "Max of 50 chars";
					$valid = false;				
				}
			}

			$password = test_input($_POST["pass"]);
			$rptPass = test_input($_POST["rptPass"]);
			$digit = false;
			$lower = false;
			$upper = false;
			$special = false;
			$passMatch = false;

			if (empty($password)) {
				$passwordErr = "Password required";
				$valid = false;
			} else {
				if (strlen($password) < 8) {
					$passwordErr = "Minimum of 8 chars";
					$valid = false;
				} else if (strlen($userName) > 50) {
					$passwordErr = "Max of 50 chars";
					$valid = false;
				} else if ($password != $rptPass) {
					$passwordErr = "Passwords do not match";
					$valid = false;
				}
			
				for ($i = 0; $i < strlen($password); $i++) {
					if (preg_match("/\d/", $password[$i]))
						$digit = true;
					if (preg_match("/[A-Z]/", $password[$i]))
						$upper = true;
					if (preg_match("/[a-z]/", $password[$i]))
						$lower = true;
					if (preg_match("/\W/", $password[$i]))
						$special = true;
				}
	
				if ($digit && $lower && $upper && $special)
					$passMatch = true;
				if (!$passMatch) {
					$passwordErr = "Password must contain at least 1 digit, 1 lowercase, 1 uppercase," .
							" and 1 special character";
					$valid = false;
				}
			}

			$fName = test_input($_POST["fName"]);
			if (empty($fName)) {
				$fNameErr = "First name required";
				$valid = false;
			} else {
				if (strlen($fName) > 50) {
					$fNameErr = "Max of 50 chars";
					$valid = false;
				}
			}

			$lName = test_input($_POST["lName"]);
			if (empty($fName)) {
				$lNameErr = "Last name required";
				$valid = false;
			} else {
				if (strlen($fName) > 50) {
					$lNameErr = "Max of 50 chars";
					$valid = false;
				}
			}

			$addr1 = test_input($_POST["addr1"]);
			if (empty($addr1)) {
				$addr1Err = "Address required";
				$valid = false;
			} else {
				if (strlen($addr1) > 100) {
					$addr1Err = "Max of 100 chars";
					$valid = false;
				}
			}
			
			$addr2 = test_input($_POST["addr2"]);
			if (strlen($addr2) > 100) {
				$addr2Err = "Max of 100 chars";
				$valid = false;
			}

			$city = test_input($_POST["city"]);
			if (empty($city)) {
				$cityErr = "City required";
				$valid = false;
			} else {
				if (strlen($addr1) > 50) {
					$addr1Err = "Max of 50 chars";
					$valid = false;
				}
			}

			$state = test_input($_POST["state"]);
			if ($state == "null") {
				$stateErr = "State required";
				$valid = false;
			}

			$zip = test_input($_POST["zip"]);
			if (empty($zip)) {
				$zipErr = "Zip required";
				$valid = false;
			} else {
				$zipMatch = preg_match("/^\d{5}$/", $zip);
				if (!$zipMatch) {
					$zipMatch = preg_match("/^\d{5}[-]\d{4}$/", $zip);
					if (!$zipMatch) {
						$zipErr = "Invalid zip code.";
						$valid = false;
					}
				}
			}

			$phone = test_input($_POST["phone"]);
			if (empty($phone)) {
				$phoneErr = "Phone # required";
				$valid = false;
			} else {
				$phoneMatch = preg_match("/\d{3}[-]\d{3}[-]\d{4}/", $phone);
				if (!$phoneMatch) {
					$phoneErr = "Phone number must contain 10 digits";
					$valid = false;
				}
			}

			$email = test_input($_POST["email"]);
			if (empty($email)) {
				$emailErr = "Email required";
				$valid = false;
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email format";
					$valid = false;
				} else if (strlen($userName) > 255) {
					$emailErr = "Max of 255 chars";
					$valid = false;
				}
			}

			$gender = test_input($_POST["gender"]);
			if (empty($gender)) {
				$genderErr = "Gender required";
				$valid = false;
			}

			$marital = test_input($_POST["marital"]);
			if (empty($marital)) {
				$maritalErr = "Marital status required";
				$valid = false;
			}

			$dob = test_input($_POST["dob"]);
			if (empty($dob)) {
				$dobErr = "Date of birth required";
				$valid = false;
			}
		}

		if ($valid) {
			$_SESSION["userName"] = $userName;
			$_SESSION["fName"] = $fName;
			$_SESSION["lName"] = $lName;
			$_SESSION["password"] = $password;
			$_SESSION["addr1"] = $addr1;
			$_SESSION["addr2"] = $addr2;
			$_SESSION["state"] = $state;
			$_SESSION["city"] = $city;
			$_SESSION["zip"] = $zip;
			$_SESSION["phone"] = $phone;
			$_SESSION["dob"] = $dob;
			$_SESSION["email"] = $email;
			$_SESSION["gender"] = $gender;
			$_SESSION["marital"] = $marital;
			header('Location: Confirmation.php');
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	?>
	<a href="index.html">
		<img src="img/header.jpg" class="headImg">
	</a>
	<br>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-4" id="sidebar">
				<a href = "index.html">
					<img src="img/btnHome.png" class = "regButton"/>
				</a>
				<a href="Register.php">
					<img src="img/btnReg.png" class="regButton"/>
				</a>
			</div>
			<div class="col-sm-8" id="forms1">
				<h2 class="colorful">Register Here</h2>
				<p id="errors"/>
				<form id="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
					<input type="text" id="userName" name="userName" placeholder="Username" size="30" 
						value="<?php echo $userName; ?>">
					<span class="errors">
						<?php if (!empty($userNameErr)) { echo "\n<br>" . $userNameErr; }?>
					</span>
					<br>
					<input type="password" id="pass" name="pass" placeholder="Password" size="30">
					
					<input type="password" id="rptPass" name="rptPass" placeholder="Repeat Password" size="30">
					<span class="errors">
						<?php if (!empty($passwordErr)) {echo ("\n<br>" . $passwordErr);}?>					
					</span>
					<br>
					<input type="text" name="fName" placeholder="First Name" size="30" maxlength="50"
						value="<?php echo $fName; ?>"/>
					<input type="text" id="lName" name="lName" placeholder="Last Name" size="30" maxlength="50"
						value="<?php echo $lName; ?>"/>
					<span class="errors">
						<?php 
							if (!empty($fNameErr)) {
								echo "\n<br>" . $fNameErr;
							}
							if (!empty($lNameErr)) {
								echo "\n<br>" . $lNameErr;
							}
						?>
					</span>
					<br>
					<input type="text" id="addr1" name="addr1" placeholder="Address Line 1" size="30"
						maxlength="100" value="<?php echo $addr1; ?>"/>
					<input type="text" id="addr2" name="addr2" placeholder="Address Line 2" size="30"
						maxlength="100" value="<?php echo $addr2; ?>"/>
					<span class="errors">
						<?php
							if (!empty($addr1Err)) {
								echo "\n<br>" . $addr1Err;
							}
							if (!empty($addr2Err)) {
								echo "\n<br>" . $addr2Err;
							}
						?>
					</span>
					<br>
					<input type="text" id="city" name="city" placeholder="City" size="30" maxlength="50"
						value="<?php echo $city; ?>"/>
					<span class="errors">
						<?php if (!empty($cityErr)) { echo "\n<br>" . $cityErr; }?>
					</span>
					<br>
					<select id="state" name="state">
						<option value="null">Select a state</option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>
					<span class="errors">
						<?php if (!empty($stateErr)) { echo "\n<br>" . $stateErr; }?>
					</span>	
					<br>
					<input type="text" id="zip" name="zip" placeholder="Zipcode"
							onblur="formatZip(zip)" value="<?php echo $zip; ?>"/>
					<span class="errors">
						<?php if (!empty($zipErr)) { echo "\n<br>" . $zipErr; }?>
					</span>
					<br>
					<input type="text" id="phone" name="phone" placeholder="Phone #" maxlength="12"
							onblur="formatPhone(phone)" value="<?php echo $phone; ?>"/>
					<span class="errors">
						<?php if (!empty($phoneErr)) { echo "\n<br>" . $phoneErr; }?>
					</span>
					<br>
					<input type="email" id="email" name="email" placeholder="Email" size="30" maxlength="255"
						value="<?php echo $email; ?>"/>
					<span class="errors">
						<?php if (!empty($emailErr)) { echo "\n<br>" . $emailErr; }?>
					</span>
					<br>
					<div class="row">
						<div class="col-sm-2">					
							<b>Gender</b>
							<span class="errors">
								<?php if (!empty($genderErr)) { echo "\n<br>" . $genderErr; }?>
							</span>
						</div>
						<div class="col-sm-3" id="radGender">
							<label for="male">Male</label>
							<input type="radio" name="gender" value="male" id="male"
								<?php if (isset($gender) && $gender=="male") echo "checked";?>>
							<br>
							<label for="female">Female</label>
							<input type="radio" name="gender" value="female" id="female"
								<?php if (isset($gender) && $gender=="female") echo "checked";?>>
							<br>
							<label for="otherg">Other</label>
							<input type="radio" name="gender" value="other" id="otherg"	
								<?php if (isset($gender) && $gender=="other") echo "checked";?>>
							<br>
							<br>
						</div>
						<div class="col-sm-7">
												
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<b>Marital Status</b>
							<span class="errors">
								<?php if (!empty($maritalErr)) { echo "\n<br>" . $maritalErr; }?>
							</span>
						</div>
						<div class="col-sm-3" id="radMarital">
							<label for="single">Single</label>
							<input type="radio" name="marital" value="single" id="single"
								<?php if (isset($marital) && $marital=="single") echo "checked";?>>
							<br>
							<label for="married">Married</label>
							<input type="radio" name="marital" value="married" id="married"
								<?php if (isset($marital) && $marital=="married") echo "checked";?>>
							<br>
							<label for="otherm">Other</label>
							<input type="radio" name="marital" value="other" id="otherm"
								<?php if (isset($marital) && $marital=="other") echo "checked";?>>
							<br>
						</div>
					</div>
					<div class="col-sm-7"></div>
					<br>
					<input type="text" id="dob" name="dob" placeholder="DOB (MM/DD/YYYY)" 
						value="<?php echo $dob; ?>"/>
					<span class="errors">
						<?php if (!empty($dobErr)) { echo "\n<br>" . $dobErr; }?>
					</span>
					<br>
					<br>
					<input type="submit" name="submit" value="Submit">
					<!--<input type="button" class="formBtn" value="Submit" onclick="formValidate(userName,
						pass,rptPass, fName, lName, addr1, addr2, city, state, zip, phone, email, 
						gender, marital, dob)">-->
					<input type="button" class="formBtn" value="Reset" id="reset" onclick="resetForm(regForm)">
				<form/>
			</div>
		</div>
		<footer id="foot">
		<div class="row">
			<div class="col-sm-4">
				<a href="http://www.fitnessmenweekly.com/build-muscle">
					<img src="img/ad1.gif"/>
				</a>
				<a href="http://www.bodybuilding.com/store">
					<img src="img/ad2.gif"/>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="http://www.maxworkouts.com/exercise_program">
					<img src="img/ad3.gif"/>
				</a>
				<a href="http://www.getthisripped.com">
					<img src="img/ad4.gif"/>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="http://www.healthyeatingright.us">
					<img src="img/ad5.gif"/>
				</a>
				<a href="http://www.nowloss.com/how-to-get-ripped.htm">
					<img src="img/ad6.gif"/>
				</a>
			</div>
		</div>
	</footer>
	<div>
		<img src="img/lounge.png" id="lounge1"/>
		<img src="img/lounge2.png" id="lounge2"/>
		<img src="img/golf.png" id="golf"/>
		<img src="img/chair.png" id="chair"/>
	</div>
</body>
</html>
