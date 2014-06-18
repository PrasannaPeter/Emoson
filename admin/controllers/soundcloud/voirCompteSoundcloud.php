<?php
require 'connexionSoudcloud.php';
?>

<script>
SC.connect(function(){
    SC.get('/me', function(me) { 
            var idUser = me.id;
            if(idUser !== null){
                $('#soundcloudID').attr('value', idUser);
                $('#showForm').show();
            }else{
                 $('#showForm').hide();
            }

  });
  
    SC.get('/me/tracks', { limit: 1 }, function(tracks) {
    var track = tracks[0];
    alert(track.id);
  });
  
});
</script>

<?php
  require_once('admin/controllers/utilisateur/utilisateur.php');
  $info_designer = Utilisateur::get_utilisateur($idUtilisateur=$_SESSION['idUtilisateur'], $type=NULL);
?>
<div id="returnModifierPortfolio">
    <a class="btn btn-large btn-info" href="index.php?module=designer&action=modifier_portfolio" role="button"><i class="fa fa-music"></i> <span>Modifier portfolio</span></a>
</div>
<div id="showForm" style="display:none;">
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="index.php?module=utilisateur&action=manage&type=ajouter_compte_soundcloud<?php if(!empty($info_designer['idUtilisateur'])){ echo '&idUtilisateur='.$info_designer['idUtilisateur']; }else{} ?>"> 
        <div id="legend">
            <legend class=""><h2>La connexion avec Soundcloud a été reussi</h2></legend><br />
        </div>
        <p>Ajouter votre compte soundcloud?</p>
        <br />
           <input type="hidden" id="soundcloudID" name="soundcloudID" placeholder="" class="input-xlarge">   
      <br />
        <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success">Confirmer</button>
          </div>
        </div>
    </form>
</div>



