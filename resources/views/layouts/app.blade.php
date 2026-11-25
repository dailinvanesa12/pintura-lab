<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Pintura Lab') - Pintura Lab</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Nunito:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --borgona: #6B1D2F;
            --marfil: #F2EFE9;
            --crema: #F8F6F2;
            --negro: #000000;
        }

        body { font-family: 'Plus Jakarta Sans', 'Nunito', sans-serif; margin: 0; background: var(--crema); color: #2b2b2b; }
        h1, h2, h3 { font-family: 'Montserrat', sans-serif; color: var(--borgona); }

        header { background: var(--borgona); color: var(--marfil); padding: 12px 24px; }
header h1 { margin: 0 0 6px; font-size: 1.4rem; color: var(--marfil); }
nav a { color: var(--marfil); margin-right: 16px; text-decoration: none; font-family: 'Nunito', sans-serif; font-weight: 600; }
nav a:hover { text-decoration: underline; }

main { padding: 24px 40px; min-height: 60vh; }
footer { text-align: center; color: #666; padding: 16px; font-size: .85rem; }

table { width: 100%; border-collapse: collapse; margin-top: 12px; }

        th { font-family: 'Montserrat', sans-serif; color: var(--borgona); }
        th, td { border-bottom: 1px solid #d9d3c7; padding: 8px; text-align: left; }

        label { display: block; margin-top: 12px; font-weight: 600; }
        input[type=text], textarea { width: 100%; padding: 8px; box-sizing: border-box; font-family: inherit;
                                     background: var(--crema); border: 1px solid #cfc8bb; border-radius: 4px; }
        input[type=checkbox] { accent-color: var(--borgona); }

        .btn { display: inline-block; padding: 7px 14px; border: 1px solid var(--borgona); border-radius: 4px;
               background: var(--borgona); color: var(--marfil); text-decoration: none; cursor: pointer;
               font-family: 'Nunito', sans-serif; font-weight: 700; font-size: .95rem; }
        .btn:hover { opacity: .9; }
        .btn-gris { background: var(--marfil); color: var(--borgona); }
        .btn-peligro { background: #fff; color: #b3261e; border-color: #b3261e; }

        .exito { background: #e6f4ea; border: 1px solid #34a853; padding: 10px; border-radius: 4px; }
        .errores { background: #fdecea; border: 1px solid #b3261e; padding: 10px; border-radius: 4px; }
        .error-campo { color: #b3261e; font-size: .85rem; }
        .inline { display: inline; }
        .barra { display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
    </style>
</head>
<body>
    <header>
        <h1>Pintura Lab</h1>
        <nav aria-label="Navegación principal">
            <a href="{{ route('inicio') }}">Inicio</a>
            <a href="{{ route('categorias.index') }}">Categorías</a>
        </nav>
    </header>

    <main>
        @if (session('exito'))
            <p class="exito" role="status">{{ session('exito') }}</p>
        @endif

        @yield('contenido')
    </main>

    <footer>
        <p>Proyecto formativo de desarrollo web - SENA ADSO</p>
    </footer>
</body>
</html>