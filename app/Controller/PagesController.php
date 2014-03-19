<?php

App::uses('AppController', 'Controller');


class PagesController extends AppController {

	public $uses = array();



    public function home() {
        $this->loadModel('Product');
        $lastProd = $this->Product->find('all', array(
            'order' => array('Product.id desc'),
            'limit' => '4'
        ));
        $randProd = $this->Product->find('all', array(
            'order' => 'rand()',
            'limit' => '2'
        ));
        $products = $this->Product->find('all');
        $this->set(compact('products','lastProd','randProd'));
    }



}
