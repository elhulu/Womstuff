<div class="row">
	<!-- Set Title -->
	<?php $this->set('title_for_layout', 'Reductions') ?>

	<?= $this->Html->link('Ajouter un code promo', array('controller' => 'promos', 'action' => 'admin_add'), array('class' => 'btn btn-primary small-button')); ?>
	<table class="table table-stripped table-bordered">
		<tr>
			<th>#</th>
			<th>Code</th>
			<th>Montant</th>
			<th>Categéorie</th>
			<th>Administration</th>
		</tr>
		<?php foreach ($promos as $key => $promo): ?>
			<tr>
				<td><span class="badge badge-default"><?= $promo['Promo']['id'] ?></span></td>
				<td><?= $promo['Promo']['code'] ?></td>
				<td><?= $promo['Promo']['reduction'] ?> %</td>
				<td><?= $promo['Category']['name'] ?></td>
				<td>
					<?= $this->Html->link('Editer', array('controller' => 'promos', 'action' => 'admin_edit', $promo['Promo']['id']), array('class' => 'btn btn-warning small-button')); ?>
					<?= $this->Html->link('Supprimer', array('controller' => 'promos', 'action' => 'admin_delete', $promo['Promo']['id']), array('class' => 'btn btn-danger small-button'), 'Êtes vous sûr de vouloir supprimer cette entrée?'); ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>