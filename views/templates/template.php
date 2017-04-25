<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo WEB_PATH;?>/web/favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo WEB_PATH;?>/web/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo WEB_PATH;?>/web/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo WEB_PATH;?>/web/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo WEB_PATH;?>/web/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <link href="<?php echo WEB_PATH;?>/web/css/style.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo WEB_PATH;?>">Project name</a>
        </div>
       
        <?php if(!$isconnected):?>

        <div id="navbar" class="navbar-collapse collapse">

          <form class="navbar-form navbar-right" method="POST" action="<?php echo WEB_PATH;?>user/log">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pwd" placeholder="Password" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Se connecter</button>

            <a class="btn btn-success" href="<?php echo WEB_PATH;?>user/add">S'inscrire</a>

          </form>

        </div><!--/.navbar-collapse -->

      <?php else:?>

        <div id="navbar" class="navbar-collapse collapse">

          <form class="navbar-form navbar-right">
            <a class="btn btn-danger" href="<?php echo WEB_PATH;?>user/logout">Se deconnecter</a>
          </form>

        </div><!--/.navbar-collapse -->

      <?php endif;?>



      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php include $this->view;?>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo WEB_PATH;?>/web/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo WEB_PATH;?>/web/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo WEB_PATH;?>/web/js/ie10-viewport-bug-workaround.js"></script>
    
    <script src="<?php echo WEB_PATH;?>/web/js/script.js"></script>
    
  </body>
</html>
