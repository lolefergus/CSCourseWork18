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


    //sets values from info entered on page
    $email = 'ferguslole@online.sch.im';
      if (preg_match('#([A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,})#i', $email)=== 1) {
      print'email match';//REMOVE
      $password = 'password';
      //searches for matching users
      $search = sqlsrv_query($conn, "SELECT * FROM accounts WHERE email='$email'");
      //Check num result found, then if only one
      $count = sqlsrv_num_rows($search);
      if(1 == $count){
        print 'found match'; //REMOVE
        //gets hashed password from DB
        while($row = sqlsrv_fetch_array($search)){
          $hashed = $row['password'];
          $id = $row['id'];
          //Use password_verify to check unhashed password is same as hashed password
          if (password_verify($password, $encrypted)) {
            print 'password match'; //REMOVE
            //Start a session
            session_start();
            //Use user's id to identify the session
            $_SESSION['id']= $id;
            $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
            //sends user to account homepage
            // header('location: /account/'); UNCOMENT AFTER DEBUGGING
            } else {
              $message = 'There was an error with your details.';
              echo $message; //REMOVE
            }
          }
        } else {
          $message = 'There was an error with your details.';
          echo $message; //REMOVE
        }
    }
    print'email invalid';

    ?>

    <div class="row">
      <div class="col-12">
          <div class="form-group has-floating-label">
              <label class="control-label">Email</label>
              <input type="text" class="form-control form-control-lg" placeholder="">
              <span class="bar"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="form-group has-floating-label">
              <label class="control-label">Password</label>
              <input type="password" class="form-control form-control-lg" placeholder="">
              <span class="bar"></span>
            </div>
          </div>
        </div>

  </body>
</html>
