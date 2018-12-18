<html>
  <head>
    <title>SQL Statment Test</title>
  </head>

  <body>
    <header>SQL Output:</header>
    <?php

    //SQL Query
    $Query = sqlsrv_query ($conn, "Select * from accounts;");

    //If fails
    // if ($Query == false)
    // {
    //   //displays error message
    //   print "SQL Error: ", sqlsrv_errors (SQLSRV_ERR_ALL);
    // }
    // else
    // {
    //   //displays Query
    //   print $Query;
    // }

    print $Query;
    ?>
  </body>
</html>
