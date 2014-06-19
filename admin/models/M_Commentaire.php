<?php

class M_Commentaire extends Commentaire
{

    static function get_commentaire($idProjet)
    {
        $bdd = PDO();

        if(!empty($idProjet))
        {
            // retrive comments with post id
            $get_commentaire = $bdd->query(
              "SELECT *
              FROM commentaires
              WHERE idProjet = $idProjet
              ORDER BY dateCommentaire DESC
              LIMIT 15");
        }

        return $get_commentaire;
    }

    static function set_commentaire($idProjet, $idUtilisateur, $commentaire)
    {
        
        $dateCommentaire = time();
        
        $bdd = PDO();

        if(!empty($idProjet))
        {
            $commentaire = htmlentities($commentaire);

            $set_commentaire = $bdd->prepare("
              INSERT INTO commentaires
              (idUtilisateur, idProjet, dateCommentaire, texteCommentaire)
              VALUES(:idUtilisateur, :idProjet, :dateCommentaire, :commentaire)");

            $set_commentaire = $set_commentaire->execute(array(
                'idUtilisateur' => $idUtilisateur,
                'idProjet' => $idProjet,
                'dateCommentaire' => $dateCommentaire,
                'commentaire' => $commentaire
            ));
        }

        return $set_commentaire;
    }
}