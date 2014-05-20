<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Liste des annonces</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered datatable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Titre</th>
						<th>Date</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php

					if(!empty($_GET['type']))
						$tab_annonce = Annonce::tab_annonce($_GET['type']);
					else
						$tab_annonce = Annonce::tab_annonce();

				?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Titre</th>
						<th>Date</th>
						<th>Actions</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>