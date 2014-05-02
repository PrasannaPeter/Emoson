<!-- Content -->
<div id="content">
<div id="title">
  <h1 class="inner title-2">Partenaires
    <ul class="breadcrumb-inner">
      <li> <a href="index.html">Accueil</a></li>
      <li> <a href="partners.html">Partenaires</a></li>
    </ul>
  </h1>
</div>
<div class="inner">
  <div class="content-inner">
<!--
    <div id="search-and-sort" class="box-1 search-bar-partner">
      <div id="search-partner">
        <form id="search-partner-form" action="http://uouapps.com/careers/post">
          <input type="text" placeholder="Search for Partenaires" class="textfield-with-callback"/>
          <div id="sort-partner" class="sort-Industry">
            <select class="select">
              <option selected="selected" value="nothing">- Select Industry-</option>
              <option value="sorting criteria 1">Sorting Criteria 1</option>
              <option value="sorting criteria 2">Sorting Criteria 2</option>
              <option value="sorting criteria 3">Sorting Criteria 3</option>
              <option value="sorting criteria 4">Sorting Criteria 4</option>
              <option value="sorting criteria 5">Sorting Criteria 5</option>
            </select>
          </div>
          <input id="search-submit" type="submit" value="Search">

           <div id="page-partners">
        <select class="select">
          <option selected="selected" value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
      </div>
      <div id="sort-partner">
        <select class="select">
          <option selected="selected" value="nothing">- Sort By -</option>
          <option value="sorting criteria 1">Sorting Criteria 1</option>
          <option value="sorting criteria 2">Sorting Criteria 2</option>
          <option value="sorting criteria 3">Sorting Criteria 3</option>
          <option value="sorting criteria 4">Sorting Criteria 4</option>
          <option value="sorting criteria 5">Sorting Criteria 5</option>
        </select>
      </div>
        </form>
      </div>

    </div>
 -->
    <!-- Content Inner -->

<?php
require_once(CONTROLLERS."projet/projet.php");
// @TODO : uniquement en cours / terminés
$projets = Projet::get_projet();

if(count($projets)){
    ?>

    <div class="content-inner">
      <div id="our-partners">

        <?php
        foreach ($projets as $projet) {
        ?>
        <div class="partner">
          <div class="partner-thumb"> <a href="#"><img class="part-img" src="style/images/partner-1.jpg"  alt="Partner"/></a>
            <div class="partner-hover">
              <h4>NomEntreprise</h4>
              <p>Texte a mettre.</p>
            </div>
          </div>
          <div class="partners-meta">
            <div class="nav-buttons">
              <ul>
                <li class="search"><a><img src="style/images/p-zoom.png"  alt=""/></a></li>
                <li class="link"><a href="job.html"><img src="style/images/p-zoom-02.png"  alt=""/></a></li>
              </ul>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <div class="clear"></div>
    </div>
<?php
}else{
    ?>
    <p>Aucun projet.</p>
    <?php
} ?>
  </div>
</div>
</div>
<!-- /Content -->
