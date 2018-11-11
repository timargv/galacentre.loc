@extends('admin.layouts.app')

@section('header-title')
    <h1> Категории <small>приятные слова..</small></h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">Все Категории</div>
                    <div class="box-tools pull-right">
                        <button type="button" class="invisible btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                        <a href="{{ route('admin.products.categories.create') }}" class="btn  bg-purple btn-xs"><i class="fa fa-user-plus"></i> Добавить</a>
                    </div>

                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <div class="table-responsive">

                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th class="text-right">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>@for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                                            <a href="{{ route('admin.products.categories.show', $category) }}">{{ $category->name_original }}</a></td>
                                        <td>-</td>
                                        <td><a href="{{ route('admin.products.categories.edit', $category->id) }}" class="btn btn-box-tool  btn-xs pull-right"><i class="fa  fa-edit"></i></a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->

            </div>
        </div>
        <div class="col-xs-4">

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
                                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Email">
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