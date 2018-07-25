<?php

class PostsManager extends Manager {

  // Liste des posts
  public function postsList($offset, $limit) {

    $offset = (int) $offset;
    $limit = (int) $limit;

    $req = $this->_db->prepare("SELECT id, title, content, publicationDate FROM posts ORDER BY publicationDate DESC LIMIT :offset, :limite");
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limite', $limit, PDO::PARAM_INT);

    $req->execute();

    $postsList = $req->fetchAll();

    return $postsList;
  }

  public function listAllPosts() {
    $req = $this->_db->query("SELECT id, title, content, publicationDate FROM posts ORDER BY publicationDate DESC");

    return $req->fetchAll();
  }

  public function countPosts() {
    $req = $this->_db->query("SELECT COUNT(id) FROM posts");

    $numberofPosts = $req->fetch();

    $numberofPosts = $numberofPosts['COUNT(id)'];

    return $numberofPosts;
  }

  public function getArticleById($id) {

    $req = $this->_db->prepare("SELECT * FROM posts WHERE id = :id");

    $req->execute(array("id" => $id));

    $article = $req->fetch();

    if (empty($article)) {
      return false;
    }
    return $article;
  }

  public function addPost(Post $post) {
    $req = $this->_db->prepare("INSERT INTO posts (title, content, publicationDate) VALUES (:title, :content, CURRENT_TIME)");

    $req->execute(array(
      "title" => $post->title(),
      "content" => $post->content()
    ));
  }

  public function deletePost($post) {
    // Cherche billet grâce à ID
    if (is_int($post)) {
      $req = $this->_db->prepare("DELETE FROM posts WHERE id = :id");

      $req->execute(array("id" => $post));

      // Cherche billet grâce à title
      } else if (is_string($post)) {

        $req = $this->_db->prepare("DELETE FROM posts WHERE title = :title");

        $req->execute(array("title" => $post));
    }
  }

  public function updatePost($postId, $newTitle, $newContent) {
    $req = $this->_db->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");

    $postId = (int) $postId;

    if(is_string($newTitle) && is_string($newContent) && $postId > 0) {
      $req->execute(array(
        "title" => $newTitle,
        "content" => $newContent,
        "id" => $postId
      ));
    }
  }

}
