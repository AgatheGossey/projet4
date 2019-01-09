<!DOCTYPE html>

<html lang="fr">

  <head>

    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Karma" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- STYLES -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./public/css/styles-small.css">
    <link rel="stylesheet" type="text/css" href="./public/css/styles-medium.css">
    <link rel="stylesheet" type="text/css" href="./public/css/styles-large.css">

    <!-- OPEN GRAPH -->
		<meta property="og:url" content= "http://projet4.agathegossey.fr"/> 
		<meta property="og:type" content= "Blog application" />
		<meta property="og:title" content= "Jean Forteroche - Billet simple pour l'Alaska"/>
		<meta property="og:description" content= "Retrouvez l'ouvrage en ligne de Jean Forteroche : Billet simple pour l\'Alaska"/>
		<meta property="og:image" content= "./images/openGraph.jpg"/>                

	   <!-- TWITTER CARDS -->
		<meta name="twitter:card" content= "sumarry_large_image"/>
		<meta name="twitter:site" content= "@jean_forteroche"/>
		<meta name="twitter:title" content= "Jean Forteroche - Billet simple pour l'Alaska"/>
		<meta name="twitter:description" content= "Retrouvez l'ouvrage en ligne de Jean Forteroche : Billet simple pour l\'Alaska"/>
		<meta name="twitter:image" content= "./images/openGraph.jpg"/>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon//favicon-16x16.png">
    <link rel="manifest" href="./public/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

  </head>
        
  <body>

    <!-- NAVIGATION -->

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <div class="container">

        <!-- Design for smartphone -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
    
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">

            <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) { ?>
              <li><a><?=ucfirst($_SESSION['username']) ?></a></li>
            <?php }?>

            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=posts">Chapitres</a></li>

            <?php if(isset($_SESSION['connected']) && $_SESSION['connected'] === true) { ?>

              <li><a href="index.php?controller=deconnection">Se déconnecter</a></li>
              <?php if(isset($_SESSION['username']) && $isAdmin) { ?>
                <li><a href="index.php?controller=post&amp;action=postsAdmin">Gérer les articles</a></li>
                <li><a href="index.php?controller=Comment&amp;action=commentAdmin">Modérer les commentaires</a></li>
              <?php }

            } else { ?> 

              <li><a href="index.php?controller=connection">Connexion</a></li>
              <li><a href="index.php?controller=inscription">Inscription</a></li>

            <?php } ?>

          </ul>

          <p id="jeanForteroche">Jean Forteroche</p>

        </div>

      </div>

    </nav>

    <!-- CONTENT -->
    <?= $content ?>

    <!-- FOOTER -->
    <footer class="page-footer">
        <a href="#" class="footerElement">Mentions légales</a>
        <div class="footerElement">© 2018 Copyright</div>
    </footer>
    
  </body>

  <!-- SCRIPT -->
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea.post' });</script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>  

</html>
      
