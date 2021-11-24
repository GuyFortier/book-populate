<?php

$host = "127.0.0.1"; /* Host name */
$user = "root"; /* User */
$password = "Test99"; /* Password */
$dbname = "readers"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}