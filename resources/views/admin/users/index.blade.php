@extends('admin.layouts.app')

@section('header-title')
    <h1> Пользователи <small>приятные слова..</small></h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-8">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">Все пользователи</div>
                    <div class="box-tools pull-right">
                        <button type="button" class="invisible btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                        <a href="{{ route('admin.users.create') }}" class="btn  bg-purple btn-xs"><i class="fa fa-user-plus"></i> Добавить
                        </a>
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
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th class="text-right">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->isWait())
                                            <span class="label label-danger">Waiting</span>
                                        @endif
                                        @if ($user->isActive())
                                            <span class="label label-success">Active</span>
                                        @endif
                                        @if ($user->isWait())
                                            <form method="POST" action="{{ route('admin.users.verify', $user) }}" class="form-inline">
                                                @csrf
                                                <button class="btn bg-purple btn-xs" style="margin-right: 5px;">Verify</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->isAdmin())
                                            <span class="label label-danger">Admin</span>
                                        @elseif($user->isModerator())
                                            <span class="label label-warning">Moderator</span>
                                        @else
                                            <span class="label label-success">User</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-box-tool  btn-xs pull-right"><i class="fa  fa-edit"></i></a></td>


                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {{ $users->links() }}
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-xs-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title"><i class="fa fa-user"></i> <small>Поиск пользователя</small></div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form action="?" method="GET">
                        <table class="table no-margin no-border">
                            <thead>

                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group" style="margin-bottom: 0;">
                                                <span class="input-group-addon">ID</span>
                                                <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="input-group" style="margin-bottom: 0;">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input id="name" class="form-control" name="name" value="{{ request('name') }}" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group" style="margin-bottom: 0;">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input id="email" class="form-control" name="email" value="{{ request('email') }}" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group" style="margin-bottom: 0;">
                                                <span class="input-group-addon">Status</span>
                                                <select id="status" class="form-control" name="status">
                                                    <option value=""></option>
                                                    @foreach ($statuses as $value => $label)
                                                        <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                                                    @endforeach;
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group" style="margin-bottom: 0;">
                                                <span class="input-group-addon">Role</span>
                                                <select id="role" class="form-control" name="role">
                                                    <option value=""></option>
                                                    @foreach ($roles as $value => $label)
                                                    <option value="{{ $value }}"{{ $value === request('role') ? ' selected' : '' }}>{{ $label }}</option>
                                                    @endforeach;
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="input-group" style="margin-bottom: 0;">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </form>

                </div>

            </div>

            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title"><i class="fa fa-user-plus"></i> <small>Добавить нового пользователя</small></div>
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