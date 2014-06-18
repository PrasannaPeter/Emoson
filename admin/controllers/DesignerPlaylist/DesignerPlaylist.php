<?php
    require_once('admin/controllers/utilisateur/utilisateur.php');
    $idUtilisateur = $_SESSION['idUtilisateur'];
    $compte_soundcloud = Utilisateur::get_compte_soundcloud($idUtilisateur);
    $tracks_json = file_get_contents('http://api.soundcloud.com/users/'.$compte_soundcloud.'/tracks.json?client_id=e81b2e10ea9abad8f48cbef75335b0ef');
     $tracks = json_decode($tracks_json);
     foreach ($tracks as $track){
       $trackID = $track->id;
       echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F'.$trackID.'"></iframe>';
     }
?>