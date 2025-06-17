<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado -->
    <style>
        .hero-section { background: #f8f9fa; padding: 100px 0; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
           
            <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="{{ route('aulas.index') }}">Aulas</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('materias.index') }}">Materias</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('horarios.index') }}">Horarios</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('disponibilidades.index') }}">Disponibilidades</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cortinas.index') }}">Cortinas</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('focos.index') }}">Focos</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('aires.index') }}">Aires Acondicionados</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('historiales-aire.index') }}">Historial Aires</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('historiales-foco.index') }}">Historial Focos</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('muebles.index') }}">Muebles</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('docentes.index') }}">Docentes</a></li>
</ul>

            </div>
        </div>
        </nav>


    <!-- Contenido -->
    <section class="hero-section text-center">
        <div class="container">
            <h1>Bienvenido a mi Landing</h1>
            <p class="lead">Una página simple con Bootstrap y JavaScript.</p>
            <button id="alertButton" class="btn btn-primary">Haz clic</button>
        </div>
    </section>

    <!-- Bootstrap JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tu JavaScript -->
    
</body>
</html>