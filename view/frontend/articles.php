<?php ob_start(); ?>

 <!-- Liste des billets -->
 <?php

 $title="Jean Forteroche - Les articles";

 foreach($postsList as $key => $value) {
  ?>
    <div class="container">
      <h2 class=""><?php echo $postsList[$key]['title'] ?></h2>
      <p><?= substr($postsList[$key]['content'], 0, 1500) ?>... <a href="index.php?section=article&id=<?= $postsList[$key]['id'] ?>">Lire la suite</a></p>
      <a href="index.php?section=article&id=<?= $postsList[$key]['id'] ?>" class="btn waves-effect waves-light deep-orange">Commentaires</a>
      <div class=""></div>
    </div>
 <?php
 }
 
 $i=1;
 ?>

 <ul class="pagination center-align">
 <?php
 while($i <= $pagination_articles->nbOfPages()) {
 	?>
	<li class="waves-effect"><a href="index.php?section=articles&page=<?= $i ?>"><?= $i ?></a></li>
 	<?php
 	$i++;
 }
?>




<?php $content = ob_get_clean(); ?>

<?php
  require("view/layout/menu.php");
  require("view/layout/template.php");
?>
