<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "Testing";
include($root.'/includes/head.php');
include($root.'/includes/connect.php');
?>
  <head>
    <title>Statment Test</title>
  </head>

  <body>
    <header>PHP Output:</header>
    <?php

    // //SQL Query
    // $Query = sqlsrv_query ($conn, "SELECT * FROM accounts");
    // // $row = sqlsrv_fetch_array ($Query);
    // // var_dump($row);
    //
    // while($row = sqlsrv_fetch_array($Query)){
    //   print($row["email"]);
    // }
    $id = 2;
    $Query = sqlsrv_query($conn,"SELECT * FROM news WHERE id = $id");
    print $Query;

    while ($row = sqlsrv_fetch_array($Query))
    {
      $title = $row['title'];
      $body = $row['body'];
      $image = $row['image'];

      print "It be getting the far";
      print $id;
      print $title;
      print $body;
      print $image;
    }
    ?>

  </body>
</html>
