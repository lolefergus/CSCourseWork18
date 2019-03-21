<<?php include($root.'/includes/session.php'); ?>
<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Skill Survey"; //sets page title
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');

    $userId = 1;
?>

<?php
//checks survey has been submited
if (isset($_POST['SubmitCheck'])) {
  $surveyNo = $_POST['surveyNo']; //sets survey number
  //gets list of all question IDs
  $Query = sqlsrv_query($conn, "SELECT qid FROM skillSurveyQs");
  //loops for each question
  while ($_POST = sqlsrv_fetch_array($Query)) {
    $qid = $_row['qid']; //takes question ID from SQL query
    $answer = $_POST['Question'.$qid.'']; //takes answer from post
    print $answer;
    $saveAnswer = sqlsrv_query($conn, "INSERT INTO skillSurveyAs (studentId, surveyNo, qId, dateCompleted, answer) values ($userId, $surveyNo, $qId, convert(date, getdate()), $answer)");


    //outputs $errors
    if( ($errors = sqlsrv_errors() ) != null) {
      foreach( $errors as $error ) {
        echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
        echo "code: ".$error[ 'code']."<br />";
        echo "message: ".$error[ 'message']."<br />";
      }
    }
  }

}
else {
print "Nope";
}

?>
