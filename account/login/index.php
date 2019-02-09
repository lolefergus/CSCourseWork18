<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "Login";
include($root.'/includes/connect.php');

if(isset($_POST['login']))
{
//sets values from info entered on page
$email = $_POST['email']];
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
      $password = $_REQUEST[$_POST['password']];
      if (password_verify($password, $hashed))
      {
        print "Succesful"; //REMOVE
        //Start a session
        if (session_status() !== PHP_SESSION_ACTIVE)
        {
          print "Session started";
          session_start();
          //Use user's id to identify the session
          $_SESSION['id']=$id;
          $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
          //sends user to account homepage
          // header('location: /account/'); UNCOMENT AFTER DEBUGGING
        }
        else
        {
         print "Already signed in";
        }
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
  }
}
else
{
  print'email invalid';
}
}

include($root.'/includes/head.php');
?>
<!DOCTYPE html>
<html>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/navbar.php');
    ?>

    <container>

      <section class="slice sct-color-1">
        <div class="container container-lg">
          <div class="row align-items-center cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-6">
              <form class="form-default form-material" method="post">

                <div class="row col-12">
                  <h3>Login</h3>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-group has-floating-label">
                          <label class="control-label">Email</label>
                          <input name="email" type="text" class="form-control form-control-lg" required="true" placeholder="">
                          <span class="bar"></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group has-floating-label">
                          <label class="control-label">Password</label>
                          <input name="password" type="password" class="form-control form-control-lg" required placeholder="">
                          <span class="bar"></span>
                        </div>
                      </div>
                    </div>

                    <div class="row cols-xs-space cols-sm-space cols-md-space align-items-center text-left">

                      <div class="col-lg-3 col-md-4">
                        <div class="mt-4">
                          <button type="submit" name="login" class="btn btn-styled btn-base-1 btn-circle">
                            Login
                          </button>
                        </div>
                      </div>

                      <div class="col-md-6 ml-lg-auto">
                        <div class="mt-4">
                          <a href ="/account/create/">Don't have an account? Create one here.</a>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>

        </container>

        <?php
        include($root.'/includes/footer.php');
        ?>
    </main>

<?php include($root.'/includes/scripts.php'); ?>

</body>
</html>
