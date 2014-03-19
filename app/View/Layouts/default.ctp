<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout. $title; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css( array('panier', 'bootstrap', 'style1', 'jquery.rs.carousel', 'cupertino/jquery-ui-1.10.3.custom.min.css', 'datepicker') );
        echo $this->fetch('css');

        echo $this->fetch('meta');



    echo $this->Html->script( array('//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', 'bootstrap.min', 'scriptPanier') );
    echo $this->fetch('script');

        
    ?>
</head>
<body>
    

    <div class="headerbg">
        <div class="headermain">

                <div class="headtxtdata">

                    <?php if(AuthComponent::user('id')){ ?>
                    <div class="headusername">Bonjour <span><?php echo USERNAME; ?></span></div>
                    <?php }else{ ?>
                        <div class="headusername"><a href="<?php echo SITEROOT; ?>users/signup">Inscription</a></div>
                    <?php } ?>

                    <div class="headcart">
                        <button type="button" class="btn btn-primary btncart" id="recapPanier"> 
                            <span class="glyphicon glyphicon-shopping-cart panierInline"></span>
                                <div class="panierInline" id="nbrArticles"><?= CART_COUNT; ?></div>
                                <div class="panierInline">articles dans le panier</div>
                        </button>
                        <div id="listPanier">
                            <?php if(CART_COUNT == 0){
                                    echo 'Votre panier est vide.';
                                } ?>
                        </div>
                    </div>

                </div>


                <div class="headnav">

                    <nav class="navbar navbar-default navbarvis" role="navigation">
                        <div class="navbar-header">
                            <button class="navbar-toggle" data-target="#bs-example-navbar-collapse-7" data-toggle="collapse" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo SITEROOT; ?>">WOM<span>STUFF</span></a>
                        </div>
                        <div id="bs-example-navbar-collapse-7" class="collapse navbar-collapse navbarvis">
                            
                            <?= $this->Form->create('Product', array('action' => 'search', 'type' => 'get', 'class' => 'navbar-form navbar-left', 'inputDefaults' => array('div' => array('class' => 'form-group')))) ?>
                                <div class="searchinput">
                                    <?= $this->Form->input('q', array('class' => 'form-control', 'label' => false, 'placeholder' => 'Rechercher...')) ?>
                                </div>
                                <?= $this->Form->button('Rechercher', array('class' => 'btn btn-default btnnavbar')) ?>
                            <?= $this->Form->end() ?>

                            <!-- <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">

                                    <div class="searchinput">
                                        <input type="text" class="form-control" placeholder="Rechercher un article">
                                    </div>

                                    <div class="searchcat">
                                        <select class="form-control">
                                            <option>Cat 1</option>
                                            <option>Cat 2</option>
                                            <option>Cat 3</option>
                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-default btnnavbar">Go</button>
                            </form> -->


                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="#">Promos</a>
                                </li>
                                <?php if(AuthComponent::user('id')): ?>
                                <li>
                                    <a href="#">Commandes</a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="#">Contact</a>
                                </li>
                                <?php if(AuthComponent::user('id')): ?>
                                <li>
                                    <?php echo $this->Html->link( 'mon compte','/users/edit',array('class' => 'accountbut') ); ?>
                                </li>
                                <?php endif; ?>
                            </ul>

                            <?php if(AuthComponent::user('id')){ ?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="<?php echo SITEROOT; ?>users/logout" >Deconnexion</a>
                                    </li>
                                </ul>
                            <?php }else{ ?>
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="<?php echo SITEROOT; ?>users/login" >Connexion</a>
                                    </li>
                                </ul>
                            <?php } ?>

                        </div>
                    </nav>

                </div>



        </div>

        <?php if( isset($LayoutParam_carrousel) ): ?>

        <div class="caroumain">



            <div class="rs-carousel">
                <ul class="slidersul">
                    <li>
                        <img src="<?php echo SITEROOT; ?>img/carousel/1.png" alt="Car1"/>
                    </li>
                    <li>
                        <img src="<?php echo SITEROOT; ?>img/carousel/2.png" alt="Car2"/>
                    </li>
                    <li>
                        <img src="<?php echo SITEROOT; ?>img/carousel/3.png" alt="Car3"/>
                    </li>
                    <li>
                        <img src="<?php echo SITEROOT; ?>img/carousel/4.png" alt="Car4"/>
                    </li>
                </ul>
            </div>

            <div class="carouPrevNextBut carouslPrevBut"> < </div>
            <div class="carouPrevNextBut carouslNextBut"> > </div>

        </div>

        <?php endif; ?>


    </div>
    <div id="wrap">
    </div>
    <div id="container">

        <div id="content">
            <div id="ariane" class="well">
                <?= $this->Html->getCrumbs(' > ', array(
                'text' => '<span class="glyphicon glyphicon-home"></span> Accueil',
                'url' => array('controller' => 'pages', 'action' => 'home'),
                'escape' => false)); ?>
            </div>

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>

        </div>

        <div id="footer">

        </div>


    </div>



</body>
</html>