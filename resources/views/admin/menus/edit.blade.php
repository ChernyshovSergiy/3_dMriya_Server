@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_menu_point')
                <small>@lang('admin.it_edit_menu_point_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('menus.index')}}"><i class="fa fa-bars"></i> @lang('admin.listing_menu_points')</a></li>
                <li class="active">@lang('admin.edit_menu_point')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['menus.update', $menu_point->id], 'method'=>'put']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_menu_point')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>@lang('column.section')</label>
                            {{ Form::select('section',
                                $menu_blocks,
                                $menu_point->section,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.title'): {{$language}}</label>
                                <input type="text" name="{{'title'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder=""
                                       value="{{ $menu_point->title ? $menu_point->title->$language : '' }}">
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.url')</label>
                            <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $menu_point->url }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('column.parent')</label>
                            {{ Form::select('parent',
                                $page_names,
                                $menu_point->parent,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $menu_point->sort }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('menus.index')}}" class="btn btn-default">@lang('button.back')</a>
                    <button class="btn btn-warning pull-right">@lang('button.edit')</button>
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
