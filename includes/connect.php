<?php
ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

$servername = "compscicoursework.database.windows.net";
$username = "fergusLole";
$password = "m1Cr020ft";
$dbname = "CompSciCourseWork2018";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
?>
