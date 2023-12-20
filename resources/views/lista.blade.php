<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            font-size: 13.5px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container mt-5">
        <h1 style="text-align: center; margin-bottom: 20px;">Lista de productos</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre de producto</th>
                        <th scope="col">Referencia</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Fecha de creación</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->nombre_producto }}</td>
                            <td>{{ $product->referencia }}</td>
                            <td>{{ $product->precio }}</td>
                            <td>{{ $product->peso }}</td>
                            <td>{{ $product->categoria }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->fecha_creacion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
