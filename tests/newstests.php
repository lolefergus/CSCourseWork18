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

    $id = 7;
    $Query = sqlsrv_query($conn,"SELECT * FROM news WHERE id = $id");
    print $Query;
    echo $Query['id'];
    echo $Query['title'];
    echo $Query['authorId'];
    echo $Query['body'];
    echo $Query['image'];

    echo '<p>??</p>';

    $row = sqlsrv_fetch_array($Query);
    echo $row['id'];
    echo $row['title'];
    echo $row['authorId'];
    echo $row['body'];
    echo $row['image'];

    echo 'EEE';
    // while ($row = sqlsrv_fetch_array($Query))
    // {
    //   $title = $row['title'];
    //   $body = $row['body'];
    //   $image = $row['image'];
    //
    //   print "It be getting the far";
    //   print $id;
    //   print $title;
    //   print $body;
    //   print $image;
    // }
    ?>

  </body>
</html>
