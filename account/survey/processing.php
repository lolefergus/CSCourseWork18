<?php include($root.'/includes/session.php'); ?>

<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Skill Survey"; //sets page title
    include($root.'/includes/connect.php');

    $userId = 1;
//checks survey has been submited
if (isset($_POST['SubmitCheck'])) {
  $surveyNo = $_POST['surveyNo']; //sets survey number
  //gets list of all question IDs
  $Query = sqlsrv_query($conn, "SELECT qid FROM skillSurveyQs");
  //loops for each question
  while ($row = sqlsrv_fetch_array($Query)) {
    $qId = $row['qid']; //takes question ID from SQL query
    $answer = $_POST['Question'.$qId.'']; //takes answer from post
    $saveAnswer = sqlsrv_query($conn, "INSERT INTO skillSurveyAs (studentId, surveyNo, qId, dateCompleted, answer) values ($userId, $surveyNo, $qId, convert(date, getdate()), $answer)");
  }
  header("Location:/account/");
}
else {
print "An Error Has Occurred, Please Try Again";
}

?>

<!DOCTYPE html>
<html>
