<?php

$sname= "us-cdbr-east-05.cleardb.net";
$unmae= "b298ae810f7499";
$password = "ddcbacd4";

$db_name = "heroku_7acb421cdfe4f2f";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
