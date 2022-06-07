<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerClient.php?ID=" + id;
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
$CIN				=	addslashes($_POST["CIN"]) ;	
$naissance				=	addslashes($_POST["naissance"]) ;	
$prenom				=	addslashes($_POST["prenom"]) ;	
$mail				=	addslashes($_POST["mail"]) ;	
$tel		    	=	addslashes($_POST["tel"]) ;	
$adresse			=	addslashes($_POST["adresse"]);

if($id=="0")
    {
     echo   $sql="INSERT INTO `gym_clients`(`nom`, `prenom`,`CIN`, `naissance` ,`mail`, `tel`, `adresse`) VALUES 
        ('".$nom."','".$prenom."' ,'".$CIN."','".$naissance."','".$mail."' ,'".$tel."' ,'".$adresse."' )";
    }
else{
        $sql="UPDATE `gym_clients` SET `nom`='".$nom."',`prenom`='".$prenom."', `CIN`='".$CIN."' ,`naissance`='".$naissance."',`mail`='".$mail."',`tel`='".$tel."',
        `adresse`='".$adresse."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$nom				=	"";
$prenom				=	"";
$CIN				=	"";
$naissance			=	"";
$mail				=	"";
$motdepasse			=	"";
$idprofil			=	"";
$adresse			=	"";
$tel			=	"";

$req="select * from gym_clients where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $nom				=	$enreg["nom"] ;
    $prenom				=	$enreg["prenom"] ;
    $mail				=	$enreg["mail"] ;
    $tel		    	=	$enreg["tel"] ;
    $CIN		    	=	$enreg["CIN"] ;
    $naissance		   	=	$enreg["naissance"] ;
    $adresse			=	$enreg["adresse"] ;

}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Clients</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Clients</h4>
                        <!-- <br> Utilisateur : <?php echo $_SESSION['gym_USER']; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide"  method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nom">Nom 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nom"
                                                    name="nom" placeholder="Nom .." value="<?php echo $nom ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="prenom">Prénom
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="prenom"
                                                    name="prenom" placeholder="Prénom.." value="<?php echo $prenom ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="CIN">CIN
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="CIN"
                                                    name="CIN" placeholder="CIN .." value="<?php echo $CIN ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="naissance">Date de Naissance
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <input name="naissance" value="<?php echo $naissance ?>" type="text" class="form-control" placeholder="2022-06-04" id="mdate">
                                            </div>
                                        </div>
                                    </div> 
                                 <div class="col-xl-6">
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="val-email" name="mail"
                                                    placeholder="Votre Email.." value="<?php echo $mail ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="adresse">Adresse<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="adresse" name="adresse"
                                                    placeholder="Votre Adresse.." value="<?php echo $adresse ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tel">Numéro de Téléphone
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="tel" name="tel"
                                                    placeholder="Numéro de Téléphone.." value="<?php echo $tel ?>">
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
                        <h4 class="card-title">Liste des Clients</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Nom & Prénom</th>
                                        <th>CIN</th>
                                        <th>Date de naissance</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
                                        <th>Tel</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $nom				=	"";
                                    $prenom				=	"";
                                    $CIN				=	"";
                                    $naissance			=	"";
                                    $mail				=	"";
                                    $adresse			=	"";
                                    $tel			=	"";
                                    $req="select * from gym_clients where 1=1  order by nom ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id					=	$enreg["id"] ;	
                                        $nom				=	$enreg["nom"] ;
                                        $prenom				=	$enreg["prenom"] ;
                                        $CIN				=	$enreg["CIN"] ;
                                        $naissance			=	$enreg["naissance"] ;
                                        $mail				=	$enreg["mail"] ;
                                        $adresse			=	$enreg["adresse"] ;
                                        $tel				=	$enreg["tel"] ;
                                
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"> <span
                                                    class="w-space-no"><?php echo $nom; ?> <?php echo $prenom; ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td><?php echo $CIN; ?></td>
                                        <td><?php echo $naissance; ?></td>
                                        <td><?php echo $mail; ?></td>
                                        <td><?php echo $adresse; ?></td>
                                     
                                       
                                        <td>
                                            <?php echo $tel ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_det_client.php?ID=<?php echo $id ?>" class="btn btn-success shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-id-card"></i></a>
                                                <a href="gest_client.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a  href="Javascript:Supprimer('<?php echo $id; ?>')" class="btn btn-danger shadow btn-xs sharp"><i
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