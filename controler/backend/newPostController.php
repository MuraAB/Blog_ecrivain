<?php

if(!empty($_POST['title']) && !empty($_POST['newPost'])) {
  $newPost = new Post(array(
    "title" => $_POST['title'],
    "content" => $_POST['newPost']
  ));
  $posts_manager->addPost($newPost);
  header("Location: index.php?section=admin");
  } else {
    require("view/backend/newPost.admin.php");
}
