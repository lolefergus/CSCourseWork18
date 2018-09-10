<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "N - Templates - Headers";
    include($root.'/includes/head.php');
?>
<body>

    <main class="body-wrap">
        <?php
        include($root.'/includes/adminnavbar.php');
        ?>

          <!-- PAGE HEADER -->
          <section class="slice--offset-top parallax-section parallax-section-lg" style="background-image: url('../../assets/images/backgrounds/slider/img-37.jpg');">
            <div class="container">
              <div class="row">
                <div class="col-12 my-3">
                  <div class="row py-5">
                    <div class="col-lg-6 col-md-8">
                      <h1 class="heading heading-inverse heading-1 strong-400 text-normal">
                        Admin
                      </h1>

                      <span class="clearfix"></span>

                      <div class="lead c-gray-lighter mt-3 mb-3">
                        Here you can change the content of the home page
                      </div>

                      <span class="short-delimiter--style-1 mb-4"></span>

                      <div class="btn-container">
                        <a href="elements.html" class="btn btn-styled btn-base-1">All elements</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

         <?php
         include($root.'/includes/footer.php');
         ?>
    </main>

<?php include($root.'/includes/scripts.php'); ?>

</body>
</html>
