<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];

include($root.'/includes/connect.php');
//sorces title
$id = $_GET['id'];
$Query = sqlsrv_query($conn,"SELECT title, image FROM news WHERE id = $id");
$row = sqlsrv_fetch_array($Query);
$title = $row['title'];

include($root.'/includes/head.php');

?>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/navbar.php');



      $title = $row['title'];
      $image = $row['image'];
      ?>

      <!-- PAGE HEADER -->
      <section class="text-center " style="background-image: url('');">
        <span class="mask mask-dark--style-2"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-8 my-3">
              <div class="row py-5">
                <div class="col-12">
                  <h1 class="heading heading-inverse heading-1 strong-400 text-normal"><?php echo $title; ?></h1>
                  <span class="clearfix"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="masonry-item col-sm-12 design justify-content-center" style="position: relative; height=100%">
            <div class="block block--style-5 mb-0">
              <div class="block-image">
                <img src="<?php echo '/images/'.$image; ?>">
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
