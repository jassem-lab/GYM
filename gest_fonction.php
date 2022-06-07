<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerFonction.php?ID=" + id;
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


$fonction			    	=	addslashes($_POST["fonction"]) ;



if($id=="0")
    {
     echo   $sql="INSERT INTO `gym_fonctions`(`fonction` ) VALUES 
        ('".$fonction."' )";
    }
else{
        $sql="UPDATE `gym_fonctions` SET `fonction`='".$fonction."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    // echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$fonction   			=	"";


$req="select * from gym_fonctions where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $fonction				=	$enreg["fonction"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Fonctions</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Fonctions</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="fonction">Fonction 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="fonction"
                                                    name="fonction" placeholder="Fonction .." value="<?php echo $fonction ?>">
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
                        <h4 class="card-title">Liste des Fonctions</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>


                                        <th>Fonction</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $fonction		    =	"";
                                   
                                    $req="select * from gym_fonctions where 1=1  order by fonction ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $fonction				=	$enreg["fonction"] ;
                                ?>


                                    <tr>
                                        <td>
                                        <?php echo $fonction; ?>
                                        </td>
                                     
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_fonction.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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