<?php
ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
$servername = "cp1692.netcetera.co.uk";
$username = "fergus_user";
$password = "kVTADRjXwCjB3kuLa7";
$dbname = "fergus_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
?>
