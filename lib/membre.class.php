<?php

class Membre {
  protected $id;
  protected $nickname;
  protected $pass;
  protected $email;
  protected $registrationDate;

  // Constructeur
  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $method = 'set' . ucfirst($key);

      if(method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
  // Getters
  public function id() {
    return $this->id;
  }

  public function nickname() {
    return $this->nickname;
  }

  public function pass() {
    return $this->pass;
  }

  public function email() {
    return $this->email;
  }

  public function registrationDate() {
    return $this->registrationDate;
  }
  // Setters

  public function setId($id) {
    $id = (int) $id;

    if ($id > 0) {
      $this->id = $id;
    }
  }

  public function setNickname($nickname) {
    if (is_string($nickname) and strlen($nickname) <= 255) {
      $this->nickname = $nickname;
    }
  }

  public function setPass($pass) {
    if (is_string($pass) and strlen($pass) <= 255) {
      $this->pass = $pass;
    }
  }

  public function setEmail($email) {
    if (is_string($email)) {
      $this->email = $email;
    }
  }

  public function setRegistrationDate($registrationDate) {
    $this->registrationDate = $registrationDate;
  }
}
