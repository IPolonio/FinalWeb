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


        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mi Sitio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./">Facturas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Hizo.php">Creador</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        </html>
    <?php
    }
    function __destruct()
    {

        $usuario = getuser();

    ?>
        </div>
        <div class="container">

        
        <footer>
            <hr />
            Derechos reservados <?= date('Y') ?> Isaac and Co.&copysr;
         <P>Bienvenido: <?= $usuario->usuario ?></P>
            <a href="Salir.php" class="btn btn-danger btn-sm float-end">Salir</a>
        </footer>
        </div>

<?php


    }
}
