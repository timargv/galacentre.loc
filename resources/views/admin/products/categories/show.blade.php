@extends('admin.layouts.app')

@section('header-title')
    <h1> Создание Пользователя <small>приятные слова..</small></h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">

            <div class="d-flex flex-row mb-3">
                <a href="{{ route('admin.products.categories.edit', $category) }}" class="btn btn-primary mr-1">Edit</a>
                <form method="POST" action="{{ route('admin.products.categories.destroy', $category) }}" class="mr-1">
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
                    <th>ID</th><td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Name</th><td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th><td>{{ $category->slug }}</td>
                </tr>
                <tbody>
                </tbody>
            </table>

        </div>

        <div class="box-footer">
            <div class="d-flex flex-row mb-3">
                <a href="{{ route('admin.products.categories.index') }}" class="btn btn-primary pull-right">Назад</a>
            </div>
        </div>
    </div>
@endsection