<?php include('navbar_footer/navbar.php') ?>
<script>
    function Supprimer(id,idd) {
        // alert("hello world") ;
        if (confirm('Confirmez-vous cette action?')) {
            document.location.href="page_js/supprimerDetClient.php?ID="+id+"&IDD="+ idd ;
        }
    }
</script>
<?php

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
    $idd = $_GET["ID"];
}else{
    $id = "0";
}
if(isset($_POST['enregistrer_mail'])){	

    $titre				=	addslashes($_POST['titre']);

$type1=pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION);
$file1=md5($_FILES["file"]["name"].time()).".".$type1;
if($type1 == 'pdf' or $type1=="jpg" or $type1=="JPG" or $type1=="jpeg" or $type1=="JPEG" or $type1=="png" or $type1=="PNG"){
    $pathcomplete = "uploads/".$file1;
    move_uploaded_file($_FILES['file']['tmp_name'], $pathcomplete);
    
    echo   $sql="INSERT INTO `gym_det_client`(`idclient`,`titre`,`document`) VALUES 
    ('".$id."','".$titre."','".$pathcomplete."')";
     $req=mysql_query($sql);
}
    echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="gest_det_client.php?ID='.$id.'&suc=1" </SCRIPT>';

}
  



$titre				=	"";


$req="select * from gym_det_client where idclient=".$id;
$query=mysql_query($req);
while($enreg=mysql_fetch_array($query))
{
    $titre				=	$enreg["titre"] ;
}
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gestion de docuement client :
                <?php   
                $nom    = "" ; 
                $prenom = "" ;   
                $req="select * from gym_clients where id=".$id; 
                $query=mysql_query($req) ;
                while($enreg=mysql_fetch_array($query)){
                   $nom = $enreg["nom"];
                   $prenom = $enreg["prenom"];
                }
               
                 ?><?php echo $nom ;  ?> <?php  echo $prenom ; ?></a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gestion de document client</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="titre">Titre 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="titre"
                                                    name="titre" placeholder="Titre .." value="<?php echo $titre ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="file">Document 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="custom-file col-lg-6">
                                                <input type="file" class="custom-file-input" name="file" id="file">
                                                <label class="custom-file-label">Choisir le document</label>
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
                            </form>
                        </div>
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
                                        <th>Client</th>
                                        <th>Titre</th>
                                        <th>Document</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id					=	0;
                                    $titre				=	"";
                                    $document				=	"";
                                  
                                    $req="select * from gym_det_client where 1=1 ";
                                    $query=mysql_query($req);
                                    while($enreg=mysql_fetch_array($query))
                                    {
                                        $id					=	$enreg["id"] ;	
                                        $titre				    =	$enreg["titre"] ;
                                        $document				=	$enreg["document"] ;
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center"> <span
                                                    class="w-space-no"><?php echo $nom; ?> <?php echo $prenom; ?>
                                                </span>
                                            </div>
                                        </td>
                                        <td><?php echo $titre; ?></td>
                                        <td><a href="<?php echo $document; ?>"><i class="fa fa-id-card"></i></a></td>
                                        <td>
                                            <div class="d-flex">
                                                <a  href="Javascript:Supprimer('<?php echo $id; ?>','<?php echo $idd; ?>')" class="btn btn-danger shadow btn-xs sharp"><i
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