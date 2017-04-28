<!DOCTYPE html>
<?php

//se connecter à la base de données
 include "../function/connexion.php" ;

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
    <link href="../web/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="../web/css/creative.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" style="background: aliceblue;">
	<?php
		session_start();
		if(ISSET($_POST['connect'])){
			$email=$_POST['email'];
			$pwd=$_POST['pwd'];
			if(empty($email) || empty($pwd)){
				echo"Veuillez remplir le login ou le mot de passe";
			}else{
				$stmt=$dbh->prepare("select id, firstname , lastname, admin from applicant where email=:email and pwd=SHA1(:pwd);");
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':pwd', $pwd);
				$stmt->execute();
				$name = $stmt->fetch();
				if(!$name==null){
					$_SESSION['nom']=$name['firstname'];
					$_SESSION['prenom']=$name['lastname'];
					$_SESSION['id']=$name['id'];
                                        if($name['idadmin']==1){
                                            header("Location: applicantView.php");
                                        }else{
                                            header("Location: riddleView.php");
                                        }
				}
				else{
					echo "<script>alert('Login ou mot de passe érroné');</script>";
				}
			}
		}
		?>

						<!--Formulaire de connexion-->
          <p><a href="http://enigma-gfi.com" style="font-family: Lato;
    margin: 20px;">Accueil</a> > Connexion</p>
            <img src="../web/img/logo-enigma.png" width="100" style="margin: auto;
    display: block;margin-top: 50px;">
						<h1 style="display: block;
    margin: auto;
    width: 50%;
    margin-bottom: 20px;font-family:Lato;">Connexion</h1>
						<div style="background-color:aliceblue;width: 50%;
    margin: auto;">
							<form name="login" class="form-horizontal" method="post" accept-charset="utf-8">
								<div class="form-group">
									<div class="col-md-9">
										<input name="email" placeholder="Idenfiant" class="form-control" type="text" id="UserUsername"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-9">
										<input name="pwd"  placeholder="Mot de passe" class="form-control" type="password" id="UserPassword"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-0 col-md-9 ">
										<input name="connect"  class="btn btn-success btn btn-success pull-right" type="submit" value="Connexion"/>
									</div>
								</div>
							</form>
						</div>
					</div>
			</div>
<!--footer start from here-->
<footer>
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
