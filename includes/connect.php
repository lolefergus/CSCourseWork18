<?php //doesn't connect for an unqkown reason
// ini_set('display_errors', 'On');
//   error_reporting(E_ALL | E_STRICT);
//
// $servername = "compscicoursework.database.windows.net";
// $username = "fergusLole@compscicoursework";
$password = "m1Cr020ft";
// $dbname = "CompSciCourseWork2019";
//
// $conn = mysqli_connect($servername, $username, $password, $dbname, 1433);
// if (!$conn)
// {
//   die("Connection failed: " . mysqli_connect_error() . " And: " . mysqli_connect_errno());
// }

// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:compscicoursework.database.windows.net,1433; Database = CompSciCourseWork2019", "ferguslole", $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "ferguslole@compscicoursework", "pwd" => $password, "Database" => "CompSciCourseWork2019", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:compscicoursework.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

print "he";
print sqlsrv_server_info ( $conn );

?>
