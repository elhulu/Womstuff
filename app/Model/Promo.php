<?php
class Promo extends AppModel{

	public $belongsTo = array('Category');

	public $validate = array(
		'reduction' => array(
			'rule' => 'numeric',
			'required' => true,
			'message' => 'Vous devez renter un nombre !',
			'allowEmpty' => false
		)
	);

}