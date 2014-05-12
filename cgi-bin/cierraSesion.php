<?php
session_start();

//Destruyendo sesion y redireccionando

session_destroy();
header("Location: ../index.php");
?>