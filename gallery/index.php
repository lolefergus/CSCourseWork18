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
    ?>

    <!-- PAGE HEADER -->
    <section class="text-center slice--offset-top parallax-section" style="background-image: url('/assets/images/backgrounds/slider/img-37.jpg');">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-8 my-3">
            <div class="row py-5">
              <div class="col-12">
                <h1 class="heading heading-inverse heading-1 strong-400 text-normal">
                  Gallery
                </h1>
                <span class="clearfix"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- gallery -->
    <section class="slice-sm sct-color-1">
      <div class="container container-lg masonry-container">
        <div class="row masonry" style="position: relative;">

          <?php

          $Query = sqlsrv_query($conn,"SELECT * FROM news");
          while ($row = sqlsrv_fetch_array($Query))
          {
            $id = $row['id'];
            $title = $row['title'];
            $image = $row['image'];

            echo
            '
            <div class="masonry-item col-sm-6 col-md-4 design" style="position: relative;">
              <div class="block block-image-holder">
                <div class="block-image">
                  <a href="/gallery/view/index.php/?id='.$id.'">
                    <img src="/images/'.$image.'" style="width:100%; height:100%">
                  </a>
                </div>
                <div class="block-info block-info-over block-info-over--style-1 block-info-over--dark-gradient">
                  <div class="block-info-inner">
                    <div class="text-center">
                      <a href="#" class="heading heading-4 strong-500 mb-0 c-white">'.$title.'</a>
                      <span class="clearfix"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            ';
          }
          ?>

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
