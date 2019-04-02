<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php
$root = $_SERVER['DOCUMENT_ROOT'];

//conects to Database
include($root.'/includes/connect.php');

//sources title and news article
$id = $_GET['id'];
$Query = sqlsrv_query($conn,"SELECT news.title, news.body, news.image, accounts.firstName, accounts.lastName FROM news INNER JOIN accounts ON news.authorId = accounts.id WHERE accounts.id = $id");
$row = sqlsrv_fetch_array($Query);
$title = $row['title'];

//sets up page
include($root.'/includes/head.php');

print $row['title'];
print $row['body'];
print $row['image'];
print $row['firstName'] . " " . $row['lastName'];

if ($errors = sqlsrv_errors() = null)
{
  print "No Error in SQL?";
}
else {
  foreach( $errors as $error ) {
    echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
    echo "code: ".$error[ 'code']."<br />";
    echo "message: ".$error[ 'message']."<br />";
  }
}

?>
<body>

  <main class="body-wrap">
    <?php
    include($root.'/includes/navbar.php');

    //sets variables used to output articles
      $title = $row['title'];
      $body = $row['body'];
      $image = $row['image'];
      $author = $row['firstName'] . " " . $row['lastName'];
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
                  <p class="heading heading-inverse heading-3 text-normal">
                    <?php echo '-' . $author; ?>
                  </p>
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
