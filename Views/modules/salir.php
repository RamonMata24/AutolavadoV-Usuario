<?php 
//SESSION INICIADA
session_start();
session_unset();
//se destruye la session (se cierra)
if(session_destroy()){
header("Location: login.php");
}
?>
