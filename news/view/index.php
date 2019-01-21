<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];

//sources title
$id = $_GET['id'];
print $id;
$Query = sqlsrv_query($conn,"SELECT * FROM news WHERE id = $id");
print $Query;
$row = sqlsrv_fetch_array($Query);
$title = $row['title'];
print $row['body'];

include($root.'/includes/head.php');
include($root.'/includes/connect.php');
?>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/navbar.php');

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
                  <h1 class="heading heading-inverse heading-1 strong-400 text-normal">
                    <?php echo $title; ?>
                  </h1>
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
          <div class="row justify-content-center">
            <div class="col-lg-8 my-3">
              <div class="row py-5">
                <div class="col-12">
                  <p>'.$body.'</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      ';


    include($root.'/includes/footer.php');
    ?>
  </main>

  <?php include($root.'/includes/scripts.php'); ?>

</body>
</html>
