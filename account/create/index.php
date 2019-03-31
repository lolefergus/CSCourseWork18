<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "Create Account";
include($root.'/includes/head.php');
include($root.'/includes/connect.php');
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
                  <h3>Sign Up</h3>
                </div>

                <p>Please select the group you are applying to join</p>


                <div class = "row cols-xs-space cols-sm-space cols-md-space align-items-center text-left">

                  <div class = "col-lg-6 col-md-6">
                    <div class = "mt-4">
                      <a href = "/account/create/details/index.php/?type=Student" class ="btn btn-styled btn-base-1 btn-circle">
                        Student
                      </a>
                    </div>
                  </div>

                  <div class="col-md-6 ml-lg-auto">
                    <div class = "mt-4">
                      <a href = "/account/create/details/index.php/?type=Mentor" class ="btn btn-styled btn-base-1 btn-circle">
                        Mentor
                      </a>
                    </div>
                  </div>

                </div>

                <div class="mt-4">
                  <a href ="/account/login/">Already have an account? Sign in here.</a>
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
