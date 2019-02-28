<section class="container container-lg">

  <div class="slice sct-color-1" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container container-lg">
      <div class="row masonry cols-xs-space cols-sm-space cols-md-space" style="position: relative;">
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
          <div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">'.$title.'</th>
              </tr>
              <tr>
                <th scope="col">'.$description.'</th>
              </tr>
            </thead>

            <tbody>

          ';
          while ($row = sqlsrv_fetch_array($Query)) //loops for each question withing section
          {
            $qid = $row['qid'];
            $question = $row['question'];
            echo'
            <tr>
              <th scope="col">' . $question . '</th>
              <th scope="col" hidden>'. $id . '</th>
              <th scope="col">

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary active">
                    <input type="radio" name="1" id="option1" autocomplete="off" style="backgroundcolor:#599A90">
                  </label>
                  <label class="btn btn-secondary">
                    <input type="radio" name="2" id="option2" autocomplete="off" style="backgroundcolor:#CB5F2B">
                  </label>
                  <label class="btn btn-secondary">
                    <input type="radio" name="3" id="option3" autocomplete="off" style="backgroundcolor:#9E264B">
                  </label>
                </div>

              </th>
            </tr>
            ';
          }
          echo'
            </tbody>
          </table>
          </div>
          ';
        }
        ?>
      </div>
    </div>

  </section>
