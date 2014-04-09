<?php
// verif connexion

/*<!-- Si designer : afficher profil/portfolio
Sinon si entreprise : afficher les projets en cours -->*/
if(is_connected()){
    if($_SESSION['roleUtilisateur'] == "GRAPHISTE")
        require_once('views/dashboard/dashboard_graphiste.php');
    elseif($_SESSION['roleUtilisateur'] == "ENTREPRISE")
        require_once('views/dashboard/dashboard_entreprise.php');
    else{ // edbug
    echo "NO ROLE";
    var_dump($_SESSION['roleUtilisateur']);
    var_dump($_SESSION['loginUtilisateur']);
        require_once('views/dashboard/dashboard_entreprise.php');
    }

}else{
    require_once('views/dashboard/error.php');
}

?>