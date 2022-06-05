<?php include('navbar_footer/navbar.php') ?>

<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}else{
    $id = "0";
}


if(isset($_POST['enregistrer_mail'])){	


$service				=	addslashes($_POST["service"]) ;
$description				=	addslashes($_POST["description"]) ;	



if($id=="0")
    {
        $sql="INSERT INTO `gym_services`(`service`, `description`,`archive`) VALUES 
        ('".$service."','".$description."', '0' )";
    }
else{
        $sql="UPDATE `gym_services` SET `service`='".$service."',`description`='".$description."',`archive`='0' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$service				=	"";
$description			=	"";
$archive				=	"";


$req="select * from gym_services where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $service				=	$enreg["service"] ;
    $description			=	$enreg["description"] ;
    $archive				=	$enreg["archive"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Services</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Services</h4>
                        <!-- <br> Utilisateur : <?php echo $_SESSION['gym_USER']; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nom">Service 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="service"
                                                    name="service" placeholder="Service ..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="description">Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea type="text" class="form-control" id="description"
                                                    name="description" placeholder="description.."></textarea>
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
                        <h4 class="card-title">Liste des Services</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Service</th>
                                        <th>Description</th>
                                        <th>Etat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $service				=					=	"";
                                    $description				=	"";
                                    $mail				=	"";
                                    $motdepasse			=	"";
                                    $nomprofil			=	"";
                                    $profil				=	"0";
                                  echo  $req="select * from gym_services where 1=1  order by service ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $service				=	$enreg["service"] ;
                                        $description			=	$enreg["description"] ;
                                        $archive				=	$enreg["archive"] ;
                                ?>


                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"> <span
                                                    class="w-space-no"<?php echo $service; ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td><?php echo $description; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php  if($enreg["archive"] = 0){
                                             echo '<i
                                             class="fa fa-circle text-success mr-1"></i>'; 
                                        }else{
                                            echo '<i
                                            class="fa fa-circle text-danger mr-1"></i>' ; 
                                        } ;  ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
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