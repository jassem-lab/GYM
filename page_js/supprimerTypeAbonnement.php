<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
		
	$sql = "delete from `gym_type_abonnement` WHERE id=".$id;
	$requete = mysql_query($sql) ;
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gest_abo_type.php" </SCRIPT>';
	
  
?>