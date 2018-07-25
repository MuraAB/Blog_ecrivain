<?php ob_start();
$title = "Jean Forteroche - " . $post['title'] ?>

<div class="container">
  <h2 class="center-align"><?= $post['title'] ?></h2>
  <p><?= $post['content'] ?></p>
</div>

<div class="divider container"></div>
<h3 class="center-align">Commentaires</h3>
<ul class="collection container">
<?php
foreach($comments as $key => $value) {
?>

	<li class="collection-item">
	
		<p class="title">
			<?= $comments[$key]['authorName']; ?>
		</p>
		
			<p class=""><?= $comments[$key]['publicationDate']; ?></p>
		
		<p class="">
			<?= $comments[$key]['comment']; ?>
		</p>
		<?php
			if(isset($_SESSION['connected']) && $_SESSION['connected'] == true &&	 $_SESSION['nickname'] == $comments[$key]['authorName'] OR isset($_SESSION['nickname']) && $membres_manager->checkAdminRights($_SESSION['nickname'])) {
				?>
					<a href="index.php?section=article&id=<?= $_GET['id'];?>&action=deleteComment&commentId=<?= $comments[$key]['id']?>">Effacer</a>
				<?php
			}

			if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
				?>
				<a href="index.php?section=article&id=<?= $_GET['id'];?>&action=signalComment&commentId=<?= $comments[$key]['id']?>">Signaler</a>
				<?php
			}

		?>
		
	</li>

<?php
}
?>
</ul>

<?php
	if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
?>
		<div class="row container">
		<form action="" method="POST" class="col s12">
			<div class="row">
			<div class="input-field ">
				<textarea name="newComment" class="materialize-textarea"></textarea>
				<label id="newComment">Laissez votre commentaire</label>
			</div>
				<button type="submit" class="btn waves-effect waves-light deep-orange">
					Envoyer
					<i class="material-icons right">send</i>
				</button>
			</div>
		</form>
		</div>
<?php
	} else {
	?>
		<div class="center-align">
			<p>Vous devez être connecté(e) pour laisser un commentaire.</p>
			<a href="index.php?section=connection" class="btn waves-effect waves-light deep-orange">Se connecter</a>
		</div>
	<?php
	}
?>


<?php $content = ob_get_clean();
require("view/layout/menu.php");
require("view/layout/template.php"); ?>
