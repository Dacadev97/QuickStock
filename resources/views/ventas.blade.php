<!DOCTYPE html>
<html lang="en">

<head>
    <title>Venta de Productos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <div class="container form-container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salesModal">
            <i class="fas fa-list"></i> Ver Ventas
        </button>

        <!-- Modal -->
        <div class="modal fade" id="salesModal" tabindex="-1" role="dialog" aria-labelledby="salesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="salesModalLabel">Ventas realizadas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID del producto</th>
                                    <th>Nombre del producto</th>
                                    <th>Cantidad de la venta</th>
                                    <th>Precio de la venta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->product_id }}</td>
                                        <td>{{ $sale->product->nombre_producto }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>${{ $sale->product->precio * $sale->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container form-container">
            <h1 style="text-align: center; margin-bottom: 20px;">Realizar Venta</h1>
            @foreach ($products as $product)
                <form action="{{ route('sell', $product->id) }}" method="POST">
            @endforeach
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="producto_id">Producto</label>
                    <select class="form-control" id="producto_id" name="producto_id" required>
                        <option value="">Seleccione un producto</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-referencia="{{ $product->referencia }}"
                                data-precio="{{ $product->precio }}" data-peso="{{ $product->peso }}"
                                data-categoria="{{ $product->categoria }}" data-stock="{{ $product->stock }}">
                                {{ $product->nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="referencia">Referencia</label>
                    <input type="text" class="form-control" id="referencia" name="referencia" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="stock">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="quantity">Cantidad</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Realizar Venta</button>
            </form>
        </div>
        <script>
            document.getElementById('producto_id').addEventListener('change', function() {
                var selectedOption = this.options[this.selectedIndex];
                document.getElementById('referencia').value = selectedOption.getAttribute('data-referencia');
                document.getElementById('precio').value = selectedOption.getAttribute('data-precio');
                document.getElementById('peso').value = selectedOption.getAttribute('data-peso');
                document.getElementById('categoria').value = selectedOption.getAttribute('data-categoria');
                document.getElementById('stock').value = selectedOption.getAttribute('data-stock');
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                $('form').on('submit', function(e) {
                    e.preventDefault();
                    var form = this;
                    var stock = parseInt($('#stock').val());
                    var cantidad = parseInt($('#quantity').val());
                    if (stock <= 0) {
                        swal('Error', 'No es posible realizar la venta, el producto no tiene stock.', 'error');
                    } else if (cantidad > stock) {
                        swal('Error',
                            'No es posible realizar la venta, la cantidad ingresada excede el stock disponible.',
                            'error');
                    } else {
                        swal({
                            title: 'Éxito',
                            text: 'La venta se realizó con éxito.',
                            icon: 'success'
                        }).then(function() {
                            form.submit();
                        });
                    }
                });
            });
        </script>
</body>

</html>
