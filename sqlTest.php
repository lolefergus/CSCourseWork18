<head>
  <title>SQL Statment Test</title>
</head>

<body>
  <header>SQL Output:</header>
<?php

try
{
  print sqlsrv_query ($conn, "Select * from users;");
}
catch
{
  print "SQL Error";
}

?>
</body>
