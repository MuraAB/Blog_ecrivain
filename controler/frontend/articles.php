<?php


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
    header("Location: index.php?section=articles&page=1");
  }
}
include_once("view/frontend/articles.php");
