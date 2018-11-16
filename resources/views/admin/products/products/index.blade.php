@extends('admin.layouts.app')

@section('header-title')
    <h1> Товары <small>..</small></h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-9">
            <div class="box box-info">
                {{--<div class="box-header with-border">--}}

                {{--</div>--}}
                <div class="box-body">


                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="5px">ID</th>
                            <th width="80px">Код</th>
                            <th width="40px">Картинка</th>
                            <th width="600px">Навание</th>
                            <th>Кол-во</th>
                            <th>MSK</th>
                            <th>Цена</th>
                            <th>Кат-я</th>
                            <th>Date Update</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->article }}</td>
                                <td><img src="{{ $product->image }}" alt="" width="40px"><i class="fa fa-circle {{ $product->status === 'Y' ? 'text-success' : 'text-denger' }}"></i></td>
                                <td><a href="{{ route('admin.products.products.show', $product) }}" target="_blank">{{ $product->name_original }}</a></td>
                                <td>{{ $product->stk }} </td>
                                <td>{{ $product->store_msk }} </td>
                                <td>{{ $product->price_base }} </td>
                                <td>{{ $product->category->id }}</td>
                                <td class="{{ $product->statusDate($product->date_update) }}">{{ $product->gDateF($product->date_update) }}</td>


                                <td>
                                    {{--@if ($advert->isDraft())--}}
                                    {{--<span class="badge badge-secondary">Draft</span>--}}
                                    {{--@elseif ($advert->isOnModeration())--}}
                                    {{--<span class="badge badge-primary">Moderation</span>--}}
                                    {{--@elseif ($advert->isActive())--}}
                                    {{--<span class="badge badge-primary">Active</span>--}}
                                    {{--@elseif ($advert->isClosed())--}}
                                    {{--<span class="badge badge-secondary">Closed</span>--}}
                                    {{--@endif--}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <div class="col-xs-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">Filter</div>
                </div>
                <div class="box-body">
                    <div class=" mb-3">
                        <form action="?" method="GET">
                            <div class="form-group">
                                <label for="article" class="col-form-label">Код Товара</label>
                                <input id="article" class="form-control" name="article" value="{{ request('article') }}">
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Title</label>
                                <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-form-label">Category</label>
                                <input id="category" class="form-control" name="category" value="{{ request('category') }}">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="?" class="btn btn-outline-secondary">Clear</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        td .fa:before {
            font-size: 10px!important;
            margin-left: 15px !important;
        }
    </style>
@endsection