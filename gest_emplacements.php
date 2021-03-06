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
$flag			        	=	addslashes($_POST["flag"]) ;	
if($id=="0")
    {
        $sql="INSERT INTO `gym_emplacement`(`emplacement`, `flag`) VALUES 
        ('".$emplacement."','".$flag."' )";
    }
else{
        $sql="UPDATE `gym_emplacement` SET `emplacement`='".$emplacement."',`flag`='".$flag."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';
}
$emplacement				=	"";
$flag			            =	"";


$req="select * from gym_emplacement where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $emplacement			=	$enreg["emplacement"] ;
    $flag			        =	$enreg["flag"] ;
}
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

        <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Emplacements</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Emplacements</h4>
                        <!-- <br> Utilisateur : <?php echo $_SESSION['gym_USER']; ?> -->
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nom">Emplacement 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="emplacement"
                                                    name="emplacement" placeholder="Emplacement .." value="<?php echo $emplacement ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="description">Flag
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="flag"
                                                    name="flag" placeholder="Flag.." value="<?php echo $flag ?>">
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
                        <h4 class="card-title">Liste des Emplacements</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Emplacement</th>
                                        <th>flag</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $emplacement	    =	"";
                                    $flag       		=	"";
                                    $req="select * from gym_emplacement where 1=1  order by emplacement ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $emplacement			=	$enreg["emplacement"] ;
                                        $flag		        	=	$enreg["flag"] ;
                                ?>
                                    <tr>
                                        <td>
                                        <?php echo $emplacement; ?>
                                        </td>
                                        <td><?php echo $flag; ?></td>
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