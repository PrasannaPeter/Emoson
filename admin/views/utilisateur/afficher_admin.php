<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Liste des administrateurs</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered datatable">
				<thead>
					<tr>
						<th>Identifiant</th>
						<th>Nom</th>
						<th>Email</th>
						<th>Numéro tel</th>
						<th>Ville</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$tab_utilisateur = Utilisateur::tab_utilisateur($type="admin");
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>Identifiant</th>
						<th>Nom</th>
						<th>Email</th>
						<th>Numéro tel</th>
						<th>Ville</th>
						<th>Options</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>