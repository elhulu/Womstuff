<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {



    public $title_for_layout = 'WomStuff • ';

    public $freqs = array();

    //'DebugKit.Toolbar',
    public $components = array('Session','Cookie','Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'scope' => array('User.active' => 1)
                )
            )
        )
    );

    function beforeFilter(){



        // Auth Data
        $this->Auth->loginAction = array('controller'=>'users','action'=>'login','membre'=>false,'admin'=>false);

        if( !isset($this->request->params['prefix']) ){

            $this->Auth->allow();
        }

        // Ajax mod
        if($this->request->is('ajax'))
        {
            $this->layout = null;
        }





    }



}
