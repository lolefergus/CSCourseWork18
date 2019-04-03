<?php
include($root.'/includes/session.php');
include($root.'/includes/connect.php');

<<<<<<< HEAD
$userId = 15; //NEEDAS CHANGING TO USE SEESION
=======
$userId = 1; //NEEDAS CHANGING TO USE SEESION
>>>>>>> parent of 5fd175f... chnaged id

//checks survey has been submited
if (isset($_POST['SubmitCheck']))
{
  $surveyNo = $_POST['surveyNo']; //sets survey number
  //gets list of all question IDs
  $Query = sqlsrv_query($conn, "SELECT qid FROM skillSurveyQs");
  //loops for each question
  while ($row = sqlsrv_fetch_array($Query))
  {
    $qId = $row['qid']; //takes question ID from SQL query
    $answer = $_POST['Question'.$qId.'']; //takes answer from post
    $saveAnswer = sqlsrv_query($conn, "INSERT INTO skillSurveyAs (studentId, surveyNo, qId, dateCompleted, answer) values ($userId, $surveyNo, $qId, convert(date, getdate()), $answer)");
    print "user id: " . $iserId . " QID: " $qId . " Answer: ". $answer;
  }
  // header("Location:/account/");
}
else {
print "An Error Has Occurred, Please Try Again";
}

?>
