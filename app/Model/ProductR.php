<?php
class ProductR extends AppModel{

	public $name = 'features_products';

	public $belongsTo = array(
		'Feature', 'Product'
	);	

}