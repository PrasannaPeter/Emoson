<?php

// On charge les fichiers néccéssaires
require_once('core/init.php');
require_once('admin/controllers/utilisateur/utilisateur.php');

unset($msgNotif);

if(empty($_POST['login']) OR empty($_POST['password']))
{
	$msgNotif = "Vous devez saisir un nom d'utilisateur et un mot de passe";
}
elseif(!empty($_POST['login']) AND !empty($_POST['password']))
{
	// On verifie la connexion
	$login = $_POST['login'];
	$password = $_POST['password'];

	$connect = Utilisateur::connexion($login, $password, $type=NULL);

	$msgNotif = $connect['msgNotif'];
}

require_once('index.php');

?>
<script type="text/javascript">
$(document).ready(function()
{
	$('#loginModal').modal('toggle');
	$('.modal-header h3').text("<?php echo($msgNotif); ?>");
	$('.modal-header h3').css("color", "red");
});
</script>