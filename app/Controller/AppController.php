<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
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
