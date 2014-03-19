<!-- Set Title -->
<?php $this->set('title_for_layout', 'Ajouter une marque') ?>

<div class="well col-md-6">
	<?= $this->Form->create('Brand', array('inputDefaults' => array('div' => array('class' => 'form-group')))); ?>
		<fieldset>
			<legend>Ajouter une marque</legend>
			<?= $this->Form->input('name', array('class' => 'form-control', 'label' => array('text' => 'Nom de la marque', 'class' => 'control-label'))) ?>
			<?= $this->Form->button('Ajouter la marque', array('class' => 'btn btn-primary', 'type' => 'submit')) ?>
		</fieldset>
	<?= $this->Form->end() ?>
</div>