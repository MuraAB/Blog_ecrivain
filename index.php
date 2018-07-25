<?php

session_start();

include_once("model/connection_sql.php");

include_once("lib/Manager.class.php");
include_once("lib/postsManager.class.php");
include_once("lib/post.class.php");
include_once("lib/membresManager.class.php");
include_once("lib/membre.class.php");
include_once("lib/commentsManager.class.php");
include_once("lib/comment.class.php");
include_once("lib/pagination.class.php");
include_once("lib/securisation_formulaire.php");

$membres_manager = new MembresManager($bdd);
$posts_manager = new PostsManager($bdd);
$comments_manager = new CommentsManager($bdd);


// Vérification si page spécifique demandée, sinon, appelle controleur du blog
if (!isset($_GET['section']) OR $_GET['section'] == "index" OR empty($_GET['section'])) {
	include_once("controler/frontend/index.php");
} else if ($_GET['section'] == "articles") {
   include_once("controler/frontend/articles.php");
} else if ($_GET['section'] == "connection") {
	 include_once("controler/frontend/connection.php");
} else if ($_GET['section'] == "inscription") {
	 include_once("controler/frontend/inscription.php");
} else if ($_GET['section'] == "deconnection") {
	 include_once("controler/frontend/deconnection.php");
} else if ($_GET['section'] == "admin") {
    include_once("controler/backend/adminController.php");
} else if ($_GET['section'] == "article") {
    include_once("controler/frontend/article.php");
} else {
	include_once("controler/frontend/index.php");
}

