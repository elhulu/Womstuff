<?php
class Brand extends AppModel{

	public $actsAs = array('Containable', 'Slug');
	public $hasMany = array('Product');

}