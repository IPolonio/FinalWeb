<?php  
require_once('Lib/Main.php');
plantilla::apply("Hola");

function mostrarfacts() {
    if(is_dir('facturas')) {
        $facturas = scandir('facturas');
        foreach ($facturas as $factura) {
            if($factura != '.' && $factura != '..') {
                $data = file_get_contents('facturas/'.$factura);
                $tpx = explode('_', $factura);
                $tpx = explode('.', $tpx[1]);
                $id = $tpx[0];
                $data = json_decode($data, true);
                echo '<tr>';
                echo '<td>'.$id.'</td>';
                echo '<td>'.$data['fecha'].'</td>';
                echo '<td>'.$data['nombreCliente'].'</td>';
                echo '<td>'.$data["total"].'</td>';
                echo "<td><a href='imprimir.php?id={$id}' class = 'btn btn-success'>Imprimir</a></td>";
                echo '</tr>';
            }
        }
    }
}














?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Facturas</title>
</head>

<body>
   
        <br>
        <div class="text-end">
            <a href="Facturar.php" class="btn btn-warning">
                Nueva Factura
            </a>
        </div>
        <div>
            <h3>Facturas Hechas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php mostrarfacts();?>
                </tbody>
            </table>
        </div>


    </div>
</body>

</html>