<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('halaman')</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('styles-table')
</head>
<body>
    <!-- Navbar for mobile -->
    <nav class="navbar navbar-dark d-md-none" style="background-color: var(--darker-bg);">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="{{route('home')}}" class="text-white text-decoration-none">
                <h4 class="navbar-brand fw-bold" style="color: #ff9147;"><span style="color:#2ebcf9;">Re</span> Film 👋</h4>
            </a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar px-3 py-4" style="width: 250px;">
        @guest
        <h5 class="text-white mb-4"><i class="bi bi-person-circle"></i> Guest</h5>
        @else
        <h5 class="text-white mb-4">
            <i class="bi bi-person-circle"></i> 
            {{ Str::limit(Auth::user()->name, 15) }} - {{ Str::limit(Auth::user()->email, 20) }}
        </h5>
        @endguest
        <h6 class="text-white">Menu</h6>
        <nav class="nav flex-column">
            <a class="nav-link mb-2 @yield('home-active')" href="{{Route('home')}}"><i class="bi bi-house-door-fill"></i> Home</a>
            <h6 class="text-white">Features</h6>
            <a class="nav-link mb-2 @yield('cast-active')" href="{{Route('cast.index')}}"><i class="bi bi-person-video2"></i> Cast</a>
            <a class="nav-link mb-2 @yield('actor-active')" href="{{Route('actor.index')}}"><i class="bi bi-person-vcard-fill"></i> Actor</a>
            <a class="nav-link mb-2 @yield('genre-active')" href="{{Route('genre.index')}}"><i class="bi bi-card-list"></i> Genre</a>
            <a class="nav-link mb-2 @yield('film-active')" href="{{Route('film.index')}}"><i class="bi bi-film"></i> Film</a>
            <h6 class="text-white">Help</h6>
            <a class="nav-link mb-2 @yield('guide-active')" href="{{Route('guide')}}"><i class="bi bi-info-square-fill"></i> Guide</a>
            @auth
            <a class="nav-link mb-2 @yield('profile-active')" href="{{Route('profile.edit', Auth::user()->id)}}"><i class="bi bi-person-badge"></i> Profile</a>
            <a class="nav-link mb-2 @yield('settings-active')" href="{{Route('settings')}}"><i class="bi bi-gear-fill"></i> Settings</a>
            @endauth
        </nav>
        @guest
        <a href="{{route('login')}}" class="btn btn-blue w-100 mb-2">Log in</a>
        <a href="{{route('register')}}" class="btn btn-orange w-100 mb-2">Register</a>
        @else
        <form class="mt-auto" action="{{route('logout')}}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="logout-btn">Logout</button>
        </form>
        @endguest
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <a href="{{route('home')}}" class="text-white text-decoration-none">
            <h2 class="mb-4 fw-bold" style="color: #ff9147;"><span style="color:#2ebcf9;">Re</span> Film 👋</h2>
        </a>
        <div class="card" style="background-color: var(--darker-bg);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white">@yield('halaman')</h5>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts-table')
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Hide sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>