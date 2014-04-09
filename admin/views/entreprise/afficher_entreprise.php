<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Liste des entreprises</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered datatable">
				<thead>
					<tr>
						<th>Raison sociale</th>
						<th>Secteur d'activité</th>
						<th>Site WEB</th>
						<th>Adresse</th>
						<th>Ville</th>
						<th>Code Postal</th>
						<th>Type</th>
						<th>Nb Projet</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$tab_entreprise = Entreprise::tab_entreprise();
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>Raison sociale</th>
						<th>Secteur d'activité</th>
						<th>Site WEB</th>
						<th>Adresse</th>
						<th>Ville</th>
						<th>Code Postal</th>
						<th>Type</th>
						<th>Nb Projet</th>
						<th>Options</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>