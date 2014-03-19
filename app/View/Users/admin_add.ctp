<div class="mainwell">
    <div class="signup_form">


        <div class="well inline wWell">
            <form class="bs-example form-horizontal" method="POST" id="signup_form" action="<?php echo CONTROLLERROOT; ?>users/add">
                <fieldset>
                    <legend>Ajouter un utilisateur</legend>



                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputUsername">Nom d'utilisateur</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputUsername" class="form-control" type="text" placeholder="2 caractères min - 80 max." name="data[User][username]">
                            <span class="validinfos" id="usernameInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputEmail">Email</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputEmail" class="form-control" type="email" placeholder="Email valide uniquement" name="data[User][email]">
                            <span class="validinfos" id="emailInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputPassword">Mot de passe</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputPassword" class="form-control" type="password" placeholder="2 caractères min - 80 max,  au moins 2 chiffres." name="data[User][password]">
                            <span class="validinfos" id="pass1Info"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputPassword">Confirmation</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputPassword2" class="form-control" type="password" placeholder="4 caractères min - 80 max,  au moins 2 chiffres." name="data[User][passwordconf]">
                            <span class="validinfos" id="pass2Info"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-3 col-lg-offset-8 signupbutdiv">
                            <button id="submitbutt" class="btn btn-primary" type="submit">Envoyer</button>
                        </div>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>


    <div class="signupaverts inline">




            <?php echo $this->Session->flash(); ?>


        <?php if(empty($_POST)){ ?>

        <div class="alert alert-dismissable alert-info">
            <button class="close" data-dismiss="alert" type="button">×</button>
            <strong>Le nom d'utilisateur</strong>
            doit être composé d'au moins 2 caractères et de moins de 80 caractères.
        </div>

        <div class="alert alert-dismissable alert-info">
            <button class="close" data-dismiss="alert" type="button">×</button>
            <strong>L'email</strong>
            doit être valide. (validation de votre inscription)
        </div>

        <div class="alert alert-dismissable alert-info">
            <button class="close" data-dismiss="alert" type="button">×</button>
            <strong>Le mot de passe</strong>
            doit être composé de 4 à 80 caractères, contenir des lettres et des chiffres. (au moins 3 chiffres)
        </div>

        <?php } ?>


    </div>


</div>


<?= $this->Html->script('signup.js'); ?>



