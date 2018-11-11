@extends('layouts.app')

@section('breadcrumbs', '')

@section('content')

    <div class="card card-default mb-3">
        <div class="card-header">
            Все Категории
        </div>
        <div class="card-body pb-0" style="color: #aaa">
            <div class="row">
                @foreach (array_chunk($categories, 4) as $chunk)
                    <div class="col-4">
                        <ul class="list-unstyled">
                            @foreach ($chunk as $current)
                                <li><a href="">{{ $current->name_original }}</a> - {{ $current->id }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-default mb-3">
        <div class="card-header">
            All Regions
        </div>
        <div class="card-body pb-0" style="color: #aaa">
            <div class="row">

            </div>
        </div>
    </div>

@endsection
