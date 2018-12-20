<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Login";
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
                                        <h3>Login</h3>
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

                                        <div class="row cols-xs-space cols-sm-space cols-md-space align-items-center text-left">

                                          <div class="col-lg-3 col-md-4">
                                            <div class="mt-4">
                                              <button type="submit" class="btn btn-styled btn-base-1 btn-circle">
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
