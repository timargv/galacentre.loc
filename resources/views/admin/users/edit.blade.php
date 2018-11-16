@extends('admin.layouts.app')

@section('header-title')
    <h1> Создание Пользователя <small>приятные слова..</small></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">
                        Создание Пользователя
                    </div>

                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label">E-Mail Address</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-form-label">Role</label>
                            <select id="role" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="role">
                                @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}"{{ $value === old('role', $user->role) ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach;
                            </select>
                            @if ($errors->has('role'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('role') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger pull-right">Назад</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection