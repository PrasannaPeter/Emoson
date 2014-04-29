<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Liste des projets</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered datatable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Titre</th>
						<th>Description</th>
						<!--<th>Taille</th>
						<th>Chiffre d'Affaire</th>
						<th>Points</th>
						<th>Options</th>
						<th>Aller-Retour</th>
						<th>Nombre de designer souhaité(s)</th>
						<th>Pack</th>-->
						<th>Actif</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$tab_projet = Projet::tab_projet();
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Titre</th>
						<th>Description</th>
						<!--<th>Taille</th>
						<th>Chiffre d'Affaire</th>
						<th>Points</th>
						<th>Options</th>
						<th>Aller-Retour</th>
						<th>Nombre de designer souhaité(s)</th>
						<th>Pack</th>-->
						<th>Actif</th>
						<th></th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>