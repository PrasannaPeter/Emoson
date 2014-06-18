
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
       <p>Extension possible: "jpeg", "jpg", "gif"</p>
       <p>Taille max: 1000000</p>
       <br />
       <div class="control-group">
           <label class="control-label" for="maphoto">Ma photo</label>
           <div class="controls">
               <input type="file" id="urlLinkAdd" name="maphoto" placeholder="" class="input-xlarge">
           </div>
       </div>
          <div class="control-group">
         <!-- Button -->
         <div class="controls">
           <button class="btn btn-success">Confirmer</button>
         </div>
       </div>
   </form> 
      
  <br />
<?php if ($compte_soundcloud <> ''): ?>
     <fieldset>
    <div id="legend">
      <legend class=""><h2>Votre compte :</h2></legend><br />
    </div>
      <div class="control-group">
        <div class="controls">
            <a href="index.php?module=utilisateur&action=manage&type=deleteCompteSoundcloud<?php if(!empty($info_designer['idUtilisateur'])){ echo '&idUtilisateur='.$info_designer['idUtilisateur']; }else{} ?>"<button class="btn btn-danger btn-large"><i class="icon-white icon-trash"> </i> supprimer votre compte soundcloud</button></a>
         
        </div>
      </div>
       <?php 
            $tracks_json = file_get_contents('http://api.soundcloud.com/users/'.$compte_soundcloud.'/tracks.json?client_id=e81b2e10ea9abad8f48cbef75335b0ef');
             $tracks = json_decode($tracks_json);
             foreach ($tracks as $track){
               $trackID = $track->id;
               echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$trackID.'"></iframe>';
             }
        ?>
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
          <a href="index.php?module=soundcloud&action=voirCompteSoundcloud" title="Connecter avec un compte Soundcloud"><img src="style/images/btn-connect-sc-l.png"></a>
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

