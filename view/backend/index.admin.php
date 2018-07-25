<?php
  ob_start();
  $title = "Administration";

  // Liste des billets
  foreach($postsList as $key => $value) {
  ?>
    <div class="container">
      <h2><?= $postsList[$key]['title'] ?></h2>
      <p><?= substr($postsList[$key]['content'], 0, 800) ?>  ...</p>
      <a href="index.php?section=article&id=<?= $postsList[$key]['id'] ?>" class="waves-effect waves-light btn"><i class="material-icons left">find_in_page</i>Voir l'article entier + Commentaires</a>
      <a href="index.php?section=admin&action=deletePost&id=<?= $postsList[$key]['id'] ?>" class="waves-effect waves-light btn"><i class="material-icons left">delete_sweep</i>Effacer</a>
      <a href="index.php?section=admin&action=updatePost&id=<?= $postsList[$key]['id'] ?>" class="waves-effect waves-light btn"><i class="material-icons left">edit</i>Modifier</a>
    </div>
  <?php
  }
$i=1;
  ?>
  
<ul class="pagination center-align">
 <?php
 while($i <= $pagination_articles->nbOfPages()) {
 	?>
	<li class="waves-effect"><a href="index.php?section=admin&page=<?= $i ?>"><?= $i ?></a></li>
 	<?php
 	$i++;
 }
?>

<?php
  $content = ob_get_clean();
  require("view/layout/menu.php");
  require("view/layout/template.php");


