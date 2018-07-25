<?php

$post = $posts_manager->getArticleById($_GET['id']);
if(!empty($_POST['title']) && !empty($_POST['content'])) {
  $posts_manager->updatePost($_GET['id'], $_POST['title'], $_POST['content']);
  header("Location: index.php?section=admin");
  } else {
    require("view/backend/updatePost.admin.php");
}
