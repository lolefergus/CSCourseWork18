<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "N - Templates - Headers";
include($root.'/includes/head.php');
include($root.'/includes/connect.php');
?>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/navbar.php');

    $accountType = $row['selectpicker value'];

    echo'
    <container>

      <section class="slice sct-color-1">
        <div class="container container-lg">
          <div class="row align-items-center cols-xs-space cols-sm-space cols-md-space">
            <div class="col-lg-6">
              <form class="form-default form-material">

                <div class="row col-12">
                  <h3>Sign Up</h3>
                </div>

                <div class="form-group">
                  <label>Select the group you belong to in the menu below</label>
                  <select class="form-control selectpicker select2-hidden-accessible" data-minimum-results-for-search="Infinity" tabindex="-1" aria-hidden="true">
                    <option value="1">Student</option>
                    <option value="2">Mentor</option>
                  </select>
                </div>

                <div class = "row cols-xs-space cols-sm-space cols-md-space align-items-center text-left">

                  <div class = "col-lg-3 col-md-4">
                    <div class = "mt-4">

                      <a href = "/account/create/details/index.php/?type='.$type.'" class ="btn btn-styled btn-base-1 btn-circle">
                        Proceed
                      </a>

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

    </container>';
    ?>

    <?php
    include($root.'/includes/footer.php');
    ?>
  </main>

  <?php include($root.'/includes/scripts.php'); ?>

</body>
</html>
