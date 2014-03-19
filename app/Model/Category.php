<?php
class Category extends AppModel{

	public $actsAs = array('Containable', 'Tree', 'Slug');
	public $hasMany = array(
		'Feature' => array(
			'dependent' => true)
		);
	// public $belongsTo = array('Products');

	// public $validate = array(
	// 	'name' => array(
	// 		'required' => true,
	// 		'allowEmpty' => false,
	// 		'message' => 'Ce champ est requis !'
	// 	)
	// );
}