<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('vendor/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap-5-theme.min.css') }}">

    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor/select2.min.js') }}"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-ligth d-flex align-items-center" href="{{ url('/') }}">
                <i class="bi bi-book-half me-2"></i> 
                <span class="fs-4">Biblioteca</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('autores.index') }}">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('assuntos.index') }}">Assuntos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('livros.index') }}">Livros</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>


<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: 'Selecione...',
            allowClear: true
        });
    });
</script>
</body>
</html>
