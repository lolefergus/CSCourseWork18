<section class="container container-lg">

  <div class="slice sct-color-1" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container container-lg">
      <div class="row masonry cols-xs-space cols-sm-space cols-md-space" style="position: relative;">
        <?php
        for ($section=0; $section < ; $section++) {
          $Query = sqlsrv_query($conn, "SELECT id, question FROM skillSurveyQs WHERE section = $section")
          
        }

        ?>
      </div>
    </div>

  </section>
