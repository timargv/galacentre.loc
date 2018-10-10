@extends('layouts.app')

@section('user-menu')
        <a class="dropdown-item " href="{{ route('admin.home') }}" target="_blank">Dashboard</a>
        {{--<li class="nav-item"><a class="nav-link active" href="{{ route('cabinet.adverts.index') }}">Adverts</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.favorites.index') }}">Favorites</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.banners.index') }}">Banners</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.profile.home') }}">Profile</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.tickets.index') }}">Tickets</a></li>--}}
@endsection


@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link active" href="{{ route('cabinet') }}">Dashboard</a></li>
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.adverts.index') }}">Adverts</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.favorites.index') }}">Favorites</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.banners.index') }}">Banners</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.profile.home') }}">Profile</a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" href="{{ route('cabinet.tickets.index') }}">Tickets</a></li>--}}
    </ul>

    <div class="conteiner">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                Вы залогинились!
            </div>
        </div>
    </div>
@endsection