<?php

if(!empty($_GET['idPack']))
{

	// Inclus les classes néccéssaires
	require_once('controllers/type_pack/type_pack.php');
	require_once('controllers/projet/projet.php');

	// Récupère les details de l'pack
	$idPack = $_GET['idPack'];

	$get_pack = Pack::get_pack($idPack, $sujetTicket=NULL, $type=NULL);

	$get_type_pack_req = Type_Pack::get_type_pack($typePack_Pack, $libType_Pack=NULL, $type=NULL);
	$get_type_pack = $get_type_pack_req->fetch();


	// Récupère l'ID du dernier projet

	$get_last_projet_req = Projet::get_last_projet_pack($idPack);

	$idProjet = $get_last_projet_req['MAX(idProjet)'];


	// Récupère information du contact par rapport a l'ID du dernier projet

	$get_info_contact = Projet::get_projet($idProjet, $libProjet=NULL, $type=NULL);

	?>

<article class="content-box minimizer col-2 clear-rm">
	<header>
		<h2>Detail de l'organisation N°<?php echo $_GET['idPack']; ?></h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button blue" href="index.php?module=pack&action=manage&type=modifier&idPack=<?php echo $get_pack['idPack']; ?>">Editer</a></li>
			</ul>
		</nav>
	</header>
	<section>

		<center><h1><?php echo $get_pack['titrePack']; ?></h1></center>
		<br />

		<fieldset>
			<legend>Statut Juridique</legend>
			<h5><?php echo $get_type_pack['libType']; ?></h5>
		</fieldset>

		<fieldset>
			<legend>Secteur</legend>
			<h5><?php echo $get_pack['descPack']; ?></h5>
		</fieldset>

		<fieldset>
			<legend>Site Internet</legend>
			<h5><?php echo $get_pack['prixPack']; ?></h5>
		</fieldset>

		<fieldset>
			<legend>Adresse</legend>
			<h5><?php echo $get_pack['adressePack']; ?></h5>
			<h5><?php echo $get_pack['CPPack'].', '.$get_pack['villePack']; ?></h5>
		</fieldset>


	</section>
</article>


			<article class="content-box minimizer col-2 clear-rm">
				<header>
					<h2>Information du Contact</h2>
				</header>
				<section>
				<?php
					if(!empty($get_info_contact))
					{
						?>
						<br />

						Ces informations sont celles du contact correspondant au dernier projet effectué dans cette pack.

						<br /><br /><br />

						<fieldset>
							<legend>Nom</legend>
							<h5><?php echo $get_info_contact['prenomContact'].' '.$get_info_contact['nomContact']; ?></h5>
						</fieldset>

						<br /><br />

						<fieldset>
							<legend>Email</legend>
							<h5><?php echo $get_info_contact['emailContact']; ?></h5>
						</fieldset>

						<br /><br />

						<fieldset>
							<legend>N° Telephone</legend>
							<h5><?php echo $get_info_contact['telContact']; ?></h5>
						</fieldset>

						<br />

					<?php
					}
					else
					{
					?>
					<br /><br /><br /><br /><br /><br /><br /><br /><br />
					<center><h4>Aucune information disponible</h4></center>
					<br /><br /><br /><br /><br /><br /><br /><br /><br />
					<?php
					}
					?>


				</section>

				</article>

				<div class="clearfix"></div>

				<article class="content-box minimizer">
					<header>
						<h2>Liste des projets</h2>
					</header>
					<section>
						<?php
							if(!empty($get_projet))
							{
								?>



								<?php
							}
							else
							{
								?><center><h4>Aucun projet pour cette organisation</h4></center><?php
							}
						?>
					</section>
				</article>

<?php
}
else
{
	?>
				<article class="content-box minimizer">
					<header>
						<h2>Utilisateurs</h2>
					</header>
					<section>
						<center><h4>Aucune organisation ne possède cet identifiant.</h4></center>
					</section>
				</article>
	<?php
}