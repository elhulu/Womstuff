<div class="mainwell">


    <div class="logincontent">
        <?php echo $this->Session->flash(); ?>

        <div class="panel panel-pf loginpanel" id="logbox">
            <div class="panel-heading">
                <h3 class="panel-title">Connexion</h3>
            </div>
            <div class="panel-body">


                <div class="loginmain">
                    <form class="bs-example form-horizontal" method="POST" id="login_form">



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




<?= $this->Html->script('login.js'); ?>