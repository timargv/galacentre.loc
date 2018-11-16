@extends('admin.layouts.app')

@section('header-title')
    <h1> Категории <small>...</small></h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">Все Категории </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="invisible btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        <a href="{{ route('admin.products.categories.create') }}" class="btn  bg-purple btn-xs"><i class="fa fa-user-plus"></i> Добавить</a>
                    </div>

                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    @include('admin.products.categories._list', ['categories' => $categories])
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
        <div class="col-xs-3">

            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title"><i class="fa fa-search"></i> <small>Поиск Категории</small></div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form action="?" method="GET">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="search" class="form-control" name="name_original" value="{{ request('name_original') }}" placeholder="Название категории">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Найти</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title"><i class="fa fa-user-plus"></i> <small>Добавить Категорию</small></div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name_original" class="col-form-label">Name Original</label>
                                <input id="name_original" type="text" name="name_original" class="form-control" placeholder="Имя Оригинал">
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-form-label">Slug</label>
                                <input id="slug" type="text" class="form-control slug" name="slug" value="{{ old('slug') }}" placeholder="slug">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </div>
                        <!-- /.box-body -->

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection