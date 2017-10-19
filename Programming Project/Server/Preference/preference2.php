<?php
	session_start();

	$db = mysqli_connect("localhost", "root", "", "accounts" ); //databse connection
	$username = $_SESSION["username"]; // store the current logged user into $username
	$get = "SELECT user_id FROM members WHERE username = '$username'"; // select user_id of the current logged user
	$result = $db->query($get); // run the query

	if ($row = mysqli_fetch_assoc($result)){ // if the query is successfull
		$user_id = $row["user_id"];// store row user_id from database to $user_id
	}else{

	}
	if ($_SESSION["update"] == TRUE){ //if its an UPDATE of the user profile
		$sql2 = "SELECT * FROM members WHERE user_id = $user_id"; //select the user
		$result = $db->query($sql2); // run the query

		if($row = mysqli_fetch_assoc($result)){  // if the query is successfull and the session var update is set as true, update the profile with the following variable from below
			if (isset($_POST['pref_btn'])) { // if the button pref_btn is set
				$height = mysqli_real_escape_string($db, $_POST['height']);
				$jobs = mysqli_real_escape_string($db, $_POST['jobs']);
				$body = mysqli_real_escape_string($db, $_POST['body']);
				$education = mysqli_real_escape_string($db, $_POST['education']);
				$ethnic = mysqli_real_escape_string($db, $_POST['ethnic']);
			 	$drink = mysqli_real_escape_string($db, $_POST['drink']);
				$smoke = mysqli_real_escape_string($db, $_POST['smoke']);
				$gamble = mysqli_real_escape_string($db, $_POST['gamble']);
				$religion = mysqli_real_escape_string($db, $_POST['religion']);
				// code above is grabbing the information from preference2 form method and storing them into different php variables
				$sql = "UPDATE information SET height='$height', jobs='$jobs', body='$body', education='$education', ethnic='$ethnic', drink='$drink', smoke='$smoke', gamble='$gamble', religion='$religion'
				WHERE user_id=$user_id"; // update the table infromation with these following php variables from above.
				mysqli_query($db, $sql); // execute the query
				header("Location:updateprofile.php"); // relocate the user to updateprofile page.
			}
		}
	}else{ // else if its NOT an UPDATE, just insert new informations to the corresponding table then head to next page
		$sql2 = "SELECT * FROM members WHERE user_id = $user_id";//select the user
		$result = $db->query($sql2); //execute the query
		if($row = mysqli_fetch_assoc($result)){ // if the query is successfull
			if (isset($_POST['pref_btn'])) { // if the button pref_btn is set
				$height = mysqli_real_escape_string($db, $_POST['height']);
				$jobs = mysqli_real_escape_string($db, $_POST['jobs']);
				$body = mysqli_real_escape_string($db, $_POST['body']);
				$education = mysqli_real_escape_string($db, $_POST['education']);
				$ethnic = mysqli_real_escape_string($db, $_POST['ethnic']);
				$drink = mysqli_real_escape_string($db, $_POST['drink']);
				$smoke = mysqli_real_escape_string($db, $_POST['smoke']);
				$gamble = mysqli_real_escape_string($db, $_POST['gamble']);
				$religion = mysqli_real_escape_string($db, $_POST['religion']);
				// code above is grabbing the information from preference2 form method and storing them into different php variables
				$sql = "INSERT INTO information(user_id, height, jobs, body, education, ethnic, drink, smoke, gamble, religion)
				VALUES('$user_id', '$height', '$jobs', '$body', '$education', '$ethnic', '$drink', '$smoke', '$gamble', '$religion')";// INSERT these following php variables to the information table.
				mysqli_query($db, $sql); // execute the query
				header("location:preference3.php"); // relocate the user to preference3.php page
			}
		}
	}
?>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../Client/css/preference.css">
	</head>
    <body>
			<?php include("../../Client/external/nav.php"); ?>
    	<h1>About Me</h1>
    	<div class = "preferences">
    		<form method = "POST" action ="preference2.php">
		      <p>How tall are you?</p>
		      <input type="number" name ="height" id="height"required/>CM

					<p>My occupation is</p>
						<select name="jobs" required>
							<option></option>
							<option value="Accountant">Accountant</option>
							<option value="Advertising Sales Agent">Advertising Sales Agent</option>
							<option value="Aircraft Mechanic">Aircraft Mechanic</option>
							<option value="Airline Pilot">Airline Pilot</option>
							<option value="Airport Security Screener">Airport Security Screener</option>
							<option value="Airline Reservations Agent">Airline Reservations Agent</option>
							<option value="Air Traffic Controller">Air Traffic Controller</option>
							<option value="Architect">Architect</option>
							<option value="Auto Mechanic">Auto Mechanic</option>
							<option value="Bank Teller">Bank Teller</option>
							<option value="Bartender">Bartender</option>
							<option value="Biological Technician">Biological Technician</option>
							<option value="Biomedical Engineer">Biomedical Engineer</option>
							<option value="Business Analyst">Business Analyst</option>
							<option value="Chef">Chef</option>
							<option value="Chemical Engineer">Chemical Engineer</option>
							<option value="Childcare Worker">Childcare Worker</option>
							<option value="Chiropractor">Chiropractor</option>
							<option value="Computer Programmer">Computer Programmer</option>
							<option value="Computer Systems Analyst">Computer Systems Analyst</option>
							<option value="Construction">Construction</option>
							<option value="Consultant">Consultant</option>
							<option value="Database Administrator">Database Administrator</option>
							<option value="Dental Hygienist">Dental Hygienist</option>
							<option value="Dentist">Dentist</option>
							<option value="Director">Director</option>
							<option value="Dietitian">Dietitian</option>
							<option value="Doctor">Doctor</option>
							<option value="Editor">Editor</option>
							<option value="Electrician">Electrician</option>
							<option value="Epidemiologist">Epidemiologist</option>
							<option value="Event Planner">Event Planner</option>
							<option value="Fashion Designer">Fashion Designer</option>
							<option value="Financial Advisor">Financial Advisor</option>
							<option value="Financial Manager">Financial Manager</option>
							<option value="Firefighter">Firefighter</option>
							<option value="Fitness Trainer">Fitness Trainer</option>
							<option value="Flight Attendant">Flight Attendant</option>
							<option value="Funeral Director">Funeral Director</option>
							<option value="Judge">Judge</option>
							<option value="Graphic Designer">Graphic Designer</option>
							<option value="Guidance Counselor">Guidance Counselor</option>
							<option value="Hairdressers">Hairdressers</option>
							<option value="Human Resources Assistant">Human Resources Assistant</option>
							<option value="Human Resources Manager">Human Resources Manager</option>
							<option value="Industrial Designer">Industrial Designer</option>
							<option value="Interior Designer">Interior Designer</option>
							<option value="Interpreter">Interpreter </option>
							<option value="Lawyer">Lawyer</option>
							<option value="Librarian">Librarian</option>
							<option value="Manufacturing">Manufacturing </option>
							<option value="Market Analyst">Market Analyst</option>
							<option value="Mechanical Engineer">Mechanical Engineer</option>
							<option value="Mechical Laboratory Technician">Medical Laboratory Technician</option>
							<option value="Model">Model</option>
							<option value="Occupational Therapist">Occupational Therapist</option>
							<option value="Paramedics">Paramedics</option>
							<option value="Paralegal">Paralegal </option>
							<option value="Personal Trainer">Personal Trainer</option>
							<option value="Pharmacist">Pharmacist</option>
							<option value="Pharmacy Technician">Pharmacy Technician</option>
							<option value="Photographer">Photographer</option>
							<option value="Physical Therapist">Physical Therapist</option>
							<option value="Plumber">Plumber</option>
							<option value="Police">Police Officer</option>
							<option value="Postal Service Worker">Postal Service Worker</option>
							<option value="Producer">Producer</option>
							<option value="Public">Public Relations </option>
							<option value="Receptionist">Receptionist</option>
							<option value="Retail">Retail </option>
							<option value="Secretary">Secretary </option>
							<option value="Security Guard">Security Guard</option>
							<option value="Social Media">Social Media</option>
							<option value="Social Worker">Social Worker</option>
							<option value="Software Developer">Software Developer</option>
							<option value="set">Special Education Teacher </option>
							<option value="Subway Operator">Subway Operator</option>
							<option value="Teacher">Teacher</option>
							<option value="Veterinarian">Veterinarian</option>
							<option value="Web Developer">Web Developer </option>
							<option value="Writer">Writer</option>
						</select>
					<br><br>

					<p>What is your body type?</p>
						<select name="body"required>
							<option></option>
							<option value="Slim">Slim</option>
							<option value="Athletic">Athletic</option>
							<option value="Average">Average</option>
							<option value="Overweight">Overweight</option>
							<option value="Obese">Obese</option>
						</select>
					<br><br>

					<p>What is your highest level of education?</p>
						<select name="education"required>
							<option></option>
							<option value="High School Graduate">High School Graduate</option>
							<option value="Certificate Diploma">Certificate Diploma</option>
							<option value="Bachelor's Degree">Bachelor's Degree</option>
							<option value="Master's Degree">Master's Degree</option>
							<option value="Doctorate">Doctorate</option>
						</select>
					<br><br>

					<p>What is your ethnicity?</p>
						<select name="ethnic"required>
							<option></option>
							<option value="Aboriginal">Aboriginal</option>
							<option value="Asian">Asian</option>
							<option value="African">African</option>
							<option value="Caucasian">Caucasian</option>
							<option value="Hispanic">Hispanic</option>
							<option value="Polynesian">Polynesian</option>
							<option value="Middle Eastern">Middle Eastern</option>
							<option value="Other">Other</option>
						</select>
					<br><br>

					<p>Do you drink?</p>
						<select name="drink"required>
							<option></option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					<br><br>

					<p>Do you smoke?</p>
						<select name="smoke"required>
							<option></option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					<br><br>

					<p>Do you gamble?</p>
						<select name="gamble"required>
							<option></option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>
					<br><br>

					<p>What is your religion?</p>
						<select name="religion"required>
							<option></option>
							<option value="Atheist">Atheist</option>
							<option value="Agnostic">Agnostic</option>
							<option value="Buddhism">Buddhism</option>
							<option value="Catholic">Catholic</option>
							<option value="Christianity">Christianity</option>
							<option value="Hinduism">Hinduism</option>
							<option value="Islam">Islam</option>
							<option value="Judaism">Judaism</option>
							<option value="Other">Other</option>
							<option value="None">None</option>
						</select>
					<br><br>

		      <input type ="submit" class ="nextbtn" name ="pref_btn" value ="Next">
    		</form>
    	</div>
		</body>
	<?php include("../../Client/external/footer.php");?>
</html>
