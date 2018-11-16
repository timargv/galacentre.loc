@extends('layouts.app')

@section('breadcrumbs', '')

@section('content')
    @if ($categories)
        <div class="card card-default mb-3">
            <div class="card-header">
                @if ($category)
                    {{ $category->name }}
                @else
                    Categories
                @endif
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    @foreach (array_chunk($categories, 4) as $chunk)
                        <div class="col-4">
                            <ul class="list-unstyled">
                                @foreach ($chunk as $current)
                                    <li><a href="{{ route('categories.show', $current->id) }}">{{ $current->name_original }}</a> - {{ $current->id }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card card-default mb-3">
            <div class="card-header">
                Товары
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="advert">
                            <div style="height: 180px; background: #f6f6f6; border: 1px solid #ddd"></div>
                        </div>
                        <div class="w-12">
                            <span class="">{{ $product->price }}</span>
                            <div class="h4" style="margin-top: 0"><a href="">{{ $product->title }}</a></div>
                            <p>Category: <a href="">{{ $product->category->name_original }}</a></p>
                            <p>Date: {{ $product->created_at }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                {{ $products->links() }}
            </div>
        </div>
    @endif
@endsection

