<?php
if(is_array($_SESSION['lastForm']) && isset($_SESSION['lastForm']['submit']))
	$get_utilisateur = $_SESSION['lastForm'];
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Ajouter un utilisateur</div>
			</div>

			<div class="panel-body">
				<form method="POST" action="index.php?module=utilisateur&action=manage<?php if(!empty($_GET['type'])){ echo '&type='.$_GET['type']; }else{} ?><?php if(!empty($_GET['idUtilisateur'])){ echo '&idUtilisateur='.$_GET['idUtilisateur']; }else{} ?>" class="form-horizontal form-groups-bordered validate">

						<div class="form-group">
							<label class="col-sm-3 control-label">Identifiant</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="loginUtilisateur" value="<?php if(!empty($get_utilisateur['loginUtilisateur'])){ echo $get_utilisateur['loginUtilisateur']; }Else{echo "";}?>">
								<p>Il sera utilisé pour la connexion</p>
												</div></div>


						<div class="form-group">
							<label class="col-sm-3 control-label">Nom</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="nomUtilisateur" value="<?php if(!empty($get_utilisateur['nomUtilisateur'])){ echo $get_utilisateur['nomUtilisateur']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Prénom</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="prenomUtilisateur" value="<?php if(!empty($get_utilisateur['prenomUtilisateur'])){ echo $get_utilisateur['prenomUtilisateur']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Email</label>
							<div class="col-sm-5">
								<input class="form-control" data-validate="email" required="required" type="text" name="emailUtilisateur" value="<?php if(!empty($get_utilisateur['emailUtilisateur'])){ echo $get_utilisateur['emailUtilisateur']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Telephone</label>
							<div class="col-sm-5">
								<input class="form-control" type="text" name="telUtilisateur" data-validate="maxlength[15]" value="<?php if(!empty($get_utilisateur['telUtilisateur'])){ echo $get_utilisateur['telUtilisateur']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Biographie</label>
							<div class="col-sm-5">
								<textarea class="form-control autogrow" name="bioUtilisateur"><?php if(!empty($get_utilisateur['bioUtilisateur'])){ echo $get_utilisateur['bioUtilisateur']; }Else{echo "";}?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Role</label>
							<div class="col-sm-5">
								<?php Liste::Role($get_utilisateur['roleUtilisateur']); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Certification</label>

							<div class="col-sm-5">
								<div class="make-switch">
								    <input name="certifUtilisateur" type="checkbox" <?php if($get_utilisateur['certifUtilisateur'] == "1"){ echo "checked='checked'"; }?> >
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Mot de passe</label>
							<div class="col-sm-5">

								<?php if(!empty($_GET['idUtilisateur']))
								{ echo '<input type="text" class="form-control" disabled 	name="passUtilisateur" value="">';} else
								{ echo '<input type="text" class="form-control" required="required" name="passUtilisateur" value="">';}
								?>
								<p>Seul l'utilisateur peux modifier son mot de passe.</p>
							</div>
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