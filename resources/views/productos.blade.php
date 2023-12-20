<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gestión de productos</title>
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
        <h1 style="text-align: center; margin-bottom: 20px;">Gestión de productos</h1>
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
                        <th><button class="btn btn-success" data-toggle="modal" data-target="#addProductModal"><i
                                    class="fas fa-plus"></i></button></th>
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
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editProductModal{{ $product->id }}"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-success btn-sm save" style="display: none;"><i
                                        class="fas fa-save"></i></a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
        aria-hidden="true">
        <!-- Formulario para agregar productos -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #28a745; color: white;">
                    <h5 class="modal-title" id="addProductModalLabel">Agregar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('productos') }}" method="POST">
                        @csrf
                        <!-- Campos del formulario para agregar productos -->
                        <div class="form-group">
                            <label for="nombre_producto">Nombre de producto</label>
                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="referencia">Referencia</label>
                            <input type="text" class="form-control" id="referencia" name="referencia" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="0.01"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="peso">Peso</label>
                            <input type="number" class="form-control" id="peso" name="peso" step="0.1"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" step="1"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modals -->
    @foreach ($products as $product)
        <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
            <!-- Formulario para editar productos -->
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #007bff; color: white;">
                        <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Editar producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Campos del formulario para editar productos -->
                            <div class="form-group">
                                <label for="nombre_producto">Nombre de producto</label>
                                <input type="text" class="form-control" id="nombre_producto"
                                    name="nombre_producto" value="{{ $product->nombre_producto }}" required>
                            </div>
                            <div class="form-group">
                                <label for="referencia">Referencia</label>
                                <input type="text" class="form-control" id="referencia" name="referencia"
                                    value="{{ $product->referencia }}" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio"
                                    value="{{ $product->precio }}" required>
                            </div>
                            <div class="form-group">
                                <label for="peso">Peso</label>
                                <input type="number" class="form-control" id="peso" name="peso"
                                    value="{{ $product->peso }}" required>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoría</label>
                                <input type="text" class="form-control" id="categoria" name="categoria"
                                    value="{{ $product->categoria }}" required>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                    value="{{ $product->stock }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#addProductModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
    </script>
</body>

</html>
