<?php

class MembresManager extends Manager {

  public function addNewMembre(Membre $membre) {
    $req = $this->_db->prepare("
      INSERT INTO membres(nickname, pass, email, registrationDate)
      VALUES (
        :nickname,
        :pass,
        :email,
        CURRENT_TIME()
        )"
    );

    $req->execute(array(
      "nickname" => $membre->nickname(),
      "pass" => $membre->pass(),
      "email" => $membre->email()
    ));
  }

  public function deleteMembre() {

  }

  public function nicknameIsFree($nickname) {
    $req = $this->_db->prepare("SELECT nickname FROM membres WHERE nickname = :nickname");

    if (is_string($nickname)) {
      $req->execute(array("nickname" => $nickname));

      $reponse = $req->fetch();

      if (empty($reponse)) {
        return true;
      } else {
       return false;
      }
    }
  }

  public function checkConnectionInfos($nickname, $password) {

    $req = $this->_db->prepare("SELECT id, nickname, pass FROM membres WHERE nickname = :nickname");

    $req->execute(array("nickname" => $nickname));

    $compte = $req->fetch();

    if ($compte['nickname'] == $nickname && password_verify($password, $compte['pass'])) {
      return true;
    } else {
      return false;
    }
  }

  public function checkAdminRights($nickname) {
    $req = $this->_db->prepare("SELECT groupId FROM membres WHERE nickname = :nickname");

    $req->execute(array("nickname" => $nickname));

    $membre = $req->fetch();

    if ($membre['groupId'] == 1) {
      return true;
    } return false;
  
  }

  public function findId($nickname) {
    $req = $this->_db->prepare("SELECT id, nickname FROM membres WHERE nickname = :nickname");

    if (is_string($nickname)) {
      $req->execute(array("nickname" => $nickname));

      $nickname = $req->fetch();

      return $nickname['id'];
    }
  } 

}
