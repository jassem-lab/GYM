<!DOCTYPE html>
<html lang="en" class="h-100">
<?php
session_start();
include('connexion/cn.php');
?>
<?php
if ((isset($_SESSION['gym_MAILUSER']))) {
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="login.php" </SCRIPT>';
	exit;
}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./template/images/favicon.png">
    <link href="./template/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>
<?php
if (isset($_POST['username'])) {

	$LOGIN = addslashes($_POST["username"]);
	$MOTDEPASSE = addslashes($_POST["userpassword"]);

	$idprofil = 0;
	$reqTestExistEmail = " select * from gym_utilisateurs where  mail='" . $LOGIN . "' and motdepasse='" . $MOTDEPASSE . "'";
	$queryTestExistEmail = mysql_query($reqTestExistEmail);
	if (mysql_num_rows($queryTestExistEmail) != 0) {
		while ($enregTestExistEmail = mysql_fetch_array($queryTestExistEmail)) {
			$IDUTILISATEUR = $enregTestExistEmail['id'];
			$MAIL 		   = $enregTestExistEmail['mail'];
			$idprofil 	   = $enregTestExistEmail['idprofil'];

			$_SESSION['gym_IDUSER'] = $IDUTILISATEUR;
			$_SESSION['gym_USER'] = $enregTestExistEmail['nom'] . ' ' . $enregTestExistEmail['prenom'];
			$_SESSION['gym_MAILUSER'] = $MAIL;
			$_SESSION['gym_PROFIL'] = $idprofil;

			if($enregTestExistEmail['archive']==1){
				echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?err=nocpt1" </SCRIPT>';
				exit;
			}
		
			if($idprofil==1 or $idprofil==2){
				echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="index.php" </SCRIPT>';
				exit;				
			} elseif($idprofil==4){
				echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="dashbord_cli.php" </SCRIPT>';
				exit;				
			}
			
			
			
		}

		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="index.php" </SCRIPT>';
	}

	if ((mysql_num_rows($queryTestExistEmail) == 0)) {
		echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?err=nocpt" </SCRIPT>';
	}

}
?>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="./template/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Connectez-vous</h4>

                                    <?php if (isset($_GET['err'])) { ?>
                                    <?php if ($_GET['err'] == 'nocpt') { ?>
                                    <font color="#ff0000" style="background-color:#FFFFFF;">
                                        <center>Vérifier votre saisie SVP !</center>
                                    </font><br /><br />
                                    <?php
							}?>
                                    <?php if ($_GET['err'] == 'nocpt1') { ?>
                                    <font color="#ff0000" style="background-color:#FFFFFF;">
                                        <center>Votre compte a été archivé !</center>
                                    </font><br /><br />
                                    <?php
							}?>
                                    <?php if ($_GET['err'] == 'suc') { ?>
                                    <font color="green" style="background-color:#FFFFFF;">
                                        <center>Vérifier votre boîte mail pour consulter votre mot de passe !</center>
                                    </font><br /><br />
                                    <?php
	}?>
                                    <?php
}?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="username"
                                                value="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Mot de passe</strong></label>
                                            <input type="password" class="form-control" name="userpassword"
                                                value="Password">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Se
                                                connecter</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./template/vendor/global/global.min.js"></script>
    <script src="./template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./template/js/custom.min.js"></script>
    <script src="./template/js/deznav-init.js"></script>

</body>

</html>