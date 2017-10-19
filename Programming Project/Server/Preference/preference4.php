<!DOCTYPE html>
<?php
	session_start();
	$db = mysqli_connect("localhost", "root", "", "accounts" );//databse connection
	$username = $_SESSION["username"]; // store the current logged user into $username

	$get = "SELECT user_id FROM members WHERE username = '$username'";// select user_id of the current logged user
	$result = $db->query($get);// run the query
	if ($row = mysqli_fetch_assoc($result)) {// if the query is successfull
		$user_id = $row["user_id"];// store row user_id from database to $user_id
	}else{

	}

	if ($_SESSION["update"] == TRUE) { // if the user WANTS TO UPDATE their profile
		$sql2 = "SELECT user_id FROM members WHERE user_id = $user_id";//select the user
		$result = $db->query($sql2); // run the query
		if($row = mysqli_fetch_assoc($result)) {// if the query is successfull and the session var update is set as true, update the profile with the following variable from below
			if (isset($_POST['pref_btn'])) { // if the button pref_btn is set
				$ptype = mysqli_real_escape_string($db, $_POST['ptype']);
				$personality = mysqli_real_escape_string($db, $_POST['personality']);
				$hobby1 = mysqli_real_escape_string($db, $_POST['hobby1']);
				$hobby2 = mysqli_real_escape_string($db, $_POST['hobby2']);
				$hobby3 = mysqli_real_escape_string($db, $_POST['hobby3']);
				$hobby4 = mysqli_real_escape_string($db, $_POST['hobby4']);
				$hobby5 = mysqli_real_escape_string($db, $_POST['hobby5']);
				$travel = mysqli_real_escape_string($db, $_POST['travel']);
				$visit = mysqli_real_escape_string($db, $_POST['visit']);
				// code above is grabbing the information from preference4 form method and storing them into different php variables
				$sql = "UPDATE hobby SET ptype ='$ptype', personality='$personality', hobby1='$hobby1', hobby2='$hobby2', hobby3='$hobby3', hobby4='$hobby4', hobby5='$hobby5', travel='$travel', visit='$visit' WHERE user_id = '$user_id'";// update the table hobby with these following php variables from above.
				mysqli_query($db, $sql);// execute the query
				header("Location:updateprofile.php"); // relocate the user to updateprofile page.
			}
		}
	}else{// else if its NOT an UPDATE, just insert new informations to the corresponding table then head to next page
		$sql2 = "SELECT user_id FROM members WHERE user_id = $user_id";//select the user
		$result = $db->query($sql2); //execute the query
		if($row = mysqli_fetch_assoc($result)) {// if the query is successfull
			if (isset($_POST['pref_btn'])) { // if the button pref_btn is set
				$ptype = mysqli_real_escape_string($db, $_POST['ptype']);
				$personality = mysqli_real_escape_string($db, $_POST['personality']);
				$hobby1 = mysqli_real_escape_string($db, $_POST['hobby1']);
				$hobby2 = mysqli_real_escape_string($db, $_POST['hobby2']);
				$hobby3 = mysqli_real_escape_string($db, $_POST['hobby3']);
			 	$hobby4 = mysqli_real_escape_string($db, $_POST['hobby4']);
				$hobby5 = mysqli_real_escape_string($db, $_POST['hobby5']);
				$travel = mysqli_real_escape_string($db, $_POST['travel']);
				$visit = mysqli_real_escape_string($db, $_POST['visit']);
				// code above is grabbing the information from preference4 form method and storing them into different php variables
				$sql = "INSERT INTO hobby(user_id, ptype, personality, hobby1, hobby2, hobby3, hobby4, hobby5, travel, visit) VALUES('$user_id', '$ptype', '$personality', '$hobby1', '$hobby2', '$hobby3', '$hobby4', '$hobby5', '$travel', '$visit')";// INSERT these following php variables to the hobby table.
				mysqli_query($db, $sql);// execute the query
				header("Location:preference5.php");// relocate the user to preference5.php page
			}
		}
	}
 ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../../Client/css/preference.css">
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<?php include("../../Client/external/nav.php");?>
		<title>Preference</title>
	</head>
	<body>
	 	<h1>About Me</h1>
	  <div id="pref" class = "preferences">
	  	<form method="POST" action="preference4.php">
	   		<p>What would you consider yourself?</p>
	        <select name="ptype"required>
            <option></option>
    				<option value="Extroverted">Extroverted</option>
            <option value="Introverted">Introverted</option>
	        </select>
				<br><br>

	      <p>How would you consider your personality?</p>
	        <select name="personality"required>
            <option value=""></option>
    				<option value="Outgoing">Outgoing</option>
    				<option value="Friendly">Friendly</option>
            <option value="Happy">Happy</option>
            <option value="Aggresive">Aggressive</option>
            <option value="Quiet">Quiet</option>
            <option value="Shy">Shy</option>
	        </select>
				<br><br>

	      <p>What are your interests/hobbies? (Please pick 5)</p>
	      	<select name="hobby1"required>
            <option></option>
    				<option value="Acting">Acting</option>
            <option value="Archery">Archery</option>
            <option value="Arts">Arts</option>
            <option value="Astrology">Astrology</option>
            <option value="Badminton">Badminton</option>
    				<option value="Baseball">Baseball</option>
            <option value="Basketball">Basketball</option>
            <option value="BMX">BMX</option>
            <option value="Boardgames">Board Games</option>
            <option value="Bowling">Bowling</option>
    				<option value="Brewing">Brewing Beer</option>
            <option value="Canoeing">Canoeing</option>
            <option value="Chess">Chess</option>
            <option value="Collecting">Collecting</option>
            <option value="Cooking">Cooking</option>
    				<option value="Cosplay">Cosplay</option>
            <option value="Dancing">Dancing</option>
            <option value="Drawing">Drawing</option>
            <option value="Gym">Gym</option>
    				<option value="Fishing">Fishing</option>
            <option value="Fitness">Fitness</option>
            <option value="Games">Games</option>
            <option value="Gardening">Gardening</option>
            <option value="Golf">Golf</option>
    				<option value="Gokart">Go Kart Racing</option>
            <option value="Gymnastics">Gymnastics</option>
            <option value="Hiking">Hiking</option>
            <option value="Hunting">Hunting</option>
            <option value="Iceskating">Iceskating</option>
    				<option value="Kites">Kites</option>
            <option value="Knitting">Knitting</option>
            <option value="Music">Listening to music</option>
            <option value="Magic">Magic</option>
            <option value="Meditation">Meditation</option>
						<option value="MMA">Mixed Martial Arts (MMA)</option>
    				<option value="Origami">Origami</option>
            <option value="Painting">Painting</option>
            <option value="Paintball">Paintball</option>
            <option value="Parkour">Parkour</option>
    				<option value="Piano">Piano</option>
            <option value="Roleplaying">Roleplaying</option>
						<option value="Rugby">Rugby</option>
    				<option value="Sewing">Sewing</option>
            <option value="Skiing">Skiing</option>
            <option value="Snowboarding">Snowboarding</option>
            <option value="Shopping">Shopping</option>
            <option value="Singing">Singing</option>
    				<option value="Socialising">Socialising</option>
            <option value="Surfing">Surfing</option>
            <option value="Swimming">Swimming</option>
    				<option value="Tennis">Tennis</option>
            <option value="Traveling">Traveling</option>
            <option value="Frisbee">Ultimate Frisbee</option>
            <option value="Games">Video Games</option>
            <option value="Violin">Violin</option>
    				<option value="Watching Sports">Watching Sports</option>
            <option value="Woodworking">Woodworking</option>
            <option value="Yoga">Yoga</option>
            <option value="Zumba">Zumba</option>
	        </select>
					<br><br>

					<select name="hobby2"required>
						<option></option>
    				<option value="Acting">Acting</option>
            <option value="Archery">Archery</option>
            <option value="Arts">Arts</option>
            <option value="Astrology">Astrology</option>
            <option value="Badminton">Badminton</option>
    				<option value="Baseball">Baseball</option>
            <option value="Basketball">Basketball</option>
            <option value="BMX">BMX</option>
            <option value="Boardgames">Board Games</option>
            <option value="Bowling">Bowling</option>
    				<option value="Brewing">Brewing Beer</option>
            <option value="Canoeing">Canoeing</option>
            <option value="Chess">Chess</option>
            <option value="Collecting">Collecting</option>
            <option value="Cooking">Cooking</option>
    				<option value="Cosplay">Cosplay</option>
            <option value="Dancing">Dancing</option>
            <option value="Drawing">Drawing</option>
            <option value="Gym">Gym</option>
    				<option value="Fishing">Fishing</option>
            <option value="Fitness">Fitness</option>
            <option value="Games">Games</option>
            <option value="Gardening">Gardening</option>
            <option value="Golf">Golf</option>
    				<option value="Gokart">Go Kart Racing</option>
            <option value="Gymnastics">Gymnastics</option>
            <option value="Hiking">Hiking</option>
            <option value="Hunting">Hunting</option>
            <option value="Iceskating">Iceskating</option>
    				<option value="Kites">Kites</option>
            <option value="Knitting">Knitting</option>
            <option value="Music">Listening to music</option>
            <option value="Magic">Magic</option>
            <option value="Meditation">Meditation</option>
						<option value="MMA">Mixed Martial Arts (MMA)</option>
    				<option value="Origami">Origami</option>
            <option value="Painting">Painting</option>
            <option value="Paintball">Paintball</option>
            <option value="Parkour">Parkour</option>
    				<option value="Piano">Piano</option>
            <option value="Roleplaying">Roleplaying</option>
						<option value="Rugby">Rugby</option>
    				<option value="Sewing">Sewing</option>
            <option value="Skiing">Skiing</option>
            <option value="Snowboarding">Snowboarding</option>
            <option value="Shopping">Shopping</option>
            <option value="Singing">Singing</option>
    				<option value="Socialising">Socialising</option>
            <option value="Surfing">Surfing</option>
            <option value="Swimming">Swimming</option>
    				<option value="Tennis">Tennis</option>
            <option value="Traveling">Traveling</option>
            <option value="Frisbee">Ultimate Frisbee</option>
            <option value="Games">Video Games</option>
            <option value="Violin">Violin</option>
    				<option value="Watching Sports">Watching Sports</option>
            <option value="Woodworking">Woodworking</option>
            <option value="Yoga">Yoga</option>
            <option value="Zumba">Zumba</option>
					</select>
					<br><br>

					<select name="hobby3"required>
						<option></option>
						<option value="Acting">Acting</option>
						<option value="Archery">Archery</option>
						<option value="Arts">Arts</option>
						<option value="Astrology">Astrology</option>
						<option value="Badminton">Badminton</option>
						<option value="Baseball">Baseball</option>
						<option value="Basketball">Basketball</option>
						<option value="BMX">BMX</option>
						<option value="Boardgames">Board Games</option>
						<option value="Bowling">Bowling</option>
						<option value="Brewing">Brewing Beer</option>
						<option value="Canoeing">Canoeing</option>
						<option value="Chess">Chess</option>
						<option value="Collecting">Collecting</option>
						<option value="Cooking">Cooking</option>
						<option value="Cosplay">Cosplay</option>
						<option value="Dancing">Dancing</option>
						<option value="Drawing">Drawing</option>
						<option value="Gym">Gym</option>
						<option value="Fishing">Fishing</option>
						<option value="Fitness">Fitness</option>
						<option value="Games">Games</option>
						<option value="Gardening">Gardening</option>
						<option value="Golf">Golf</option>
						<option value="Gokart">Go Kart Racing</option>
						<option value="Gymnastics">Gymnastics</option>
						<option value="Hiking">Hiking</option>
						<option value="Hunting">Hunting</option>
						<option value="Iceskating">Iceskating</option>
						<option value="Kites">Kites</option>
						<option value="Knitting">Knitting</option>
						<option value="Music">Listening to music</option>
						<option value="Magic">Magic</option>
						<option value="Meditation">Meditation</option>
						<option value="MMA">Mixed Martial Arts (MMA)</option>
						<option value="Origami">Origami</option>
						<option value="Painting">Painting</option>
						<option value="Paintball">Paintball</option>
						<option value="Parkour">Parkour</option>
						<option value="Piano">Piano</option>
						<option value="Roleplaying">Roleplaying</option>
						<option value="Rugby">Rugby</option>
						<option value="Sewing">Sewing</option>
						<option value="Skiing">Skiing</option>
						<option value="Snowboarding">Snowboarding</option>
						<option value="Shopping">Shopping</option>
						<option value="Singing">Singing</option>
						<option value="Socialising">Socialising</option>
						<option value="Surfing">Surfing</option>
						<option value="Swimming">Swimming</option>
						<option value="Tennis">Tennis</option>
						<option value="Traveling">Traveling</option>
						<option value="Frisbee">Ultimate Frisbee</option>
						<option value="Games">Video Games</option>
						<option value="Violin">Violin</option>
						<option value="Watching Sports">Watching Sports</option>
						<option value="Woodworking">Woodworking</option>
						<option value="Yoga">Yoga</option>
						<option value="Zumba">Zumba</option>
					</select>
					<br><br>

					<select name="hobby4"required>
						<option></option>
    				<option value="Acting">Acting</option>
            <option value="Archery">Archery</option>
            <option value="Arts">Arts</option>
            <option value="Astrology">Astrology</option>
            <option value="Badminton">Badminton</option>
    				<option value="Baseball">Baseball</option>
            <option value="Basketball">Basketball</option>
            <option value="BMX">BMX</option>
            <option value="Boardgames">Board Games</option>
            <option value="Bowling">Bowling</option>
    				<option value="Brewing">Brewing Beer</option>
            <option value="Canoeing">Canoeing</option>
            <option value="Chess">Chess</option>
            <option value="Collecting">Collecting</option>
            <option value="Cooking">Cooking</option>
    				<option value="Cosplay">Cosplay</option>
            <option value="Dancing">Dancing</option>
            <option value="Drawing">Drawing</option>
            <option value="Gym">Gym</option>
    				<option value="Fishing">Fishing</option>
            <option value="Fitness">Fitness</option>
            <option value="Games">Games</option>
            <option value="Gardening">Gardening</option>
            <option value="Golf">Golf</option>
    				<option value="Gokart">Go Kart Racing</option>
            <option value="Gymnastics">Gymnastics</option>
            <option value="Hiking">Hiking</option>
            <option value="Hunting">Hunting</option>
            <option value="Iceskating">Iceskating</option>
    				<option value="Kites">Kites</option>
            <option value="Knitting">Knitting</option>
            <option value="Music">Listening to music</option>
            <option value="Magic">Magic</option>
            <option value="Meditation">Meditation</option>
						<option value="MMA">Mixed Martial Arts (MMA)</option>
    				<option value="Origami">Origami</option>
            <option value="Painting">Painting</option>
            <option value="Paintball">Paintball</option>
            <option value="Parkour">Parkour</option>
    				<option value="Piano">Piano</option>
            <option value="Roleplaying">Roleplaying</option>
						<option value="Rugby">Rugby</option>
    				<option value="Sewing">Sewing</option>
            <option value="Skiing">Skiing</option>
            <option value="Snowboarding">Snowboarding</option>
            <option value="Shopping">Shopping</option>
            <option value="Singing">Singing</option>
    				<option value="Socialising">Socialising</option>
            <option value="Surfing">Surfing</option>
            <option value="Swimming">Swimming</option>
    				<option value="Tennis">Tennis</option>
            <option value="Traveling">Traveling</option>
            <option value="Frisbee">Ultimate Frisbee</option>
            <option value="Games">Video Games</option>
            <option value="Violin">Violin</option>
    				<option value="Watching Sports">Watching Sports</option>
            <option value="Woodworking">Woodworking</option>
            <option value="Yoga">Yoga</option>
            <option value="Zumba">Zumba</option>
					</select>
				<br><br>

					<select name="hobby5"required>
						<option></option>
    				<option value="Acting">Acting</option>
            <option value="Archery">Archery</option>
            <option value="Arts">Arts</option>
            <option value="Astrology">Astrology</option>
            <option value="Badminton">Badminton</option>
    				<option value="Baseball">Baseball</option>
            <option value="Basketball">Basketball</option>
            <option value="BMX">BMX</option>
            <option value="Boardgames">Board Games</option>
            <option value="Bowling">Bowling</option>
    				<option value="Brewing">Brewing Beer</option>
            <option value="Canoeing">Canoeing</option>
            <option value="Chess">Chess</option>
            <option value="Collecting">Collecting</option>
            <option value="Cooking">Cooking</option>
    				<option value="Cosplay">Cosplay</option>
            <option value="Dancing">Dancing</option>
            <option value="Drawing">Drawing</option>
            <option value="Gym">Gym</option>
    				<option value="Fishing">Fishing</option>
            <option value="Fitness">Fitness</option>
            <option value="Games">Games</option>
            <option value="Gardening">Gardening</option>
            <option value="Golf">Golf</option>
    				<option value="Gokart">Go Kart Racing</option>
            <option value="Gymnastics">Gymnastics</option>
            <option value="Hiking">Hiking</option>
            <option value="Hunting">Hunting</option>
            <option value="Iceskating">Iceskating</option>
    				<option value="Kites">Kites</option>
            <option value="Knitting">Knitting</option>
            <option value="Music">Listening to music</option>
            <option value="Magic">Magic</option>
            <option value="Meditation">Meditation</option>
						<option value="MMA">Mixed Martial Arts (MMA)</option>
    				<option value="Origami">Origami</option>
            <option value="Painting">Painting</option>
            <option value="Paintball">Paintball</option>
            <option value="Parkour">Parkour</option>
    				<option value="Piano">Piano</option>
            <option value="Roleplaying">Roleplaying</option>
						<option value="Rugby">Rugby</option>
    				<option value="Sewing">Sewing</option>
            <option value="Skiing">Skiing</option>
            <option value="Snowboarding">Snowboarding</option>
            <option value="Shopping">Shopping</option>
            <option value="Singing">Singing</option>
    				<option value="Socialising">Socialising</option>
            <option value="Surfing">Surfing</option>
            <option value="Swimming">Swimming</option>
    				<option value="Tennis">Tennis</option>
            <option value="Traveling">Traveling</option>
            <option value="Frisbee">Ultimate Frisbee</option>
            <option value="Games">Video Games</option>
            <option value="Violin">Violin</option>
    				<option value="Watching Sports">Watching Sports</option>
            <option value="Woodworking">Woodworking</option>
            <option value="Yoga">Yoga</option>
            <option value="Zumba">Zumba</option>
					</select>
					<br><br>

	      <p>Do you like to travel?</p>
	        <select name="travel"required>
            <option></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
	        </select>
				<br><br>

      <p>Which country would you like to visit next?</p>
      	<select name="visit"required>
          <option></option>
          <option value="Argentina">Argentina</option>
          <option value="Armenia">Armenia</option>
          <option value="Australia">Australia</option>
          <option value="Austria">Austria</option>
          <option value="Azerbaijan">Azerbaijan</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Belgium">Belgium</option>
          <option value="Brazil">Brazil</option>
          <option value="Bulgaria">Bulgaria</option>
          <option value="Burma">Burma</option>
          <option value="Cambodia">Cambodia</option>
          <option value="Canada">Canada</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Central African Republic">Central African Republic</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Colombia">Colombia</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Cote d'Ivoire">Cote d'Ivoire</option>
          <option value="Croatia">Croatia</option>
          <option value="Cuba">Cuba</option>
          <option value="Czechia">Czechia</option>
          <option value="Denmark">Denmark</option>
          <option value="Ecuador">Ecuador</option>
          <option value="Egypt">Egypt</option>
          <option value="Ethiopia">Ethiopia</option>
          <option value="Fiji">Fiji</option>
          <option value="Finland">Finland</option>
          <option value="France">France</option>
          <option value="Germany">Germany</option>
          <option value="Ghana">Ghana</option>
          <option value="Greece">Greece</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Haiti">Haiti</option>
          <option value="Hong Kong">Hong Kong</option>
          <option value="Hungary">Hungary</option>
          <option value="Iceland">Iceland</option>
          <option value="India">India</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Ireland">Ireland</option>
          <option value="Israel">Israel</option>
          <option value="Italy">Italy</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Japan">Japan</option>
          <option value="Jordan">Jordan</option>
          <option value="Kazahstan">Kazakhstan</option>
          <option value="Kenya">Kenya</option>
          <option value="South Korea">Korea, South</option>
          <option value="Kuwait">Kuwait</option>
          <option value="Laos">Laos</option>
          <option value="Lativa">Latvia</option>
          <option value="Lebanon">Lebanon</option>
          <option value="Libya">Libya</option>
          <option value="Macau">Macau</option>
          <option value="Macedonia">Macedonia</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Malaysia">Malaysia</option>
          <option value="Maldives">Maldives</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Mexico">Mexico</option>
          <option value="Monaco">Monaco</option>
          <option value="Mongolia">Mongolia</option>
          <option value="Morocco">Morocco</option>
          <option value="Nepal">Nepal</option>
          <option value="Netherlands">Netherlands</option>
          <option value="New Zealand">New Zealand</option>
          <option value="Norway">Norway</option>
          <option value="Panama">Panama</option>
          <option value="Papua New Guinea">Papua New Guinea</option>
          <option value="Paraguay">Paraguay</option>
          <option value="Peru">Peru</option>
          <option value="Philippines">Philippines</option>
          <option value="Poland">Poland</option>
          <option value="Portugal">Portugal</option>
          <option value="Romania">Romania</option>
          <option value="Russia">Russia</option>
          <option value="Samoa">Samoa</option>
          <option value="Saudi Arabia">Saudi Arabia</option>
          <option value="Serbia">Serbia</option>
          <option value="Singapore">Singapore</option>
          <option value="Slovakia">Slovakia</option>
          <option value="Slovenia">Slovenia</option>
          <option value="Solomon Islands">Solomon Islands</option>
          <option value="South Africa">South Africa</option>
          <option value="South Sudan">South Sudan</option>
          <option value="Spain">Spain</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Sudan">Sudan</option>
          <option value="Swaziland">Swaziland</option>
          <option value="Sweden">Sweden</option>
          <option value="Switzerland">Switzerland</option>
          <option value="Syria">Syria</option>
          <option value="Taiwan">Taiwan</option>
          <option value="Thailand">Thailand</option>
          <option value="Tonga">Tonga</option>
          <option value="Turkey">Turkey</option>
          <option value="Ukraine">Ukraine</option>
          <option value="United Arab Emirates">United Arab Emirates</option>
          <option value="United Kingdom">United Kingdom</option>
          <option value="Uruguay">Uruguay</option>
          <option value="Uzbekistan">Uzbekistan</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietname">Vietnam </option>
          <option value="Yemen">Yemen</option>
          <option value="Zambia">Zambia</option>
          <option value="Zimbabwe">Zimbabwe</option>
      	</select>
			<br><br>

      <input type ="submit" class ="nextbtn" name ="pref_btn" value ="Next">
	  	</form>
        <br>

	  </div>
	</body>
	<?php include("../../Client/external/footer.php");?>
</html>
