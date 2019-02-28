<section class="container container-lg">

  <div class="slice sct-color-1" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container container-lg">
      <div class="row masonry cols-xs-space cols-sm-space cols-md-space" style="position: relative;">
        <div>
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
                <tr>
                  <th scope="col">'.$title.'</th>
                </tr>
                <tr>
                  <th scope="col">'.$description.'</th>
                </tr>
              ';
              while ($row = sqlsrv_fetch_array($Query)) //loops for each question withing section
              {
                $qid = $row['qid'];
                $question = $row['question'];
                echo'
                <tr>
                  <td scope="row">' . $question . '</td>
                  <td scope="row" hidden>'. $id . '</td>
                  <td scope="row">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-secondary active" style="backgroundcolor:#599A90">
                        <input type="radio" name="1" id="option1" autocomplete="off">
                      </label>
                      <label class="btn btn-secondary" style="backgroundcolor:#CB5F2B">
                        <input type="radio" name="2" id="option2" autocomplete="off">
                      </label>
                      <label class="btn btn-secondary" style="backgroundcolor:#9E264B">
                        <input type="radio" name="3" id="option3" autocomplete="off">
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
        </div>
      </div>
    </div>

  </section>
