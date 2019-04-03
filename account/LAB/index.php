<?php session_start(); ?>
<?php $root = $_SERVER['DOCUMENT_ROOT'];
$title = "Account Home"; //sets page title
include($root.'/includes/connect.php');
?>
<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php print $title; ?> - Career Ready</title>

    <?php
    include($root.'/includes/scripts.php');
    ?>

    <!-- Bootstrap -->
    <link type="text/css" href="/assets/css/boomerang.min.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css">

    <link rel="stylesheet" href="/assets/css/boomerang-startup-agency.min.css" type="text/css">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="/assets/vendor/swiper/css/swiper.min.css">
    <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/animate/animate.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/vendor/fancybox/css/jquery.fancybox.min.css">

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/fonts/ionicons/css/ionicons.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/fonts/line-icons/line-icons.css" type="text/css">
    <link rel="stylesheet" href="/assets/fonts/line-icons-pro/line-icons-pro.css" type="text/css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Global style (main) -->

    <!-- Custom style - Remove if not necessary -->
    <link type="text/css" href="/assets/css/custom-style.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="\images\logo.png" rel="icon" type="image/png">

    <!-- Pie Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // finding info for chart
    <?php
    //finds years in system, so as to generate chart for each year
    $yearsActive = sqlsrv_query($conn, "SELECT DISTINCT joinYear FROM accounts WHERE accountType = 'Student'");
    while ($currentYear = sqlsrv_fetch_array($yearsActive)) //loops for each section
    {
      $studentGroup = $currentYear['joinYear']; //extracts year for current loop

      //counts number of distinct students that have completed their 3rd survey
      $Query = sqlsrv_query($conn, "SELECT DISTINCT skillSurveyAs.studentId FROM skillSurveyAs INNER JOIN accounts ON skillSurveyAs.studentId WHERE skillSurveyAs.surveyNo = 3 AND accounts.joinYear = $studentGroup", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
      $num3 = sqlsrv_num_rows($Query);

      //counts number of distinct students that have completed their 3rd survey
      $Query = sqlsrv_query($conn, "SELECT DISTINCT skillSurveyAs.studentId FROM skillSurveyAs INNER JOIN accounts ON skillSurveyAs.studentId WHERE skillSurveyAs.surveyNo = 2 AND accounts.joinYear = $studentGroup", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
      $num2 = sqlsrv_num_rows($Query) - $num3; //takes of num of students finished 3rd survey to get students that haven't done 3rd

      //counts num students that only completed one survey
      $Query = sqlsrv_query($conn, "SELECT DISTINCT skillSurveyAs.studentId FROM skillSurveyAs INNER JOIN accounts ON skillSurveyAs.studentId WHERE skillSurveyAs.surveyNo = 1 AND accounts.joinYear = $studentGroup", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
      $num1 = sqlsrv_num_rows($Query) - $num2 - $num3; //calculates number that havn't taken 2nd or 3rd survey

      //counts total num students in year group
      $Query = sqlsrv_query($conn, "SELECT DISTINCT id FROM accounts WHERE joinYear = $studentGroup AND accountType = 'Student'", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
      $num0 = sqlsrv_num_rows($Query) - $num2 - $num3 - $num1; //finds num haven't completed any surveys

    ?>
      // integrates with google charts to set out pie chart
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Surveys Completed', 'Number of Students'],
          ['0', <?php print $num0; ?>],
          ['1',  <?php print $num1; ?>],
          ['2',  <?php print $num2; ?>],
          ['3',  <?php print $num3; ?>]

        ]);

      var options = {
        title: 'Survey Progress for <?php print $studentGroup; ?> Students'
      };

      var chart = new google.visualization.PieChart(document.getElementById('<?php print $studentGroup; ?> SuveyProgress')); //survey title

      chart.draw(data, options);
    }
    </script>

</head>
  <body>
    <main class="body-wrap">
      <?php
      include($root.'/includes/navbar.php');
      ?>

      <div id="completedSurevyOne" style="width: 900px; height: 500px;"></div>

      <?php
      include($root.'/includes/footer.php');
      ?>
    </main>

  </body>
</html>
