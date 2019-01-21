<?php
ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

$userName = "fergusLole"; //username of account to access Database
$userEmail = $userName . "@compscicoursework"; //domain used as extension of sign in
$password = "m1Cr020ft"; //DB Password
$dbName = "CompSciCourseWork2019"; //DB name
$dbAddress = "tcp:compscicoursework.database.windows.net,1433";//DB address - protcol:name,port

//Conects to DB
try {
    $conn = new PDO("sqlsrv:server = ". $dbAddress ."; Database = ". $dbName, $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

//Sets up connection string for querys
$connectionInfo = array("UID" => $userEmail, "pwd" => $password, "Database" => $dbName, "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = $dbAddress;
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
