<?php



$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

$datos = file_get_contents('facturas/factura_' . $id . '.json');

$infofactura = json_decode($datos, false);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Factura </title>
</head>

<body>
    <div class=" container  " style="margin: auto; width: 50%;">

        <h3> Factura </h3>

        <p>ID: <?php echo $id; ?></p>
        <p>Fecha: <?php echo $infofactura->fecha   ?> </p>
        <p>Cliente: <?php echo $infofactura->nombreCliente   ?></p>
        <p> Productos</p>
        <ul>
            <?php foreach ($infofactura->nombre as $k => $v) :  ?>
                <li>
                    <?php echo $v; ?> - Cantidad: <?php echo $infofactura->cantidad[$k]; ?> - Precio(unit): <?php echo $infofactura->precio[$k];  ?>
                </li>

            <?php endforeach; ?>
        </ul>
        <p>Total : <?php echo $infofactura->total   ?> RD$</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 50%;
        border-radius: 5px;
        background-color: #ffffff;
        padding: 20px;
        margin-top: -50px;
    }

    .container:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    h3 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    p,
    li {
        color: #555;
        line-height: 1.6;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        background: #f2f2f2;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 3px;
    }

    p.total {
        text-align: right;
        font-weight: bold;
        margin-top: 20px;
    }
</style>



</html>