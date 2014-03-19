<?php
class Image extends AppModel{


	public $belongsTo = array('Product' => array(
		'counterCache' => true));

	

}