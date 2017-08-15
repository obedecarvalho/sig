<?php
	session_start();
    if(!isset($_SESSION["id_usr"])){
    	header("Location: ./login_tela.php?msg=4");
	}
?>
