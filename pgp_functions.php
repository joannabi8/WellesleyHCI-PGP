<!--
Joanna Bi
Wellesley HCI PGP
SUMMER 2014
-->

<?php

// connects to database on tempest server
function localConn() {
	require_once('MDB2.php');
	require_once('/home/cs304/public_html/php/MDB2-functions.php')
	require_once('pgp_dsn.inc');

	global $dbh;
	$dbh = db_connect($pgp_dsn);
}

// fetches a tuple from the resultset
function fetch_row($prepared){ //prepared is a result set
	return $result = $prepared -> fetchRow(MDB2_FETCHMODE_ASSOC);
}

// get all field values from a form
function getUserResponse($postArray) {
	$userResponse = array();
	foreach ($_POST as $key => $entry) {
		array_push()
	}
}

// create new (unique) user id
function new_user() {
	$exists = true;
	$user = ""; // inialize vars

	while($exists) {
		$num = rand(2,3); //Why between 2 and 3?
		$bytes = openssl_random_pseudo_bytes($num);
		$user = bin2hex($bytes);
		$exists = user_exists($user);
	}
	return $user;
}

// check if a user already exists in the db
function user_exists($user) {
	return ((find_user($user) -> numRows()) > 0);
}

// finds user in database
function find_user($user) {
	global $dbh;
	$query = "SELECT * FROM NEW_USER WHERE id=?";
	return $result = prepared_query($dbh, $query, array($user));
}

// check if an ip already exists in the db
function ip_exists($ip) {
	return ((find_user_with_ip($ip) -> numRows()) > 0);
}

// return user row with ip address $ip
function find_user_with_ip($ip) {
	global $dbh;
	$query = "SELECT ip FROM NEW_USER WHERE ip=?"; //I don't currently have an ip column...
	return $result = prepared_query($dbh, $query, array(inet_pton($ip)));
}


?>