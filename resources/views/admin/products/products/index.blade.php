@extends('admin.layouts.app')

@section('header-title')
    <h1> Товары <small>Количество товаров - <span id="countProducts">{{ $countProducts }}</span></small></h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-9">
            <div class="box box-info">
                {{--<div class="box-header with-border">--}}

                {{--</div>--}}
                <div class="box-body">
                    @include('admin.products.products._list', ['products' => $products])
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

@section('js')
    <script type="text/javascript">
        $('#countProducts').each(function () {
            var item = $(this).text();
            var num = Number(item).toLocaleString('en');

            if (Number(item) < 0) {
                num = num.replace('-','');
                $(this).addClass('negMoney');
            }else{
                $(this).addClass('enMoney');
            }

            $(this).text(num);
        });
    </script>
@endsection