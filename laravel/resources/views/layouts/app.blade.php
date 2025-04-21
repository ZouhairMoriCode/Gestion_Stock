<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Welcome') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <style type="text/css">

        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

  

        body{

            margin: 0;

            font-size: .9rem;

            font-weight: 400;

            line-height: 1.6;

            color: #212529;

            text-align: left;

            background-color: #f5f8fa;

        }

        .navbar-laravel

        {

            box-shadow: 0 2px 4px rgba(0,0,0,.04);

        }

        .navbar-brand , .nav-link, .my-form, .login-form

        {

            font-family: Raleway, sans-serif;

        }

        .my-form

        {

            padding-top: 1.5rem;

            padding-bottom: 1.5rem;

        }

        .my-form .row

        {

            margin-left: 0;

            margin-right: 0;

        }

        .login-form

        {

            padding-top: 1.5rem;

            padding-bottom: 1.5rem;

        }

        .login-form .row

        {

            margin-left: 0;

            margin-right: 0;

        }

    </style>
</head>
<body class="min-vh-100 d-flex flex-column">
    <header class="bg-dark text-white shadow-sm">
        <nav class="container d-flex justify-content-between align-items-center py-3">
            <h1 class="h3 mb-0 fw-bold">Stock Management System</h1>
            <div class="d-flex align-items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light">Dashboard</a>
                    <a href="{{ route('logout') }}" class="btn btn-light">Logout</a>
                @endguest
                <select name="selectLocale" id="selectLocale" class="form-select ms-2" style="width: auto;">
                    <option @if(app()->getLocale() == 'ar') selected @endif value="ar">العربية</option>
                    <option @if(app()->getLocale() == 'fr') selected @endif value="fr">Français</option>
                    <option @if(app()->getLocale() == 'en') selected @endif value="en">English</option>
                    <option @if(app()->getLocale() == 'es') selected @endif value="es">Español</option>
                </select>
            </div>
        </nav>
    </header>
    <script>
    $("#selectLocale").on('change', function(){
        var locale = $(this).val();
        window.location.href = "/changeLocale/"+locale;
    });
    </script>
    <main class="container flex-grow-1 py-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>