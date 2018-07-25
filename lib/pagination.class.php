<?php 

class Pagination {
	private $_itemPerPage;
	private $_nbOfItems;

	public function __construct(Array $data) {
		$this->hydrate($data);
	}

	public function hydrate(Array $data) {
		foreach ($data as $key => $value) {
			$method = 'set' . ucfirst($key);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	public function nbOfPages() {
		return ceil($this->_nbOfItems/$this->_itemPerPage);
	}

	public function offset($page) {
		return ($page-1)*$this->_itemPerPage;
	}

	public function limit($offset) {
		return $offset+$this->_itemPerPage;
	}

	// Getters



	public function itemPerPage() {
		return $this->_itemPerPage;
	}

	public function nbOfItems() {
		return $this->_nbOfItems;
	}

	// Setters

	public function setItemPerPage($itemPerPage) {
		$itemPerPage = (int) $itemPerPage;

		if($itemPerPage > 0) {
			$this->_itemPerPage = $itemPerPage;
		}
	}

	public function setnbOfItems($nbOfItems) {
		$nbOfItems = (int) $nbOfItems;

		if($nbOfItems > 0) {
			$this->_nbOfItems = $nbOfItems;
		}
	}
}
