
<!-- Content -->
<div id="content">
  <div id="title">
    <h1 class="inner title-2">Modifier<span> mon Portfolio</span>
      <ul class="breadcrumb-inner">
        <li> <a href="index.html">Accueil</a></li>
      </ul>
    </h1>
  </div>
  <div class="inner">

    <!-- Content Inner -->
    <div class="content-inner candidate-list">
<?php
  require_once('admin/controllers/utilisateur/utilisateur.php');
  $info_designer = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
  $compte_soundcloud = Utilisateur::get_compte_soundcloud($idUtilisateur=$_SESSION['idUtilisateur']);
  $designer_img = Utilisateur::get_designer_img($idUtilisateur=$_SESSION['idUtilisateur']);
?>
<?php if ($designer_img <> ''): ?>       
   <img height="150" width="150" src="style/designer_img/<?php echo $designer_img;?>">
<?php endif; ?>  
    
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="index.php?module=utilisateur&action=manage&type=modifier_designer_img<?php if(!empty($info_designer['idUtilisateur'])){ echo '&idUtilisateur='.$info_designer['idUtilisateur']; }else{} ?>">

       <div id="legend">
           <legend class=""><h2>Ajouter votre photo</h2></legend><br />
       </div>
       <p>Telechargez une photo pour l'ajouter à votre portfolio.</p>
       <p>Extension possible: "jpeg", "jpg", "gif", "png"</p>
       <p>Taille max: 10Mo</p>
       <br />
       <div class="control-group">
           <label class="control-label" for="maphoto">Ma photo</label>
           <div class="controls">
            <div style="position:relative;">
              <a class='btn btn-primary' href='javascript:;'>
                  Choisir un fichier...
                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="maphoto" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
              </a>
            </div>
           </div>
       </div>
          <div class="control-group">
         <!-- Button -->
         <div class="controls">
           <button class="btn btn-success">Confirmer</button>
         </div>
       </div>
   </form> 
      
<!--    <fieldset>
    <div id="legend">
      <legend class=""><h2>Ajouter un lien</h2></legend><br />
    </div>
    <p>Saisissez un lien et un type de lien pour l'ajouter à votre portfolio.</p>
    <p>Exemple pour une vidéo youtube : "https://www.youtube.com/watch?v=Jrm5"</p>
    <br />
    <div class="control-group">
      <label class="control-label" for="urlLinkAdd">URL</label>
      <div class="controls">
        <input type="text" id="urlLinkAdd" name="urlLinkAdd" placeholder="" class="input-xlarge">
      </div>
    </div>
    <div class="control-group">
       Creer une liste déroulante 
      <label class="control-label" for="typeLinkAdd">Type</label>
      <div class="controls">
        <input type="text" id="typeLinkAdd" name="typeLinkAdd" placeholder="" class="input-xlarge">
      </div>
    </div>
  </fieldset>-->
  <br />
<?php if ($compte_soundcloud <> ''): ?>
     <fieldset>
    <div id="legend">
      <legend class=""><h2>Voir votre compte externe</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <a href="index.php?module=DesignerPlaylist&action=DesignerPlaylist" title="Voir votre compte externe"><img src="style/images/picto_soundcloud.png"></a>
        </div>
      </div>
      <br/>
  </fieldset> 
<?php else: ?>
      <fieldset>
    <div id="legend">
      <legend class=""><h2>Ajouter un compte externe</h2></legend><br />
    </div>
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <a href="index.php?module=soundcloud&action=soundcloud" title="Connecter avec un compte Soundcloud"><img src="style/images/btn-connect-sc-l.png"></a>
        </div>
      </div>
      <br/>
  </fieldset>

        
<?php endif; ?>
    </div>
    <!-- /Content Inner -->

  </div>
</div>

<!-- /Content -->

