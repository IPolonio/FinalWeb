<?php 

session_start();


if (!isset($_SESSION['usuario'])) {
    
    header('Location: Login.php');
    exit();
}
require('Clases.php');
require('Funciones.php');
require('Plantilla.php');
