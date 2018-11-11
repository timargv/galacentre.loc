@extends('admin.layouts.app')

@section('header-title')
    <h1> Создание Пользователя <small>приятные слова..</small></h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">

            <div class="box-title">
                {{ $user->name }}
            </div>

            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="form-inline pull-right">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </form>

            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary pull-right" style="margin: 0 10px;"><i class="fa fa-edit"></i> Edit</a>

            @if ($user->isWait())
                <form method="POST" action="{{ route('admin.users.verify', $user) }}" class="form-inline pull-right">
                    @csrf
                    <button class="btn btn-success">Verify</button>
                </form>
            @endif

        </div>
        <!-- /.box-header -->

        <div class="box-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th width="100px">ID</th><td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name</th><td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th><td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if ($user->isWait())
                            <span class="label label-danger">Waiting</span>
                        @endif
                        @if ($user->isActive())
                            <span class="label label-primary">Active</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        @if ($user->isAdmin())
                            <span class="label label-danger">Admin</span>
                        @elseif($user->isModerator())
                            <span class="label label-warning">Moderator</span>
                        @else
                            <span class="label label-success">User</span>
                        @endif

                    </td>
                </tr>
                <tbody>
                </tbody>
            </table>
        </div>

        <div class="box-footer">
            <div class="d-flex flex-row mb-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary pull-right">Назад</a>
            </div>
        </div>
    </div>
@endsection