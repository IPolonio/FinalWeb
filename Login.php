<?php
require('Lib/Main.php');
define('USUARIO', 'adamix');
define('Contraseña', 'pasemesolosilomeresco70');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user = new Usuario;
$mensaje = '';


if(!isset($_SESSION['intentos'])){
    $_SESSION['intentos'] = 0;
}
if ($_POST) {
    $user = new Usuario;

    $user->usuario = $_POST['username'];
    $user->Contraseña = $_POST['password'];

    if ($user->usuario == USUARIO && $user->Contraseña == Contraseña) {
        setuser($user);
        cargar('');
    }else{
        $_SESSION['intentos']++;
        $mensaje = mensaje::error("Clave incorrecta o Usuario Incorrecto Intentos: {$_SESSION['intentos']}");
    }
}








?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <i class="fa fa-user-circle fa-4x"></i>
                    </div>

                    <h4 class="card-title text-center">Iniciar sesión</h4>
                    <form action="Login.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input value="<?= $user->usuario; ?>" type="text" class="form-control" id="username" name="username" placeholder="Ingrese su nombre de usuario" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input value="<?= $user->Contraseña; ?>" type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
                            <div class="text-end">
                                <i class="far fa-eye-slash password-icon"></i>
                            </div>

                            <div> <?php echo $mensaje ?></div>


                        </div>
                        <button class="btn btn-primary w-100">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const contrasinput = document.querySelector('#password')
    const contrasicon = document.querySelector('.password-icon');

    contrasicon.addEventListener('click', () => {
        if (contrasinput.type === 'password') {


            contrasinput.type = 'text';
            contrasicon.classList.remove('fa-eye-slash')
            contrasicon.classList.add('fa-eye')





        } else {


            contrasinput.type = 'password'
            contrasicon.classList.remove('fa-eye')
            contrasicon.classList.add('fa-eye-slash')
        }
    });
</script>
</body>

</html>