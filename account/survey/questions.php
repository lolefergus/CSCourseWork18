<section class="container container-lg">

  <div class="slice sct-color-1" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container container-lg">
      <div class="row masonry cols-xs-space cols-sm-space cols-md-space" style="position: relative;">
        <?php
        for ($section=0; $section < 8; $section++) {
          $Query = sqlsrv_query($conn, "SELECT qid, question FROM skillSurveyQs WHERE section = $section");
          echo'
          <div>
          <table class="table table-striped">
            <tbody>
          ';
          while ($row = sqlsrv_fetch_array($Query))
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
