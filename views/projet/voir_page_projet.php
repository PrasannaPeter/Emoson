
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Page<span>du projet <?php echo $get_projet['titreProjet']; ?></span>

      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">


     <?php

        if(!empty($_GET['idProjet'])){$idProjet = $_GET['idProjet'];}

        $get_projet = Projet::get_projet($idProjet);

    ?>

    <!-- Content Inner -->
    <div class="content-inner candidate-list">

    <center>
    <a class="btn btn-large btn-info" href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file-text"></i> <span>Page du projet</span></a>

    <a class="btn btn-large btn-warning" href="index.php?module=projet&action=voir_projet&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Voir brief</span></a>

    <a class="btn btn-large btn-primary" href="index.php?module=projet&action=voir_contrat&idProjet=<?php echo $idProjet; ?>" role="button"><i class="fa fa-file"></i> <span>Contrat</span></a>

    <hr>

    </center>
<?php




?>

<h2>Voici les meilleurs designers pour votre projet</h2>

<form>
    <div id="about-us-our-team" class="block">
      <div class="block-content">
        <div class="team-worker">
          <div class="photo"><img src="style/content/our-team/worker-1.jpg" height="154" width="154" alt="Jeffrey Richards - CEO"></div>
          <div class="name">Jeffrey Richards</div>
          <div class="post"> <center><input type="radio" name="choixDesigner" value="1"></center></div>

        </div>
        <div class="team-worker">
          <div class="photo"><img src="style/content/our-team/worker-2.jpg" height="154" width="154" alt="John Doe - Partner"></div>
          <div class="name">John Doe</div>
          <div class="post"> <center><input type="radio" name="choixDesigner" value="2"></center></div>
        </div>
        <div class="team-worker">
          <div class="photo"><img src="style/content/our-team/worker-3.jpg" height="154" width="154" alt="Jane Doe - Partner"></div>
          <div class="name">Jane Doe</div>
          <div class="post"> <center><input type="radio" name="choixDesigner" value="3"></center></div>
        </div>
      </div>
    </div>
</form>
      <div class="clear"></div>

    <hr>

<h2>Designer selectionné</h2>
<br />

<div class="candidates-box-wrapper full">
    <div id="job-content-fields">
      <div id="cells" class="view_mode">

        <div class="field-container odd box-1 hide">
          <div class="nav-buttons">
            <ul>
              <li class="show-hide hide"><a></a></li>
              <li class="favorite"><a href="#"></a></li>
              <li class="link"><a href="job.html"></a></li>
            </ul>
          </div>
          <div class="cells-job-thumb"> <img src="style/images/recruiter.jpg" alt="Thumb"> </div>
          <div class="header-fields">
            <div class="title-company">
              <div class="title"><a href="job.html">Abu Antar</a></div>
              <div class="company">24 Years Old - Sydney, AU</div>
            </div>
            <ul class="social_media_icons job">
              <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
              <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
              <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
              <li> <a href="#"> <i class="fa fa-linkedin-square"></i> </a> </li>
              <li> <a href="#"> <i class="fa fa-pinterest"></i> </a> </li>
              <li> <a href="#"> <i class="fa fa-dribbble"></i> </a> </li>
            </ul>
          </div>
          <div class="body-field">
            <div class="teaser">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Lorem ipsum dolor sit amet, consectetur adipisicing elit.<span class="read-more"><a>Read More</a></span></p>
            </div>
            <div class="full-body" style="display: none;">
              <p>Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <ul class="candidate-meta meta-fields">
              <li class="pull-left">Experience: <span>5 Years</span></li>
              <li class="pull-center">Degree: <span>MBA</span></li>
              <li class="pull-right">Career Level: <span>Mid Career</span></li>
            </ul>
            <div class="block-fields" style="display: none;">
              <div class="block skills">
                <h4>Required Skills</h4>
                <div class="block-content">
                  <div class="field roll-with-description hide">
                    <div class="roll-button"><span></span></div>
                    <div class="roll-field">
                      <div class="label">5 Years of Experience</div>
                      <div class="progressbar"><span class="progress-count" data-level="60" style="width: 60%;"></span></div>
                      <div class="description" style="display: none;">...</div>
                    </div>
                  </div>
                  <div class="field roll-with-description hide">
                    <div class="roll-button"><span></span></div>
                    <div class="roll-field">
                      <div class="label">Perfect Written &amp; Spoken English</div>
                      <div class="progressbar"><span class="progress-count" data-level="100" style="width: 100%;"></span></div>
                      <div class="description" style="display: none;">...</div>
                    </div>
                  </div>
                  <div class="field roll-with-description show">
                    <div class="roll-button"><span></span></div>
                    <div class="roll-field">
                      <div class="label">3 Foreign Languages</div>
                      <div class="progressbar"><span class="progress-count" data-level="65" style="width: 65%;"></span></div>
                      <div class="description" style="display: block;">Preferred languages are Arabic, French &amp; Italian. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi.</div>
                    </div>
                  </div>
                  <!-- Cleaner -->
                  <div class="clear"></div>
                  <!-- /Cleaner -->
                </div>
              </div>
              <div class="block">
                <h4>Additional Requirements</h4>
                <div class="block-content">
                  <div class="tag-field">Work Permit</div>
                  <div class="tag-field">5 Years Experience</div>
                  <div class="tag-field">MBA</div>
                  <div class="tag-field">Magento Certified</div>
                  <div class="tag-field">Perfect Written &amp; Spoken English</div>
                </div>
                <!-- Cleaner -->
                <div class="clear"></div>
                <!-- /Cleaner -->
              </div>
            </div>
            <div class="buttons-field applybtns" style="display: none;">
              <div class="apply"><a href="#">Contact Me</a></div>
              <div class="full"><a href="#">Contact On MotibU</a></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

<hr>
<br />

<h2>Propositions</h2>
<br />
<div class="well">Soundcloud player</div>

<hr>

<h2>Discussion</h2>
<br />
<div class="well">Fil de commentaires datés par utilisateurs</div>

</div>
</div>
</div>
