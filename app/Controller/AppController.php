<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

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



        // Globals

        if( !defined('CART_COUNT') )
        {

            if( !$this->Session->check('cart'))
            {
                define('CART_COUNT',0);
                $this->Session->write('cart.products', array());
            }
            else
            {
                //$this->Session->write('cart.products', array());
                $count = "0";
                if(!empty($_SESSION['cart']['products'] )){
                    foreach($_SESSION['cart']['products'] as $value){
                        $count++;
                    }
                }

                $this->Session->write('cart.count', $count );

                define('CART_COUNT', (INT)$this->Session->read('cart.count'));
            }

        }


        // Auth Data
        $this->Auth->loginAction = array('controller'=>'users','action'=>'login','membre'=>false,'admin'=>false);


        if( !isset($this->request->params['prefix']) || $this->request->params['prefix'] == null ){

            $this->Auth->allow();
        }


        $title = " • Womstuff";
        if(isset($this->request->params["prefix"]) && $this->request->params["prefix"] == "admin"){
            $this->layout = "admin";
            $title = ' • Womstuff - Administration';
        }
        // Ajax mod
        if($this->request->is('ajax'))
        {
            $this->layout = null;
        }

        $this->set(compact('title'));


    }

}
