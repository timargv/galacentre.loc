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

                <form method="POST" action="{{ route('admin.products.categories.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="slug" class="col-form-label">Slug</label>
                        <input id="slug" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" required>
                        @if ($errors->has('slug'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="parent" class="col-form-label">Parent</label>
                        <select id="parent" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent">
                            <option value=""></option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}"{{ $parent->id == old('parent') ? ' selected' : '' }}>
                                    @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                    {{ $parent->name }}
                                </option>
                            @endforeach;
                        </select>
                        @if ($errors->has('parent'))
                            <span class="invalid-feedback"><strong>{{ $errors->first('parent') }}</strong></span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection