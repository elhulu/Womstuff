<?php
/* Helper permettant d'interagir avec des descriptions */
App::uses('AppHelper', 'View/Helper');

class CustomdescHelper extends AppHelper {

    public function miniDesc($text, $start, $length=NULL) {
    	$resMini = substr($text, $start, $length);
    	return $resMini;
    }
}