<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Mini Karya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <header class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
        <h1 class="m-0" onclick="window.location='{{ route('poems.index') }}'" style="cursor:pointer;">Museum Mini Karya</h1>

        <div>
            @guest
                @if (!request()->routeIs('login') && !request()->routeIs('register'))
                    <a href="{{ route('login') }}" class="btn btn-primary btn-md">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                    </a>
                @endif
            @else
                <span class="me-2">Halo, {{ Auth::user()->name }}</span>
                <a href="{{ route('poems.my') }}" class="btn btn-success btn-md">
                    <i class="bi bi-journal-text me-1"></i> Karya Saya
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-md">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            @endguest
        </div>
    </header>


    <main class="container my-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white text-center p-3 mt-4">
        <p class="m-0">&copy; 2025 Museum Mini Karya</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
