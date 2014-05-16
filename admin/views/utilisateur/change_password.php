<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Changer de mot de passe</div>
			</div>

			<div class="panel-body">
				<form action="index.php?module=utilisateur&action=change_password" method="post" />
					<div class="form-group">
						<label class="col-sm-3 control-label">Ancien mot de passe :</label>
						<div class="col-sm-5">
							<input class="form-control" required="required" type="text" name="old_password" value="">
						</div>
					</div>
<br>
<br>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nouveau mot de passe :</label>
						<div class="col-sm-5">
							<input class="form-control" required="required" type="text" name="new_password" value="">
						</div>
					</div>
<br>
<br>
					<div class="form-group">
						<label class="col-sm-3 control-label">Confirmer mot de passe :</label>
						<div class="col-sm-5">
							<input class="form-control" required="required" type="text" name="new_password2" value="">
						</div>
					</div>

					<br><br>

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
