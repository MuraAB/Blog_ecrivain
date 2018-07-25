<?php ob_start(); ?>

 <!-- Liste des billets -->
 <?php

 $title="Jean Forteroche - Bienvenue sur mon blog";

?>


<div id="headerImage">
  <h1>"Billet pour l'Alaska"</h1>
</div>

<div class="container">
<div class="row">
<?php
  foreach ($postsList as $key => $value) {
    ?>
      <div class="col s12">
        <h3 class="center-align"><?= $postsList[$key]['title'] ?></h3>
        <div class="divider"></div>
        <p><?= substr($postsList[$key]['content'], 0, 1000) ?> ... <a href="index.php?section=article&id=<?= $postsList[$key]['id']?>">Lire la suite</a></p>
      </div>
    <?php
  }
?>
</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php
	require("view/layout/menu.php");
	require("view/layout/template.php");
?>
