<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
    $idd  =$_GET["IDD"] ; 
	$sql = "delete from `gym_det_client` WHERE id=".$id;
	$requete = mysql_query($sql) ;
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gest_det_client.php?ID='.$idd.'" </SCRIPT>';
	
  
?>