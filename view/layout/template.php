<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/materialize/js/materialize.min.js"></script>
        <script src="vendor/tinymce/tinymce.min.js"></script>
        <script src="public/js/blog.js"></script>
        <link rel="stylesheet" href="vendor/materialize/css/materialize.min.css" />
        <link rel="stylesheet" href="public/css/style.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <script>
            tinymce.init({
                selector:'.newPost',
                resize: false,

            });
        </script>
    </head>
    <body>
    	<?php
    		if(isset($menu)) {
    			echo $menu;
    		}
    	?>
        <main>
            <?php echo $content ?>
        </main>
        <footer class="blue darken-3">
          <div class="footer-copyright">
            <div class="container">
                <p class="white-text">© Copyright</p>
            </div>
          </div>
        </footer>
    </body>

</html>
