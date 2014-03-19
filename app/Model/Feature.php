<?php
class Feature extends AppModel{

	public $belongsTo = array('Category' => array(
		'counterCache' => true));


	public $hasMany = array('ProductR');

	public $hasAndBelongsToMany = array('Product');

	public $validate = array(
		'value' => array(
			'required' => true
		)
	);
	
}