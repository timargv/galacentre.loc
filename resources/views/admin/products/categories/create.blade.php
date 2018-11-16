@extends('admin.layouts.app')

@section('header-title')
    <h1> Создание Категория <small>приятные слова..</small></h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-title">
                        Создание Категорию
                    </div>

                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <form method="POST" action="{{ route('admin.products.categories.store') }}">
                        @csrf

                        <div class="form-group @if($errors->has('name'))has-error @endif">
                            <label for="name" class="col-form-label">@if($errors->has('name'))<i class="fa fa-times-circle-o"></i>@endif Name</label>
                            <input id="name" class="form-control" name="name" value="{{ old('name') }}" >
                            @if ($errors->has('name'))
                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name_original'))has-error @endif">
                            <label for="name_original" class="col-form-label">Name Original</label>
                            <input id="name_original" class="form-control" name="name_original" value="{{ old('name_original') }}" required>
                            @if ($errors->has('name_original'))
                                <span class="help-block"><strong>{{ $errors->first('name_original') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name_h1'))has-error @endif">
                            <label for="name_h1" class="col-form-label">Name H1</label>
                            <input id="name_h1" class="form-control" name="name_h1" value="{{ old('name_h1') }}" >
                            @if ($errors->has('name_h1'))
                                <span class="help-block"><strong>{{ $errors->first('name_h1') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('name_menu'))has-error @endif">
                            <label for="name_menu" class="col-form-label">Name Menu</label>
                            <input id="name_menu" class="form-control" name="name_menu" value="{{ old('name_menu') }}" >
                            @if ($errors->has('name_menu'))
                                <span class="help-block"><strong>{{ $errors->first('name_menu') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('description'))has-error @endif">
                            <label for="description" class="col-form-label">Description</label>
                            <textarea id="description" class="form-control" name="description" >{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('status'))has-error @endif">
                            <label for="status" class="col-form-label">Status</label>
                            <select id="status" class="form-control" name="status">
                                <option class="" value="Y" >Включить</option>
                                <option class="" value="N" >Выключить</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block"><strong>{{ $errors->first('status') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('code'))has-error @endif">
                            <label for="code" class="col-form-label">Code</label>
                            <input id="code" class="form-control" name="code" value="{{ old('code') }}" >
                            @if ($errors->has('code'))
                                <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('count'))has-error @endif">
                            <label for="count" class="col-form-label">Count</label>
                            <input id="count" class="form-control" name="count" value="{{ old('count') }}" >
                            @if ($errors->has('count'))
                                <span class="help-block"><strong>{{ $errors->first('count') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('icon'))has-error @endif">
                            <label for="icon" class="col-form-label">Icon</label>
                            <input id="icon" class="form-control" name="icon" value="{{ old('icon') }}" >
                            @if ($errors->has('icon'))
                                <span class="help-block"><strong>{{ $errors->first('icon') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('image'))has-error @endif">
                            <label for="image" class="col-form-label">Image</label>
                            <input id="image" class="form-control" name="image" value="{{ old('image') }}" >
                            @if ($errors->has('image'))
                                <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('date'))has-error @endif">
                            <label for="date" class="col-form-label">Date</label>
                            <input id="date" class="form-control" name="date" value="{{ old('date') }}" >
                            @if ($errors->has('date'))
                                <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('slug'))has-error @endif">
                            <label for="slug" class="col-form-label">Slug</label>
                            <input id="slug" type="text" class="form-control slug" name="slug" value="{{ old('slug') }}" >
                            @if ($errors->has('slug'))
                                <span class="help-block"><strong>{{ $errors->first('slug') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group @if($errors->has('parent'))has-error @endif">
                            <label for="parent" class="col-form-label">Parent</label>
                            <select id="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent">
                                <option value=""></option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}"{{ $parent->id == old('parent') ? ' selected' : '' }}>
                                        @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                        {{ $parent->name_original }}
                                    </option>
                                @endforeach;
                            </select>
                            @if ($errors->has('parent'))
                                <span class="help-block"><strong>{{ $errors->first('parent') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.products.categories.index') }}" class="btn btn-danger pull-right">Отменить</a>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection