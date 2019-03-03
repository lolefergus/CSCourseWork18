<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Skill Survey"; //sets page title
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');
?>

<?php
//checks survey has been submited
if (isset($_POST['SubmitCheck'])) {
  // $Query = sqlsrv_query($conn, "SELECT qid FROM skillSurveyQs");
  // while ($row = sqlsrv_fetch_array($Query)) {
  //   $qid = $row['qid'];
  //   $answer = $_POST['Question'.$qid.''];
  //   print $answer;
  print $_POST['test'];
  }
}
else {
print "Nope";
}

?>
