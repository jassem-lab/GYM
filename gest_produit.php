<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id) {
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href = "page_js/supprimerProduit.php?ID=" + id;
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


$produit			    	=	addslashes($_POST["produit"]) ;
$prix_unitaire			   	=	addslashes($_POST["prix_unitaire"]) ;	



if($id=="0")
    {
   echo     $sql="INSERT INTO `gym_produits`(`produit`, `prix_unitaire`) VALUES 
        ('".$produit."','".$prix_unitaire."' )";
    }
else{
        $sql="UPDATE `gym_produits` SET `produit`='".$produit."',`prix_unitaire`='".$prix_unitaire."' WHERE id=".$id;
    }
    $req=mysql_query($sql);

    // echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="?suc=1" </SCRIPT>';

}
$produit   		    	=	"";
$prix_unitaire			=	"";


$req="select * from gym_produits where id=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $produit				=	$enreg["produit"] ;
    $prix_unitaire			=	$enreg["prix_unitaire"] ;


}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion des Produits</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion des Produits</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="produit">Produit 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="produit"
                                                    name="produit" placeholder="Produit .." value="<?php echo $produit ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="prix_unitaire">Prix unitaire
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="prix_unitaire"
                                                    name="prix_unitaire" placeholder="Prix unitaire.." value="<?php echo $prix_unitaire ?>">
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


                                        <th>Produit</th>
                                        <th>Prix Unitaire</th>
                                   
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $produit		    =	"";
                                    $prix_unitaire		=	"";
                                   
                                    $req="select * from gym_produits where 1=1  order by prix_unitaire ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id				    	=	$enreg["id"] ;	
                                        $produit				=	$enreg["produit"] ;
                                        $prix_unitaire			=	$enreg["prix_unitaire"] ;
                                ?>


                                    <tr>
                                        <td>
                                        <?php echo $produit; ?>
                                        </td>
                                        <td><?php echo $prix_unitaire; ?> DT</td>
                                     
                                        <td>
                                            <div class="d-flex">
                                                <a href="gest_produit.php?ID=<?php echo $id ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
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