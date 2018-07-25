<?php

$posts_manager->deletePost((int) $_GET['id']);
$comments_manager->deleteComment($_GET['id']);
header("Location: index.php?section=admin");
