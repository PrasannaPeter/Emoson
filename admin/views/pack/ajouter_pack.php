<?php
if(is_array($_SESSION['lastForm']) && $_SESSION['lastForm']['submit'])
	$get_pack = $_SESSION['lastForm'];
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Ajouter un pack</div>
			</div>

			<div class="panel-body">
				<form method="POST" action="index.php?module=pack&action=manage<?php if(!empty($_GET['type'])){ echo '&type='.$_GET['type']; }else{} ?><?php if(!empty($_GET['idPack'])){ echo '&idPack='.$_GET['idPack']; }else{} ?>" class="form-horizontal form-groups-bordered validate">

						<div class="form-group">
							<label class="col-sm-3 control-label">Titre</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" type="text" name="titrePack" value="<?php if(!empty($get_pack['titrePack'])){ echo $get_pack['titrePack']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Description</label>
							<div class="col-sm-5">
								<textarea class="form-control autogrow" required="required" name="descPack"><?php if(!empty($get_projet['descPack'])){ echo $get_projet['descPack']; }Else{echo "";}?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Prix</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" data-validate="maxlength[20]" type="text" name="prixPack" value="<?php if(!empty($get_pack['prixPack'])){ echo $get_pack['prixPack']; }Else{echo "";}?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Position</label>
							<div class="col-sm-5">
								<input class="form-control" required="required" data-validate"number" type="number" name="positionPack" value="<?php if(!empty($get_pack['positionPack'])){ echo $get_pack['positionPack']; }Else{echo "";}?>">
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