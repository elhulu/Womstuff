<?php
App::uses('AppController', 'Controller');

class PromosController extends AppController {


	public function admin_index() {
		$this->recursive = -1;
		$promos = $this->Promo->find('all');

		$this->set(compact('promos'));
	}

	public function admin_add() {
		$categories = $this->Promo->Category->generateTreeList(null,null,null, '---');
		$this->set(compact('categories'));
		if ($this->request->is('post')) {
			$this->Promo->create();
			if ($this->Promo->save($this->request->data)) {
				$this->Session->setFlash('Nouvelle marque ajoutée avec succès','notif',array('type' => 'success'));
				return $this->redirect(array('controller' => 'promos', 'action' => 'admin_index'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Promo->exists($id)) {
			throw new NotFoundException(__('Reduction Invalide'));
		}
		$categories = $this->Promo->Category->generateTreeList(null,null,null, '---');
		$this->set(compact('categories'));
		$this->Promo->id = $id;
		if(empty($this->request->data)){
			$this->request->data = $this->Promo->read();
		} 
		else{
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Promo->save($this->request->data)) {
					$this->Session->setFlash('Vos modifications ont bien été appliquées','notif',array('type' => 'success'));
					return $this->redirect(array('controller' => 'promos', 'action' => 'admin_index'));
				}
			}
		}
	}


	public function admin_delete($id = null) {
		$this->Promo->id = $id;
		if (!$this->Promo->exists()) {
			throw new NotFoundException(__('Marque invalide'));
		}
		$this->Promo->delete($id);
		$this->Session->setFlash('Le code promo a bien été supprimée','notif',array('type' => 'success'));
		return $this->redirect($this->referer());
		
	}

	public function calculate(){
		if($this->request->is('ajax')){
			$this->render('empty');
			$retour = array();
			$code = (!empty($this->request->data['code'])) ? $this->request->data['code'] : null;
			$total = (!empty($this->request->data['total'])) ? $this->request->data['total'] : null;
			if($code){
				$promo = $this->Promo->find('first', array('conditions' => array('code' => $code)));
				if($promo){
					$remise = $total * ($promo['Promo']['reduction'] / 100);
					$price = floor($total - $remise);
					$retour['response'] = $price;
					$retour['ok'] = true;
					$retour['message'] = 'Ce code promo a bien été appliqué !';
				}
				else{
					$retour['ok'] = false;
					$retour['errors'] = 'Ce code ne semble pas valide';
				}
			}
			else{
				$retour['ok'] = false;
				$retour['errors'] = 'Veuillez rentrer un code';
			}
			echo json_encode($retour);
		}
		else{
			return $this->redirect($this->referer());
		}
	}	

}
