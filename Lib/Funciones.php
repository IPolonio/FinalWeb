<?php 
define('SERVER_URL', 'http://localhost/FinalWeb');



//retorna los recursos para le sitio 
function base_url($path = '')
{
    return SERVER_URL . '/' . $path;
}


function cargar($url)
{
    $url = base_url($url);

    echo "
    <script>
    window.location ='{$url}';
    </script>
    ";
    exit();
}

function getuser($redirect = true)
{
    if (isset($_SESSION['usuario'])) {
        $temporal = $_SESSION['usuario'];

        $final = unserialize($temporal);

        return $final;

        
    }
    if ($redirect) {


        cargar('Login.php');
    }

    return false;
}

function setuser($usuario){

    $_SESSION['usuario']= serialize($usuario);

  






}












?>