<!DOCTYPE html>
<html>
<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    $title = "Skill Survey"; //sets page title
    include($root.'/includes/head.php');
    include($root.'/includes/connect.php');
?>
<?php
//check account type once session set up

//checks how many times survey been taken
if (sqlsrv_num_rows(sqlsrv_query($conn, "SELECT answer FROM skillSurveyAs WHERE studentId = id AND surveyNo = 3")) == 0)
{
  $serveyNum = 3;
}
else if (sqlsrv_num_rows(sqlsrv_query($conn, "SELECT answer FROM skillSurveyAs WHERE studentId = id AND surveyNo = 2")) == 0) {
  $serveyNum = 2;
}
else if (sqlsrv_num_rows(sqlsrv_query($conn, "SELECT answer FROM skillSurveyAs WHERE studentId = id AND surveyNo = 1")) == 0) {
  $serveyNum = 1;
}
else {
  $serveyNum = 4;
}

if ($serveyNum != 4) {
  include($root.'/account/survey/questions.php');
}
else {
  include($root.'/account/survey/accessDenied.php');
}

?>
