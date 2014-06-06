<!--
Joanna Bi
Wellesley HCI PGP
SUMMER 2014
-->

<!-- Input user visualization response into database -->

<?php
session_start();
error_reporting(E_ERROR);

require_once('pgp_functions.php');
$dbh;
localConn(); //establish connection

/* HELPER FUNCTIONS */

// Add row to NEW_VIS table
function add_vis_row($userResponse) {
	global $dbh;
	$query = "INSERT INTO NEW_VIS VALUES (DEFAULT,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	return $result = prepared_query($dbh, $query, $userResponse);
}

// Return pretask id
function find_pretask_row($pre_id) {
	global $dbh;
	$query = "SELECT * FROM NEW_PRETASK WHERE pretask_id=?";
	return $result = prepared_query($dbh, $query, array($pre_id));
}

// PROCESS DATA
$type = $_SESSION['vis'];
$user = $_SESSION["user"];
$ip = $_SERVER['REMOTE_ADDR'];

// Filter out used ip's
$ipUsed = filter_var($ip, FILTER_VALIDATE_IP) ? check_ip($ip) : true; //more concise 'if' clause

// Update data
if (!empty($_POST)) {

	$userResponse = array_merge(array($type), getUserResponse($_POST));

	if(!$ipUsed) {
		add_vis_row($userResponse); //adds new response to vis table

		// Update the total time spent
		$vis_id = mysql_insert_id();

		$user = fetch_row(find_user($user));
		$pretask = fetch_row(find_pretask_row($user["pretask_id"]));

		$update_user = "UPDATE NEW_USER SET vis_id = ?, total_time = ?, ip = ? WHERE id = ?";
		$total_time = intval($_POST["timeSpent"]) + intval($pretask["time_elapsed"]);
		prepared_query($dbh, $update_user, array($vis_id, $total_time, inet_pton($ip), $user));
	}

	readfile("privacy.html"); //redirect to privacy page
}

//session_destroy(); //do we want to destory the session now?