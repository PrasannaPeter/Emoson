<?php

if(!empty($_GET['idEntreprise']))
{

	// Inclus les classes néccéssaires
	require_once('controllers/type_entreprise/type_entreprise.php');
	require_once('controllers/projet/projet.php');

	// Récupère les details de l'entreprise
	$idEntreprise = $_GET['idEntreprise'];

	$get_entreprise = Entreprise::get_entreprise($idEntreprise, $sujetTicket=NULL, $type=NULL);

	$get_type_entreprise_req = Type_Entreprise::get_type_entreprise($typeEntreprise_Entreprise, $libType_Entreprise=NULL, $type=NULL);
	$get_type_entreprise = $get_type_entreprise_req->fetch();


	// Récupère l'ID du dernier projet

	$get_last_projet_req = Projet::get_last_projet_entreprise($idEntreprise);

	$idProjet = $get_last_projet_req['MAX(idProjet)'];


	// Récupère information du contact par rapport a l'ID du dernier projet

	$get_info_contact = Projet::get_projet($idProjet, $libProjet=NULL, $type=NULL);

	?>

<article class="content-box minimizer col-2 clear-rm">
	<header>
		<h2>Detail de l'organisation N°<?php echo $_GET['idEntreprise']; ?></h2>
		<nav>
			<ul class="button-switch">
				<li><a class="button blue" href="index.php?module=entreprise&action=manage&type=modifier&idEntreprise=<?php echo $get_entreprise['idEntreprise']; ?>">Editer</a></li>
			</ul>
		</nav>
	</header>
	<section>

		<center><h1><?php echo $get_entreprise['raisonSocialeEntreprise']; ?></h1></center>
		<br />

		<fieldset>
			<legend>Statut Juridique</legend>
			<h5><?php echo $get_type_entreprise['libType']; ?></h5>
		</fieldset>

		<fieldset>
			<legend>Secteur</legend>
			<h5><?php echo $get_entreprise['secteurEntreprise']; ?></h5>
		</fieldset>

		<fieldset>
			<legend>Site Internet</legend>
			<h5><?php echo $get_entreprise['siteWebEntreprise']; ?></h5>
		</fieldset>

		<fieldset>
			<legend>Adresse</legend>
			<h5><?php echo $get_entreprise['adresseEntreprise']; ?></h5>
			<h5><?php echo $get_entreprise['CPEntreprise'].', '.$get_entreprise['villeEntreprise']; ?></h5>
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

						Ces informations sont celles du contact correspondant au dernier projet effectué dans cette entreprise.

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