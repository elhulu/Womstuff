<?php

class ProductsController extends AppController {

	public $helpers = array('Wysiwyg.Ck','Customdesc');

	public function admin_index() {

		$this->set('title_for_layout', $this->title_for_layout."Liste des produits");
		$products = $this->Product->find('all');
		$this->set(compact('products'));
	}

	public function admin_add() {
		$this->set('title_for_layout', $this->title_for_layout."Ajout de produit");
		$categories = $this->Product->Category->generateTreeList(null,null,null, '- - - ');
		$this->set(compact('categories'));
		$brands = $this->Product->Brand->find('list', array('order' => 'name ASC'));
		$this->set(compact('brands'));

		if($this->request->is('ajax')){
			$this->render('empty');
			$categoryId = (isset($this->request->data['categoryId'])) ? $this->request->data['categoryId'] : null;
			$results = $this->Product->Feature->find('list', array(
				'conditions' => array('category_id' => $categoryId)));
			echo json_encode($results);
		}

		if($this->request->is('post') && !$this->request->is('ajax'))
		{
			
			if(!empty($this->request->data['Image'][0])){
				foreach ($this->request->data['Image'] as $key => $value) {
					$filename = $this->request->data['Product']['name'] . '_' .$key . "." . pathinfo($this->request->data['Image'][$key]['name'], PATHINFO_EXTENSION);
					$folder = IMAGES . $this->request->data['Product']['name'] . DS;
					$thumb = $this->request->data['Product']['name'] . '_' .$key . '_thumb' . "." . pathinfo($this->request->data['Image'][$key]['name'], PATHINFO_EXTENSION);
					$thumb2 = $this->request->data['Product']['name'] . '_' .$key . '_thumb2' . "." . pathinfo($this->request->data['Image'][$key]['name'], PATHINFO_EXTENSION);

					if(!file_exists(IMAGES . $this->request->data['Product']['name'])){
						mkdir(IMAGES . $this->request->data['Product']['name'], 0777);
					}
					move_uploaded_file($this->request->data['Image'][$key]['tmp_name'], $folder . DS . $filename);
					App::import('Vendor', 'ImageTool');
					ImageTool::resize(array(
						'input' => $folder . DS . $filename,
						'output' => $folder . DS . $thumb,
						'width' => 300,
						'height' => 300,
						'keepRatio' => true,
						'paddings' => false
					));
					ImageTool::resize(array(
						'input' => $folder . DS . $filename,
						'output' => $folder . DS . $thumb2,
						'width' => 160,
						'height' => 160,
						'keepRatio' => true,
						'paddings' => false
					));
					$this->request->data['Image'][$key]['filename'] = $filename;
					$this->request->data['Image'][$key]['filesize'] = $this->request->data['Image'][$key]['size'];
					$this->request->data['Image'][$key]['filetype'] = $this->request->data['Image'][$key]['type'];
					$this->request->data['Image'][$key]['path'] = $this->request->data['Product']['name'] . '/' . $filename;
					$this->request->data['Image'][$key]['thumb'] = $this->request->data['Product']['name'] . '/' . $thumb;
					$this->request->data['Image'][$key]['thumb2'] = $this->request->data['Product']['name'] . '/' . $thumb2;
				}
			}
			
			

			if($this->Product->saveAssociated($this->request->data)){
				$this->Session->setFlash('Nouveau produit ajouté avec succès','notif',array('type' => 'success'));
				return $this->redirect(array('controller' => 'products', 'action' => 'admin_index'));
			}
			
		

		}

	}

	public function admin_edit($id=null, $slug=null){
		$categories = $this->Product->Category->generateTreeList(null,null,null, '---');
		$this->set(compact('categories'));
		$brands = $this->Product->Brand->find('list', array('order' => 'name ASC'));
		$this->set(compact('brands'));

		if($this->request->is('ajax')){
			$this->render('empty');
			$categoryId = (isset($this->request->data['categoryId'])) ? $this->request->data['categoryId'] : null;
			$results = $this->Product->Feature->find('list', array(
				'conditions' => array('category_id' => $categoryId)));
			echo json_encode($results);
		}
		
		if($id == null){
			return $this->redirect(array('controller' => 'categories', 'action' => 'admin_index'));
		}


		$this->Product->id = $id;
		if(!empty($this->request->data)){


			foreach($this->request->data['Image'] as $key => $value){
				if(isset($this->request->data['Image'][$key]) && $this->request->data['Image'][$key]['name'] == ""){
					unset($this->request->data['Image'][$key]);
				}
			}
			if($this->request->is('put')){
				if(!empty($this->request->data['Image'])){
					foreach ($this->request->data['Image'] as $key => $value) {
						$filename = $this->request->data['Product']['name'] . '_' .$key . "." . pathinfo($this->request->data['Image'][$key]['name'], PATHINFO_EXTENSION);
						$thumb = $this->request->data['Product']['name'] . '_' .$key . '_thumb' . "." . pathinfo($this->request->data['Image'][$key]['name'], PATHINFO_EXTENSION);
						$thumb2 = $this->request->data['Product']['name'] . '_' .$key . '_thumb2' . "." . pathinfo($this->request->data['Image'][$key]['name'], PATHINFO_EXTENSION);
						$folder = IMAGES . $this->request->data['Product']['name'] . DS;

						if(!file_exists(IMAGES . $this->request->data['Product']['name'])){
							mkdir(IMAGES . $this->request->data['Product']['name'], 0777);
						}
						if(file_exists($folder . DS . $filename)){
							unlink($folder . DS . $filename);
						}
						move_uploaded_file($this->request->data['Image'][$key]['tmp_name'], $folder . DS . $filename);
						App::import('Vendor', 'ImageTool');
						ImageTool::resize(array(
							'input' => $folder . DS . $filename,
							'output' => $folder . DS . $thumb,
							'width' => 300,
							'height' => 300,
							'keepRatio' => true,
							'paddings' => false
						));
						ImageTool::resize(array(
							'input' => $folder . DS . $filename,
							'output' => $folder . DS . $thumb2,
							'width' => 150,
							'height' => 150,
							'keepRatio' => true,
							'paddings' => false
						));
						$this->request->data['Image'][$key]['filename'] = $filename;
						$this->request->data['Image'][$key]['filesize'] = $this->request->data['Image'][$key]['size'];
						$this->request->data['Image'][$key]['filetype'] = $this->request->data['Image'][$key]['type'];
						$this->request->data['Image'][$key]['path'] = $this->request->data['Product']['name'] . '/' . $filename;
						$this->request->data['Image'][$key]['thumb'] = $this->request->data['Product']['name'] . '/' . $thumb;
						$this->request->data['Image'][$key]['thumb2'] = $this->request->data['Product']['name'] . '/' . $thumb2;
					}
				}
 
				if($this->Product->saveAssociated($this->request->data)){
					$this->Session->setFlash('Vos modifications ont été appliquées avec succès','notif',array('type' => 'success'));
					return $this->redirect(array('controller' => 'products', 'action' => 'admin_index'));
				}
			}
			else{
				$this->Session->setFlash('Les erreurs suivantes sont apparues','notif',array('type' => 'danger'));
			}
		}
		else{
			$this->request->data = $this->Product->read();
		}
	}

	public function admin_delete($id = null) {
		if(!$id){
			return $this->redirect($this->referer());
		}
		$this->Product->id = $id;
		$product = $this->Product->read();
		foreach ($product['Image'] as $key => $data){
			unlink($product['Image'][$key]['path']);
		}
		$this->Product->delete($id);
		return $this->redirect($this->referer());
	}

	public function view($category=null, $id=null, $slug=null){

		if(isset($this->request->params['category'], $this->request->params['slug'])){ 
			$results = $this->Product->findById($id);
			$randBool = rand(0,1) == 1;
			$sortType = ($randBool == TRUE) ? 'ASC' : 'DESC';
			$slug = $this->Product->find('all', array('conditions' => array(
				'Category.slug' => $results['Category']['slug'],
				'and' => array('Product.id !=' => $id)
			),'limit' => '3'));
			$brandSugg = $this->Product->find('all', array('conditions' => array(
				'Product.brand_id' => $results['Product']['brand_id'],
				'and' => array('Product.id !=' => $id)
			), 'limit' => '3'));
			$priceSugg = $this->Product->find('all', array(
	            'order' => array('Product.id '.$sortType),
	            'limit' => '3'
			));
			$this->set(compact('results','slug','brandSugg','priceSugg'));
			$this->render('moreInfo');
		}
		elseif (isset($this->request->params['category']) && !isset($this->request->params['slug']) && !isset($this->request->params['id'])){ // affichage des produits d'une catégorie
			$results = $this->Product->find('all', array('conditions' => array('Category.slug' => $category)));
			$this->set(compact('results'));
		}		
		if(empty($results) || (isset($this->request->param['category']) && !isset($this->request->params['id']))){
			throw new NotFoundException('Page introuvable');
		}
	}

	public function search(){
		$q = $this->request->query['q'];
		if(strlen($q) > 3){
			$conditions = array(
				'or' => array('Product.name LIKE' => '%'.$q.'%'),
				'or'=> array('Category.name' => $q),
				'or' => array('Product.description LIKE' => '%'.$q.'%'),
			);
			$results = $this->Product->find('all', array('conditions' => $conditions));
			$this->set(compact('results'));
			$this->set(compact('q'));
		}
		else{
			debug('mot trop court');
		}
	}


	public function moreInfo(){
		$productID = $this->request->params['pass'][0];
		$res = $this->Product->find('first', array('conditions' => array('Product.id' => $productID)));

		//Partie suggestion
		$randBool = rand(0,1) == 1;
		$sortType = ($randBool == TRUE) ? 'ASC' : 'DESC';
		$slug = $this->Product->find('all', array('conditions' => array(
			'Category.slug' => $res['Category']['slug'],
			'and' => array('Product.id !=' => $productID)
		),'limit' => '3'));
		$brandSugg = $this->Product->find('all', array('conditions' => array(
			'Product.brand_id' => $res['Product']['brand_id'],
			'and' => array('Product.id !=' => $productID)
		), 'limit' => '3'));
		$priceSugg = $this->Product->find('all', array(
            'order' => array('Product.id '.$sortType),
            'limit' => '3'
		));
		$this->set(compact('res','slug','brandSugg','priceSugg'));
	}

}