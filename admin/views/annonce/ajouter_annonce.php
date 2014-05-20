<?php
if (isset($_SESSION['lastForm']['submit']))
{
	if(is_array($_SESSION['lastForm']) && $_SESSION['lastForm']['submit'])
	{
		$get_annonce = $_SESSION['lastForm'];
	}
}

?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Ajouter une annonce</div>
			</div>

			<div class="panel-body">
				<form method="POST" action="index.php?module=annonce&action=manage<?php if(!empty($_GET['type'])){ echo '&type='.$_GET['type']; }else{} ?><?php if(!empty($_GET['id'])){ echo '&id='.$_GET['id']; }else{} ?>" class="form-horizontal form-groups-bordered">
					<div class="form-group">
						<label class="col-sm-3 control-label">Titre</label>
						<div class="col-sm-5">
							<input class="form-control" required="required" type="text" name="titre" value="<?php if(!empty($get_annonce['titre'])){ echo $get_annonce['titre']; }Else{echo "";}?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Contenu</label>
						<div class="col-sm-5">
							<textarea class="form-control autogrow" required="required" name="content"><?php if(!empty($get_annonce['content'])){ echo $get_annonce['content']; }Else{echo "";}?></textarea>
						</div>
					</div>

					<div class="form-group">
		<textarea class="form-control wysihtml5" name="sample_wysiwyg" id="sample_wysiwyg"></textarea>
	</div>


					</br></br>
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

<link rel="stylesheet" href="assets/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">
<script src="assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
<script src="assets/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>

