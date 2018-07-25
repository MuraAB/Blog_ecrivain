<?php
  ob_start();
  $title = "Nouvel article";
?>

<form action="" method="POST" class="ui form container">
	<h3 class="">Nouvel article</h3>
	<div class="">
		<label for="title">Titre</label><input type="text" name="title" class="">
    </div>
    <div class="">
    	<textarea name="newPost" cols="30" rows="10" class="newPost"></textarea>
	</div>
    <button type="submit" class="btn waves-effect waves-light deep-orange">Publier</button>
</form>

<?php
  $content = ob_get_clean();
  require("view/layout/menu.php");
  require("view/layout/template.php");
 