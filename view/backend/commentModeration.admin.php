<?php
  ob_start();
  $title = "Modération des commentaires";
?>
  <h3 class="center-align">Commentaires à modérer</h3>
  <div class="divider container"></div>
<?php
  foreach ($posts as $key => $value) {
    $comments = $comments_manager->listSignaledComments($posts[$key]['id']);
    foreach ($comments as $key => $value) {
    ?>
      <div class="collection container">
        <div class="collection-item">
          <p>Commentaire : <?= $comments[$key]['content'] ?></p>
          <p>Nombre de signalements : <?= $comments[$key]['nbSignalements'] ?></p>
          <a href="index.php?section=article&id=<?= $comments[$key]['postId'] ?>&action=deleteComment&commentId=<?= $comments[$key]['commentId']?>">Effacer</a>
        </div>
      </div>
<?php
    }
}

  $content = ob_get_clean();
  require("view/layout/menu.php");
  require("view/layout/template.php");

