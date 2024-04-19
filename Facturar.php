<?php

if ($_POST) {

    $total = array_sum($_POST['total']);
    
    
    $_POST['total'] = $total;

    $mandao = json_encode($_POST);
    $id = 1;
    if (is_file("facturas.dat")) {
        $facturas = file_get_contents('facturas.dat');


        $id = $facturas +1;

    }

    file_put_contents('facturas.dat', $id);

    if(!is_dir('facturas')){
        mkdir('facturas');

    }
    file_put_contents('facturas/factura_'.$id.'.json' , $mandao);
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
                            <a class="nav-link" href="#">Item 2</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>

    </div>
    <div class="container">

        <h3>
            Facturar
        </h3>

        <form action="Facturar.php" method="post">
            <div class="mb-3">
                <label for="codigoCliente" class="form-label">Código de Cliente</label>
                <input type="text" class="form-control" id="codigoCliente" name="codigoCliente">
            </div>
            <div class="mb-3">
                <label for="nombreCliente" class="form-label">Nombre de Cliente</label>
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d')        ?>">
            </div>

            <div>
                <table class="table table-stripped">

                    <thead>
                        <tr>
                            <th>
                                Nombre
                            <th>
                                Cantidad
                            </th>
                            <th>
                                precio
                            </th>
                            <th>
                                Total
                            </th>
                            <td> <button type="button" class="btn btn-primary" onclick="addrow();"> <i class="fas fa-plus"></i></button></td>
                        </tr>

                    </thead>
                    <tbody id="tbdetails">

                    </tbody>
                </table>

                <div class="mb-3">
                    <label for="total" class="form-label">Total a Pagar</label>
                    <input type="text" id="total" readonly>
                </div>

                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario</label>
                    <textarea name="comentario" id="comentario" class="form-control"></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success"> Facturar</button>
                </div>
            </div>
        </form>


    </div>

    </div>

</body>
<script>
    function addrow() {
        let tbody = document.getElementById('tbdetails');
        let tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" class="form-control" name="nombre[]"></td>
            <td><input type="number" class="form-control" name="cantidad[]" onkeyup ="calculartotal()" ></td>
            <td><input type="number" class="form-control" name="precio[]" onkeyup ="calculartotal()"></td>
            <td><input type="number" readonly class="form-control" name="total[]"></td>
            <td><button class="btn btn-danger" onclick="deleted(this);">Eliminar fila</button></td>
            <td></td>`;
        tbody.appendChild(tr);
    }

    function calculartotal() {
        let total = 0;
        let cantidad = document.getElementsByName('cantidad[]');
        let precio = document.getElementsByName('precio[]');
        let totalinpt = document.getElementsByName('total[]');
        for (let i = 0; i < cantidad.length; i++) {
            subtotal = (cantidad[i].value * precio[i].value).toFixed(2);
            totalinpt[i].value = subtotal;
            total += parseFloat(subtotal)
        }
        document.getElementById('total').value = total.toFixed(2);

    }
</script>


</html>