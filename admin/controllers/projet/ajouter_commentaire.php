<?php

require_once(CONTROLLERS.'commentaire/commentaire.php');

if(!empty($_POST['idProjet']) && !empty($_POST['idUtilisateur']) &&!empty($_POST['commentaire'])){
    $set_commentaire = Commentaire::set_commentaire($_POST['idProjet'], $_POST['idUtilisateur'], $_POST['commentaire']);

    if($set_commentaire)
    {
        $_SESSION['typeNotif'] = "success";
        $_SESSION['titreNotif'] = "Le commentaire a bien été ajouté";
        header('Location:index.php?module=projet&action=voir_page_projet&idProjet='.$_POST['idProjet']);
    }
    else
    {
        $_SESSION['typeNotif'] = "error";
        $_SESSION['titreNotif'] = "Le commentaire n'a pas été ajouté à l'application";
        header('Location:index.php?module=projet&action=voir_page_projet&idProjet='.$_POST['idProjet']);
    }
}