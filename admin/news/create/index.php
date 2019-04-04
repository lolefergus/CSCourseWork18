<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "New Article";
// include($root.'/includes/session.php');
include($root.'/includes/head.php');
include($root.'/includes/connect.php');
?>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/adminnavbar.php');

    if (isset($_POST['create'])) //if clicked update
    {
      $title = $_POST['title'];
      $body = $_POST['body'];
      $image = $_POST['image'];
      sqlsrv_query($conn, "INSERT INTO news (title, body, image) VALUES ('$title', '$body', '$image')");
      echo '<script>window.location.href="/admin/news/index.php";</script>';
    }


      ?>

      <!-- PAGE HEADER -->
      <section class="text-center slice--offset-top parallax-section" style="">
        <span class="mask mask-dark--style-2"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-8 my-3">
              <div class="row py-5">
                <div class="col-12">
                  <h1 class="heading heading-inverse heading-1 strong-400 text-normal">Create New Article</h1>
                  <span class="clearfix"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- body text -->
      <?php
      echo'

      <section class="slice sct-color-1">
        <div class="container">
          <form action="" method="post">
            <div class="row justify-content-center">
              <div class="col-lg-8 my-3">
                <div class="row py-3">
                  <div class="col-12">
                    <div class="form-group has-feedback">
                      <label for="" class="text-uppercase c-gray-light">Title</label>
                      <input type="text" name="title" class="form-control form-control-lg" required="" value="" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row py-3">
                  <div class="col-12">
                    <div class="form-group has-feedback">
                      <label for="" class="text-uppercase c-gray-light">Image URL</label>
                      <input type="text" name="image" class="form-control form-control-lg" required="" value="" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row py-3">
                  <div class="col-12">
                    <div class="form-group has-feedback">
                      <label for="" class="text-uppercase c-gray-light">Body</label>
                      <textarea name="body" class="form-control no-resize" rows="5" required="" style="margin-top: 0px; margin-bottom: 0px; height: 200px;" required></textarea>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row py-3">
                  <div class="col-12">
                    <input type="submit" class="btn btn-styled btn-base-1" name="create" value="Create">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      ';



    include($root.'/includes/footer.php');
    ?>
  </main>

  <?php include($root.'/includes/scripts.php'); ?>

</body>
</html>
