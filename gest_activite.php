<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerActivite.php?ID=" + id;
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


$activite			        	=	addslashes($_POST["activite"]) ;
$prix				            =	addslashes($_POST["prix"]) ;	
$type_abonnement				=	addslashes($_POST["type_abonnement"]) ;	



if($id=="0")
    {
        $sql="INSERT INTO `gym_activites`(`activite`, `prix`,`type_abonnement`) VALUES 
        ('".$activite."','".$prix."', '".$type_abonnement."' )";
    }
else{
        $sql="UPDATE `gym_activites` SET `activite`='".$activite."',`prix`='".$prix."',`type_abonnement`='".$type_abonnement."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$activite				=	"";
$prix		        	=	"";
$type_abonnement		=	"";


$req="select * from gym_activites where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $activite				=	$enreg["activite"] ;
    $prix			        =	$enreg["prix"] ;
    $type_abonnement		=	$enreg["type_abonnement"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Activités</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Activités</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="activite">Activité 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="activite"
                                                    name="activite" placeholder="Activité  .." value="<?php echo $activite ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="prix">Prix par Type d'abonnement
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="prix"
                                                    name="prix" placeholder="Prix .." value="<?php echo $prix ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="prix">Prix par Type d'abonnement
                                                <span class="text-danger">*</span>
                                            </label>
                                        <div class="col-lg-6">
                                                <select class="form-control select2" name="type_abonnement" required>
                                                    <option value=""> Sélectionner un type d'abonnement </option>
                                                    <?php
											$req="select * from gym_type_abonnement";
											$query=mysql_query($req);
											while($enreg=mysql_fetch_array($query)){
											?>
                                                    <option value="<?php echo $enreg['id']; ?>"
                                                        <?php if($type_abonnement==$enreg['id']) {?> selected <?php } ?>>
                                                        <?php echo $enreg['type_abonnement']; ?></option>
                                                    <?php } ?>
                                                </select>
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
                        <h4 class="card-title">Liste des Activités</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Activité</th>
                                        <th>Prix par type d'abonnement</th>
                                        <th>type d'abonnement</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $activite		    =	"";
                                    $prix	        	=	"";
                                    $type_abonnement	=	"";
                                    $type                =   "";
                                    $req="select * from gym_activites where 1=1 order by type_abonnement";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $activite				=	$enreg["activite"] ;
                                        $prix			        =	$enreg["prix"] ;
                                        $type_abonnement		=	$enreg["type_abonnement"] ;
                                        $reqT = "select * from gym_type_abonnement where id=".$type_abonnement;
                                        $queryT=mysql_query($reqT) ; 
                                        while($enregT = mysql_fetch_array($queryT)){
                                            $type = $enregT["type_abonnement"];
                                        }
                                ?>


                                    <tr>
                                        <td>
                                        <?php echo $activite; ?>
                                        </td>
                                        <td><?php echo $prix; ?> DT</td>
                                        <td><?php echo $type; ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_activite.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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