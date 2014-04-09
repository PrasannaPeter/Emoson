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
				<div class="alert alert-danger">
				<strong>Erreur : <?php echo $titreNotif; ?>!</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "information" :
		?>
				<div class="alert alert-info">
				<strong>Information : <?php echo $titreNotif; ?>.</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "attention" :
		?>
				<div class="alert alert-warning">
				<strong>Attention : <?php echo $titreNotif; ?>!</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
		break;
		case "note" :
		?>
				<div class="alert alert-default">
				<strong>Note :</strong>
				<p><?php echo $msgNotif;?></p>
			</div>
			<br />

		<?php
	}
}