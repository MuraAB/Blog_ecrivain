<?php 
	ob_start();
	$title = "Jean Forteroche - Page d'inscription";
?>

<div class="container center-align">
<h2 class="">Inscription</h2>
<form action="" method="POST" class="">
	<div class="input-field">
		<label for="nickname">Pseudo</label>
		<input type="text" name="nickname" class="validate">
		<?php
			if(isset($_POST['nickname']) && !$membres_manager->nicknameIsFree($_POST['nickname'])) {
				echo "Ce pseudo est déjà pris";
			}
		?>
	</div>
	<div class="input-field">
		<label for="password">Mot de passe</label>
		<input type="password" name="password" class="validate">
	</div>
	<div class="input-field">
		<label for="password_check">Confirmez mot de passe</label>
		<input type="password" name="password_check" class="validate">
		<?php
			if(isset($_POST['password']) && isset($_POST['password_check']) && $_POST['password'] != $_POST['password_check']) {
				echo "Les champs de mot de passe ne correspondent pas";
			}
		?>
	</div>
	<div class="input-field">
		<label for="email">Email</label>
		<input type="text" name="email" class="validate">
		<?php
		if(isset($_POST['email']) && !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {
			?>
				<p>Cet email n'est pas valide</p>
			<?php
		}

		?>

	</div>
	<input type="submit" value="S'inscrire" class="btn waves-effect waves-light deep-orange">
</form>
</div>
<?php
	$content = ob_get_clean();
	require("view/layout/menu.php");
	require("view/layout/template.php");
?>

