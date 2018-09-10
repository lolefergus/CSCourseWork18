<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Database Manager</title>
</head>
<body>
  <?php include('/includes/connect.php') ?>

  <table style="width:100%">
    <td>
      <h3>All Entries</h3>
      <?php  //allows php code in section
      $Qury = mysqli_query($conn,"select * from news");
      while($row = mysqli_fetch_assoc($Qury))
      {
        echo '
        <form action="" method="post">
        <input type="hidden" name="id" value="'.$row['id'].'">
        <input type="text" name="title" value="'.$row['title'].'">
        <input type="text" name="body" value="'.$row['body'].'">
        <input type="submit" name="update" value= "Update">
        <input type="submit" name="delete" value= "Delete">
        </form>
        ';//allows HTML sections inside PHP
      }

      if(isset($_POST['update']))
      { //if button pressed

        $id = $_POST['id'];//passes value from HTML input box
        $title = $_POST['title'];
        $body = substr($_POST['body'], 2);

        mysqli_query($conn, "UPDATE news SET title = '$title', body = '$body' WHERE id = '$id'"); //exequtes SQL statment
        echo '<script>window.location.href="dbeditor.php"</script>';//refreshes page with JS
      }
      elseif (isset($_POST['delete']))
      {
        $id = $_POST['id'];//passes value form HTML input box
        mysqli_query($conn, "DELETE FROM news WHERE id = '$id'");
        echo '<script>window.location.href="dbeditor.php"</script>';//refreshes page with JS
      }
      //end of php?>

      <form action="dbeditor.php" method="post">
        <input type="submit" name="refresh" value="Refresh">
      </form>
    </td>
    <td>
      <h3>Create Entrie</h3>
      <form action="" method="post">
        <input type="text" name="title" value="">
        <input type="text" name="body" value="">
        <input type="submit" name="create" value="Create">
      </form>

      <?php
        if(isset($_POST['create'])){
          $title = $_POST['title'];
          $body = $_POST['body'];

          mysqli_query($conn, "INSERT INTO news SET title = '$title', body = '$body'");
          echo '<script>window.location.href="dbeditor.php"</script>';//refreshes page with JS
        }
      ?>
    </td>
    <td>
      <h3>Search Entries</h3>
      <form action="" method="post">
        <input type="text" name="searchquery" value="">
        <input type="submit" name="submit" value="Press to Search">
      </form>

      <?php
        if (isset($_POST['submit']))
        {
          $input = $_POST["searchquery"];
          $Query = mysqli_query($conn, "select * FROM news WHERE title LIKE '%$input%'");
          echo '<br>Results:</br>';
          while ($row = mysqli_fetch_assoc($Query))
          {
            echo '
            <form action="" method="post">
            <input type="hidden" name="id" value="'.$row['id'].'">
            <input type="text" name="title" value="'.$row['title'].'">
            <input type="text" name="body" value="£'.$row['body'].'">
            <input type="submit" name="update" value= "Update">
            <input type="submit" name="delete" value= "Delete">
            </form>';
          }
        }
      ?>
    </td>
  </table>

</body>
</html>
