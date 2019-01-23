<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Login";
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');

    if(isset($_POST['login'])){
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
    }

?>
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
              <form class="form-default form-material">

                <div class="row col-12">
                  <h3>Login</h3>
                </div>

                <div class="row">
                  <div class="col-12">
                      <div class="form-group has-floating-label">
                          <label class="control-label">Email</label>
                          <input type="text" class="form-control form-control-lg" required="true" placeholder="">
                          <span class="bar"></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <div class="form-group has-floating-label">
                          <label class="control-label">Password</label>
                          <input type="password" class="form-control form-control-lg" required placeholder="">
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
