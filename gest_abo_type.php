<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerTypeAbonnement.php?ID=" + id;
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


$type_abonnement				=	addslashes($_POST["type_abonnement"]) ;
$montant				=	addslashes($_POST["montant"]) ;	
$date_debut				=	addslashes($_POST["date_debut"]) ;	
$date_fin				=	addslashes($_POST["date_fin"]) ;	



if($id=="0")
    {
        $sql="INSERT INTO `gym_type_abonnement`(`type_abonnement`, `montant`,`date_debut`,`date_fin`) VALUES 
        ('".$type_abonnement."','".$montant."', '".$date_debut."', '".$date_fin."' )";
    }
else{
        $sql="UPDATE `gym_type_abonnement` SET `type_abonnement`='".$type_abonnement."',`montant`='".$montant."',,`date_debut`='".$date_debut."',,`date_fin`='".$date_fin."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$type_abonnement		=	"";
$montant		    	=	"";
$date_debut				=	"";
$date_fin				=	"";


$req="select * from gym_type_abonnement where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $type_abonnement		=	$enreg["type_abonnement"] ;
    $montant		    	=	$enreg["montant"] ;
    $date_debut				=	$enreg["date_debut"] ;
    $date_fin				=	$enreg["date_fin"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

         <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Types d'abonnement</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Types d'abonnement</h4>
                        <!-- <br> Utilisateur : <?php echo $_SESSION['gym_USER']; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nom">Type d'abonement 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="type_abonnement"
                                                    name="type_abonnement" placeholder="Type d'abonnement .." value="<?php echo $type_abonnement ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="montant">Montant
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="montant"
                                                    name="montant" placeholder="Montant.." value="<?php echo $montant ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="montant">Date début
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <input name="datepicker" class="datepicker-default form-control" id="datepicker">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="montant">Date Fin
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                            <input name="datepicker" class="datepicker-default form-control" id="datepicker">
                                            
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
                        <h4 class="card-title">Liste des Types d'abonnement</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Type d'abonnement</th>
                                        <th>Montant</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $type_abonnement    =	"";
                                    $montant	    	=	"";
                                    $date_debut	    	=	"";
                                    $date_fin		    =	"";
                                   
                                    $req="select * from gym_type_abonnement where 1=1  order by montant ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				        	=	$enreg["id"] ;	
                                        $type_abonnement			=	$enreg["type_abonnement"] ;
                                        $montant			        =	$enreg["montant"] ;
                                        $date_debut				    =	$enreg["date_debut"] ;
                                        $date_fin			    	=	$enreg["date_fin"] ;
                                ?>


                                    <tr>
                                        <td>
                                        <?php echo $type_abonnement; ?>
                                        </td>
                                        <td><?php echo $montant; ?></td>
                                        <td>
                                          <?php echo $ $date_debut ?>
                                        </td>
                                        <td>
                                          <?php echo $ $date_fin ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_abo_type.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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

<script>

$('#datePicker').daterangepicker({
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Enregistrer",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Lun",
            "Mar",
            "Mer",
            "Jeu",
            "Ven",
            "Sam",
            "Dim"
        ],
        "monthNames": [
            "Janvier",
            "Fevrier",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Aout",
            "Septembre",
            "Octobre",
            "Novembre",
            "Decembre"
        ],
        "firstDay": 1
    }
})
</script>
<?php include('navbar_footer/footer.php') ?>