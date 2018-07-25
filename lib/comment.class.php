<?php

class Comment {
  protected $id;
  protected $postId;
  protected $authorId;
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

  public function postId() {return $this->postId;}

  public function authorId() {return $this->authorId;}

  public function content() {return $this->content;}

  public function publicationDate() {return $this->publicationDate;}


  // Setters

  public function setId($id) {
    $id = (int) $id;

    if ($id > 0) {
      $this->id = $id;
    }
  }

  public function setPostId($postId) {
    $postId = (int) $postId;
    if ($postId > 0) {
     $this->postId = $postId;
   }
  }

   public function setAuthorId($authorId) {
   $authorId = (int) $authorId;

   if ($authorId > 0) {
     $this->authorId = $authorId;
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
