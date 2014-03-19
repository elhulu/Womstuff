<?php //echo $this->element('sql_dump');?>
<div class="mainwell">
    <div class="signup_form">

        <div class="well inline wWell">
            <form class="bs-example form-horizontal" method="POST" id="signup_form" action="<?php echo CONTROLLERROOT; ?>users/edit/<?= $user_id ?>">
                <fieldset>
                    <legend>Modifier les informations personnelles</legend>


                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputEmail">Nom d'utilisateur</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputEmail" class="form-control" type="text" placeholder="<?php echo isset($data['User']['username'])?$data['User']['username']:''; ?>" name="data[User][username]" value="<?php echo isset($data['User']['username'])?$data['User']['username']:''; ?>">
                            <span class="validinfos" id="emailInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputEmail">Email</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputEmail" class="form-control" type="email" placeholder="<?php echo isset($data['User']['email'])?$data['User']['email']:''; ?>" name="data[User][email]" value="<?php echo isset($data['User']['email'])?$data['User']['email']:''; ?>">
                            <span class="validinfos" id="emailInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputPassword">Mot de passe</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputPassword" class="form-control" type="password" placeholder="••••••" name="data[User][password]">
                            <span class="validinfos" id="pass1Info"></span>
                        </div>
                    </div>






                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputPassword">Confirmation</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputPassword2" class="form-control" type="password"  name="data[User][passwordconf]">
                            <span class="validinfos" id="pass2Info"></span>
                        </div>
                    </div>


                    <h4>Informations supplémentaires / Livraison</Complzmznt></h4>


                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputFirstname">Prénom</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputFirstname" class="form-control" type="text" placeholder="<?=isset($data['Fiche']['firstname'])?$data['Fiche']['firstname']:''; ?>" name="data[Fiche][firstname]" value="<?php echo isset($data['Fiche']['firstname'])?$data['Fiche']['firstname']:''; ?>">
                            <span class="validinfos" id="firstnameInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputName">Nom</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputName" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['lastname'])?$data['Fiche']['lastname']:''; ?>" name="data[Fiche][lastname]" value="<?php echo isset($data['Fiche']['lastname'])?$data['Fiche']['lastname']:''; ?>">
                            <span class="validinfos" id="nameInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Pays</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputCountry" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['country'])?$data['Fiche']['country']:''; ?>" name="data[Fiche][country]" value="<?php echo isset($data['Fiche']['country'])?$data['Fiche']['country']:''; ?>">
                            <span class="validinfos" id="countryInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Adresse <span>(No de rue + Nom rue)</span></label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputCountry" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['adress'])?$data['Fiche']['adress']:''; ?>" name="data[Fiche][adress]" value="<?php echo isset($data['Fiche']['adress'])?$data['Fiche']['adress']:''; ?>">
                            <span class="validinfos" id="countryInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Adresse : suite <span>(optionnel)</span></label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputCountry" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['adress2'])?$data['Fiche']['adress2']:''; ?>" name="data[Fiche][adress2]" value="<?php echo isset($data['Fiche']['adress2'])?$data['Fiche']['adress2']:''; ?>">
                            <span class="validinfos" id="countryInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Code Postal</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputCountry" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['zipcode'])?$data['Fiche']['zipcode']:''; ?>" name="data[Fiche][zipcode]" value="<?php echo isset($data['Fiche']['zipcode'])?$data['Fiche']['zipcode']:''; ?>">
                            <span class="validinfos" id="countryInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Telephone domicile</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputCountry" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['tel1'])?$data['Fiche']['tel1']:''; ?>" name="data[Fiche][tel1]" value="<?php echo isset($data['Fiche']['tel1'])?$data['Fiche']['tel1']:''; ?>">
                            <span class="validinfos" id="countryInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Mobile</label>
                        <div class="col-lg-7 forminput whitebox-input-input">
                            <input id="inputCountry" class="form-control" type="text" placeholder="<?= isset($data['Fiche']['tel2'])?$data['Fiche']['tel2']:''; ?>" name="data[Fiche][tel2]" value="<?php echo isset($data['Fiche']['tel2'])?$data['Fiche']['tel2']:''; ?>">
                            <span class="validinfos" id="countryInfo"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label formlabel" for="inputCountry">Date de naissance</label>
                        <div class="col-lg-7 forminput whitebox-input-input input-append date" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                            <input id="bob" class="span2" size="16" type="text" value="<?php echo isset($data['Fiche']['date_of_birth'])?$data['Fiche']['date_of_birth']:'JJ/MM/AAAA'; ?>" name="data[Fiche][date_of_birth]">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-7 signupbutdiv">
                            <button class="btn btn-default reset">Annuler</button>
                            <button id="submitbutt" class="btn btn-primary" type="submit">Envoyer</button>
                        </div>
                    </div>



                    <h4>Autres</h4>

                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-7 signupbutdiv">
                            <?= $this->Html->link('Supprimer le compte', array('controller' => 'users', 'action' => 'deletef',  $user_id ), array('class' => 'btn btn-default'), 'Etes vous sur ?'); ?>

                        </div>
                    </div>

                </fieldset>

            </form>
        </div>
    </div>


    <div class="signupaverts inline">


        <?= $this->Session->flash(); ?>

		
    </div>


</div>


<?= $this->Html->script( array('bootstrap-datepicker.js'), array('inline' => false) ); ?>

<script type="text/javascript">

    $('#bob').datepicker()
        .on('changeDate', function(ev){
            if (ev.date.valueOf() < startDate.valueOf()){
            }
        });

</script>


