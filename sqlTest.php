<head>
  <title>SQL Statment Test</title>
</head>

<body>
  <header>SQL Output:</header>
<?php

try
{
  print sqlsrv_query ($conn, "Select * from accounts;");
}
catch (SQLExeption)
{
  print "SQL Error: ", sqlsrv_errors (SQLSRV_ERR_ALL);
}

?>
</body>
