<!DOCTYPE html>
<html>
<?php
    $root = $_surVER['DOCUMENT_ROOT'];
    $title = "Skill Survey"; //sets page title
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');
?>

<?php
//checks survey has been submited
if (isset($_POST['SubmitCheck'])) {
  $surveyNo = $row['surveyNo']; //sets survey number
  //gets list of all question IDs
  $Query = sqlsrv_query($conn, "SELECT qid FROM skillSurveyQs");
  //loops for each question
  while ($row = sqlsrv_fetch_array($Query)) {
    $qid = $row['qid']; //takes question ID from SQL query
    $answer = $_POST['Question'.$qid.'']; //takes answer from post
    print $answer;
    $saveAnswer = sqlsrv_query($conn, "INSERT INTO skillSurveyAs (studentId, surveyNo, qId, dateCompleted, answer) values ($userId, $surveyNo, $qId, getdate(), $answer)");
  }

}
else {
print "Nope";
}

?>
