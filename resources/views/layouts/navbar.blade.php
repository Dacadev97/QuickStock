<style>
    .navbar {
        background-color: #1e9b82;
    }

    .navbar-brand,
    .nav-link {
        color: #ecf0f1 !important;
    }

    .nav-link:hover {
        color: #bdc3c7 !important;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{ route('dashboard') }}"
        style="font-family: 'Arial Black'; font-size: 30px;">QUICKSTOCK</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link">
                    <i class="fas fa-user mr-2"></i>
                    {{ Auth::user()->name }}
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"
                    style="background-color: #98A898; padding: 10px; border-radius: 5px; color: #1c1b1b;">
                    Salir <i class="fas fa-sign-out-alt ml-2"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
    </div>
</nav>
