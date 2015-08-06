<?php
abstract class ListAbstract {

	protected $_list;

	public function getList(){
		return $this->_list;
	}

	public function setList($list){
		$this->_list = $list;
		return $this;
	}

	public function getOptions(){
		$options = array();
		foreach ($this->getList() as $key => $value) {
			$options[] = array(
					"value" => $key,
					"label" => $value
			);
		}
		return $options;
	}
}