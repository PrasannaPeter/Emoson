<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">Liste des packs</div>
		</div>

		<div class="panel-body">
			<table class="table table-bordered datatable">
				<thead>
					<tr>
						<th>Titre</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Position</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$tab_pack = Pack::tab_pack();
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>Titre</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Position</th>
						<th>Options</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>
</div>