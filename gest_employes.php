<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerEmployes.php?ID=" + id;
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
$fonction			=	addslashes($_POST["fonction"]) ;	
$GSM1			    =	addslashes($_POST["GSM1"]);
$GSM2			    =	addslashes($_POST["GSM2"]);
$RIB			    =	addslashes($_POST["RIB"]);
$CNSS			    =	addslashes($_POST["CNSS"]);
$salaire_fixe		=	addslashes($_POST["salaire_fixe"]);
$pourcentage	    =	addslashes($_POST["pourcentage"]);
$idprofil			=	addslashes($_POST["idprofil"]);

if($id=="0")
    {
        $sql="INSERT INTO `gym_employes`(`nom`, `prenom`, `mail`, `fonction`, `GSM1`,`idprofil`,`GSM2`,`RIB`,`CNSS`,`salaire_fixe`,`pourcentage`,`adresse`) VALUES 
        ('".$nom."','".$prenom."' ,'".$mail."' ,'".$fonction."' ,'".$GSM1."','".$idprofil."','".$GSM2."' ,'".$RIB."' ,'".$CNSS."','".$salaire_fixe."','".$pourcentage."','".$adresse."')";
    }
else{
        $sql="UPDATE `gym_employes` SET `nom`='".$nom."',`prenom`='".$prenom."',`mail`='".$mail."',`fonction`='".$fonction."',
        `GSM1`='".$GSM1."',`GSM2`='".$GSM2."',`adresse`='".$adresse."',`RIB`='".$RIB."',`CNSS`='".$CNSS."',`salaire_fixe`='".$salaire_fixe."',`pourcentage`='".$pourcentage."',`idprofil`='".$idprofil."',`adresse`='".$adresse."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$nom				=	"";
$prenom				=	"";
$mail				=	"";
$fonction			=	"";  
$adresse			=	"";  
$GSM1		    	=	"";
$GSM2		    	=	"";
$RIB		    	=	"";
$CNSS		    	=	"";
$salaire_fixe		=	"";
$pourcentage		=	"";
$idprofil           =   "";
$req="select * from gym_employes where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $nom				=	$enreg["nom"] ;
    $prenom				=	$enreg["prenom"] ;
    $mail				=	$enreg["mail"] ;
    $fonction			=	$enreg["fonction"] ;
    $adresse			=	$enreg["adresse"] ;
    $GSM1		    	=	$enreg["GSM1"] ;
    $GSM2		    	=	$enreg["GSM2"] ;
    $RIB		    	=	$enreg["RIB"] ;
    $CNSS		    	=	$enreg["CNSS"] ;
    $salaire_fixe	 	=	$enreg["salaire_fixe"] ;
    $pourcentage	 	=	$enreg["pourcentage"] ;
    $idprofil		    =	$enreg["idprofil"] ;

}
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Employes</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Employes</h4>
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
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="mail"
                                                    placeholder="Votre email.." value="<?php echo $mail ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="specialite">Fonction
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <select class="form-control select2" name="fonction" required>
                                                <option value=""> Sélectionner une fonction </option>
                                                <?php
                                                $req="select * from gym_fonctions order by fonction";
                                                $query=mysql_query($req);
                                                while($enreg=mysql_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $enreg['id']; ?>"
                                                    <?php if($fonction==$enreg['id']) {?> selected <?php } ?>>
                                                    <?php echo $enreg['fonction']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        </div>
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
                                            <label class="col-lg-4 col-form-label" for="adresse">Adresse
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="adresse"
                                                    name="adresse" placeholder="Adresse .." value="<?php echo $adresse ?>">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-6">
                                       
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="GSM1">GSM1
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="GSM1"
                                                    name="GSM1" placeholder="GSM1 .." value="<?php echo $GSM1 ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="GSM2">GSM2
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="GSM2"
                                                    name="GSM2" placeholder="GSM2 .." value="<?php echo $GSM2 ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="RIB">RIB
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="RIB"
                                                    name="RIB" placeholder="RIB .." value="<?php echo $RIB ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="CNSS">CNSS
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="CNSS"
                                                    name="CNSS" placeholder="CNSS .." value="<?php echo $CNSS ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="salaire_fixe">Salaire fixe
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="salaire_fixe"
                                                    name="salaire_fixe" placeholder="Salaire Fixe .." value="<?php echo $salaire_fixe ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="salaire_fixe">Pourcentage %
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="pourcentage"
                                                    name="pourcentage" placeholder="Pourcentage % .." value="<?php echo $pourcentage ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-xl-3">
                                       
                                       <div class="form-group row">
                                           <div class="col-lg-8 ml-auto">
                                               <button type="submit" class="btn btn-primary">Confirmer</button>
                                               <input class="form-control" type="hidden" name="enregistrer_mail">				
                                           </div>
                                       </div>
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
                        <h4 class="card-title">Liste des Employes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Nom & Prénom</th>
                                        <th>Email</th>
                                        <th>Fonction</th>
                                        <th>Profil</th>
                                        <th>Detail</th>
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
                                    $fonction			=	"";
                                    $tel		    	=	"";
                                    $nomprofil			=	"";
                                    $fonc               =   "";
                                    $profil				=	"0";
                                    $req="select * from gym_employes where 1=1  order by nom ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id					=	$enreg["id"] ;	
                                        $nom				=	$enreg["nom"] ;
                                        $prenom				=	$enreg["prenom"] ;
                                        $mail				=	$enreg["mail"] ;
                                        $GSM1				=	$enreg["GSM1"] ;
                                        $GSM2				=	$enreg["GSM2"] ;
                                        $RIB				=	$enreg["RIB"] ;
                                        $CNSS				=	$enreg["CNSS"] ;
                                        $GSM2				=	$enreg["GSM2"] ;
                                        $salaire_fixe		=	$enreg["salaire_fixe"] ;
                                        $pourcentage		=	$enreg["pourcentage"] ;
                                       
                                        $fonction			=	$enreg["fonction"] ;
                                        $profil				=	$enreg["idprofil"] ;
                                        
                                        $reqF = "select * from gym_fonctions where id=".$fonction ; 
                                        $queryF = mysql_query($reqF) ; 
                                        while($enregF=mysql_fetch_array($queryF)){
                                            $fonc = $enregF["fonction"];
                                        }
                                
                                ?>

                                    <tr>
                                        <td>
                                        <?php echo $nom; ?> <?php echo $prenom; ?>
                                        </td>
                                        <td><?php echo $mail; ?></td>
                                        <td><?php echo $fonc; ?></td>
                                        <td><?php echo $fonc; ?></td>
                                        <td><?php
                                        $reqP = "select * from gym_profil where id=".$profil ; 
                                        $queryP = mysql_query($reqP);
                                        while($enreg=mysql_fetch_array($queryP)){
                                            echo $enreg["profil"] ;
                                        }
                                        ?></td>
                                        <td>
                                               <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-xs mb-2" data-toggle="modal" data-target="#exampleModalCenter<?php echo $id; ?>">Détails</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter<?php echo $id; ?>">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Détails</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>GSM1 : <?php echo $GSM1 ?></h5>
                                                    <h5>GSM2 : <?php echo $GSM2 ?></h5>
                                                    <h5>RIB : <?php echo $RIB ?></h5>
                                                    <h5>CNSS : <?php echo $CNSS  ?></h5>
                                                    <h5>Salaire Fixe : <?php echo $salaire_fixe  ?></h5>
                                                    <h5>Pourcentage  : <?php echo $pourcentage  ?>%</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php  if($enreg["archive"] = 0){
                                             echo '<i
                                             class="fa fa-circle text-danger mr-1"></i>'; 
                                        }else{
                                            echo '<i
                                            class="fa fa-circle text-success mr-1"></i>' ; 
                                        } ;  ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_employes.php?ID=<?php echo $id ; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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