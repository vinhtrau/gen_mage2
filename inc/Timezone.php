<?php
// require "inc/ListAbstract.php";
class Timezone extends ListAbstract {

	public function __construct(){
		$zones = timezone_identifiers_list();
		$this->setList($zones);
	}
	
	public function getOptions(){
		$options = array();
		foreach ($this->getList() as $key => $value) {
			$options[] = array(
					"value" => $value,
					"label" => $value
			);
		}
		return $options;
	}
}