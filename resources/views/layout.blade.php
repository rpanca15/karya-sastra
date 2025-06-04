<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Mini Karya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        header h1 {
            cursor: pointer;
        }

        footer {
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <header class="bg-white border-bottom shadow-sm py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 m-0 text-primary fw-bold" onclick="window.location='{{ route('poems.index') }}'">Museum Mini
                Karya</h1>

            <div>
                @guest
                    @if (!request()->routeIs('login') && !request()->routeIs('register'))
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    @endif
                @else
                    <span class="me-2 text-muted">Halo, <strong>{{ Auth::user()->name }}</strong></span>
                    <a href="{{ route(request()->routeIs('poems.my') ? 'poems.index' : 'poems.my') }}"
                        class="btn btn-outline-success me-1">
                        <i class="bi bi-journal-text me-1"></i>
                        {{ request()->routeIs('poems.my') ? 'Semua Karya' : 'Karya Saya' }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </header>

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-white border-top text-center text-muted py-3 mt-auto">
        &copy; 2025 Museum Mini Karya. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
