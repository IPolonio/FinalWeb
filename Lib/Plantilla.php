<?php



class plantilla
{

    public static $instance = null;

    public static function apply($titulo = "Facturador")
    {


        if (self::$instance == null) {
            self::$instance = new plantilla($titulo);
        }

        return self::$instance;
    }


    public function __construct($titulo)
    {


        $user = getuser();



?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <div class="container">
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link rel="stylesheet" href="Sources/bonito.css">
                <title><?= $titulo ?></title>

        </head>

        <body>


            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Pok%C3%A9_Ball_icon.svg/768px-Pok%C3%A9_Ball_icon.svg.png" width="36" /></a>
                    <div class="collapse navbar-collapse" id="navbarExample">
                        <ul class="navbar-nav me-auto mb-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/inicio.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="panel.php">Panel</a>
                            </li>

                            <li class="nav-item dropdown">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="Datos.php">Datos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="usuarios.php">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="Info.php">Acerca de</a>
                            </li>
                        </ul>
                        </li>
                        </ul>
                        <div class="d-flex align-items-center flex-column flex-lg-row">

                            <form class="me-2 mb-2 mb-lg-0 d-flex" action="buscar.php">

                                <input type="text" class="form-control form-control-sm" placeholder="Maestro Pokemon" />

                                <button class="btn"><i class="fas fa-search"></i></button>
                            </form>


                        </div>
                    </div>
                </div>
            </nav>

            <div id="centro">






        </body>

        </html>
    <?php
    }
    function __destruct()
    {

        $usuario = getuser();

    ?>
        </div>
        <footer>
            <hr />
            Derechos reservados <?= date('Y') ?> Isaac and Co.&copysr;
            <?= $usuario->usuario ?>
            <a href="salir.php" class="btn btn-danger btn-sm float-end">Salir</a>
        </footer>


<?php


    }
}
