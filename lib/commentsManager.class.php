<?php

class CommentsManager extends Manager {

  public function addComment(Comment $comment) {
    $req = $this->_db->prepare("
      INSERT INTO
        comments(postId, authorId, content, publicationDate)
      VALUES (
        :postId,
        :authorId,
        :content,
        CURRENT_TIME
        )"
    );

    $req->execute(array(
      "postId" => $comment->postId(),
      "authorId" => $comment->authorId(),
      "content" => $comment->content()
    ));
  }

  public function deleteComment($postId, $id = '') {
    // $id devient facultatif, indiqué, on supprime le commentaire grâce à son id ouon supprime tout les commentaires du billet ayant pour id -> $postId
    // En même temps suppression des signalements éventuels liés au commentaire
    if ($id === '') {
      $req = $this->_db->prepare("DELETE FROM comments WHERE postId = :postId");
      $deleteSignals = $this->_db->prepare("DELETE FROM commentsignal WHERE postId = :postId");

      $req->execute(array("postId" => $postId));
      $deleteSignals->execute(array("postId" => $postId));
    } else {
      $req = $this->_db->prepare("DELETE FROM comments WHERE id = :id");
      $deleteSignals = $this->_db->prepare("DELETE FROM commentsignal WHERE commentId = :commentId");

      $req->execute(array("id" => $id));
      $deleteSignals->execute(array("commentId" => $id));
    }
  }

  public function listComments($postId) {

    $req = $this->_db->prepare("SELECT c.id, c.content comment, c.publicationDate, m.nickname authorName FROM comments c JOIN membres m ON m.id = c.authorId WHERE c.postId = :postId");

    $req->execute(array("postId" => $postId));

    $comments = $req->fetchAll();

    return $comments;
  }

  public function getComment($id) {

    $id = (int) $id;
    $req = $this->_db->prepare("SELECT * FROM comments WHERE id = :id");

    if($id > 0) {
      $req->execute(array("id" => $id));

      $comment = $req->fetch();
      return $comment;
    }
  }

  public function signalComment($commentId, $userId, $postId) {
    // Récupère commentaire pour signalement
    $comment = $this->getComment($commentId);

    $req = $this->_db->prepare("SELECT commentId, userId FROM commentsignal WHERE commentId = :commentId AND userId = :userId");

    $req->execute(array("commentId" => $commentId, "userId" => $userId));

    $req = $req->fetchAll();

    // Si $comment vide, le commentaire demandé n'existe pas. empty($req) limite à 1 signalement par commentaire par utilisateur
    if (!empty($comment) && empty($req)) {
      $req = $this->_db->prepare("INSERT INTO commentsignal(commentId, userId, postId) VALUES (:commentId, :userId, :postId)");

      $req->execute(array(
        "commentId" => $commentId,
        "userId" => $userId,
        "postId" => $postId
      ));
    }
  }

  public function listSignaledComments($postId) {

    $req = $this->_db->prepare("SELECT COUNT(s.commentId) nbSignalements, c.content, s.commentId commentId, c.postId postId FROM comments c JOIN commentsignal s ON c.id = s.commentId WHERE c.postId = :postId GROUP BY s.commentId ORDER BY nbSignalements DESC");

    $req->execute(array("postId" => $postId));

    return $req->fetchAll();
  }

}
