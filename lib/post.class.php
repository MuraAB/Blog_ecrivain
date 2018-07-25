<?php

class Post {
  protected $id;
  protected $title;
  protected $content;
  protected $publicationDate;

  // Constructeur
  public function __construct(array $donnees) {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
        $method = 'set' . ucfirst($key);

        if (method_exists($this, $method)) {
          $this->$method($value);
        }
      }
  }

  // Getters
  public function id() {return $this->id;}

  public function title() {return $this->title;}

  public function content() {return $this->content;}

  public function date() {return $this->publicationDate;}

  // Setters

  public function setId($id) {
    $id = (int) $id;

    if ($id > 0) {
      $this->id = $id;
    }
  }

  public function setTitle($title) {
    if (is_string($title) && strlen($title) <= 255) {
      $this->title = $title;
    }
  }

  public function setContent($content) {
    if (is_string($content)) {
      $this->content = $content;
    }
  }

  public function setPublicationDate($publicationDate) {
    $this->publicationDate = $publicationDate;
  }
}
