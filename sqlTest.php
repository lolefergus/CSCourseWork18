<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "N - Templates - Headers";
include($root.'/includes/head.php');
include($root.'/includes/connect.php');
?>
  <head>
    <title>SQL Statment Test</title>
  </head>

  <body>
    <header>SQL Output:</header>
    <?php

    // //SQL Query
    // $Query = sqlsrv_query ($conn, "SELECT * FROM accounts");
    // // $row = sqlsrv_fetch_array ($Query);
    // // var_dump($row);
    //
    // while($row = sqlsrv_fetch_array($Query)){
    //   print($row["email"]);
    // }


    //sets values from info entered on page
    $email = $_REQUEST[$_POST['email']];
    if (preg_match('\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b#i', $email)=== 1) {
      print'email match';//remove after tesing
      $password = $_REQUEST[$_POST['password']];
        print$password;//REMOVE
      //searches for matching users
      $search = sqlsrv_query($conn, "SELECT * FROM accounts WHERE email='$email'");
      //Check num result found, then if only one
      $count = sqlsrv_num_rows($search);
      if(1 == $count){
        //gets hashed password from DB
        while($row = sqlsrv_fetch_array($search)){
          $hashed = $row['password'];
          $id = $row['id'];
          //Use password_verify to check unhashed password is same as hashed password
          if (password_verify($password, $encrypted)) {
            //Start a session
            session_start();
            //Use user's id to identify the session
            $_SESSION['id']=$id;
            $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
            //sends user to account homepage
            // header('location: /account/'); UNCOMENT AFTER DEBUGGING
            } else {
              $message = 'There was an error with your details.';
            }
          }
        } else {
          $message = 'There was an error with your details.';
        }
    }
    print'email invalid';

    ?>
  </body>
</html>
