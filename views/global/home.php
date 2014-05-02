<!-- Content -->
<div id="content">

  <!-- Banner Area -->
  <section class="header-banner">
    <div class="inner">
        <!-- Panel 3 -->
        <div id="login-panel">
          <div class="left">
            <div class="first">
              <div class="counter">
                <ul id="counter">
                  <li class="unvis">0</li>
                  <li>1</li>
                  <li class="border"></li>
                  <li>1</li>
                  <li>4</li>
                  <li>5</li>
                </ul>
                <div class="counter-label">Projets</div>
              </div>
              <div id="find-job-buttom"><a href="#loginModal" role="button" class="btn" data-toggle="modal"><i class="fa fa-music"></i> <span>Je suis designer</span></a></div>
            </div>
            <div class="second">
              <div class="form">
                <form id="login-1" method="POST" action="index.php?module=utilisateur&action=connexion_designer">
                  <input type="text" placeholder="Email" class="textfield"/>
                  <input type="password" placeholder="Mot de passe" class="textfield"/>
                  <input type="submit" value="Connexion" id="login-submit-1"/>
                </form>
                 </div>

            </div>
          </div>
          <div class="right">
            <div class="first">
              <div id="post-job-buttom"><a href="#loginModal" role="button" class="btn" data-toggle="modal"><i class="fa fa-file-text"></i> <span>J'ai un projet</span></a></div>
            </div>
            <div class="second">
              <div class="form">
                <form id="login-2" method="POST" action="index.php?module=utilisateur&action=connexion_entreprise">
                  <input type="text" placeholder="Email" class="textfield"/>
                  <input type="password" placeholder="Mot de passe" class="textfield"/>
                  <input type="submit" value="Connexion" id="login-submit-2"/>
                </form>
                 </div>
            </div>
          </div>
        </div>
        <!-- /Panel 3 -->
    </div>
    </section>
  <!-- /Banner Area -->
  <div class="clear"></div>

  <div class="inner">
    <!-- Content Inner -->
    <div class="content-inner">

       <!--  <div class="heading-l">
          <h2> Trouvez un projet </h2>
        </div>
        <div id="explore" class="non-title-border">
          <div class="block-content">
            <ul class="tabs">
              <li class="first"><a href="#map">Lieu</a></li>
              <li><a href="#industry">Secteur</a></li>
              <li><a href="#type">Type</a></li>
              <li class="last"><a href="#country">Pays</a></li>
            </ul>
            <div id="map" class="box-1">
              <div class="map-wrapper">
              <div class="map-container" id="centerMap"></div>
              </div>

              <div class="region">
                <label>Selectionner Region</label>
                <select class="select">
                  <option selected="selected" value="nothing">- Selectionner -</option>
                  <option value="Asie">Asie</option>
                  <option value="Africa">Africa</option>
                  <option value="Europe">Europe</option>
                  <option value="North America">North America</option>
                  <option value="Central America">Central America</option>
                  <option value="South America">South America</option>
                  <option value="Oceania">Oceania</option>
                </select>
              </div>
              <div class="clear"></div>
              <div class="region-menu">
                <div class="left">
                  <ul>
                    <li><a href="#">Asie<span class="count">(3218)</span></a></li>
                    <li><a href="#">Africa<span class="count">(834)</span></a></li>
                    <li><a href="#">Europe<span class="count">(15218)</span></a></li>
                    <li><a href="#">North America<span class="count">(14902)</span></a></li>
                  </ul>
                </div>
                <div class="left">
                  <ul>
                    <li><a href="#">Central America<span class="count">(1347)</span></a></li>
                    <li><a href="#">South America<span class="count">(5834)</span></a></li>
                    <li><a href="#">Oceania<span class="count">(6020)</span></a></li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
            </div>
            <div id="industry"  class="box-1">
              <div class="scroll-container">
                <div class="left">
                  <h4>Administrative and Support Services</h4>
                  <ul>
                    <li><a href="#">Support Services<span>(34)</span></a></li>
                    <li><a href="#">Consulting Services<span>(142)</span></a></li>
                    <li><a href="#">Customer Service<span>(67)</span></a></li>
                    <li><a href="#">Employment Placement<br/>
                      Agencies/Recruiting<span>(24)</span></a></li>
                    <li><a href="#">Human Resources<span>(113)</span></a></li>
                    <li><a href="#">Legal<span>(27)</span></a></li>
                    <li><a href="#">Administration<span>(57)</span></a></li>
                    <li><a href="#">Contracts/Purchasing<span>(29)</span></a></li>
                    <li><a href="#">Secretarial<span>(22)</span></a></li>
                    <li><a href="#">Security<span>(26)</span></a></li>
                    <li><a href="#">Telemarketing<span>(4)</span></a></li>
                    <li><a href="#">Translation<span>(12)</span></a></li>
                    <li><a href="#">Management<span>(70)</span></a></li>
                    <li><a href="#">Business Support <span>(29)</span></a></li>
                  </ul>
                  <h4>Healthcare and Science</h4>
                  <ul>
                    <li><a href="#">Pharmaceutical<span>(42)</span></a></li>
                    <li><a href="#">Manufacturing<span>(149)</span></a></li>
                    <li><a href="#">Mechanical<span>(28)</span></a></li>
                    <li><a href="#">Technical/Maintenance<span>(40)</span></a></li>
                    <li><a href="#">Lubricants/Greases Blending<span>(10)</span></a></li>
                    <li><a href="#">Textiles<span>(10)</span></a></li>
                    <li><a href="#">Aerospace and Defense<span>(14)</span></a></li>
                  </ul>
                </div>
                <div class="right">
                  <h4>Manufacturing and Industrial</h4>
                  <ul>
                    <li><a href="#">Agriculture/Forestry/Fishing<span>(42)</span></a></li>
                    <li><a href="#">Installation, Maintenance<span>(37)</span></a></li>
                    <li><a href="#">Manufacturing and Production<span>(96)</span></a></li>
                    <li><a href="#">Mining<span>(9)</span></a></li>
                    <li><a href="#">Safety/Environment<span>(21)</span></a></li>
                    <li><a href="#">Industrial<span>(184)</span></a></li>
                    <li><a href="#">Manufacturing<span>(149)</span></a></li>
                    <li><a href="#">Mechanical<span>(28)</span></a></li>
                    <li><a href="#">Technical/Maintenance<span>(40)</span></a></li>
                    <li><a href="#">Lubricants/Greases Blending<span>(10)</span></a></li>
                    <li><a href="#">Textiles<span>(10)</span></a></li>
                    <li><a href="#">Aerospace and Defense<span>(14)</span></a></li>
                  </ul>
                  <h4>Healthcare and Science</h4>
                  <ul>
                    <li><a href="#">Pharmaceutical<span>(42)</span></a></li>
                    <li><a href="#">Manufacturing<span>(149)</span></a></li>
                    <li><a href="#">Mechanical<span>(28)</span></a></li>
                    <li><a href="#">Technical/Maintenance<span>(40)</span></a></li>
                    <li><a href="#">Lubricants/Greases Blending<span>(10)</span></a></li>
                    <li><a href="#">Textiles<span>(10)</span></a></li>
                    <li><a href="#">Aerospace and Defense<span>(14)</span></a></li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
              <div class="external-scroll_y">
                <div class="scroll-element_outer">
                  <div class="scroll-element_size"></div>
                  <div class="scroll-element_inner"></div>
                  <div class="scroll-bar"></div>
                </div>
              </div>
            </div>
            <div id="type"  class="box-1">
              <div class="scroll-container">
                <div class="info">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus.</p>
                </div>
                <div class="left">
                  <ul>
                    <li><a href="#">Accounting/Banking/Finance Projets<span>(581)</span></a></li>
                    <li><a href="#">Administration Projets<span>(406)</span></a></li>
                    <li><a href="#">Art/Design/Creative Projets<span>(176)</span></a></li>
                    <li><a href="#">Customer Service Projets<span>(334)</span></a></li>
                    <li><a href="#">Education/Training Projets<span>(180)</span></a></li>
                    <li><a href="#">Engineering Projets<span>(978)</span></a></li>
                    <li><a href="#">Healthcare/Medical Projets<span>(131)</span></a></li>
                    <li><a href="#">Human Resources/Personnel Projets<span>(318)</span></a></li>
                    <li><a href="#">Law/Legal Projets<span>(61)</span></a></li>
                    <li><a href="#">Logistics Projets<span>(144)</span></a></li>
                    <li><a href="#">Management Projets<span>(743)</span></a></li>
                    <li><a href="#">Law/Legal Projets<span>(61)</span></a></li>
                    <li><a href="#">Logistics Projets<span>(144)</span></a></li>
                    <li><a href="#">Management Projets<span>(743)</span></a></li>
                  </ul>
                </div>
                <div class="right">
                  <ul>
                    <li><a href="#">Marketing/PR Projets<span>(329)</span></a></li>
                    <li><a href="#">Other Projets<span>(326)</span></a></li>
                    <li><a href="#">Purchasing/Procurement Projets<span>(130)</span></a></li>
                    <li><a href="#">Quality Control Projets<span>(93)</span></a></li>
                    <li><a href="#">Research Projets<span>(33)</span></a></li>
                    <li><a href="#">Safety Projets<span>(72)</span></a></li>
                    <li><a href="#">Sales Projets<span>(1061)</span></a></li>
                    <li><a href="#">Secretarial Projets<span>(155)</span></a></li>
                    <li><a href="#">Support Services Projets<span>(744)</span></a></li>
                    <li><a href="#">Technology/IT Projets <span>(546)</span></a></li>
                    <li><a href="#">Writing/Editing Projets <span>(19)</span></a></li>
                    <li><a href="#">Support Services Projets<span>(744)</span></a></li>
                    <li><a href="#">Technology/IT Projets <span>(546)</span></a></li>
                    <li><a href="#">Writing/Editing Projets <span>(19)</span></a></li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
              <div class="external-scroll_y">
                <div class="scroll-element_outer">
                  <div class="scroll-element_size"></div>
                  <div class="scroll-element_inner"></div>
                  <div class="scroll-bar"></div>
                </div>
              </div>
            </div>
            <div id="country"  class="box-1">
              <div class="scroll-container">
                <div class="left">
                  <ul>
                    <li><a href="#"><img src="style/content/flag-icons/Afghanistan.png" alt="Flag" height="24" width="24"/>Afghanistan<span>(7)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/African%20Union.png" alt="Flag" height="24" width="24"/>African Union<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Aland.png" alt="Flag" height="24" width="24"/>Aland<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Albania.png" alt="Flag" height="24" width="24"/>Albania<span>(7)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Alderney.png" alt="Flag" height="24" width="24"/>Alderney<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Algeria.png" alt="Flag" height="24" width="24"/>Algeria<span>(4)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/American%20Samoa.png" alt="Flag" height="24" width="24"/>American Samoa<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Andorra.png" height="24" alt="Flag" width="24"/>Andorra<span>(5)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Angola.png" alt="Flag" height="24" width="24"/>Angola<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Anguilla.png" alt="Flag" height="24" width="24"/>Anguilla<span>(8)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Antarctica.png" alt="Flag" height="24" width="24"/>Antarctica<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Antigua%20Barbuda.png" alt="Flag" height="24" width="24"/>Antigua &amp; Barbuda<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Arab%20League.png" alt="Flag" height="24" width="24"/>Arab League<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Argentina.png" alt="Flag" height="24" width="24"/>Argentina<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Armenia.png" alt="Flag" height="24" width="24"/>Armenia<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Aruba.png" alt="Flag" height="24" width="24"/>Aruba<span>(8)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/ASEAN.png" alt="Flag" height="24" width="24"/>ASEAN<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Afghanistan.png" alt="Flag" height="24" width="24"/>Afghanistan<span>(7)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/African%20Union.png" alt="Flag" height="24" width="24"/>African Union<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Aland.png" alt="Flag" height="24" width="24"/>Aland<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Albania.png" alt="Flag" height="24" width="24"/>Albania<span>(7)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Alderney.png" alt="Flag" height="24" width="24"/>Alderney<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Algeria.png" alt="Flag" height="24" width="24"/>Algeria<span>(4)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/American%20Samoa.png" alt="Flag" height="24" width="24"/>American Samoa<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Andorra.png" alt="Flag" height="24" width="24"/>Andorra<span>(5)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Angola.png" alt="Flag" height="24" width="24"/>Angola<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Anguilla.png" alt="Flag" height="24" width="24"/>Anguilla<span>(8)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Antarctica.png" alt="Flag" height="24" width="24"/>Antarctica<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Antigua%20Barbuda.png" alt="Flag" height="24" width="24"/>Antigua &amp; Barbuda<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Arab%20League.png" alt="Flag" height="24" width="24"/>Arab League<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Argentina.png" alt="Flag" height="24" width="24"/>Argentina<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Armenia.png" alt="Flag" height="24" width="24"/>Armenia<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Aruba.png" alt="Flag" height="24" width="24"/>Aruba<span>(8)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/ASEAN.png" alt="Flag" height="24" width="24"/>ASEAN<span>(3)</span></a></li>
                  </ul>
                </div>
                <div class="right">
                  <ul>
                    <li><a href="#"><img src="style/content/flag-icons/Kenya.png" alt="Flag" height="24" width="24"/>Kenya<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kiribati.png" alt="Flag" height="24" width="24"/>Kiribati<span>(4)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kosovo.png" alt="Flag" height="24" width="24"/>Kosovo<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kuwait.png" alt="Flag" height="24" width="24"/>Kuwait<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kyrgyzstan.png" alt="Flag" height="24" width="24"/>Kyrgyzstan<span>(1)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Laos.png" alt="Flag" height="24" width="24"/>Laos<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Latvia.png" alt="Flag" height="24" width="24"/>Latvia<span>(4)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Lebanon.png" alt="Flag" height="24" width="24"/>Lebanon<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Lesotho.png" alt="Flag" height="24" width="24"/>Lesotho<span>(5)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Liberia.png" alt="Flag" height="24" width="24"/>Liberia<span>(7)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Libya.png" alt="Flag" height="24" width="24"/>Libya<span>(1)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Liechtenstein.png" alt="Flag" height="24" width="24"/>Liechtenstein<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Lithuania.png" alt="Flag" height="24" width="24"/>Lithuania<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Luxembourg.png" alt="Flag" height="24" width="24"/>Luxembourg<span>(8)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Macao.png" alt="Flag" height="24" width="24"/>Macao<span>(5)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Macedonia.png" alt="Flag" height="24" width="24"/>Macedonia<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Madagascar.png" alt="Flag" height="24" width="24"/>Madagascar<span>(1)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kenya.png" alt="Flag" height="24" width="24"/>Kenya<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kiribati.png" alt="Flag" height="24" width="24"/>Kiribati<span>(4)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kosovo.png" alt="Flag" height="24" width="24"/>Kosovo<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kuwait.png" alt="Flag" height="24" width="24"/>Kuwait<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Kyrgyzstan.png" alt="Flag" height="24" width="24"/>Kyrgyzstan<span>(1)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Laos.png" alt="Flag" height="24" width="24"/>Laos<span>(3)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Latvia.png" alt="Flag" height="24" width="24"/>Latvia<span>(4)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Lebanon.png" alt="Flag" height="24" width="24"/>Lebanon<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Lesotho.png" alt="Flag" height="24" width="24"/>Lesotho<span>(5)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Liberia.png" alt="Flag" height="24" width="24"/>Liberia<span>(7)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Libya.png" alt="Flag" height="24" width="24"/>Libya<span>(1)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Liechtenstein.png" alt="Flag" height="24" width="24"/>Liechtenstein<span>(6)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Lithuania.png" alt="Flag" height="24" width="24"/>Lithuania<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Luxembourg.png" alt="Flag" height="24" width="24"/>Luxembourg<span>(8)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Macao.png" alt="Flag" height="24" width="24"/>Macao<span>(5)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Macedonia.png" alt="Flag" height="24" width="24"/>Macedonia<span>(2)</span></a></li>
                    <li><a href="#"><img src="style/content/flag-icons/Madagascar.png" alt="Flag" height="24" width="24"/>Madagascar<span>(1)</span></a></li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
              <div class="external-scroll_y">
                <div class="scroll-element_outer">
                  <div class="scroll-element_size"></div>
                  <div class="scroll-element_inner"></div>
                  <div class="scroll-bar"></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

<?php

require_once(CONTROLLERS.'/projet/projet.php');

// @TODO mettre uniquement les projets terminé
$projets = Projet::get_projet();

$typeNotif = $_SESSION['typeNotif'];
$titreNotif = $_SESSION['titreNotif'];
$msgNotif = $_SESSION['msgNotif'];
$_SESSION['typeNotif'] = "";
$_SESSION['titreNotif'] = "";
$_SESSION['msgNotif'] = "";

$notification = notifications($typeNotif, $titreNotif, $msgNotif);

echo $notification;

?>

        <div class="clear"></div>
        <!--Derniers Projets Block-->
        <div id="latest-job">
          <div class="heading-l">
            <h2> Derniers Projets </h2>
          </div>
          <div class="latest-job-wrapper">
            <div class="block-content dott-flexslider box-1">
              <ul class="slides">
              <?php

              foreach ($projets as $projet)
              {
                  ?>
                    <li>
                      <div class="company-logo"><a href="#"><img src="style/images/job-thumb.jpg"  alt=""/></a>
                        <div class="nav-buttons">
                          <ul>
                            <li class="search"><a><i class="fa fa-search"></i></a></li>
                            <li class="link"><a href="job.html"><i class="fa fa-link"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="company-text">
                        <div class="title"><a href="#"><?php echo $projet['titreProjet']; ?></a>
                          <div class="location">Mettre nom entreprise</div>
                        </div>
                        <div class="description"><?php echo $projet['descriptionProjet']; ?> <a>Voir +</a></div>
                      </div>
                    </li>
                  <?php
              }

              ?>
              </ul>
            </div>
          </div>
        </div>
        <!--/Derniers Projets Block-->
        <div class="clear"></div>

        <?php
        require_once(CONTROLLERS.'/entreprise/entreprise.php');

        // @TODO mettre uniquement les projets terminé
        $entreprises = Entreprise::get_entreprise();
        if($entreprises > 1){
        ?>

        <!--Partenaires Block-->
        <div id="partners">
          <div class="heading-l">
            <h2> Nos Partenaires </h2>
          </div>
          <div class="block-content box-1">
            <section class="row-fluid">
              <ul class="partner-list span4">
              <?php
                foreach ($entreprises as $entreprise) {
                  ?>
                    <li><a href="#"><img src="style/images/client-logo.png"  alt=""/></a></li>
                  <?php
                }
              ?>
              </ul>
            </section>
          </div>
        </div>

        <?php } ?>

      <div class="clear"></div>
      <!-- Clear Line -->

    </div>
    <!-- /Content Inner -->

  </div>
</div>
<!-- /Content -->