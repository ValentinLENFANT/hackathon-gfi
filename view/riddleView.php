<!DOCTYPE html>
<?php

//se connecter à la base de données 
include "../function/connexion.php" ;
//include "../function/outsourcing.php";
//include "../function/jobAdvert.php";
//include "../function/riddle.php";

?>
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
    <link href="../web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
    <!-- Custom Fonts -->
    <link href="../web/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="web//vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../web/css/creative.min.css" rel="stylesheet">
    <link href="../web/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
    <nav class="navbar navbar-inverse navbar-fixed-top bs-docs-nav">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li role="presentation" class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Enigmes<span class="caret"></span></a>
			<ul class="dropdown-menu">
                            <li><a href="NewRiddleView.php"> <span class="glyphicon glyphicon-plus-sign"></span>Ajouter un enigme</a></li>
                            <li><a href="riddleView.php"><span class="glyphicon glyphicon-briefcase"></span>Consulter les enigmes</a></li>
			</ul>
    </li>
    </ul>
    <div class="navbar-form navbar-right inline-form">
      <div class="form-group">
        	<?php
					//Commencer la session et afficher les variables de session nom/prenom
					session_start();
					include"../function/connexion.php";
					echo"<form  method='post' ><table><tr id='tp'><td>";
					echo"<label class='label'>".$_SESSION['prenom']."</label></td><td></td><td></td><td><label class='label'>".$_SESSION['nom']."</label></td>
					<td></td><td></td><td><div class='btn-group'>
					<button class='btn btn-default btn-sml dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
					<span class='caret'></span>
					</button>
					<ul class='dropdown-menu'>
						<li><a href='#'> <span class='glyphicon glyphicon-user' aria-hidden='true'></span>     Profil</a></li>
						<li><a href='../function/deconnexion.php'><span class='glyphicon glyphicon-off' aria-hidden='true'></span>	Déconnexion</a></li>
					</ul>
					</div></td></tr></table></form>";
				?>
      </div>
    </div>
  </div>
</nav>
    <div class="top">
<div class="container">
<div class="row">
   <div class="panel-body">
	<div class="panel panel-primary">
            <div class="panel-heading">
		<h3 class="panel-title"> Liste des enigmes </h3>
            </div>
	    <!--L'affichage des étudiants sauvegardés dans la base de données, je récupére les données et je les affiche sous forme d'un tableau.-->
            <div class="panel-body">
		<div class="table-responsive">
		    <?php
			$stmt=$dbh->prepare("SELECT name , content, domain.wording  as wd FROM riddle, domain where domain.id = riddle.idDomain");
			$stmt->execute();	
			echo"<table class='table '><tbody><tr class='active'><th>Nom d'enigme</th><th>Contenu</th><th>Secteur d'activité</th>
			</tr>";
            echo "<td>PHPWars</td>";
            ?>
            <td><a href='../function/riddle.php'>Echo me the riddle!</a></td>
            <?php
            echo "<td>Développement Web</td>";
            echo'<tr>';
            echo "<td>C-world</td>";
            ?>
            <td><a href='../function/riddle.php'>Print me the riddle!</a></td>
            <?php
            echo "<td>Développement C++</td>";
            echo'</tr>';
			echo"</tbody></table>";
                    ?>
		</div>
	    </div>
	</div>
  </div>
	    </div>
	</div>
  </div>
<!--footer start from here-->
<footer style="margin-top: 50%">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 footerleft ">
        <div class="logofooter"><img src="../web/img/logo-enigma.png" style="width:70px;"></div>
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
    <script src="../web/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../web/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../web/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../web/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="../web/js/creative.min.js"></script>

</body>

</html>
