<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "Login";
include($root.'/includes/head.php');
include($root.'/includes/connect.php');

$email = "ferguslole@online.sch.im";
$password = "qwerty";

//sets values from info entered on page
// $email = $_REQUEST[$_POST['email']];
if (print preg_match( "[a-zA-Z0-9_%\+-]+(\.[a-zA-Z0-9_%\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z]+)+", $email)) {
  print'email match';//remove after tesing
  // $password = $_REQUEST[$_POST['password']];
  print $password;//REMOVE
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
else {
    print'email invalid';
  }


?>
