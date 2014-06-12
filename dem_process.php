<!--
Joanna Bi
Wellesley HCI PGP
SUMMER 2014
-->

<?php
session_start();
error_reporting(E_ERROR);
require_once('pgp_functions.php');
$dbh;
localConn();

/* HELPER FUNCTIONS */

//Insert new user response from pretask page
function add_demo_row($userResponse) {
	global $dbh;
	$query = "INSERT INTO NEW_DEMOGRAPHS VALUES (DEFAULT,?,?,?,?,?,?)";
	return $result = prepared_query($dbh, $query, $userResponse);
}

// Return demographic id
function find_demo_row($dem_id) {
	global $dbh;
	$query = "SELECT * FROM NEW_DEMOGRAPHS WHERE dem_id=?";
	return $result = prepared_query($dbh, $query, array($dem_id));
}

// PROCESS DATA
$user = $_SESSION["user"];
$ip = $_SERVER["REMOTE_ADDR"];

$ipUsed = filter_var($ip, FILTER_VALIDATE_IP) ? ip_exists($ip) : true; 

if (!empty($_POST)) {
  	$demographResponse = getUserResponse($_POST);

	// Time stuff
	$start_time = $_SESSION["demograph_start_time"];
	$demo_task_time = time() - $start_time;
	array_push($demographResponse, $demo_task_time);
	
	if (!$ipUsed) {
		add_demo_row($demographResponse);
		$demo_id = mysql_insert_id(); //documented php function

		// Populate the user table
		$get_user = fetch_row(find_user($user));
		$get_demo = fetch_row(find_demo_row($user['demo_id']));
		$total_time = $_SESSION['pretask_time'] + $_SESSION['vis_time'] + $demo_task_time;
		
		$update_user = "UPDATE NEW_USER SET demo_id = ?, ip = ?, total_time = ? WHERE id = ?";
		prepared_query($dbh, $update_user, array($demo_id, inet_pton($ip), $total_time, $user));
		echo "got to end of if";
	}
	
	// Redirect user to thank you page
	$header = "Location: http://cs.wellesley.edu/~hcilab/pghci_NEW/thankyou.html";
   	header($header); //redirects user
	exit();
}
	
?>