@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.edit_modeling_order')
                <small>@lang('admin.it_edit_modeling_order_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li><a href="{{route('modelings.index')}}"><i class="fa fa-cube"></i> @lang('admin.listing_modeling_orders')</a></li>
                <li class="active">@lang('admin.edit_modeling_order')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open(['route' => ['modelings.update', $modeling_order->id], 'method'=>'put', 'files' => true]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('admin.edit_modeling_order')</h3>
                    @include('admin.error')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('column.status')</label>
                            {{ Form::select('status_id',
                                $statuses,
                                $modeling_order->status_id,
                                ['class' => 'form-control select2',
                                'placeholder' => Lang::get('admin.select_status')])
                            }}
                        </div>
                        <div class="form-group">
                            <label>@lang('column.lang_name')</label>
                            {{ Form::select('language_id',
                                $languages,
                                $modeling_order->language_id,
                                ['class' => 'form-control select2',
                                'placeholder' => Lang::get('admin.select_language')])
                            }}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.materials')</label>
                            <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $modeling_order->link }}">
                            <p class="help-block">@lang('admin.link_google_disk_folder')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.name') @lang('column.customer')</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $modeling_order->name }}">
                            <p class="help-block">@lang('admin.name_format')</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('column.email') @lang('column.customer')</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $modeling_order->email }}">
                            <p class="help-block">@lang('admin.email_format')</p>
                        </div>
                        <div class="form-group">
                            <label>@lang('column.texturing')</label>
                            {{ Form::select('texturing',
                                [0 => Lang::get('status.non_texturing'),
                                 1 => Lang::get('status.texturing')],
                                 $modeling_order->texturing,
                                ['class' => 'form-control select2'])
                            }}
                        </div>
                        <div class="form-group">
                            <label>@lang('column.executor')</label>
                            {{ Form::select('executor_id',
                                $executors,
                                $modeling_order->executor_id,
                                ['class' => 'form-control select2',
                                'placeholder' => Lang::get('admin.select_executor')])
                            }}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('modelings.index')}}" class="btn btn-default">@lang('button.back')</a>
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
