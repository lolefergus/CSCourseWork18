<head>
  <title>SQL Statment Test</title>
</head>

<body>
  <header>SQL Output:</header>
<?php


print sqlsrv_query ($conn, "Select * from users;");


?>
</body>
