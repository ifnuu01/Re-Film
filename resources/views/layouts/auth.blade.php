<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Re Film - @yield('title')</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card bg-transparent border-0 w-100" style="max-width: 500px;">
            <div class="card-body rounded p-3" style="background-color:#22252F; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
                <h4 class="text-center mb-1">
                    <h1 class="brand-text mb-4 text-white text-center">
                        Hello<br>
                        <span class="brand-re">Re</span> <span class="brand-film">Film!</span> 👋
                    </h1>
                </h4>
                <h5 class="text-center mb-4 text-white">@yield('card-title')</h5>

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
