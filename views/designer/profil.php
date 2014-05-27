<?php

require_once('admin/controllers/projet/projet.php');
$info_projet = Projet::get_projet($_GET['idProjet']);

foreach ($info_projet as $info) 
{
  
  $titreProjet = $info_projet['titreProjet'];

}

require_once('admin/controllers/utilisateur/utilisateur.php');
$info_designer = Utilisateur::get_utilisateur($_GET['idUtilisateur']);


foreach ($info_designer as $info) {
  
  $nom = $info_designer['nomUtilisateur'];
  $prenom = $info_designer['prenomUtilisateur'];
  $tel = $info_designer['telUtilisateur'];
  $email = $info_designer['emailUtilisateur'];
  $bio = $info_designer['bioUtilisateur'];

}


?>

<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner job_page title-2"><?php echo $nom.' '.$prenom; ?><span id="jobs-counter">- Designer </span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
        <li> <a href="index.php?module=dashboard&action=afficher">Mon espace</a></li>
        <li> <a href="index.php?module=projet&action=voir_page_projet&idProjet=<?php echo $_GET['idProjet']; ?>">Projet : <?php echo $titreProjet; ?></a></li>
        <li><a href="index.php?module=designer&action=profil&idProjet=<?php echo $_GET['idProjet'];?>&idUtilisateur=<?php echo $_GET['idUtilisateur']; ?>">Profil : <?php echo $nom.' '.$prenom; ?></a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-single">

      <!-- Content Left -->
      <div class="content-left">
        <div class="block background job_block">
          <div id="map-container" class="candidate-pic"> <img src="style/images/pas-de-photo.jpg" alt="Candidate picture"/> </div>
          <h2 class="title-3">Détails du designer</h2>
          <div class="block-content">
            <table  border="1" class="list_info">
              <tr>
                <td>Nom</td>
                <td><?php echo $nom.' '.$prenom; ?></td>
              </tr>
              <!--tr>
                <td>Age</td>
                <td>38 Years Old</td>
              </tr>
              <tr>
                <td>Location</td>
                <td>Jordan Amman</td>
              </tr>
              <tr>
                <td>Experiance</td>
                <td>15 Years</td>
              </tr>
              <tr>
                <td>Dgree</td>
                <td>MBA</td>
              </tr>
              <tr>
                <td>Career Lavel</td>
                <td>Mid-Level</td>
              </tr-->
              <tr>
                <td>Numéro de téléphone</td>
                <td><?php echo $tel; ?></td>
              </tr>
              <!--tr>
                <td>Fax</td>
                <td>(800) 123-4568</td>
              </tr-->
              <tr>
                <td>E-mail</td>
                <td><?php echo $email; ?></td>
              </tr>
              <!--tr>
                <td>Website</td>
                <td>www.example.com</td-->
              </tr>
            </table>
          </div>
          <!--h2 class="title-3">Professional Rating</h2>
          <div class="block-content last personal-rate">
            <table  border="1" class="list_info">
              <tr>
                <td>Expertise</td>
                <td><img src="style/images/4-stars.png"  alt=""/></td>
              </tr>
              <tr>
                <td>Knowledge</td>
                <td><img src="style/images/3-stars.png"  alt=""/></td>
              </tr>
              <tr>
                <td>Quality</td>
                <td><img src="style/images/4-stars.png"  alt=""/></td>
              </tr>
              <tr>
                <td>Price</td>
                <td><img src="style/images/5-stars.png"  alt=""/></td>
              </tr>
              <tr>
                <td>Services</td>
                <td><img src="style/images/4-stars.png"  alt=""/></td>
              </tr>
            </table>
          </div-->
          <!--div class="block-content overall">
            <h3>Notes</h3>
            <img src="style/images/4-stars.png"  alt=""/> 
          </div-->
        </div>
      </div>
      <!-- /Content Left -->

      <!-- Content Center -->
      <div class="content-center">
        <div class="heading-l">
          <h2> Description du profil </h2>
        </div>
        <div class="row-fluid">
          <!--div class="page-nav">
            <div class="span3">
              <button class="btn gray jobbtn">Retour</button>
            </div>
            <div class="span2 pull-right">
              <button class="btn gray next-btn">Next</button>
            </div>
            <div class="span2 pull-right">
              <button class="btn gray pre-btn">Previous</button>
            </div>
          </div-->
        </div>
        <div class=" content-center border box-1 single-candidate">
          <div id="job-content-field">
            <div class="field-container single no_border">
              <div class="header-fields">
                <!--ul class="social_media_icons pull-right">
                  <li> <a href="#"><i class="fa fa-star"></i></a> </li>
                </ul-->
                <div class="title-company">
                  <div class="title"><a href="#"><?php echo $nom.' '.$prenom; ?></a></div>
                  <!--div class="company">24 Years Old - Sydney, AU</div-->
                </div>
              </div>
              <div class="body-field">
                <div class="row-fluid">
                  <ul class="social_media_icons">
                    <!li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-google-plus"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-twitter"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-linkedin-square"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-pinterest"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-dribbble"></i> </a> </li>
                    <li><a href="#"><img src="style/images/picto_soundcloud.png" width="50px"></a></li>
                    
                  </ul>
                </div>
                <div class="teaser">
                <?php echo $bio; ?>
                  <!--p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p-->
                </div>
                <div class="full-body" style="display: block">
                  <!--p>Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p-->
                </div>
              </div>
              <div class="block-fields">
                <!--div class="block skills">
                  <h4>My Skills</h4>
                  <div class="block-content">
                    <div class = "field roll-with-description hide">
                      <div class = "roll-button"><span></span></div>
                      <div class = "roll-field">
                        <div class = "label">5 Years of Experience</div>
                        <div class = "progressbar"><span class = "progress-count" data-level = "60"></span></div>
                        <div class = "description">...</div>
                      </div>
                    </div>
                    <div class = "field roll-with-description hide">
                      <div class = "roll-button"><span></span></div>
                      <div class = "roll-field">
                        <div class = "label">Perfect Written &amp; Spoken English</div>
                        <div class = "progressbar"><span class = "progress-count" data-level = "100"></span></div>
                        <div class = "description">...</div>
                      </div>
                    </div>
                    <div class = "field roll-with-description show">
                      <div class = "roll-button"><span></span></div>
                      <div class = "roll-field">
                        <div class = "label">3 Foreign Languages</div>
                        <div class = "progressbar"><span class = "progress-count" data-level = "65"></span></div>
                        <div class = "description">Preferred languages are Arabic, French &amp; Italian. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi.</div>
                      </div>
                    </div>
                    <!-- Cleaner -->
                    <!--div class="clear"></div>
                    <!-- /Cleaner -->
                  <!--/div>
                </div-->
                <!--div class="block">
                  <h4>Additional Skills</h4>
                  <div class="block-content">
                    <div class = "tag-field">Work Permit</div>
                    <div class = "tag-field">5 Years Experience</div>
                    <div class = "tag-field">MBA</div>
                    <div class = "tag-field">Magento Certified</div>
                    <div class = "tag-field">Perfect Written &amp; Spoken English</div>
                  </div>
                  <!-- Cleaner -->
                  <!--div class="clear"></div>
                  <!-- /Cleaner -->
                <!--/div-->
              </div>
              <div class="buttons-field applybtns">
                <div class="apply"><a href="#">Contacter</a></div>
                <!--div class="full"><a href="#">Contact On MotibU</a></div-->
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
        <!--div class="heading-l">
          <h2> Similar Candidates </h2>
        </div>
        <div class="block border recruiter box-1 candidates-box mr0">
          <div class="block-content">
            <div class="recruiter_photo"><img src="style/images/recruiter.jpg"  alt="user"/></div>
            <div class="recruiter_info">
              <div class="row-field">
                <div class="span3  pull-right first candidate-links">
                  <ul class="social_media_icons  pull-right">
                    <li> <a href="#"> <i class="fa fa-plus"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-star"></i> </a> </li>
                    <li> <a href="#"> <i class="fa fa-link"></i> </a> </li>
                  </ul>
                </div>
                <div class="span5 pull-left first">
                  <div class="title">Abu Antar</div>
                  <div class="location">24 Years Old - Sydney, AU</div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. <a>Read More</a></p>
                </div>
              </div>
            </div>
            <ul class="candidate-meta">
              <li class="pull-left">Experience: <span>5 Years</span></li>
              <li class="pull-center">Degree: <span>MBA</span></li>
              <li class="pull-right">Career Level: <span>Mid Career</span></li>
            </ul>
          </div>
        </div-->
        <div class="clear"></div>
        <!-- Clear Line -->

      </div>
      <!-- /Content Center -->
      <div class="clear"></div>
      <!-- Clear Line -->

    </div>
    <!-- /Content Inner -->

  </div>
</div>
<!-- /Content -->