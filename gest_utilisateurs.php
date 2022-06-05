<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerUtilisateur.php?ID=" + id;
        }
    }
</script>
<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}else{
    $id = "0";
}


if(isset($_POST['enregistrer_mail'])){	


$nom				=	addslashes($_POST["nom"]) ;
$prenom				=	addslashes($_POST["prenom"]) ;	
$mail				=	addslashes($_POST["mail"]) ;	
$motdepasse			=	addslashes($_POST["password"]) ;	
$idprofil			=	addslashes($_POST["idprofil"]);

if($id=="0")
    {
        $sql="INSERT INTO `gym_utilisateurs`(`nom`, `prenom`, `mail`, `motdepasse`, `idprofil`) VALUES 
        ('".$nom."','".$prenom."' ,'".$mail."' ,'".$motdepasse."' ,'".$idprofil."' )";
    }
else{
        $sql="UPDATE `gym_utilisateurs` SET `nom`='".$nom."',`prenom`='".$prenom."',`mail`='".$mail."',`motdepasse`='".$motdepasse."',
        `idprofil`='".$idprofil."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$nom				=	"";
$prenom				=	"";
$mail				=	"";
$motdepasse			=	"";
$idprofil			=	"";

$req="select * from gym_utilisateurs where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $nom				=	$enreg["nom"] ;
    $prenom				=	$enreg["prenom"] ;
    $mail				=	$enreg["mail"] ;
    $motdepasse			=	$enreg["motdepasse"] ;
    $idprofil			=	$enreg["idprofil"] ;

}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Utilisateurs</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des utilisateurs</h4>
                        <!-- <br> Utilisateur : <?php echo $_SESSION['gym_USER']; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nom">Nom 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nom"
                                                    name="nom" placeholder="Nom ..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="prenom">Prénom
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="prenom"
                                                    name="prenom" placeholder="Prénom..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="mail"
                                                    placeholder="Votre email..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Mot de passe
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-password"
                                                    name="password" placeholder="Mot de passe..">
                                            </div>
                                        </div>
                                      

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group row">

                                            <label class="col-lg-4 col-form-label" for="val-skill">Profil
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control select2" name="idprofil" required>
                                                    <option value=""> Sélectionner un profil </option>
                                                    <?php
											$req="select * from gym_profil order by profil";
											$query=mysql_query($req);
											while($enreg=mysql_fetch_array($query)){
											?>
                                                    <option value="<?php echo $enreg['id']; ?>"
                                                        <?php if($idprofil==$enreg['id']) {?> selected <?php } ?>>
                                                        <?php echo $enreg['profil']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label"><a href="javascript:void()">Terms
                                                    &amp; Conditions</a> <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox"
                                                    for="val-terms">
                                                    <input type="checkbox" class="css-control-input mr-2" id="val-terms"
                                                        name="val-terms" value="1">
                                                    <span class="css-control-indicator"></span> I agree to the
                                                    terms</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Confirmer</button>
                                                <input class="form-control" type="hidden" name="enregistrer_mail">				
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des Utilisateurs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Nom & Prénom</th>
                                        <th>Email</th>
                                        <th>Profil</th>
                                        <th>Etat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $nom				=	"";
                                    $prenom				=	"";
                                    $mail				=	"";
                                    $motdepasse			=	"";
                                    $nomprofil			=	"";
                                    $profil				=	"0";
                                    $req="select * from gym_utilisateurs where 1=1  order by nom ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id					=	$enreg["id"] ;	
                                        $nom				=	$enreg["nom"] ;
                                        $prenom				=	$enreg["prenom"] ;
                                        $mail				=	$enreg["mail"] ;
                                        $motdepasse			=	$enreg["motdepasse"] ;
                                        $profil				=	$enreg["idprofil"] ;
                                
                                ?>


                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"> <span
                                                    class="w-space-no"><?php echo $nom; ?> <?php echo $prenom; ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td><?php echo $mail; ?></td>
                                        <td><?php
                                        $reqP = "select * from gym_profil where id=".$profil ; 
                                        $queryP = mysql_query($reqP);
                                        while($enreg=mysql_fetch_array($queryP)){
                                            echo $enreg["profil"] ;
                                        }
                                        ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php  if($enreg["archive"] = 0){
                                             echo '<i
                                             class="fa fa-circle text-danger mr-1"></i>'; 
                                        }else{
                                            echo '<i
                                            class="fa fa-circle text-success mr-1" ></i>' ; 
                                        } ;  ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_utilisateurs.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="Javascript:Supprimer('<?php echo $id; ?>')" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('navbar_footer/footer.php') ?>