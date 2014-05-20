<?php

// changer la fonction utilisé (je pense que yass a deja fait)
if(!empty($_GET['idProjet']) && !empty($_GET['choixDesigner']) ){
    Projet::assigner_designer($_GET['idProjet'], $_GET['choixDesigner']);
}