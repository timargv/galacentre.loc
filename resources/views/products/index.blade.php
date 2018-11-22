@extends('layouts.app')



@section('content')
    @if ($categories)
        <div class="card card-default mb-3">
            <div class="card-header">
                @if ($category)
                    {{ $category->name_original }}
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
                                    <li>{{ $current->id }} - <a href="{{ route('categories.show', $current->id) }}">
                                            {{ $current->name == null ? $current->name_original : $current->name }}
                                        </a>
                                        @if($current->products->count())<span class='badge badge-light'> {{ $current->products->count() }} </span> @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    @if($products)

        @foreach ($products->chunk(4) as $chunk)
            <div class="mb-3 row">
                @foreach ($chunk as $product)
                    <div class="col-3">
                        <div class="card">
                            <a href="{{ route('product.show', $product) }}"><img class="card-img-top" src="{{ $product->image }}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h6 ><a class="text-dark" href="{{ route('product.show', $product) }}">{{ $product->name == null ? $product->name_original : $product->name }}</a></h6>

                                {{--<p class="card-text">Category: <a href="">{{ $product->category->name_original }}</a></p>--}}
                                {{--<p class="card-text">Date: {{ $product->created_at }}</p>--}}
                            </div>
                            <div class="card-footer">
                                {{ $product->price == null ? $product->price_base : $product->price }} Руб.<small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    <div>
        {{ $products->links() }}
    </div>

    @endif


@endsection

