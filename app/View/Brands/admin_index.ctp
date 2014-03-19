<div class="row">
	<!-- Set Title -->
	<?php $this->set('title_for_layout', 'Liste des marques') ?>

	<?= $this->Html->link('Ajouter une marque', array('controller' => 'brands', 'action' => 'admin_add'), array('class' => 'btn btn-primary small-button')); ?>
	<table class="table table-stripped table-bordered">
		<tr>
			<th>#</th>
			<th>Nom de la marque</th>
			<th>Slug</th>
			<th>Administration</th>
		</tr>
		<?php foreach ($brands as $key => $brand): ?>
			<tr>
				<td><span class="badge badge-default"><?= $brand['Brand']['id'] ?></span></td>
				<td><?= $brand['Brand']['name'] ?></td>
				<td><?= $brand['Brand']['slug'] ?></td>
				<td>
					<?= $this->Html->link('Editer', array('controller' => 'brands', 'action' => 'admin_edit', $brand['Brand']['id']), array('class' => 'btn btn-warning small-button')); ?>
					<?= $this->Html->link('Supprimer', array('controller' => 'brands', 'action' => 'admin_delete', $brand['Brand']['id']), array('class' => 'btn btn-danger small-button'), null, 'Êtes vous sûr de vouloir supprimer cette entrée? Les produits de cette marque seront supprimés !'); ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>