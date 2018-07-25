<?php
  ob_start();
  $title = "Modification article";
?>

<h3 class="center-align">Modifier l'article</h3>
<form action="" method="POST" class="container">
  
  <div class="">
    <label for="title">Titre</label><input type="text" name="title" class="" value="<?= $post['title'] ?>">
    </div>
    <div class="">
      <textarea name="content" class="newPost"><?= $post['content'] ?></textarea>
  </div>
    <button type="submit" class="btn waves-effect waves-light deep-orange">Publier</button>
</form>

<?php
  $content = ob_get_clean();
  require("view/layout/menu.php");
  require("view/layout/template.php");
