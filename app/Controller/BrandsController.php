<?php
App::uses('AppController', 'Controller');

class BrandsController extends AppController {


	public function admin_index() {
		$this->recursive = -1;
		$brands = $this->Brand->find('all');
		$this->set(compact('brands'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Brand->create();
			if ($this->Brand->save($this->request->data)) {
				$this->Session->setFlash('Nouvelle marque ajoutée avec succès','notif',array('type' => 'success'));
				return $this->redirect(array('controller' => 'brands', 'action' => 'admin_index'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->Brand->exists($id)) {
			throw new NotFoundException(__('Marque Invalide'));
		}
		$this->Brand->id = $id;
		if(empty($this->request->data)){
			$this->request->data = $this->Brand->read();
		} 
		else{
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Brand->save($this->request->data)) {
					$this->Session->setFlash('Vos modifications ont bien été appliquées','notif',array('type' => 'success'));
					return $this->redirect(array('controller' => 'brands', 'action' => 'admin_index'));
				}
			}
		}
	}


	public function admin_delete($id = null) {
		$this->Brand->id = $id;
		if (!$this->Brand->exists()) {
			throw new NotFoundException(__('Marque invalide'));
		}
		$this->Brand->delete($id);
		$this->Session->setFlash('La marque a bien été supprimée','notif',array('type' => 'success'));
		return $this->redirect($this->referer());
		
	}}
