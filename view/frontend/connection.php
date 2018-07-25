<?php 
	ob_start();
	$title = "Jean Forteroche - Page de connection";
?>

<div class="container center-align">
<h2>Connection</h2>
<form action="#" method="POST" class="">
	<div class="input-field">
		<label for="nickname">Pseudo</label>
		<input type="text" name="nickname" class="validate">
	</div>
	<div class="input-field">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" class="validate">
		<?php 
			if (isset($_POST['nickname']) && isset($_POST['password']) && !$membres_manager->checkConnectionInfos($_POST['nickname'], $_POST['password'])) {
					echo "Mauvais Pseudo/Mot de passe";
				} 
		?>
	</div>
	<input type="submit" value="Valider" class="btn waves-effect waves-light deep-orange">
</form>
</div>

<?php 
	$content = ob_get_clean();
	require("view/layout/menu.php");
	require("view/layout/template.php");
?>

