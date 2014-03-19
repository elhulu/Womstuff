<?php
class Product extends AppModel {

	public $actsAs = array('Containable', 'Slug');

	public $belongsTo = array('Category', 'Brand');

	public $hasMany = array(
		'Image' => array(
			'dependent' => true
		),
		'ProductR'
	);

	public $hasAndBelongsToMany = array('Feature');
	
}