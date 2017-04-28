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

    <title>Candidat</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" style="background: aliceblue;">
    <?php
        //Sauvegarder une nouvelle entreprise dans la base de données.
        if(ISSET($_POST['valider'])){
            if(isset($_POST['name'])){
               $name = explode(" ", $_POST['name']);
               if(isset($name[0])){
                    $firtname = $name[0];
               }else{
                    $firtname= '';
               }
               if(isset($name[1])){
                   $lastname = $name[1];
               }else{
                    $lastname= '';
               }
            }else{
               $firtname= '';
               $lastname= '';
            }
           $pattern = '#^(?=.*[a-z])||(?=.*[A-Z])||(?=.*[0-9])||(?=.*\W)#';
           $err= array();
            if(isset($_POST['confirm']) && isset($_POST['pwd'])){
               if(!(strlen($_POST['pwd']) >=8)){
                   $err[] ='le mot de passe n\'est pas conforme, 8 caractére minimum';
               }
               if (!preg_match($pattern, $_POST['pwd'])){
                     $err[] ='le mot de passe n\'est pas conforme, Majescule, entier recomamlmjkhkjefjl';
               }
               if(!($_POST['pwd']==$_POST['confirm'])){
                   $err[] ='le mot de passe ne correspond pas sa confirmation';
               }
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                   {
                    $stm=$dbh->prepare("select email from applicant where email=:email;");
                    $stm->bindParam(':email', $_POST['email']);
                    $stm->execute();
                    $email = $stm->fetch();
		    if(!empty($email)){
                        $err[] ='L\'adresse mail existe déja';
		    }
            }

            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pwd']))
            {
                   if(empty($err)){
                        $stmt = $dbh->prepare("INSERT INTO applicant (firstname, lastname, email, pwd)
                        VALUES (:firstname , :lastname , :email , SHA1(:pwd))");
                        $stmt->execute(array(':firstname' => $firtname,':lastname' => $lastname, ':email' => $_POST['email'], ':pwd' => $_POST['pwd']));
                        echo"<script> alert('done.'); </script>";
                    }else{
                        foreach($err as $er){
                            echo $er;
                        }
                    }
                }
                else{
                     echo"<script> alert('Tous les champs sont obligatoires.'); </script>";
                }

        }
    ?>

    <div class="">
                            <div class="form-group" style="width: 50%;
    margin: auto;">       <p><a href="http://enigma-gfi.com" style="font-family: Lato;
    margin: 20px;">Accueil</a> > Connexion</p><img src="../web/img/logo-enigma.png" width="100" style="margin: auto;
    display: block;">
                            <!-- formulaire d'ajout d'une entreprise -->
                                    <form method="post" class="form-horizontal">
                                            <fieldset>
                                                    <legend style="font-family:Lato;">Inscription</legend>
                                                    <label style="font-family:Lato;">Nom et prénom </label><input type="text" id="name" class="form-control" name="name" placeholder=""/>
                                                    <label style="font-family:Lato;">Email</label><input type="text" id="email" class="form-control" name="email" placeholder=""/>
                                                    <label style="font-family:Lato;">Mot de passe</label><input type="password" id="pwd" class="form-control" name="pwd" placeholder=""/>
                                                    <label style="font-family:Lato;">Confirmer</label><input name="confirm" id="telephone" class="form-control" placeholder=""/>
                                                    <label style="font-family:Lato;">Uploader votre CV</label><input type="file" id="cv" class="form-control" name="cv" placeholder=""/>
                                            </fieldset>
                                            <div class="top" style="margin-top: 20px;">
                                                    <button type="submit" class="btn btn-primary " onclick="resetFields()" value="annuler" name="delete">Annuler    <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button>
                                                    <button type="submit" class="btn btn-primary pull-right" value="valider" name="valider">Confirmer    <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
                                            </div>
                                    </form>
                            </div>
    </div>
</div>

<!--footer start from here-->
<footer style="margin-top: 8%;">
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
