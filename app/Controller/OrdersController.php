<?php
class OrdersController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();

	}

	public function step1(){ // User logged ?

        $user_id = $this->Auth->user('id');

        if($user_id){ // logged

            // check adress

            $user_id = $this->Auth->user('id');

            $this->loadModel('Fiche');
            $user_data = $this->Fiche->find('all', array('conditions' => array('user_id' => $user_id)));


            if( isset($user_data[0]['Fiche']['adress']) && !empty($user_data[0]['Fiche']['adress']) )
            {
                $this->set('allgd', true);
                $this->set('adress', $user_data[0]['Fiche']['adress']);
                $this->set('adress_empty', false);
            }
            else
            {
                $this->set('adress_empty', true);
            }



        }
        else // unlogged
        {
            $this->set('adress_empty', false);
        }

    }


	public function step2(){

        $user_id = $this->Auth->user('id');


        $tableaux = array();
        $cart_content = $this->Session->read('cart.products');
        if($cart_content){
            foreach($cart_content as $value){
                $value['id'] =  intval($value['id']);
                $tableaux[] = $value['id'];
            }
        }

        $this->loadModel('Product');
        $products = $this->Product->find('all', array(
            'conditions' => array("Product.id" => $tableaux)
        ));
        foreach ($products as $key => $value) {
            foreach ($cart_content as $k => $v) {
                if($v['id'] == $value['Product']['id']){
                    $products[$key]['Product']['count'] = $v['count'];
                    $products[$key]['Product']['total'] = $v['count'] * $products[$key]['Product']['price'];
                }
            }
        }
        $this->set(compact('products'));

        $total = 0 ;

        foreach($products as $value){
            $total = $total + $value['Product']['total'];
        }

        $this->set('total', $total);



    }

}