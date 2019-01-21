<?php
ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

$userName = "fergusLole";
$password = "m1Cr020ft";
$dbname = "CompSciCourseWork2019";

try {
    $conn = new PDO("sqlsrv:server = tcp:compscicoursework.database.windows.net,1433; Database = CompSciCourseWork2019", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

//Generates conection string:
$connectionInfo = array("UID" => "ferguslole@compscicoursework", "pwd" => $password, "Database" => $dbname, "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:compscicoursework.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

//Console.print $conn;

?>
