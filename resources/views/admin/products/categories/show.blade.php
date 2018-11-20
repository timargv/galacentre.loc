@extends('admin.layouts.app')

@section('header-title')
    <h1> Создание Пользователя <small>приятные слова..</small></h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">

            <div class="d-flex flex-row mb-3">
                <a href="{{ route('admin.products.categories.edit', $category) }}" class="btn btn-primary mr-1">Edit</a>
                <form method="POST" action="{{ route('admin.products.categories.destroy', $category) }}" class="form-inline pull-right">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>

        </div>
        <!-- /.box-header -->

        <div class="box-body">


            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th width="200px">ID</th><td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Name</th><td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Name Original</th><td>{{ $category->name_original }}</td>
                </tr>
                <tr>
                    <th>Name Menu</th><td>{{ $category->name_menu }}</td>
                </tr>
                <tr>
                    <th>Description</th><td>{{ $category->description }}</td>
                </tr>
                <tr>
                    <th>Status</th><td><span class="label label-{{ $category->status == 'Y' ? 'success' : 'danger' }}">{{ $category->status == 'Y' ? 'Active' : 'Выключено' }}</span></td>
                </tr>
                <tr>
                    <th>Code</th><td>{{ $category->code }}</td>
                </tr>
                <tr>
                    <th>Count</th><td>{{ $category->count }}</td>
                </tr>
                <tr>
                    <th>Image</th><td>{{ $category->image }}</td>
                </tr>
                <tr>
                    <th>Date</th><td>{{ $category->date }}</td>
                </tr>
                <tr>
                    <th>Icon</th><td>{{ $category->icon }}</td>
                </tr>

                <tr>
                    <th>Slug</th><td>{{ $category->slug }}</td>
                </tr>

                <tbody>
                </tbody>
            </table>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <div class="d-flex flex-row mb-3">
                <a href="{{ route('admin.products.categories.index') }}" class="btn btn-primary pull-right">Назад</a>
            </div>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">Подкатегории - @if(count($categories) == null) Нет @else <strong>{{ $category->name_original }}</strong> @endif </h1>
        </div>
        <div class="box-body">
             @include('admin.products.categories._list', ['categories' => $categories])
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">Продукты - @if(count($categories) == null) Нет @else <strong>{{ $category->name_original }}</strong> @endif </h1>
        </div>
        <div class="box-body">
            @include('admin.products.products._list', ['products' => $products])
            {{ $products->links() }}
        </div>
    </div>


@endsection