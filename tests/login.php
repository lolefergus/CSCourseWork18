<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "Login";
include($root.'/includes/head.php');
include($root.'/includes/connect.php');

$email = "ferguslole@online.sch.im";
$password = "qwerty";

//sets values from info entered on page
// $email = $_REQUEST[$_POST['email']];
$escapedEmail = preg_quote ($email);
if (print preg_match( "[a-zA-Z0-9_%\+-]+(\.[a-zA-Z0-9_%\+-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z]+)+", $escapedEmail))
{
  //searches for matching users
  $Query = sqlsrv_query($conn, "SELECT * FROM accounts WHERE email = '$email'", array(), array('Scrollable' => 'buffered'));
  print "<p></p>". $Query . "<p></p>";
  //Check num result found, then if only one
  $count = sqlsrv_num_rows($Query);
  print $count;
  if(1 == $count) //checks only one match
  {
    print "found email match"; //ROMOVE
    //gets hashed password from DB
    while($row = sqlsrv_fetch_array($Query))
    {
      $hashed = $row['saltedPassword'];
      $id = $row['id'];
      //Use password_verify to check unhashed password is same as hashed password
      // $password = $_REQUEST[$_POST['password']];
      if (password_verify($password, $encrypted))
      {
        print "Succesful"; //REMOVE
        //Start a session
        session_start();
        //Use user's id to identify the session
        $_SESSION['id']=$id;
        $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
        //sends user to account homepage
        // header('location: /account/'); UNCOMENT AFTER DEBUGGING
      }
      else
      {
          $message = 'There was an error with your details.';
      }
    }
  }
  else
  {
    print 'There was an error with your details.';
    print sqlsrv_errors ();
  }
}
else
{
  print'email invalid';
}


?>
