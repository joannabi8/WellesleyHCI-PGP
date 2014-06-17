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

// HELPER FUNCTION: Insert new user response from pretask page
function add_pretask_row($userResponse) {
	global $dbh;
	$query = "INSERT INTO NEW_PRETASK VALUES (DEFAULT,?,?,?,?,?,?,?)";
	return $result = prepared_query($dbh, $query, $userResponse);
}

// PROCESS DATA
if (!empty($_POST)) {
	$pretaskResponse = getUserResponse($_POST);
	$id = $_SESSION["user"];
	$ip = $_SERVER["REMOTE_ADDR"]; //documented PHP var
	
	// Time stuff
	$start_time = $_SESSION["pretask_start_time"];
	$pretask_time = time() - $start_time;
	array_push($pretaskResponse, $pretask_time);
	$_SESSION['pretask_time'] = $pretask_time; //for later

	// Filter out used ip's
	$ipUsed = filter_var($ip, FILTER_VALIDATE_IP) ? ip_exists($ip) : true; //more concise 'if' clause

	if (!$ipUsed) {
		add_pretask_row($pretaskResponse);
		$pretask_id = mysql_insert_id(); //documented php function
		$add_user = "INSERT INTO NEW_USER VALUES (?,?,?,?,?,?,?,?,?,?)";
		prepared_query($dbh, $add_user, array($id,$pretask_id,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL));
	}

	// Redirect user to a random visualization
	$num = mt_rand(1,4); //documented php function
	$header = "Location: http://cs.wellesley.edu/~hcilab/pghci_NEW/";
	if ($num == 1) { $header = $header . "v1.php"; }
	else if ($num == 2) { $header = $header . "v2.php"; }
	else if ($num == 3) { $header = $header . "v3.php"; }
	else { $header = $header . "v4.php"; }
   	header($header); //redirects user
	exit();
}
	
?>