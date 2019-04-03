<section class="container container-lg">

  <div class="slice sct-color-1" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container container-lg">
      <!-- <div class="row masonry cols-xs-space cols-sm-space cols-md-space" style="position: relative;"> -->
        <div>
          <form id="skillSurvey" action="/account/survey/processing.php" method="post">
            <table class="table table-hover">
              <?php
              //as section is a foreign key dynamicly asigned when creating a section in the surveySection table it may not go up as 1,2,3
              //therfore I must first check which numbers are used as section IDs
              $NumSectionsQuery = sqlsrv_query($conn, "SELECT DISTINCT section FROM skillSurveyQs"); //selects one of each differnt value in section column of table
              while ($currentSection = sqlsrv_fetch_array($NumSectionsQuery)) //loops for each section
              {
                //reads currecnt section
                $section = $currentSection['section'];
                $Query = sqlsrv_query($conn, "SELECT qid, question FROM skillSurveyQs WHERE section = $section"); //selects questions
                $headingQuery = sqlsrv_query($conn, "SELECT title, description FROM surveySection WHERE sectionId = $section"); //selects tile info
                $headerInfo = sqlsrv_fetch_array($headingQuery);
                $title = $headerInfo['title']; //defines title of current section from query results
                $description = $headerInfo['description']; //as above but for section description

                echo'
                <tbody>
                  <tr class="table-active">
                    <th scope="col" colspan="2"><b>'.$title.'</b> - '.$description.'</th>
                  </tr>
                ';
                while ($row = sqlsrv_fetch_array($Query)) //loops for each question withing section
                {
                  $qid = $row['qid'];
                  $question = $row['question'];
                  echo'
                  <tr>
                    <td scope="row">Do I - ' . $question . '?</td>
                    <td scope="row" hidden>'. $qid . '</td>
                    <td scope="row">
                      <div class="btn-group btn-group-toggle"  data-toggle="buttons">
                        <label class="btn btn-success">
                          <input type="radio" name="Question'.$qid.'" value="1" autocomplete="off" required> Usually
                        </label>
                        <label class="btn btn-warning">
                          <input type="radio" name="Question'.$qid.'" value="2" autocomplete="off"> Sometimes
                        </label>
                        <label class="btn btn-danger">
                          <input type="radio" name="Question'.$qid.'" value="3" autocomplete="off"> Rarely
                        </label>
                      </div>
                    </td>
                  </tr>
                  ';
                }
                echo'
                </tbody>
                ';
              }
              ?>
            </table>
            <input type="hidden" name="surveyNo" value="<?php print $surveyNo; ?>">
            <input type="hidden" name="SubmitCheck" value="sent">
            <input class="btn btn-submit" type="submit">
          </form>
        </div>
      <!-- </div> -->
    </div>

  </section>
