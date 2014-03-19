<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout. $title; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css( array('bootstrap', 'style1', 'admin', 'cupertino/jquery-ui-1.10.3.custom.min.css') );
		echo $this->Html->script( array( 'jquery-1.10.2.min', 'bootstrap.min', 'jquery-ui-1.10.3.custom.min', 'jquery.rs.carousel', 'jquery.rs.carousel-autoscroll', 'jquery.rs.carousel-continuous', 'jquery.rs.carousel-touch', 'jquery-ui-1.10.3.custom.min', 'carousel.js') );

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

<div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li>
                <a class="navbar-brand" href="<?php echo SITEROOT; ?>">WOM<span>STUFF</span> <span class="navbar-subname">admin</span></a>
            </li>

            <li>
                <a class="sidebar-li accordion-toggle" data-toggle="collapse" href="#collapseOne">Gestion Catalogue <b class="caret"></b></a>
                <ul id="collapseOne" class="accordion-body collapse">   
                    <li><?= $this->Html->link('Gestion des marques', array('controller' => 'brands', 'action' => 'admin_index'), array('class' => 'sidebar-li')); ?></li>
                    <li><?= $this->Html->link('Gestion des produits', array('controller' => 'products', 'action' => 'admin_index'), array('class' => 'sidebar-li')); ?></li>
                    <li><?= $this->Html->link('Gestion des categories', array('controller' => 'categories', 'action' => 'admin_index'), array('class' => 'sidebar-li')); ?></li>
                    <li><?= $this->Html->link('Gestion des stocks', array('controller' => 'stocks', 'action' => 'admin_index'), array('class' => 'sidebar-li')); ?></li>
                </ul>
            </li>

            <li>
                <a class="sidebar-li accordion-toggle" data-toggle="collapse" href="#collapseTwo">Gestion Commandes <b class="caret"></b></a>
                <ul id="collapseTwo" class="accordion-body collapse">
                      <li><?= $this->Html->link('Gestion des réductions', array('controller' => 'promos', 'action' => 'admin_index'), array('class' => 'sidebar-li')); ?></li>
                      <li><?= $this->Html->link('Gestion des frais de ports', array('controller' => '', 'action' => ''), array('class' => 'sidebar-li')); ?></li>
                      <li><?= $this->Html->link('Modes de paiement', array('controller' => '', 'action' => ''), array('class' => 'sidebar-li')); ?></li>
                      <li><?= $this->Html->link('Export de données', array('controller' => '', 'action' => ''), array('class' => 'sidebar-li')); ?></li>
                </ul>
            </li>

            <li>
                <li><?= $this->Html->link('Comptes Clients', array('controller' => 'users', 'action' => 'admin_index'), array('class' => 'sidebar-li')); ?></li>
            </li>
        </ul>
    </div>
    <div id="page-content-wrapper">
        <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- content of page -->
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
        </div>
    </div>
</div>


	<div id="container">


		<div id="content">


		</div>

		<div id="footer">

		</div>


	</div>
</body>
</html>
