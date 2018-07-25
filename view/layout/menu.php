<?php ob_start(); ?>

<header>

<div class="navbar-fixed">
<nav>
<div class="nav-wrapper blue darken-2">
  <div class="brand-logo left">Blog Ecrivain Jean Forteroche</div>

  <!-- Bouton ouverture menu sur mobile -->
  <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons">menu</i></a>

  <!-- Menu PC -->
	<ul id="nav" class="right hide-on-med-and-down">
    <li><a href="index.php" class="">Accueil</a></li>
    <li><a href="index.php?section=articles" class="">Les articles</a></li>
    <?php
    if(isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    ?>
      <li><a href="#">Bienvenue <?= $_SESSION['nickname'] ?></a></li>
      <li><a href="index.php?section=deconnection" class=""><i class="material-icons">exit_to_app</i></a></li>
    <?php
      if(isset($_SESSION['nickname']) && $membres_manager->checkAdminRights($_SESSION['nickname'])) {
    ?>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Administration<i class="material-icons right">dashboard</i></a></li>
        <ul id="dropdown1" class="dropdown-content">
              <li><a href="index.php?section=admin" class="">Voir les articles</a></li>
              <li><a href="index.php?section=admin&action=newPost" class="">Nouvel article</a></li>
              <li><a href="index.php?section=admin&action=commentsModeration" class="">Modération des commentaires</a></li>
        </ul>
    <?php
      }
    } else {
      ?>
        <li><a href="index.php?section=connection" class="">Connection</a></li>
        <li><a href="index.php?section=inscription" class="">Inscription</a></li>
      <?php
    }
?>
  </ul>
</div>
</nav>
</div>

  <!-- Menu Mobile -->

  <ul class="side-nav" id="slide-out">
    <li><a href="index.php" class="item">Accueil</a></li>
    <li><a href="index.php?section=articles" class="">Les articles</a></li>
    <?php
    if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) {
    ?>
      <li><a href="#">Bienvenue <?= $_SESSION['nickname'] ?></a></li>
      <li><a href="index.php?section=deconnection" class="">Déconnection</a></li>
    <?php
    }

    if (isset($_SESSION['nickname']) && $membres_manager->checkAdminRights($_SESSION['nickname'])) {
    ?>
      <div class="divider"></div>
      <li><a href="index.php?section=admin" class="">Voir les articles</a></li>
      <li><a href="index.php?section=admin&action=newPost" class="">Nouvel article</a></li>
      <li><a href="index.php?section=admin&action=commentsModeration">Modération des commentaires</a></li>
    <?php
    } else {
    ?>
      <li><a href="index.php?section=connection" class="">Connection</a></li>
      <li><a href="index.php?section=inscription" class="">Inscription</a></li>
    <?php
    }
?>
    
  </ul>



</header>
<?php $menu = ob_get_clean(); ?>
