<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="fileupload.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />  <!--button that talks to file upload api of computer-->
    <input type="submit" value="Upload"></input>  <!--Button-->
  </form>
</body>
</html>
<?PHP
  if(!empty($_FILES['uploaded_file']))  //if a file selected
  {
    $path = "uploaded files/";   //sets loction in root folder to store file
    $path = $path . basename( $_FILES['uploaded_file']['name']);  //adds file name onto path
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {   //if sucesful
      echo "The file ".  basename( $_FILES['uploaded_file']['name']).
      " has been uploaded";
    } else{
        echo "There was an error uploading the file, please try again!";
    }
  }
?>
