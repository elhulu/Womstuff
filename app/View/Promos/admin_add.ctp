<!-- Set Title -->
<?php $this->set('title_for_layout', 'Ajouter un code promo') ?>

<div class="well col-md-6">
	<?= $this->Form->create('Promo', array('inputDefaults' => array('div' => array('class' => 'form-group')))); ?>
		<fieldset>
			<legend>Ajouter un code promo</legend>
			<?= $this->Form->input('code', array('class' => 'form-control', 'label' => array('text' => 'Code', 'class' => 'control-label'))) ?> <button type="button" class="btn btn-default" id="generateCode">Génerer un code</button>
			<?= $this->Form->input('reduction', array('type' => 'number', 'min' => '1',  'max' => 100, 'class' => 'form-control', 'label' => array('text' => 'Pourcentage de réduction', 'class' => 'control-label'))) ?>
			<?= $this->Form->input('category_id', array('class' => 'form-control', 'label' => array('text' => 'Catégorie de produit', 'class' => 'control-label'), 'options' => $categories)) ?>
			<?= $this->Form->button('Ajouter le code promo', array('class' => 'btn btn-primary', 'type' => 'submit')) ?>
		</fieldset>
	<?= $this->Form->end() ?>
</div>

<script>
	$(function(){
		
		$(window).load($('#PromoCode').val(generate(10)));

		$('#generateCode').on('click', function(){
			$('#PromoCode').val(generate(10));
		})

		function generate(words)
		{
			words = parseInt(words);
		    var text = "";
		    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXY0123456789";

		    for( var i=0; i < words; i++ )
		        text += possible.charAt(Math.floor(Math.random() * possible.length));

		    return text;
		}
	})
</script>