<article class="content-box minimizer">
		<header>
			<h2>Changement du mot de passe</h2>
		</header>
		<section>
			<form action="index.php?module=utilisateur&action=change_password" method="post" />
				<!--  Formulaire -->
				<!-- Utiliser les class .small, .medium ou .large pour une taille prédéfinie-->
				<fieldset>
					<legend><label>Remplir les champs suivants</label></legend>
					<dl>
						<dt>
							<label>Ancien mot de passe : </label>
						</dt>
						<dd>
							<input name="old_password" type="text" class="small">
						</dd>
						<dt>
							<label>Nouveau mot de passe : </label>
						</dt>
						<dd>
							<input name="new_password" type="text" class="small">
						</dd>
						<dt>
							<label>Confirmer mot de passe : </label>
						</dt>
						<dd>
							<input name="new_password2" type="text" class="small">
						</dd>
					</dl>
					</fieldset>
				<button type="submit" class="blue" >Modifier le mot de passe</button>
			</form>
		</section>
</article>
<!-- /Full width content box with minimizer -->
<br />

<div class="clearfix"></div>