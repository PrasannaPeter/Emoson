# EmoSon

Suivi de projet : https://docs.google.com/spreadsheets/d/1Mxm2A_iz4HtQYoLjS0pbDeKJ5rAfN5cVXhMP0RAFiEU/edit#gid=1973046620


=======
## Mise en place du projet

Import db from /etc in phpMyAdmin : db name "emoson"

Take a look in the wiki and in the bugtracker



=======
## Utilisation 

The file /code/debug.php contains a method "dump" : you can use it like this

<?php dump($test); ?>

Cela permet d'afficher proprement et en couleur un array/object avec print_r et var_dump. (Comme dans Zend_Debug)



# Utilisation de git

Perso je fais en ligne de commande
Certains utilisent SourceTree
Ou Git GUI
Ou leurs IDE

A vous de voir, il vous faudra "cloner" le depot, via SSH (cela evitera de retapper le mdp de son compte) ou HTTPS.


Petit résumé des lignes de commandes :
Git clone ssh://... => cloner le depot
Git pull => met a jour le code local
Git commit -am "message" => "Enregistrer" ses modifications (il faut le faire souvent et mettre des noms explicite)
Normalement on commit a chaque fonction modifié etc ...
A la fin, git push .. pour envoyer sur le depot les modif (que tout le monde recuperera avec git pull)

Il peux y avoir des conflicts (merge/conflicts), j'écrirais prochainement dessus.
=======
Cela permet d'afficher proprement et en couleur un array/object avec print_r et var_dump.



## TODO 

Je vous invite à installer un logiciel pour utiliser le depot bitbucket.

Au choix : 

* Ligne de commande pour mac / linux : sudo apt-get install git

* Ligne de commande pour windows : Git bash

* Logiciel mac / windows : Source tree (je recommande)

Voila, y'en à bien d'autre, à vous de juger...


* Il vous faut cloner le depot sur votre ordinateur avec le logiciel

* Quand vous faites des modifications sur le code : vous commitez

(A noter, vous pouvez préciser les tâches concernées dans les message des commits comme ceci : "#3 classe finie, il reste plus que le formulaire", ou encore "close ticket #3 fonctionne normalement" pour fermer le ticket automatiquement)

* Pour envoyer vos modifications au serveurs : "Push", pour les récupérer "Pull"

### J'aimerais que vous configuriez / essayer ceci au plus vite afin d'avoir le temps d'aider si éventuellement vous avez un problème, notamment pour les conflits/merge que nous verrons plus tard.