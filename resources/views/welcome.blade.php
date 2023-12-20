<!DOCTYPE html>
<html>

<head>
    <title>QuickStock</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('/img/fondo.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: 'Montserrat', sans-serif;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.902);
            color: white;
            width: 200%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card text-center">
                <div class="card-header">
                    Bienvenido a QuickStock
                </div>
                <div class="card-body">
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg mr-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Registro</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
