<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerTrancherPaiement.php?ID=" + id;
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


$tranche			    	=	addslashes($_POST["tranche"]) ;
$observation			   	=	addslashes($_POST["observation"]) ;	



if($id=="0")
    {
        $sql="INSERT INTO `gym_tranche_paiement`(`tranche`, `observation`) VALUES 
        ('".$tranche."','".$observation."' )";
    }
else{
        $sql="UPDATE `gym_tranche_paiement` SET `tranche`='".$tranche."',`observation`='".$observation."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$tranche   			    =	"";
$observation		   	=	"";


$req="select * from gym_tranche_paiement where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $tranche				=	$enreg["tranche"] ;
    $observation			=	$enreg["observation"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Tranches de paiement</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Tranches de paiement</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tranche">Tranche de paiement 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tranche"
                                                    name="tranche" placeholder="Tranche de paiement .." value="<?php echo $tranche ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="observation">Observation
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea type="text" class="form-control" id="observation"
                                                    name="observation" placeholder="Observation.." value="<?php echo $observation ?>"></textarea>
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
                        <h4 class="card-title">Liste des Tranches de paiement</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Tranche</th>
                                        <th>Observation</th>
                                   
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $tranche		    =	"";
                                    $observation		=	"";
                                   
                                    $req="select * from gym_tranche_paiement where 1=1  order by tranche ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $tranche				=	$enreg["tranche"] ;
                                        $observation			=	$enreg["observation"] ;
                                ?>


                                    <tr>
                                        <td>
                                        <?php echo $tranche; ?>
                                        </td>
                                        <td><?php echo $observation; ?></td>
                                     
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_tranche_paiement.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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