<?php 

abstract class Manager {
	protected $_db;

	// Constructeur
  	public function __construct($db) {
    	$this->setDb($db);
  	}

  	// Setter
    public function setDb(PDO $db) {
      $this->_db = $db;
    }
}