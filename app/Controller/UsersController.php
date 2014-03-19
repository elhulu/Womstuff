<?php


class UsersController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index() {

        if($this->Auth->loggedIn())
        {
            $this->redirect(array('controller' => 'users', 'action' => 'edit'));
        }
        else
        {
            $this->redirect('login');
        }
    }

    public function signup() {

        $this->set('title_for_layout', $this->title_for_layout."Inscription");

        if($this->request->is('post'))
        {

            $d = $this->request->data;

            if(!empty($d['User']['password']) && $d['User']['passwordconf'] == $d['User']['password'])
            {

                $d['User']['password'] = Security::hash($d['User']['password'], null, true);


                if($this->User->saveAssociated($d))
                {
                    $user_id = $this->User->id;


                    $link = array('controller'=>'users','action'=>'activate',$this->User->id.'-'.md5($d['User']['username']));
                    App::uses('CakeEmail','Network/Email');
                    $mail = new CakeEmail('gmail');
                    $mail->from('drackarm2@gmail.com')
                        ->to($d['User']['email'])
                        ->subject('Ecommerce - Validation de votre incription')
                        ->emailFormat('html')
                        ->template('signup')
                        ->viewVars(array('username'=>$d['User']['username'],'link'=>$link))
                        ->send();
                    $this->Session->setFlash("Votre compte a bien été créé","notif");
                    $this->request->data = array();
                    $this->Session->setFlash("Votre compte à été créé avec succes. Un email de verification vous a été envoyé.","notif", array('type' => 'success'));

                    $_SESSION['mailWaiting'] = '1';
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
                else
                {

                    $errorChain = '';
                    foreach($this->User->invalidFields() as $field)
                    {
                        $errorChain .= '• '.$field[0].'<br>';
                    }
                    $this->Session->setFlash("<strong>Inscription incomplette.</strong><br>".$errorChain,"notif", array('type' => 'warning'));

                }
            }
            else
            {
                $this->Session->setFlash("<strong>Inscription incomplette.</strong><br> Les mots de passes ne correspondent pas","notif", array('type' => 'warning'));

            }
        }
    }

    function activate($token){
        $token = explode('-',$token);
        $user = $this->User->find('first',array(
            'conditions' => array('id' => $token[0],'MD5(User.username)' => $token[1],'active' => 0)
        ));
        if(!empty($user)){
            $this->User->id = $user['User']['id'];
            $this->User->saveField('active',1);
            $this->Session->setFlash("Votre compte a bien été activé","notif");
            $this->Auth->login($user['User']);
            $this->redirect(array('controller' => 'pages', 'action' => 'home'));
        }else{
            $this->Session->setFlash("Ce lien d'activation n'est pas valide","notif",array('type'=>'warning'));
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }

        die;
    }

    function logout(){
        $this->Auth->logout();
        $this->redirect('/');
    }


    function login(){

        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->User->id =  $this->Auth->user("id");
                $this->User->saveField('lastlogin',date('Y-m-d H:i:s'));
                $_SESSION['idup']= '12';
                $this->redirect(array('controller' => 'pages', 'action' => 'home'));
            }else{
                if( isset($_SESSION['mailWaiting']) && $_SESSION['mailWaiting'] == '1' )
                {
                    $this->Session->setFlash("Vous devez, tout d'abord, confirmer votre email. (un email vous à été envoyé à votre inscription.)","notif",array('type'=>'warning'));
                }
                else
                {
                    $this->Session->setFlash("Identifiants incorrects","notif",array('type'=>'warning'));
                }
            }
        }

    }

    function edit(){
        $user_id = $this->Auth->user('id');
        if(!$user_id){
            $this->redirect('/');
            die();
        }
        $passError = false;
        $this->User->id = $user_id;
        $user_data = $this->User->read();

        $fiche_id = $user_data['User']['fiche_id'];


        if(!empty($this->request->data)){

            if($this->request->is('put') || $this->request->is('post')){
                $d = $this->request->data;

                $d['User']['id'] = $user_id;
                $d['User']['fiche_id'] = $fiche_id;


                if(!empty($d['User']['password'])){

                    if($d['User']['password']==$d['User']['passwordconf']){

                        $d['User']['password'] = Security::hash($d['User']['password'],null,true);

                    }else{

                        $passError = true;
                    }

                }
                else{
                   unset($d['User']['password']);
                }


                if($passError){

                    $this->User->validationErrors['pass2'] = array('Les mots de passe ne correspondent pas');
                    $this->Session->setFlash("Les mots de passe ne correspondent pas.","notif",array('type'=>'warning'));
                }
                else
                {

                    $d['Fiche']['id'] = $fiche_id;





                    $reqRes = $this->User->saveAssociated($d);

                    if($reqRes){
                        $this->Session->setFlash("Votre profil a bien été édité","notif",array('type'=>'success'));
                        $userdata = $this->User->read();
                        $this->set('data', $d);
                    }else{
                        $this->Session->setFlash("Impossible d'enregistrer les modifications.<br><br> Merci de réessayer plus tard.","notif",array('type'=>'warning'));
                    }

                }

            }
        }
        else{
            $this->request->data = $this->User->read();

            $fiche_id = $this->request->data['User']['fiche_id'];

        }

        $this->request->data['User']['pass1'] = $this->request->data['User']['pass2'] = '';

        $userdata = $this->User->read();

        $this->set('data', $userdata);

    }


    function deletef(){
        $arrayParams = $this->request['pass'];
        $user_id = $arrayParams[0];

        if( $user_id == $this->Auth->user('id') )
        {
            $this->User->delete($user_id);
            header('Refresh: 5; URL='.SITEROOT);
        }
        else
        {
            $this->redirect('/');
        }

    }


    // ADMIN






    function admin_index(){

        $users = $this->User->find('all', array( 'order' => 'created DESC' ));

        $this->set('users', $users);

    }



    public function admin_add() {

        $this->set('title_for_layout', $this->title_for_layout."Inscription");

        if($this->request->is('post'))
        {

            $d = $this->request->data;

            if(!empty($d['User']['password']) && $d['User']['passwordconf'] == $d['User']['password'])
            {

                $d['User']['password'] = Security::hash($d['User']['password'], null, true);


                if($this->User->saveAssociated($d))
                {
                    $user_id = $this->User->id;

                    $this->redirect( array('controller' => 'users', 'action' => 'admin_edit', $user_id) );
                }
                else
                {

                    $errorChain = '';
                    foreach($this->User->invalidFields() as $field)
                    {
                        $errorChain .= '• '.$field[0].'<br>';
                    }
                    $this->Session->setFlash("<strong>Inscription incomplette.</strong><br>".$errorChain,"notif", array('type' => 'warning'));
                    //debug($this->User->invalidFields());
                }
            }
            else
            {
                $this->Session->setFlash("<strong>Inscription incomplette.</strong><br> Les mots de passes ne correspondent pas","notif", array('type' => 'warning'));
                //debug($this->User->invalidFields());
            }
        }
    }


    function admin_edit(){
        $user_id = $this->params['pass'][0];
        if(!$user_id){
            $this->redirect('/');
            die();
        }
        $passError = false;
        $this->User->id = $user_id;
        $user_data = $this->User->read();

        $fiche_id = $user_data['User']['fiche_id'];


        if(!empty($this->request->data)){

            if($this->request->is('put') || $this->request->is('post')){
                $d = $this->request->data;

                $d['User']['id'] = $user_id;
                $d['User']['fiche_id'] = $fiche_id;


                if(!empty($d['User']['password'])){

                    if($d['User']['password']==$d['User']['passwordconf']){

                        $d['User']['password'] = Security::hash($d['User']['password'],null,true);

                    }else{

                        $passError = true;
                    }

                }
                else{
                    unset($d['User']['password']);
                }


                if($passError){

                    $this->User->validationErrors['pass2'] = array('Les mots de passe ne correspondent pas');
                    $this->Session->setFlash("Les mots de passe ne correspondent pas.","notif",array('type'=>'warning'));
                }
                else
                {

                    $d['Fiche']['id'] = $fiche_id;





                    $reqRes = $this->User->saveAssociated($d);

                    if($reqRes){
                        $this->Session->setFlash("Le profil a bien été édité","notif",array('type'=>'success'));
                        $userdata = $this->User->read();
                        $this->set('data', $d);
                    }else{
                        $this->Session->setFlash("Impossible d'enregistrer les modifications.<br><br> Merci de réessayer plus tard.","notif",array('type'=>'warning'));
                    }

                }

            }
        }
        else{
            $this->request->data = $this->User->read();

            $fiche_id = $this->request->data['User']['fiche_id'];

        }

        $this->request->data['User']['pass1'] = $this->request->data['User']['pass2'] = '';

        $userdata = $this->User->read();

        $this->set('data', $userdata);
        $this->set('user_id', $user_id);

    }


    function admin_deletef(){
        $arrayParams = $this->request['pass'];
        $user_id = $arrayParams[0];

            $this->User->delete($user_id);

        $this->redirect( array('controller' => 'users', 'action' => 'admin_index') );


    }





}
?>