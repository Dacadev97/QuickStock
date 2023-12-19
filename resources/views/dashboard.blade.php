<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .card.btn-info {
            background-color: #17a2b8 !important;
        }
        .card.btn-success {
            background-color: #28a745 !important; 
        }
        .card.btn-purple {
            background-color: #6f42c1 !important; 
        }
        .card:hover {
            transform: scale(1.05); 
            transition: transform .2s; 
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="row mt-3 mx-3">
        <div class="col-md-6 col-lg-6">
            @auth
                @if(auth()->user()->role == 'administrador' || auth()->user()->role == 'consulta')
                    <a href="{{ route('lista') }}" class="card btn btn-purple text-white text-decoration-none">
                        <div class="card-body text-center">
                            <i class="fas fa-list fa-4x mb-3"></i>
                            <h5 class="card-title">Lista de productos</h5>
                        </div>
                    </a>
                @endif
            @endauth
        </div>
        <div class="col-md-6 col-lg-6">
            @auth
                @if(auth()->user()->role == 'administrador' || auth()->user()->role == 'vendedor')
                    <a href="{{ route('ventas') }}" class="card btn btn-info text-white text-decoration-none">
                        <div class="card-body text-center">
                            <i class="fas fa-cash-register fa-4x mb-3"></i>
                            <h5 class="card-title">Ventas</h5>
                        </div>
                    </a>
                @endif
            @endauth
        </div>
        <div class="col-md-6 col-lg-6">
            @auth
                @if(auth()->user()->role == 'administrador')
                    <a href="{{ route('productos') }}" class="card btn btn-success text-white text-decoration-none">
                        <div class="card-body text-center">
                            <i class="fas fa-box-open fa-4x mb-3"></i>
                            <h5 class="card-title">Gestionar productos</h5>
                        </div>
                    </a>
                @endif
            @endauth
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
