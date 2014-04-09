<?php

function notifications($typeNotif, $titreNotif, $msgNotif=NULL)
{
	switch($typeNotif)
	{
		case "success" :
		?>
			<div class="alert alert-success">
				<strong>Succès : <?php echo $titreNotif; ?>.</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "error" :
		?>

			<div class="alert alert-error">
				<strong>Erreur : <?php echo $titreNotif; ?>!</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "information" :
		?>
			<div class="alert alert-information">
				<strong>Information : <?php echo $titreNotif; ?>.</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "attention" :
		?>
			<div class="alert alert-attention">
				<strong>Attention : <?php echo $titreNotif; ?>!</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "note" :
		?>
			<div class="alert alert-note">
				<strong>Note :</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
	}
}