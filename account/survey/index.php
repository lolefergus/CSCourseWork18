<!DOCTYPE html>
<html>
<?php
    $root = $_surveR['DOCUMENT_ROOT'];
    $title = "Skill Survey"; //sets page title
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');
?>
<?php
//check account type and id once session set up
//in mean time set id manualy here
$id = 1;

//checks how many times survey been taken
if (sqlsrv_has_rows (sqlsrv_query($conn, "SELECT answer FROM skillSurveyAs WHERE studentId = $id AND surveyNo = 3")))
{
  $surveyNo = 4;
}
else if (sqlsrv_has_rows (sqlsrv_query($conn, "SELECT answer FROM skillSurveyAs WHERE studentId = $id AND surveyNo = 2"))) {
  $surveyNo = 3;
}
else if (sqlsrv_has_rows (sqlsrv_query($conn, "SELECT answer FROM skillSurveyAs WHERE studentId = $id AND surveyNo = 1"))) {
  $surveyNo = 2;
}
else {
  $surveyNo = 1;
}

if ($surveyNo != 4) {
  include($root.'/account/survey/questions.php');
}
else {
  include($root.'/account/survey/accessDenied.php');
}

?>
