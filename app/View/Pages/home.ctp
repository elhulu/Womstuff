<!-- Sidebar ================================================== -->

<?= $this->element('sidebar'); ?>
    
<!-- Sidebar end=============================================== -->
<div class="col-md-9">
<?php //debug($lastProd); ?>
<div class="well well-small wellfullwidth">
    <h4>Derniers arrivages <small class="pull-right">+ de 15 nouveaux produits par semaine !</small></h4>
    <div class="row-fluid">
        <div class="carousel slide" id="featured">
            <div class="carousel-inner">         
                <div class="item active">
                    <ul class="thumbnails">
                        <?php foreach($lastProd as $LastProd){ ?>
                        <li class="col-md-6">
                            <div class="thumbnail home-thumb">
                                <img data-src="holder.js/300x200" alt="<?php echo $LastProd['Image'][0]['filename']; ?>" src="<?php echo SITEROOT; ?>img/<?php echo $LastProd['Image'][0]['path'];?>">
                                <div class="caption">
                                  <h3 class="product-title"><strong><?php echo $LastProd['Product']['name']; ?></strong> <span class="label label-warning price"><?php echo $LastProd['Product']['price']; ?> &euro;</span></h3>
                                  <p><?= $this->Text->truncate($LastProd['Product']['description'], 100, array('exact' => false)); ?></p>
                                  <p>
                                      <?= $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier', array('controller' => 'paniers', 'action' => 'add',$LastProd['Product']['id']), array('class' => 'btn btn-primary addPanier', 'escape' => false)); ?> 
                                      <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span> Infos', array('controller' => 'products', 'action' => 'view', 'category' => $LastProd['Category']['slug'], 'id' => $LastProd['Product']['id'], 'slug' => $LastProd['Product']['slug']), array('class' => 'btn btn-default', 'escape' => false)); ?>
                                     
                                 </p>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="well well-small wellfullwidth">
    <h4>Le Hasard fait parfois bien les choses</h4>
    <div class="row-fluid">
        <div class="carousel slide" id="featured">
            <div class="carousel-inner">         
                <div class="item active">
                    <ul class="thumbnails">
                        <?php foreach($randProd as $randProd){ ?>
                        <li class="col-md-6">
                            <div class="thumbnail home-thumb">
                                <img data-src="holder.js/300x200" alt="<?php echo $randProd['Image'][0]['filename']; ?>" src="<?php echo SITEROOT; ?>img/<?php echo $randProd['Image'][0]['path'];?>">
                                <div class="caption">
                                    <h3 class="product-title"><strong><?php echo $randProd['Product']['name']; ?></strong> <span class="label label-warning price"><?php echo $randProd['Product']['price']; ?> &euro;</span></h3>
                                    <p><?= $this->Text->truncate($randProd['Product']['description'], 100, array('exact' => false)); ?></p>
                                    <p>
                                          <?= $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier', array('controller' => 'paniers', 'action' => 'add',$randProd['Product']['id']), array('class' => 'btn btn-primary addPanier', 'escape' => false)); ?> 
                                          <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span> Infos', array('controller' => 'products', 'action' => 'view', 'category' => $randProd['Category']['slug'], 'id' => $randProd['Product']['id'], 'slug' => $randProd['Product']['slug']), array('class' => 'btn btn-default', 'escape' => false)); ?>
                                     </p>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<h4>Top ventes de la semaine </h4>
<ul class="thumbnails">
    <?php foreach ($products as $product): ?>
    <li class="col-md-6">
        <div class="thumbnail">
            <a href="product_details.html"><img alt="" src="themes/images/products/7.jpg"></a>
                <h5><?= $product['Product']['name'] ?></h5>
                <?= $this->Html->image($product['Image'][0]['thumb']) ?>
            <div class="caption">
                <h4 style="text-align:center">
                <?= $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Ajouter', array('controller' => 'paniers', 'action' => 'add',$product['Product']['id']), array('class' => 'btn btn-primary addPanier', 'escape' => false)); ?> 
                <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span> Infos', array('controller' => 'products', 'action' => 'view', 'category' => $product['Category']['slug'], 'id' => $product['Product']['id'], 'slug' => $product['Product']['slug']), array('class' => 'btn btn-default', 'escape' => false)); ?>

            </div>
        </div>
    </li>
    <?php endforeach ?>
</ul>

</div>
</div>
