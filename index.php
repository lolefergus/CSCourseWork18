<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Home";
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
              <h3>What is Career Ready?</h3>
            </div>
            <div>
              <p>Sed et ex eget urna cursus auctor. Cras diam ipsum, ullamcorper ut lobortis sed, malesuada vel risus. Morbi luctus tincidunt dolor, id tristique augue sodales ut. Nam commodo augue sed risus cursus, quis convallis mi pulvinar. Aliquam fringilla fringilla viverra. Vestibulum elementum rutrum ipsum ac fringilla. Pellentesque blandit, neque id accumsan scelerisque, justo turpis fringilla elit, ut posuere ante dui non libero. Sed cursus nulla ac pellentesque placerat. Aliquam sed maximus magna. Suspendisse vulputate finibus ultrices. Etiam at ipsum ut lacus interdum faucibus. Nunc eleifend augue malesuada, tempor diam sed, gravida dolor. Nullam interdum est in neque lacinia scelerisque. Cras elit nisl, dapibus sed ex vitae, laoreet pharetra lacus. Sed sit amet aliquet leo, in eleifend tellus.</p>
            </div>
            <div>
              <h3>Latest News</h3>
            </div>
            <div class="row card-group">
              <?php
              $Query = sqlsrv_query($conn, "SELECT TOP (3) * FROM news");
              if ($Query)
              {
                while ($row = sqlsrv_fetch_array($Query))
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
              }
              else {
                print ("Error with Query:");
                print (sqlsrv_errors (SQLSRV_ERR_ALL));
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
