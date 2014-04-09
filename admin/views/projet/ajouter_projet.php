<?php
if(is_array($_SESSION['lastForm']) && $_SESSION['lastForm']['submit'])
	$get_projet = $_SESSION['lastForm'];
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Ajouter un projet</div>
			</div>

			<div class="panel-body">
				<form method="POST" action="index.php?module=projet&action=manage<?php if(!empty($_GET['type'])){ echo '&type='.$_GET['type']; }else{} ?><?php if(!empty($_GET['idProjet'])){ echo '&idProjet='.$_GET['idProjet']; }else{} ?>" class="form-horizontal form-groups-bordered">

						<div class="form-group">
							<label class="col-sm-3 control-label">Titre</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="titreProjet" value="<?php if(!empty($get_projet['titreProjet'])){ echo $get_projet['titreProjet']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Description</label>
							<div class="col-sm-5">
								<textarea class="form-control autogrow" name="descriptionProjet"><?php if(!empty($get_projet['descriptionProjet'])){ echo $get_projet['descriptionProjet']; }Else{echo "";}?></textarea>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-3 control-label">Date de début</label>
							<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control datepicker" required="required" type="text" name="dateDebutProjet" value="<?php if(!empty($get_projet['dateDebutProjet'])){ echo $get_projet['dateDebutProjet']; }Else{echo "";}?>">
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Date de fin</label>
							<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control datepicker" required="required" type="text" name="dateFinProjet" value="<?php if(!empty($get_projet['dateFinProjet'])){ echo $get_projet['dateFinProjet']; }Else{echo "";}?>">
								<div class="input-group-addon">
									<a href="#"><i class="entypo-calendar"></i></a>
								</div>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Budget minimum</label>
							<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control" required="required" type="text" name="budgetMinProjet" value="<?php if(!empty($get_projet['budgetMinProjet'])){ echo $get_projet['budgetMinProjet']; }Else{echo "";}?>">
								<div class="input-group-addon">
									<a href="#"><i class="glyphicon-euro"></i></a>
								</div>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Budget maximum</label>
							<div class="col-sm-5">
							<div class="input-group">
								<input class="form-control" required="required" type="text" name="budgetMaxProjet" value="<?php if(!empty($get_projet['budgetMaxProjet'])){ echo $get_projet['budgetMaxProjet']; }Else{echo "";}?>">
								<div class="input-group-addon">
									<a href="#"><i class="glyphicon-euro"></i></a>
								</div>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Nombre de pistes</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="nbPistes" value="<?php if(!empty($get_projet['nbPistes'])){ echo $get_projet['nbPistes']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Actif ?</label>
							<div class="col-sm-5">
								<div class="checkbox">
								<input type="checkbox" name="isActiveProjet" value="<?php if($get_projet['isActiveProjet']){ echo $get_projet['isActiveProjet']; }Else{echo 0;}?>">
								</div>
							</div>
						</div>

						<hr>

						<h4>Information du contact</h4>

						<hr>

						Selection user a faire


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