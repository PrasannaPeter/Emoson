<?php
if(is_array($_SESSION['lastForm']) && $_SESSION['lastForm']['submit'])
	$get_entreprise = $_SESSION['lastForm'];
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Ajouter une entreprise</div>
			</div>

			<div class="panel-body">
				<form method="POST" action="index.php?module=entreprise&action=manage<?php if(!empty($_GET['type'])){ echo '&type='.$_GET['type']; }else{} ?><?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur']; }else{} ?>" class="form-horizontal form-groups-bordered">

						<div class="form-group">
							<label class="col-sm-3 control-label">Raison sociale</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="raisonSocialeEntreprise" value="<?php if(!empty($get_entreprise['raisonSocialeEntreprise'])){ echo $get_entreprise['raisonSocialeEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Statut juridique</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="typeEntreprise" value="<?php if(!empty($get_entreprise['typeEntreprise'])){ echo $get_entreprise['typeEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Secteur d'activité</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="secteurEntreprise" value="<?php if(!empty($get_entreprise['secteurEntreprise'])){ echo $get_entreprise['secteurEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Site Web</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="siteWebEntreprise" value="<?php if(!empty($get_entreprise['siteWebEntreprise'])){ echo $get_entreprise['siteWebEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Num Siret</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="numSiretEntreprise" value="<?php if(!empty($get_entreprise['numSiretEntreprise'])){ echo $get_entreprise['numSiretEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Adresse</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="adresseEntreprise" value="<?php if(!empty($get_entreprise['adresseEntreprise'])){ echo $get_entreprise['adresseEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Ville</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="villeEntreprise" value="<?php if(!empty($get_entreprise['villeEntreprise'])){ echo $get_entreprise['villeEntreprise']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Code postal</label>
							<div class="col-sm-5">
								<input class="form-control" type="text" name="CPEntreprise" value="<?php if(!empty($get_entreprise['CPEntreprise'])){ echo $get_entreprise['CPEntreprise']; }Else{echo "";}?>">
							</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
								<button class="btn btn-default" type="submit" name="submit" value="ok">Confirmer</button>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</div>