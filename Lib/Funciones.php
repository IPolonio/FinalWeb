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








function setuser($usuario){

    $_SESSION['usuario']= serialize($usuario);

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
class mensaje {
    public static function error($mensaje) {
        return "<div class='alert alert-danger' role='alert'>$mensaje</div>";
    }

    public static function success($mensaje) {
        return "<div class='alert alert-success' role='alert'>$mensaje</div>";
    }

    public static function warning($mensaje) {
        return "<div class='alert alert-warning' role='alert'>$mensaje</div>";
    }

    public static function info($mensaje) {
        return "<div class='alert alert-info' role='alert'>$mensaje</div>";
    }
}













?>