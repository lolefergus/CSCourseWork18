<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "N - Templates - Headers";
    include($root.'/includes/session.php')
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');
?>
<body>

    <main class="body-wrap">
        <?php
        include($root.'/includes/adminnavbar.php');

        if (isset($_POST['delete']))
        {
          $id = $_POST['id'];//passes value from HTML input box
          sqlsrv_query($conn, "DELETE FROM news WHERE id = '$id'");
          echo '<script>window.location.href="/admin/news/index.php";</script>';
        }
        ?>

        <!-- PAGE HEADER -->
        <section class="text-center slice--offset-top parallax-section" style="background-image: url('/assets/images/backgrounds/slider/img-37.jpg');">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-8 my-3">
                <div class="row py-5">
                  <div class="col-12">
                    <h1 class="heading heading-inverse heading-1 strong-400 text-normal">
                      Edit News Articles
                    </h1>
                    <span class="clearfix"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- articles -->
        <section class="container container-lg">

          <div class="slice sct-color-1" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container container-lg masonry-container">
              <div class="row masonry cols-xs-space cols-sm-space cols-md-space" style="position: relative;">

                <?php

                $Query = sqlsrv_query($conn,"SELECT * FROM news");
                while ($row = sqlsrv_fetch_array($Query))
                {
                  $id = $row['id'];
                  $title = $row['title'];
                  $body = $row['body'];
                  $image = $row['image'];

                  // limmits body text displayed
                  $cutbody = substr($body,0,200);

                  echo'
                  <div class="masonry-item col-sm-6 col-md-4 design" style="position: absolute;">
                    <div class="card z-depth-3-top border-0">
                      <div class="card-image">
                        <div class="view view-first">
                          <a href="/admin/news/view/index.php/?id='.$id.'">
                            <img src="/images/'.$image.'" style="height: 100%; width: 100%; object-fit: center;" alt="Card image cap" name="image">
                          </a>
                        </div>
                      </div>
                      <div class="card-body">
                        <a href="/admin/news/view/index.php/?id='.$id.'">
                          <h3 class="heading heading-3 strong-500" name="title">'.$title.'</h3>
                        </a>
                        <p class="mt-3 mb-0 text-lg line-height-1_8" name="body">'.$cutbody.'...</p>
                      </div>
                      <div class="card-footer border-0 pt-2 pb-4">
                        <div class="row justify-content-center">
                          <div class="btn-container">
                          <form action="" method="post">
                            <input type="hidden" name="id" value="'.$id.'">
                            <input type="submit" class="btn btn-styled btn-base-1" name="delete" value="Delete">
                            </form>
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
