<?= $this->Html->addCrumb(ucfirst($this->request->params['category']), array('controller' => 'products', 'action' => 'view', 'category' => $this->request->params['category'])); ?>
<?php 
	echo $this->element('sidebar');
?>
<div class="col-md-9">
	<!-- Affichage des produits sous forme de liste -->
	<?php if(empty($results)){ ?>
	<div class="alert alert-danger">Aucun r&eacute;sultats</div>
	<?php } ?> 
		<?php foreach ($results as $product) { ?>
		<?php //debug($results);?>
		<div class="col-sm-6 col-md-4">
		<div class="thumbnail cat-thumb">
			<img data-src="holder.js/300x200" alt="<?php echo $product['Image'][0]['filename']; ?>" src="<?php echo SITEROOT; ?>img/<?php echo $product['Image'][0]['path'];?>">
			<div class="caption">
			  <h3 class="product-title"><strong><?php echo $product['Product']['name']; ?></strong> <span class="label label-warning price"><?php echo $product['Product']['price']; ?> &euro;</span></h3>
			  <p><?= $this->Text->truncate($product['Product']['description'], 100, array('exact' => false)); ?></p>
			  <p>
			  	<?= $this->Html->link('Ajouter au panier', array('controller' => 'paniers', 'action' => 'add',$product['Product']['id']), array('class' => 'btn btn-primary small-button')); ?> 
			  	<?= $this->Html->link('Infos', array('controller' => 'products', 'action' => 'view', 'category' => $product['Category']['slug'], 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), array('class' => 'btn btn-default small-button')); ?>
			  </p>
			</div>
		</div>
		</div>
		<?php } ?>
</div>