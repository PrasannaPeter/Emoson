<?php

// On inclus le modèle néccéssaire
require_once MODELS.'M_Commentaire.php';

class Commentaire
{
    // Function relative aux Commentaires

    static function get_commentaire($idProjet)
    {
        // Si on a un ID
        if(!empty($idProjet))
            $get_commentaire = M_Commentaire::get_commentaire($idProjet);

        return $get_commentaire;
    }

    static function set_commentaire($idProjet, $idUtilisateur, $commentaire){
        if(!empty($idProjet) && !empty($commentaire) && !empty($idUtilisateur)){
            $set_commentaire = M_Commentaire::set_commentaire($idProjet, $idUtilisateur, $commentaire);
        }

        return $set_commentaire;
    }
}