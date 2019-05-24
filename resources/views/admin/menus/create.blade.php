@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.add_menu_point')
                <small>@lang('admin.it_add_menu_point_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('menus.index')}}"><i class="fa fa-bars"></i> @lang('admin.listing_menu_points')</a></li>
                <li class="active">@lang('admin.add_menu_point')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => 'menus.store']) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.add_menu_point')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>@lang('column.section')</label>
                            {{ Form::select('section',
                                $menu_blocks,
                                null,
                                ['class' => 'form-control select2'])
                            }}
                        </div>

                        @foreach($languages as $language)
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('column.title'): {{$language}}</label>
                                <input type="text" name="{{'title'.':'.$language}}" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('title'.':'.$language) }}">
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.url')</label>
                            <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('url') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('column.parent')</label>
                            {{ Form::select('parent',
                                $page_names,
                                null,
                                ['class' => 'form-control select2',
                                'placeholder' => Lang::get('admin.select_parent_menu_point')])
                            }}
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.sort')</label>
                            <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $default_sort_number + 1 }}">
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('menus.index')}}" class="btn btn-default">@lang('button.back')</a>
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
