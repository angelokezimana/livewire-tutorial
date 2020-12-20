<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>{{ isset($title) ? config('app.name')." - ".$title : config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="author" content="Kezimana Aimé Angelo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    @livewireStyles

</head>

<body class="bg-secondary">

    <div class="container-fluid bg-light mt-2 rounded-lg">
        <header class="pt-2 mb-4">
            <h1 class="text-uppercase text-center"><a class="text-decoration-none" href="{{ route('home') }}">{{ config('app.name') }}</a></h1>
        </header>
    
        <div class="row mt-5">
            <nav class="col-md-2 border-top border-right border-bottom">
                <ul>
                    <li><a href="#">Projects</a></li>
                    <li><a href="{{ url('/collaborators') }}">Collaborators</a></li>
                </ul>
            </nav>
        
            <main role="main" class="col-md-10">
                {{ $slot }}
            </main>
        </div>
    
        <footer class="text-center mt-5 pb-5">
            Copyright &copy; {{ date('Y') != '2020' ? '2020-' : '' }}{{ date('Y') }} &middot; <a href="{{ route('home') }}">{{ config('app.name') }}</a>
        </footer>
    </div>

    @livewireScripts
</body>

</html>
