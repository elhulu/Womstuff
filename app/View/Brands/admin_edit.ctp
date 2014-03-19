<!-- Set Title -->
<?php $this->set('title_for_layout', 'Editer la marque ' . $this->request->data['Brand']['name']) ?>

<div class="well col-md-6">
	<?= $this->Form->create('Brand', array('inputDefaults' => array('div' => array('class' => 'form-group')))); ?>
		<fieldset>
			<legend>Editer la marque "<?= $this->request->data['Brand']['name'] ?>"</legend>
			<?= $this->Form->input('name', array('class' => 'form-control', 'label' => array('text' => 'Nom de la marque', 'class' => 'control-label'))) ?>
			<?= $this->Form->button('Editer la marque', array('class' => 'btn btn-primary', 'type' => 'submit')) ?>
		</fieldset>
	<?= $this->Form->end() ?>
</div>