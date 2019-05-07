@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_languages')
                <small>@lang('admin.it_add_languages_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('languages.index')}}"><i class="fa fa-image"></i> @lang('admin.listing_languages')</a></li>
                <li class="active">@lang('admin.add_languages')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'languages.store', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_languages')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.flag_id')</label>
                            <input type="text" name="flag_country" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('flag_id') }}">
                            <p class="help-block">@lang('admin.flag_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.code')</label>
                            <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('code') }}">
                            <p class="help-block">@lang('admin.code_lang_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.iso')</label>
                            <input type="text" name="iso" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('iso') }}">
                            <p class="help-block">@lang('admin.localization_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.file')</label>
                            <input type="text" name="file" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('file') }}">
                            <p class="help-block">@lang('admin.file_format')</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.lang_name')</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('name') }}">
                            <p class="help-block">@lang('admin.name_format')</p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('languages.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-success pull-right">@lang('button.add')</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{ Form::close() }}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
