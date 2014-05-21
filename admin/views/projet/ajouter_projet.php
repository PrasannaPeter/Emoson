<?php
if (isset($_SESSION['lastForm']['submit']))
{
	if(is_array($_SESSION['lastForm']) && $_SESSION['lastForm']['submit'])
	{
		$get_projet = $_SESSION['lastForm'];
	}
}

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
							<textarea class="form-control autogrow" required="required" name="descriptionProjet"><?php if(!empty($get_projet['descriptionProjet'])){ echo $get_projet['descriptionProjet']; }Else{echo "";}?></textarea>
						</div>
					</div>

					<div class="form-group">
				      <label class="col-sm-3 control-label">Avez-vous une stratégie de branding ?</label>
				      <div class="col-sm-5">
				        <br>
				        <p>Mettre URL du fichier</p>
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-sm-3 control-label">Votre positionnement en 140 caractères</label>
				      <div class="col-sm-5">
				        <textarea class="form-control autogrow" required="required" name="positionnement" style="width:408px; height:120px;"></textarea>
				      	 <p class="help-block">Prévoir</p>
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-sm-3 control-label">Votre identite visuelle</label>
				      	<div class="col-sm-5">
				        	<br>
				        	<p>Mettre URL du fichier</p>
				        	<p class="help-block">Pouvez-vous nous envoyer votre charte graphique ?</p>
				      	</div>
				      	
				    </div>
				        

				    <div class="form-group">
				      <label class="col-sm-3 control-label">Des références musicales ?</label>
				      <div class="col-sm-5">
				        <textarea class="form-control autogrow" required="required" name="references" style="width:408px; height:120px;"></textarea>
				        <p class="help-block">Envoyez-nous vos liens URLS Youtube</p>
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-sm-3 control-label">Ce que vous ne souhaitez surtout pas...</label>
				      <div class="col-sm-5">
				        <textarea class="form-control autogrow" required="required" name="dontlike" style="width:408px; height:120px;"></textarea>
				        <p class="help-block">Envoyez-nous vos liens URLS Youtube</p>
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-sm-3 control-label">Commentaires</label>
				      <div class="col-sm-5">
				        <textarea class="form-control autogrow" required="required" name="commentaires" style="width:408px; height:120px;"></textarea>
				      </div>
				    </div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Taille de l'entreprise</label>
						<div class="col-sm-5">
						<?php
							//Si c'est le formulaire d'ajout
							if (!isset($get_projet['tailleEntreprise']))
							{?>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_1" type="radio" checked="checked" value="1"/>
									<label for="tailleProjet_1">1 à 10 personnes - TPE</label>
								</div>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_2" type="radio" value="2"/>
									<label for="tailleProjet_2">10 à 250 personnes -  Petite et Moyenne entreprises</label>
								</div>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_3" type="radio" value="3"/>
									<label for="tailleProjet_3">251 et 5000 - Entreprise à taille intermédiaire</label>
								</div>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_4" type="radio" value="4"/>
									<label for="tailleProjet_4">+ de 5000 salariés - Grandes entreprises</label>
								</div>

							<?php
							}
							else
							{?>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_1" type="radio" value="1" <?php if ($get_projet['tailleEntreprise'] == "1"){ echo 'checked="checked"';}?> />
									<label for="tailleProjet_1">1 à 10 personnes - TPE</label>
								</div>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_2" type="radio" <?php if ($get_projet['tailleEntreprise'] == "2"){ echo 'checked="checked"';}?> value="2"/>
									<label for="tailleProjet_2">10 à 250 personnes -  Petite et Moyenne entreprises</label>
								</div>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_3" type="radio" <?php if ($get_projet['tailleEntreprise'] == "3"){ echo 'checked="checked"';}?> value="3"/>
									<label for="tailleProjet_3">251 et 5000 - Entreprise à taille intermédiaire</label>
								</div>
								<div class="radio-field">
									<input name = "tailleEntreprise" id="tailleProjet_4" type="radio" <?php if ($get_projet['tailleEntreprise'] == "4"){ echo 'checked="checked"';}?> value="4"/>
									<label for="tailleProjet_4">+ de 5000 salariés - Grandes entreprises</label>
								</div>
							<?php
							}?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Points</label>
						<div class="col-sm-5">
							<?php
							//Si c'est le formulaire d'ajout
							if (!isset($get_projet['ptsContactEntreprise']))
							{?>
							    <div class="checkbox-field">
									<input name ="ptsContactEntreprise[]" id="PTContactProjet_1" type="checkbox" value="1"/>
								    <label for="PTContactProjet_1">Téléphonie</label>
								</div>
								<div class="checkbox-field">
									<input name ="ptsContactEntreprise[]" id="PTContactProjet_1" type="checkbox" value="2"/>
								    <label for="PTContactProjet_2">Point de vente</label>
								</div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_3" type="checkbox"  value="3"/>
						            <label for="PTContactProjet_3">Lieu accueillant du public </label>
						        </div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_4" type="checkbox"  value="4"/>
						            <label for="PTContactProjet_4">Vidéo </label>
						        </div>

								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_5" type="checkbox"  value="5"/>
						            <label for="PTContactProjet_5">Site Internet</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_6" type="checkbox" value="6"/>
						            <label for="PTContactProjet_6">Application</label>
						        </div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_7" type="checkbox" value="7"/>
						            <label for="PTContactProjet_7">Spot Radio</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_8" type="checkbox"  value="8"/>
						            <label for="PTContactProjet_8">Spot TV</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_9" type="checkbox"  value="9"/>
						            <label for="PTContactProjet_9">Médias Sociaux : Facebook, Twitter, Instagram, Youtube, Etc...</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_10" type="checkbox" value="10"/>
						            <label for="PTContactProjet_10">Web Radio</label>
						        </div>
							<?php
							}
							//Si c'est le formulaire de modif
							else
							{
								$pts = json_decode($get_projet['ptsContactEntreprise']);
								?>
								<div class="checkbox-field">
									<input name ="ptsContactEntreprise[]" id="PTContactProjet_1" type="checkbox" <?php if (in_array("1", $pts)){ echo 'checked="checked"';}?> value="1"/>
								    <label for="PTContactProjet_1">Téléphonie</label>
								</div>
								<div class="checkbox-field">
									<input name ="ptsContactEntreprise[]" id="PTContactProjet_1" type="checkbox" <?php if (in_array("2", $pts)){ echo 'checked="checked"';}?> value="2"/>
								    <label for="PTContactProjet_2">Point de vente</label>
								</div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_3" type="checkbox" <?php if (in_array("3", $pts)){ echo 'checked="checked"';}?> value="3"/>
						            <label for="PTContactProjet_3">Lieu accueillant du public </label>
						        </div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_4" type="checkbox" <?php if (in_array("4", $pts)){ echo 'checked="checked"';}?> value="4"/>
						            <label for="PTContactProjet_4">Vidéo </label>
								</div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_5" type="checkbox" <?php if (in_array("5", $pts)){ echo 'checked="checked"';}?> value="5"/>
						            <label for="PTContactProjet_5">Siteweb</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_6" type="checkbox" <?php if (in_array("6", $pts)){ echo 'checked="checked"';}?> value="6"/>
						            <label for="PTContactProjet_6">Application</label>
						        </div>
								<div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_7" type="checkbox" <?php if (in_array("7", $pts)){ echo 'checked="checked"';}?> value="7"/>
						            <label for="PTContactProjet_7">Spot Radio</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_8" type="checkbox" <?php if (in_array("8", $pts)){ echo 'checked="checked"';}?> value="8"/>
						            <label for="PTContactProjet_8">Spot TV</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_9" type="checkbox" <?php if (in_array("9", $pts)){ echo 'checked="checked"';}?> value="9"/>
						            <label for="PTContactProjet_9">Médias Sociaux : Facebook, Twitter, Instagram, Youtube, Etc...</label>
						        </div>
						        <div class="checkbox-field">
						            <input name ="ptsContactEntreprise[]" id="PTContactProjet_10" type="checkbox" <?php if (in_array("10", $pts)){ echo 'checked="checked"';}?> value="10"/>
						            <label for="PTContactProjet_10">Web Radio</label>
						        </div>
							<?php
							}
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Chiffre d'affaire</label>
						<div class="col-sm-5">
							<div class="controls">
								<?php
								//Si c'est le formulaire d'ajout
								if (!isset($get_projet['caEntreprise']))
								{?>
									<div class="radio-field">
										<input name = "caEntreprise" id="DernierCAProjet_1" type="radio" checked="checked" value="1" />
										<label for="DernierCAProjet_1">0 à 500 000€</label>
									</div>
									<div class="radio-field">
										<input name = "caEntreprise" id="DernierCAProjet_2" type="radio" value="2" />
										<label for="DernierCAProjet_2">entre 500 000 € et 1 million d’Euros</label>
									</div>
									<div class="radio-field">
										<input name = "caEntreprise" id="DernierCAProjet_3" type="radio" value="3" />
										<label for="DernierCAProjet_3">plus d’1 million d’euros </label>
									</div>
								<?php
								}
								else
								{?>
									<div class="radio-field">
										<input name = "caEntreprise" id="DernierCAProjet_1" type="radio" value="1" <?php if ($get_projet['caEntreprise'] == "1"){ echo 'checked="checked"';}?> />
										<label for="DernierCAProjet_1">0 à 500 000€</label>
									</div>
									<div class="radio-field">
										<input name = "caEntreprise" id="DernierCAProjet_2" type="radio" value="2" <?php if ($get_projet['caEntreprise'] == "2"){ echo 'checked="checked"';}?> />
										<label for="DernierCAProjet_2">entre 500 000 € et 1 million d’Euros</label>
									</div>
									<div class="radio-field">
										<input name = "caEntreprise" id="DernierCAProjet_3" type="radio" value="3" <?php if ($get_projet['caEntreprise'] == "3"){ echo 'checked="checked"';}?> />
										<label for="DernierCAProjet_3">plus d’1 million d’euros </label>
									</div>

								<?php
								}?>
						    </div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Proposition de Pack</label>
						<?php
						/*
						$pack = Projet::get_pack();

						if(empty($pack))
			    		{
			    			echo "<p>Pas de resultat</p>";
			    		}
			    		else
			    		{
			    			echo '<select name="idPack">';
	    					while($tab_pack = $pack->fetch())
	    					{
	    						if ($tab_pack['idPack']){
	    							echo '<option value ="'.$tab_pack['idPack'].' selected="selected"">'.$tab_pack['titrePack'].'</option>';
	    						}
	    						else{
	    							echo '<option value ="'.$tab_pack['idPack'].'">'.$tab_pack['titrePack'].'</option>';
	    						}

	    					};
	    					echo '</select>';
			    		}*/
			    		//Si c'est le formulaire d'ajout
						if (!isset($get_projet['idPack']))
						{
							require_once('controllers/pack/pack.php');
							Pack::vignette_pack($type="admin");

						}
						else
						{
			    			require_once('controllers/pack/pack.php');
							Pack::vignette_pack($type="admin");
						}


						?>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Proposition d'options</label>
						<div class="col-sm-5">
							<!-- Voix off -->
							<label class="control-label" for="voixOffProjet">Voix off</label>
							<?php
							//Si c'est le formulaire d'ajout
							if (!isset($get_projet['optionProjet']))
							{?>
								<div class="controls">
									<div class="radio-field">
										<input name ="optionProjet[]" id="voixOffProjet_1" type="radio" value="1"/>
										<label for="voixOffProjet_1">Entre 1 à 5 messages par mois</label>
									</div>
									<div class="radio-field">
										<input name ="optionProjet[]" id="voixOffProjet_2" type="radio" value="2"/>
										<label name ="optionProjet" for="voixOffProjet_2">Entre 5 à 10 messages par mois</label>
									</div>
									<div class="radio-field">
										<input name ="optionProjet[]" id="voixOffProjet_3" type="radio" value="3"/>
										<label for="voixOffProjet_3">plus de 10</label>
									</div>
										<p class="help-block">Besoin d’une égérie vocale pour votre identité sonore ? Votre voix Off  : porte parole vocale de votre marque
									Si oui, définissez le nombre de messages par mois </p>
								</div>
							<?php
							}
							else
							{
								$options = json_decode($get_projet['optionProjet']);
								?>
								<div class="controls">
									<div class="checkbox-field">
										<input name ="optionProjet[]" id="voixOffProjet_1" type="checkbox" <?php if (in_array("1", $options)){ echo 'checked="checked"';}?> value="1"/>
										<label for="voixOffProjet_1">Entre 1 à 5 messages par mois</label>
									</div>
									<div class="checkbox-field">
										<input name ="optionProjet[]" id="voixOffProjet_2" type="checkbox" <?php if (in_array("2", $options)){ echo 'checked="checked"';}?> value="2"/>
										<label name ="optionProjet" for="voixOffProjet_2">Entre 5 à 10 messages par mois</label>
									</div>
									<div class="checkbox-field">
										<input name ="optionProjet[]" id="voixOffProjet_3" type="checkbox" <?php if (in_array("3", $options)){ echo 'checked="checked"';}?> value="3"/>
										<label for="voixOffProjet_3">plus de 10</label>
									</div>
										<p class="help-block">Besoin d’une égérie vocale pour votre identité sonore ? Votre voix Off  : porte parole vocale de votre marque
									Si oui, définissez le nombre de messages par mois </p>
								</div>
								<?php
							}
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Aller / Retour supplémentaire</label>
						<div class="col-sm-5">
							<input type="number" min="1" id="ARProjet" required="required" name="nbARProjet" placeholder="" class="input-xlarge" value="<?php if(!empty($get_projet['nbARProjet'])){ echo $get_projet['nbARProjet']; }Else{echo "";}?>">
				        <p class="help-block">Mettez le nombre d'aller - retour supplémentaire souhaité</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Proposition logo d'un designer supplémentaire</label>
						<div class="col-sm-5">
							<input type="number" min="1" id="logoProjet" required="required" name="nbDesignerSouhaite" placeholder="" class="input-xlarge" value="<?php if(!empty($get_projet['nbDesignerSouhaite'])){ echo $get_projet['nbDesignerSouhaite']; }Else{echo "";}?>">
				        <p class="help-block">Mettez le nombre de designer supplémentaire souhaité</p>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Statut</label>
						<div class="col-sm-5">
							<?php
							//Si c'est le formulaire d'ajout
							if (!isset($get_projet['isActiveProjet']))
							{
								echo '<select name="isActiveProjet">';
								echo '<option value="non" selected="selected">En attente de validation</option>';
								echo '<option value="1" >En cours</option>';
								echo '<option value="2">Terminé</option>';
								echo '<option value="3">Non validé</option>';
								echo '</select>';

							}
							else
							{
								echo '<select name="isActiveProjet">';
								if ($get_projet['isActiveProjet'] == "0")
								{
									echo '<option value="non" selected="selected">En attente de validation</option>';
									echo '<option value="1">En cours</option>';
									echo '<option value="2">Terminé</option>';
									echo '<option value="3">Non validé</option>';
								}
								else if ($get_projet['isActiveProjet'] == "1")
								{
									echo '<option value="non">En attente de validation</option>';
									echo '<option value="1" selected="selected">En cours</option>';
									echo '<option value="2">Terminé</option>';
									echo '<option value="3">Non validé</option>';

								}
								else if ($get_projet['isActiveProjet'] == "2") {
									echo '<option value="non">En attente de validation</option>';
									echo '<option value="1">En cours</option>';
									echo '<option value="2" selected="selected">Terminé</option>';
									echo '<option value="3">Non validé</option>';
								}
								else if ($get_projet['isActiveProjet'] == "3") {
									echo '<option value="non">En attente de validation</option>';
									echo '<option value="1">En cours</option>';
									echo '<option value="2">Terminé</option>';
									echo '<option value="3" selected="selected">Non validé</option>';
								}

								echo '</select>';
							}
							?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Information du contact</label>
						<div class="col-sm-5">
						<?php
						$contact = Projet::get_contact();
						if(empty($contact))
			    		{
			    			echo "<p>Pas de resultat</p>";
			    		}
			    		else
			    		{
			    			echo '<select name="idUtilisateur">';
	    					while($tab_contact = $contact->fetch())
	    					{
	    						if ($tab_contact['idUtilisateur'])
	    						{
	    							echo '<option value ="'.$tab_contact['idUtilisateur'].'" selected="selected" ">';
	    						}
	    						else
	    						{
	    							echo '<option value ="'.$tab_contact['idUtilisateur'].'">';
	    						}

	    						echo $tab_contact['nomUtilisateur'].' / '.$tab_contact['prenomUtilisateur'].' / '.$tab_contact['emailUtilisateur'].'</option>';
	    					};
	    					echo '</select>';
			    		}
						?>
						</div>
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