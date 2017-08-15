<?php
    session_start();
    session_destroy();
	header("location: ./login_tela.php?msg=3");
?>
