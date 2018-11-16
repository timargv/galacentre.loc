@extends('admin.layouts.app')

@section('header-title')
    <h1> Товары <small>приятные слова..</small></h1>
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
                            <th width="80px">Картинка</th>
                            <th>Title</th>
                            <th>Кол-во</th>
                            <th>Price</th>
                            {{--<th>Category</th>--}}
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->article }}</td>
                                <td><img src="{{ $product->image }}" alt="" width="80px"></td>
                                <td>{{ $product->name_original }}</td>
                                <td>{{ $product->store_msk }} </td>
                                <td>{{ $product->price_base }} </td>
                                {{--                                <td>{{ $product->category->name_original }}</td>--}}
                                <td>{{ $product->status }}</td>
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


                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>

@endsection