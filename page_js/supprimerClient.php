<?php
session_start();
include('../connexion/cn.php');
	
	$id   = $_GET["ID"] ;
		
	$sql = "delete from `gym_clients` WHERE id=".$id;
	$requete = mysql_query($sql) ;
	
	echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="../gest_client.php" </SCRIPT>';
	
  
?>