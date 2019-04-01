<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$title = "N - Templates - Headers";
// include($root.'/includes/session.php');
include($root.'/includes/head.php');
include($root.'/includes/connect.php');
?>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/adminnavbar.php');

    if (isset($_POST['delete'])) //if clicked delete
    {
      $id = $_GET['id'];//passes value from HTML input box
      sqlsrv_query($conn, "DELETE FROM news WHERE id = '$id'");
      echo '<script>window.location.href="/admin/news/index.php";</script>';
    }

    if (isset($_POST['update'])) //if clicked update
    {
      $id = $_GET['id'];//passes value from HTML input bo
      $title = $_POST['title'];
      $body = $_POST['body'];
      sqlsrv_query($conn, "UPDATE news SET title = '$title', body = '$body' WHERE id = $id");
      // echo '<script>window.location.href="/admin/news/index.php";</script>';
    }

    $id = $_GET['id'];
    $Query = sqlsrv_query($conn,"SELECT * FROM news WHERE id = $id");
    while ($row = sqlsrv_fetch_array($Query))
    {
      $title = $row['title'];
      $body = $row['body'];
      $image = $row['image'];
      ?>

      <!-- PAGE HEADER -->
      <section class="text-center slice--offset-top parallax-section" style="background-image: url(<?php echo '/images/' .$image; ?>);">
        <span class="mask mask-dark--style-2"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-8 my-3">
              <div class="row py-5">
                <div class="col-12">
                  <h1 class="heading heading-inverse heading-1 strong-400 text-normal">Edit Individual Article</h1>
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
                      <input type="text" name="title" class="form-control form-control-lg" required="" value="'.$title.'">
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row py-3">
                  <div class="col-12">
                    <div class="form-group has-feedback">
                      <label for="" class="text-uppercase c-gray-light">Body</label>
                      <textarea name="body" class="form-control no-resize" rows="5" required="" style="margin-top: 0px; margin-bottom: 0px; height: 200px;">'.$body.'</textarea>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row py-3">
                  <div class="col-12">
                    <input type="submit" class="btn btn-styled btn-base-1" name="delete" value="Delete">
                    <input type="submit" class="btn btn-styled btn-base-1" name="update" value="Update">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      ';
    };


    include($root.'/includes/footer.php');
    ?>
  </main>

  <?php include($root.'/includes/scripts.php'); ?>

</body>
</html>
