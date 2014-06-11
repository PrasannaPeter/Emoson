<?php
    require_once('admin/controllers/utilisateur/utilisateur.php');
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $compte_soundcloud = Utilisateur::get_compte_soundcloud($idUtilisateur);
?>
<form>
    <input type="hidden" id="id" value="<?php echo $compte_soundcloud;?>">
</form>


<script type="text/javascript">
    
    var idS = document.getElementById("id").value;
    var location = "https://w.soundcloud.com/player/?url=http://api.soundcloud.com/users/"+idS;
    document.getElementById("sc-widget").src=location;
    document.getElementById("divIframe").style.display='block';
</script>           


<div id="divIframe" style="display:none">
    <iframe id="sc-widget" src="https://w.soundcloud.com/player/?url=http://api.soundcloud.com/users/" width="100%" height="465" scrolling="no" frameborder="no"></iframe>
    <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
    <script type="text/javascript">
      (function(){
        var widgetIframe = document.getElementById('sc-widget'),
            widget       = SC.Widget(widgetIframe);

        widget.bind(SC.Widget.Events.READY, function() {
          widget.bind(SC.Widget.Events.PLAY, function() {
            // get information about currently playing sound
            widget.getCurrentSound(function(currentSound) {
              console.log('sound ' + currentSound.get('') + 'began to play');
            });
          });
          // get current level of volume
          widget.getVolume(function(volume) {
            console.log('current volume value is ' + volume);
          });
          // set new volume level
          widget.setVolume(50);
          // get the value of the current position
        });

      }());
    </script>
</div>




