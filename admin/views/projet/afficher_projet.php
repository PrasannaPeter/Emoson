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
						<th>Actif</th>
						<th>Titre</th>
						<th>Description</th>
						<th>Date de début</th>
						<th>Date de fin</th>
						<th>Budget Min.</th>
						<th>Budget Max.</th>
						<th>Nombre de pistes</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$tab_projet = Projet::tab_projet();
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>Actif</th>
						<th>Titre</th>
						<th>Description</th>
						<th>Date de début</th>
						<th>Date de fin</th>
						<th>Budget Min.</th>
						<th>Budget Max.</th>
						<th>Nombre de pistes</th>
						<th>Options</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>