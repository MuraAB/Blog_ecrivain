<?php

if (isset($_SESSION['nickname']) && $membres_manager->checkAdminRights($_SESSION['nickname'])) {

  // Liste des articles + Système de pagination
  $pagination_articles = new Pagination(array(
    "itemPerPage" => 5,
    "nbOfItems" => $posts_manager->countPosts()
  ));

  if(!isset($_GET['page'])) {
    $_GET['page'] = 1;
  }

  if (isset($_GET['page'])) {
    $_GET['page'] = (int) $_GET['page'];
    if($_GET['page'] > 0) {
      // Arguments nécessaires à postsList sont calculés grâce aux méthodes offset() et limit() de l'objet $pagination_article
      $postsList = $posts_manager->postsList($pagination_articles->offset($_GET['page']), $pagination_articles->limit($pagination_articles->offset($_GET['page'])));
    } else {
      header("Location: index.php?section=admin&action=commentsModeration&page=1");
    }
  }


  // Affectation du controleur en fonction de l'action demandée
  if(isset($_GET['action']) && !empty($_GET['action'])) {
    if($_GET['action'] == "newPost") {
      require("controler/backend/newPostController.php");
    } else if($_GET['action'] == "deletePost") {
      require("controler/backend/deletePostController.php");
    } else if($_GET['action'] == "updatePost") {
      require("controler/backend/updatePostController.php");
    } else if($_GET['action'] == "commentsModeration") {
      require("controler/backend/commentsModerationController.php");
    } else {
      require("view/backend/index.admin.php");
    }

  } else {
    require("view/backend/index.admin.php");
  }

} else {
  header("Location: index.php?section=connection");
}


