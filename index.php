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

          <!-- Latest news -->
          <section class="container " style="padding-top: 20px; padding-bottom: 20px;">
            <div>
              <h3>Latest News</h3>
            </div>
            <div class="row card-group">
              <?php
              $Qury = mysqli_query($conn,"SELECT * FROM news LIMIT 3");
              while ($row = sqlvr_fetch_array($Qury))
              {
                $id = $row['id'];
                $title = $row['title'];
                $body = $row['body'];
                $image = $row['image'];


                // limmits body text displayed
                $cutBody = substr($body,0,300);

                echo'
                <div class="card col-4">
                  <input type="hidden" name="id" value="'.$id.'">
                  <img class="card-img-top rounded-top" src="/images/'.$image.'" alt="Card image cap" name="image" style="padding-top: 15px;">
                  <div class="card-body">
                    <h5 class="card-title" name="title">'.$title.'</h5>
                    <p class="card-text" name="body" style="min-height:220px;">'.$cutBody.'...</p>
                    <a href="/news/view/index.php/?id='.$id.'" class="btn btn-primary">Click to continue reading</a>
                  </div>
                </div>
                ';
              }

              ?>
            </div>
            <div class="row justify-content-center">
              <div class="col-8 my-3">
                <div class="row py-5">
                  <div class="col-12">
                    <a href="/news/index.php" class="btn btn-primary">Click to see all Articles</a>
                    <span class="clearfix"></span>
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
