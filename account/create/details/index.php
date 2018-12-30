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


    <?php
    $accountType = $_GET['type'];

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

                <div class="row">
                  <div class="col-md-6 ml-lg-auto">
                    <div class="form-group has-floating-label">
                      <label class="control-label">Forename</label>
                      <input type="text" class="form-control form-control-lg" placeholder="">
                      <span class="bar"></span>
                    </div>
                  </div>

                  <div class="col-md-6 ml-lg-auto">
                    <div class="form-group has-floating-label">
                      <label class="control-label">Surname</label>
                      <input type="text" class="form-control form-control-lg" placeholder="">
                      <span class="bar"></span>
                    </div>
                  </div>
                </div>

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

                <div class="form-group">
                  <?php if ($accountType == "Student") { //changes question for student or mentor
                    echo '<label>Select the Region of the Island You Live In:</label>';
                  }
                  else {
                    echo '<label>Select the Region of the Island You Work In:</label>';
                  } ?>
                  <select class="form-control selectpicker select2-hidden-accessible" data-minimum-results-for-search="Infinity" tabindex="-1" aria-hidden="true">
                    <option value="North">North</option>
                    <option value="Center">Centre</option>
                    <option value="South">South</option>
                  </select>
                </div>

                <?php if ($accountType == "Student") { //changes question for student or mentor
                  echo '
                  <div class="form-group">
                    <label class="control-label">Enter the Name of the School You Attend</label>
                    <select class="form-control selectpicker select2-hidden-accessible" data-minimum-results-for-search="Infinity" tabindex="-1" aria-hidden="true">
                      <option value="Ramsey Grammar School">RGS</option>
                      <option value="Castle Rushen High School">CRHS</option>
                      <option value="Queen Elizabeth II High School">QEII</option>
                      <option value="Ballakermeen High School">BHS</option>
                      <option value="St Ninians High School">SNHS</option>
                      <option value="University College Isle of Man">UCM</option>
                    </select>
                  </div>';
                }
                else {
                  echo '
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group has-floating-label">
                        <label class="control-label">Enter the Name of the Company You Work For</label>
                        <input type="password" class="form-control form-control-lg" placeholder="">
                        <span class="bar"></span>
                      </div>
                    </div>
                  </div>';
                } ?>


                <div class="row cols-xs-space cols-sm-space cols-md-space align-items-center text-left">

                  <div class="col-lg-3 col-md-4">
                    <div class="mt-4">
                      <button type="submit" class="btn btn-styled btn-base-1 btn-circle">
                        Create
                      </button>
                    </div>
                  </div>

                  <div class="col-md-6 ml-lg-auto">
                    <div class="mt-4">
                      <a href ="/account/login/">Already have an account? Sign in here.</a>
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
