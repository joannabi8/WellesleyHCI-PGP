<?php
	session_start();
	error_reporting(E_ERROR);

        $_SESSION['demograph_start_time'] = time(); //start timer
        
        //generate random code for the thankyou page
		function randomCode($length = 5) {
   			    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   			    $code = '';
   			    for ($i = 0; $i < $length; $i++) {
    			   $code .= $chars[rand(0, strlen($chars) - 1)];
    		    }
   			    return $code;
		}
/*
		//array to hold random codes without duplicates (up to 1000 elements)
		$total = 0;
		$allCodes = array();
		while($total < 1000) {
  			 for ($i=0; $i < 1000 - $total; $i++ ) {
    			 $allCodes[] = "code-" . randomCode();
    		 }
    		 $allCodes = array_unique($allCodes);
    		 $total = count($allCodes);
        }*/

//Make sure no duplicate mturk ids
require_once('pgp_functions.php');
$dbh;
localConn(); //establish connection

$mturk_id = randomCode();
while (mturk_id_exists($mturk_id)) {
  $mturk_id = randomCode();
}
$_SESSION['mturk_id'] = $mturk_id;
        
?>

<!DOCTYPE>
	<!--Wellesley HCI PGP summer 2014
	updated by Laura M. Ascher
	Demographics questions for user questionnaire 
	-->
<html>

	<head>

		<title>PGHCI: Questions</title>

		<!--jQuery & vis.js-->
		<script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-1.10.2.js"></script>
		<script type="text/javascript" charset="utf8" src="scripts/vis.js"></script>
	
		<!-- jQuery UI -->
	        <link rel="stylesheet" type="text/css" href="scripts/jquery/jquery-ui-1.10.4.custom/css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
                <script type="text/javascript" charset="utf8" src="scripts/jquery/jquery-ui-1.10.4.custom.js"></script>
				
		<link href="styles/bootswatch.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="styles/style.css">
		
	</head>
	<body>
	<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container">
			<span class="brand"><img src="assets/img/dna.png"> PGHCI: Demographic Questions</span>
		</div>
	</div>
	</div>
	
	<div class="container" id="study_wrapper">
	<form id="demo_form" method="POST" action=/~hcilab/pghci_NEW/dem_process><ol>
				
		<h2>Demographic Questions</h2>
		
		<label for="age"> <strong>How old are you?</strong> </label>
		<input type="number" name="q1" id="age" style="height:30px;" required>
		<p><strong>What is your gender?</strong></p>
			<label for="q2_F">
				<input id="q2_F" type="radio" name="q2" required value="female"> Female
			</label>
			<label for="q2_M">
				<input id="q2_M" type="radio" name="q2" value="male"> Male
			</label>
			<label for="q2_O">
				<input id="q2_O" type="radio" name="q2" value="other"> Other
			</label>
		<p><strong>Education:</strong></p>
			<select name="q3">
				<option value="some high-school">Some high-school</option>
				<option value="high-school diploma">High-school diploma</option>
				<option value="some college">Some college</option>
				<option value="bachelor degree">Bachelor degree</option>
				<option value="masters degree">Masters degree</option>
				<option value="doctoral degree">Doctoral degree</option>
			</select>
		<p><strong>Do you work in the life sciences?</strong></p>
			<label for="q4_Y">
				<input id="q4_Y" type="radio" name="q4" required value="yes"> Yes
			</label>
			<label for="q4_N">
				<input id="q4_N" type="radio" name="q4" value="no"> No
			</label>
		<p><strong>Did you study life sciences at a collegiate or higher level?</strong></p>
			<label for="q5_Y">
				<input id="q5_Y" type="radio" name="q5" required value="yes"> Yes
			</label>
			<label for="q5_N">
				<input id="q5_N" type="radio" name="q5" value="no"> No
			</label>
					
		
		<input type="submit" name="submit" value="Submit" id="submit_demog" class="btn btn-primary submit-survey">
		</ol></form>
	</div>

	</body>
</html>
