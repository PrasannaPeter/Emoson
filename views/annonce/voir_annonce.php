<?php
  $get_annonces = Annonce::get_annonce();
?>

<div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">
      <div class="candidates-box-wrapper full">
        <div id="job-content-fields">
          <div id="cells" class="view_mode">
<?php
  while ($annonce =  $get_annonces->fetch()) {

?>

  <div class="field-container odd box-1 hide">
    <div class="header-fields">
      <div class="title-company">
        <div class="title"><?php echo $annonce['titre']; ?></a></div>
        <div class="title"><?php echo $annonce['date']; ?></a></div>
      </div>
    </div>
    <div class="body-field">
      <div class="teaser">
        <p><?php echo $annonce['content']; ?><!-- <span class="read-more"><a>Read More</a></span></p> -->
      </div>
      <!-- <div class="full-body" style="display: none;">
        <p>Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div> -->
    </div>
  </div>

<?php

  }

?>

          </div>
        </div>
      </div>
      <div class="clearfix"></div>

      <!-- /Content Center -->

    <br>
    <br>
    <br>

      <!-- Clear Line -->

    </div>
    <!-- /Content Inner -->

  </div>
  </div>