<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clinica Médica</title>
    <link rel="shortcut icon" type="image/ico" href="/img/yandrec-logo.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container" >
        @if (session()->has('flash'))
            <div class="alert alert-info">{{ session('flash')}}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
