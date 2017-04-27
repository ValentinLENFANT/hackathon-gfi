<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Page d'accueil GFI</title>

    <!-- Bootstrap Core CSS -->
    <link href="../media/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <!-- Custom Fonts -->
    <link href="../media/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="./media/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="media/css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img src="media/img/logo-enigma.png" style="position: relative;bottom:11px;width:45px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#connexion">Connexion</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#inscription" style="border: 1px white solid;padding-top: 2px;padding-bottom: 2px;margin-top: 12px;margin-right: 20px;">S'inscrire</a>
                    </li>
                    <li>
                        <a class="navbar-brand page-scroll" href="#page-top"><img src="media/img/gfi.png" width="58" style="position: relative;bottom: 9px;"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>   
    <header>
        <div class="header-content">
            <img src="media/img/logo.png" class="img-responsive centree" alt="logo enigma">
            <a href="#" class="btn btn-lg btn-default video" style="border-radius:300px;border-radius: 300px;background: transparent;border: 1px solid white;color: white;"><span class="glyphicon glyphicon-play"></span>  Lire la vidéo</a>
        </div>
    </header>

    <div class="text-center centree" style="background-color:#f59331;width:100%;color:white;font-size:19px;text-transform: uppercase;font-family: lato;padding-top: 5px;padding-bottom: 5px;">Découvrir nos aventures...</div>


<article>
    <div>
        <?php include $this->view; ?>

    </div>
</article>
<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<!--footer start from here-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"><img src="media/img/logo-enigma.png" style="width:70px;"></div>
        <p>Enigma</p>
        <p><i class="fa fa-map-pin"></i> 7 Place Felix Eboué</p>
        <p><i class="fa fa-phone"></i> 75012, PARIS</p>
        <p><i class="fa fa-envelope"></i> E-mail : <a href="mailto:dmd@enigma-gfi.com">dmd@enigma-gfi.com</p>

      </div>
      <div class="col-md-2 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">Groupe</h6>
        <ul class="footer-ul">
          <li><a href="#"> Carrières</a></li>
          <li><a href="#"> Finances</a></li>
          <li><a href="#"> Presse</a></li>
          <li><a href="#"> FAQ</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <h6 class="heading7">Découvrir GFI informatique</h6>
        <ul class="footer-ul">
          <li><a href="#"> Offres</a></li>
          <li><a href="#"> Innovations</a></li>
          <li><a href="#"> Actualités</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/twitter">Twitter</a></blockquote>
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/Youtube">Youtube</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-5">
      <p style="font-family:Lato;font-size: 12px;">© Copyright DND Studio,  tous droits reservés</p>
    </div>
    <div class="col-md-7">
      <ul class="bottom_ul" style="font-family: Lato;">
        <li><a href="#">Mentions légale</a></li>
        <li><a href="#">Conditions générales</a></li>
        <li><a href="#">Politique de confidentialité</a></li>
      </ul>
    </div>
  </div>
</div>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="media/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="media/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="media/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="media/js/creative.min.js"></script>

</body>

</html>
