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
						<th>N°</th>
						<th>Titre</th>
						<th>Statut</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php

					if(!empty($_GET['type']))
						$tab_projet = Projet::tab_projet($_GET['type']);
					else
						$tab_projet = Projet::tab_projet();

				?>
				</tbody>
				<tfoot>
					<tr>
						<th>N°</th>
						<th>Titre</th>
						<th>Statut</th>
						<th>Actions</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>