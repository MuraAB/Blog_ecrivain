<?php

// Si $_POST['newComment'] pas vide,formulaire envoyé et nouvel article doit être créé
if (!empty($_POST['newComment'])) {
	securisation_formulaire();
	$newComment = new Comment(array(
		"postId" => $_GET['id'],
		"authorId" => $membres_manager->findId($_SESSION['nickname']),
		"content" => $_POST['newComment']
	));
	$comments_manager->addComment($newComment);
}

// On récupère le commentaire, vérification utilisateur pour voir si droit ou pas
if(isset($_GET['action']) && $_GET['action'] == "deleteComment" && !empty($_GET['action']) && isset($_GET['commentId']) && !empty($_GET['commentId'])) {
  $comment = $comments_manager->getComment($_GET['commentId']);
  if(isset($_SESSION['connected']) && $_SESSION['connected'] == true && $membres_manager->findId($_SESSION['nickname']) == $comment['authorId'] OR isset($_SESSION['nickname']) && $membres_manager->checkAdminRights($_SESSION['nickname'])) {
    $comments_manager->deleteComment($_GET['id'], $_GET['commentId']);
    header('Location: ' . 'index.php?section=article&id=' . $_GET['id']);
  }
}

// vérification id article  demandée, que l'article existe, puis on récupère article + commentaires
if (isset($_GET['id']) and intval($_GET['id']) > 0 && $posts_manager->getArticleById($_GET['id']) !== false) {
  $post = $posts_manager->getArticleById($_GET['id']);
  $comments = $comments_manager->listComments($_GET['id']);
  require("view/frontend/article.php");
} else {
  header("Location: index.php");
}




if(isset($_GET['action']) && $_GET['action'] == "signalComment" && !empty($_GET['action']) && isset($_GET['commentId']) && !empty($_GET['commentId'])) {
  $comments_manager->signalComment($_GET['commentId'], $membres_manager->findId($_SESSION['nickname']), $_GET['id']);
}





