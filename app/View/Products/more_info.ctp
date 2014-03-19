<?= $this->Html->addCrumb(ucfirst($this->request->params['category']), array('controller' => 'products', 'action' => 'view', 'category' => $this->request->params['category'])); ?>
<?= $this->Html->addCrumb($results['Product']['name'], array('controller' => 'products', 'action' => 'view', 'category' => $results['Category']['slug'], 'id' => $results['Product']['id'], 'slug' => $results['Product']['slug'])); ?>
<?php $this->set('title_for_layout', 'Détails de : ' . $results['Product']['name']); ?>
<div class="row">
	<!-- Affichage détails du produit -->
	<?php //debug($results); ?>
	<div class="col-sm-4 col-md-8">
		<div class="thumbnail">
			<div class="col-sm-6 col-md-12 thumb-head">
				<h3 class="product-title">
				<?= $this->Html->link($results['Category']['name'], array('controller' => 'products', 'action' => 'view', 'category' => $results['Category']['slug']), array('class' => 'product-title-category')); ?>
					<span class="product-title-name"><strong><?php echo $results['Product']['name']; ?></strong></span>
				</h3>
				<div class="col-sm-3 col-md-6 right-prod-content">
					<a href="#" data-toggle="modal" data-target="#slideshow"><img class="img-prod-md" data-src="holder.js/300x200" alt="<?php echo $results['Image'][0]['filename']; ?>" src="<?php echo SITEROOT; ?>img/<?php echo $results['Image'][0]['path'];?>"></a>
				</div>
				<div class="col-sm-3 col-md-6 left-prod-content">
					<p class="product-title">Prix <span class="label label-warning price"><?php echo $results['Product']['price']; ?> &euro;</span></p>
			  		<p><?= $this->Html->link('Ajouter au panier', array('controller' => 'paniers', 'action' => 'add',$results['Product']['id']), array('class' => 'btn btn-primary addPanier')); ?></p>
				</div>
			</div>
			<div class="caption">
			  <p><?php echo $results['Product']['description'];?></p>
			  <table class="table table table-striped">
			        <colgroup>
			          <col class="col-xs-1">
			          <col class="col-xs-7">
			        </colgroup>
			        <thead>
			          <tr>
			            <th>Caract&eacute;risque</th>
			            <th>Description</th>
			          </tr>
			        </thead>
			        <tbody>
			        <?php foreach ($results['Feature'] as $feature) { ?>
			          <tr>
			            <td class="feature-name"><?php echo $feature['name']; ?></td>
			            <td><?php echo $feature['FeaturesProduct']['value']; ?></td>
			          </tr>
			         <?php } ?>
			        </tbody>
			  </table>
			</div>
		</div>
	</div>
	<!-- Recommandation produits selon la catégorie -->
	<div class="col-sm-2 col-md-4 sugg-module">
	<h2>Suggestions</h2>
	<?php
	//Génération suggestions
	$dataSugg = $slug;
	if(empty($slug) OR count($slug) < 3){
		$dataSugg = $brandSugg;
	}
	if(empty($brandSugg) OR count($brandSugg) < 3){
		$dataSugg = $priceSugg;
	}
	foreach ($dataSugg as $product) { 
	?>
		<div class="thumbnail">
			<img data-src="holder.js/300x200" alt="<?php echo $product['Image'][0]['filename']; ?>" src="<?php echo SITEROOT; ?>img/<?php echo $product['Image'][0]['path'];?>">
			<div class="caption">
			  <h3 class="product-title"><strong><?php echo $product['Product']['name']; ?></strong> <span class="label label-warning price"><?php echo $product['Product']['price']; ?> &euro;</span></h3>
			  <p><?php echo $this->Customdesc->miniDesc($product['Product']['description'],0,140)." ...";?></p>
			  <p>
				  <?= $this->Html->link('Ajouter au panier', array('controller' => 'paniers', 'action' => 'add',$product['Product']['id']), array('class' => 'btn btn-primary addPanier')); ?> 
				  <?= $this->Html->link('Infos', array('controller' => 'products', 'action' => 'view', 'category' => $product['Category']['slug'], 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), array('class' => 'btn btn-default')); ?>
			</div>
		</div>
	<?php } ?>
	</div>
	<!-- Popup avec slideshow -->
	<div class="modal fade" id="slideshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      </div>
	      <div class="modal-body">
			<div id="prod-details-slide" class="carousel slide" data-ride="carousel" data-interval="false">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			  	<?php 
			  		$nbrImg = count($results['Image']);
			  		for ($i=0; $i < $nbrImg; $i++) { 
			  	?>
			    <li data-target="#prod-details-slide" data-slide-to="<?php echo $i;?>"></li>
			    <?php } ?>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
			  	<?php foreach($results['Image'] as $img){ ?>
			    <div class="item">
			      <img src="<?php echo SITEROOT; ?>img/<?php echo $img['path']; ?>" alt="<?php echo $img['filename']; ?>">
			    </div>
			    <?php } ?>
			  </div>
			  <!-- Controls -->
			  <a class="left carousel-control" href="#prod-details-slide" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			  </a>
			  <a class="right carousel-control" href="#prod-details-slide" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
</div>


<script>
$(function(){
  $('#prod-details-slide').carousel();
  $(".carousel-indicators li:first").addClass("active");
  $(".carousel-inner .item:first").addClass("active");
});
</script>