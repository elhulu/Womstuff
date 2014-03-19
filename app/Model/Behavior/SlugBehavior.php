<?php 
class SlugBehavior extends ModelBehavior {

	public function beforeSave(Model $Model, $options = array()){
		if(
			isset($Model->data[$Model->alias]['name']) &&
			(
				!isset($Model->data[$Model->alias]['slug']) ||
				empty($Model->data[$Model->alias]['slug'])
			)
		){
			$Model->data[$Model->alias]['slug'] = strtolower(Inflector::slug($Model->data[$Model->alias]['name'], '-'));
		}
	}




}
