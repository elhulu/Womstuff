<?= $this->Html->addCrumb('Commande • Informations de livraison', array("controller" => "orders","action" => "step1")); ?>



<div class="mainwell">
    <?php if($adress_empty): ?>



        <div class="alert alert-infos">
            Vous n'avez pas encore renseigné vos coordonées postales.
        </div>

        <?= $this->Html->link('Ajouter une adresse', array('controller' => 'users', 'action' => 'edit'), array('class' => 'btn btn-primary btn-lg')); ?>




    <?php elseif($allgd): ?>


    <div class="panel panel-pf loginpanel" id="logbox">

        <div class="panel-heading">
            <h3 class="panel-title">Adresse de livraison :</h3>
        </div>
        <div class="panel-body">

            <div class="well well-lg"><?= $adress; ?></div>

            <?= $this->Html->link('Changer l\'adresse de livraison', array('controller' => 'users', 'action' => 'edit'), array('class' => 'btn btn-default btn-lg')); ?>
            <?= $this->Html->link('Confirmer >', array('controller' => 'orders', 'action' => 'step2'), array('class' => 'btn btn-primary btn-lg')); ?>

        </div>
    </div>

    <?php elseif($allgd): ?>


        <div class="col-md-8">


            <div class="logincontent">
                <?php echo $this->Session->flash(); ?>

                <div class="panel panel-pf loginpanel" id="logbox">
                    <div class="panel-heading">
                        <h3 class="panel-title">Connexion</h3>
                    </div>
                    <div class="panel-body">


                        <div class="loginmain">
                            <form class="bs-example form-horizontal" method="POST" id="login_form" action="<?= $this->Html->url(array("controller" => "users","action" => "login")); ?>">



                                <div class="form-group">
                                    <label class="col-lg-2 control-labelLogin formlabelLogin" for="inputUsername">Nom d'utilisateur</label>
                                    <div class="col-lg-11 forminputLogin whitebox-input-inputb">
                                        <input id="inputUsername" class="loginInputs form-control" type="text" placeholder="" name="data[User][username]">
                                        <span class="validinfos" id="usernameInfo"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-2 control-labelLogin formlabelLogin" for="inputPassword">Mot de passe</label>
                                    <div class="col-lg-11 forminputLogin whitebox-input-inputb">
                                        <input id="inputPassword" class="loginInputs form-control" type="password" placeholder="" name="data[User][password]">
                                        <span class="validinfos" id="passInfo"></span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-2 col-lg-offset-9 signupbutdivLogin">
                                        <button class="btn btn-primary" type="submit">Connexion</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>



        <div class="col-md-4">

            <?= $this->Html->link('Je m\'inscris !', array('controller' => 'users', 'action' => 'signup'), array('class' => 'btn btn-primary btn-lg')); ?>

        </div>



    <?php endif; ?>



</div>








