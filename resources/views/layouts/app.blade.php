<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name')) </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Scripts -->
{{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>--}}


    <!-- Import typeahead.js -->
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>



    <script type="text/javascript">


        $(document).ready(function() {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/search?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });

            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: bloodhound,
                display: function(data) {
                    return data.name_original  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Ничего не найдено.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown>'
                    ],
                    suggestion: function(data) {
                        return '<a href="/products/'+ data.id +'" class="list-group-item mt-0 shadow-lg text-black"><div class="media text-black"><img width="40px" class="align-self-start mr-3" src="'+ data.image +'" alt="Generic placeholder image"><div class="media-body text-black"><h6 class="my-0 text-dark" style="font-size: 14px; line-height: 20px;">'+ data.name_original +' <br /><small class="text-muted">#'+ data.article +'</small></h6></div><div class="align-self-start ml-3"> '+ data.price_base +' руб.</div></div></a></div>'
                    }
                }
            });
        });

    </script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'LaravelT') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                 <form action="{{ route('product.search') }}" method="GET" class="form-inline ml-5">
                    <div class="form-group">
                        <input id="search" type="search" name="q" class="search form-control form-control-sm pull-right" value="{{ request('q') }}" placeholder="Я хочу купить..." style="width: 450px" autofocus>
                        <button type="submit" class="btn btn-light btn-xs ">Найти</button>
                    </div>
                </form>
               

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            @if (Auth::user()->isAdmin())<li><a id="navbarDropdown" class="nav-link text-success" href="{{ route('admin.home') }}" target="_blank">Админка</a></li>@endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item " href="{{ route('cabinet') }}">Кабинет</a>
                                    @include('layouts.user-menu')

                                    <a class="dropdown-item"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="app-content py-4">
            <div class="container">
                @section('breadcrumbs', Breadcrumbs::render())
                @yield('breadcrumbs')
                @include('layouts.partials.flash')
                @yield('content')
            </div>
        </main>

        <footer>
            <div class="container">
                <div class="border-top pt-3">
                    <p>&copy; {{ date('Y') }} - {{ config('app.name', 'LaravelT') }}</p>
                </div>
            </div>
        </footer>

</body>
</html>
