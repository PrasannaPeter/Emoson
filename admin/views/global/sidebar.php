
<div class="page-container">

<div class="sidebar-menu">

        <header class="logo-env">

        <!-- logo -->
        <div class="logo">
            <a href="index.php">
                <img src="assets/images/logo.png" alt="" />
            </a>
        </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                <i class="entypo-menu"></i>
            </a>
        </div>


        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                <i class="entypo-menu"></i>
            </a>
        </div>

    </header>

    <ul id="main-menu" class="">
<!--         <li id="search">
            <form method="get" action="#">
                <input type="text" name="q" class="search-input" placeholder="Rechercher..." />
                <button type="submit"><i class="entypo-search"></i></button>
            </form>
         </li> -->

        <li class="opened active">
            <a href="index.php"><i class="entypo-home"></i><span>Tableau de bord</span></a>
        </li>

        <li>
            <a href=""><i class="entypo-users"></i><span>Utilisateurs</span></a>
            <ul>
                <li>
                    <a href="index.php?module=utilisateur&action=manage&type=ajouter"><i class="entypo-user-add"></i>
                    <span>Ajouter</span></a>
                </li>

                <li>
                    <a href="index.php?module=utilisateur&action=afficher_utilisateur"><i class="entypo-users"></i>
                    <span>Tous</span></a>
                </li>

                <li>
                    <a href="index.php?module=utilisateur&action=afficher_graphiste"><i class="entypo-note-beamed"></i>
                    <span>Designers</span></a>
                </li>

<!--                 <li>
                    <a href="index.php?module=utilisateur&action=afficher_entreprise"><i class="entypo-docs"></i>
                    <span>Entreprises</span></a>
                </li> -->

                <li>
                    <a href="index.php?module=utilisateur&action=afficher_contact"><i class="entypo-vcard"></i>
                    <span>Contacts</span></a>
                </li>

                <li>
                    <a href="index.php?module=utilisateur&action=afficher_enattente"><i class="entypo-bell"></i>
                    <span>Attente certification</span></a>
                </li>

                <li>
                    <a href="index.php?module=utilisateur&action=afficher_admin"><i class="entypo-tools"></i>
                    <span>Administrateurs</span></a>
                </li>

            </ul>
        </li>

       <li>
            <a href=""><i class="entypo-docs"></i><span>Projets</span></a>
            <ul>
                <li>
                    <a href="index.php?module=projet&action=manage&type=ajouter"><i class="entypo-plus"></i>
                    <span>Ajouter</span></a>
                </li>

                <li>
                    <a href="index.php?module=projet&action=afficher_projet"><i class="entypo-docs"></i>
                    <span>Tous</span></a>
                </li>

                <li>
                    <a href="index.php?module=projet&action=afficher_projet&type=encours"><i class="entypo-eye"></i>
                    <span>En cours</span></a>
                </li>

                <li>
                    <a href="index.php?module=projet&action=afficher_projet&type=enattente"><i class="entypo-clock"></i>
                    <span>En attentes</span></a>
                </li>

                <li>
                    <a href="index.php?module=projet&action=afficher_projet&type=termine"><i class="entypo-archive"></i>
                    <span>Terminés</span></a>
                </li>

            </ul>
        </li>

    <li>
            <a href=""><i class="entypo-docs"></i><span>Annonces</span></a>
            <ul>
                <li>
                    <a href="index.php?module=annonce&action=manage&type=ajouter"><i class="entypo-plus"></i>
                    <span>Ajouter</span></a>
                </li>

                <li>
                    <a href="index.php?module=annonce&action=afficher_annonce"><i class="entypo-docs"></i>
                    <span>Tous</span></a>
                </li>
            </ul>
        </li>


       <li>
            <a href=""><i class="entypo-doc"></i><span>Entreprises</span></a>
            <ul>
                <li>
                    <a href="index.php?module=entreprise&action=manage&type=ajouter"><i class="entypo-plus"></i>
                    <span>Ajouter</span></a>
                </li>

                <li>
                    <a href="index.php?module=entreprise&action=afficher_entreprise"><i class="entypo-docs"></i>
                    <span>Tous</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href=""><i class="entypo-doc"></i><span>Packs</span></a>
            <ul>
                <li>
                    <a href="index.php?module=pack&action=manage&type=ajouter"><i class="entypo-plus"></i>
                    <span>Ajouter</span></a>
                </li>

                <li>
                    <a href="index.php?module=pack&action=afficher_pack"><i class="entypo-docs"></i>
                    <span>Tous</span></a>
                </li>
            </ul>
        </li>
    </ul>

</div>