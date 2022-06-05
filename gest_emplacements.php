<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerEmplacement.php?ID=" + id;
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


$emplacement				=	addslashes($_POST["emplacement"]) ;
$description				=	addslashes($_POST["description"]) ;	



if($id=="0")
    {
        $sql="INSERT INTO `gym_emplacement`(`emplacement`, `description`,`disponible`) VALUES 
        ('".$emplacement."','".$description."', '0' )";
    }
else{
        $sql="UPDATE `gym_emplacement` SET `emplacement`='".$emplacement."',`description`='".$description."',`archive`='0' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$emplacement				=	"";
$description			=	"";
$archive				=	"";


$req="select * from gym_emplacement where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $emplacement			=	$enreg["emplacement"] ;
    $description			=	$enreg["description"] ;
    $archive				=	$enreg["archive"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

++6666            <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Salles</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Salles</h4>
                        <!-- <br> Utilisateur : <?php echo $_SESSION['gym_USER']; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nom">Salle 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="emplacement"
                                                    name="emplacement" placeholder="Salle .." value="<?php echo $emplacement ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="description">Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea type="text" class="form-control" id="description"
                                                    name="description" placeholder="description.." value="<?php echo $description ?>"></textarea>
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
                        <h4 class="card-title">Liste des Salles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Salle</th>
                                        <th>Description</th>
                                        <th>Disponible</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $emplacement	    =	"";
                                    $description		=	"";
                                   
                                    $req="select * from gym_emplacement where 1=1  order by emplacement ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $emplacement			=	$enreg["emplacement"] ;
                                        $description			=	$enreg["description"] ;
                                        $disponible				=	$enreg["disponible"] ;
                                ?>


                                    <tr>
                                        <td>
                                        <?php echo $emplacement; ?>
                                        </td>
                                        <td><?php echo $description; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php  if($enreg["disponible"] = 0){
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
                                                <a href="gest_emplacements.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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