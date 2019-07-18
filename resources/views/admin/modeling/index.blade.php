@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_modeling_orders')
                <small>@lang('admin.it_all_conf_modeling_orders')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_modeling_orders')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'modelings.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_modeling_orders')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('modelings.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.status')</th>
                            <th>@lang('column.lang_name')</th>
                            <th>@lang('column.materials')</th>
                            <th>@lang('column.name')</th>
                            <th>@lang('column.email')</th>
                            <th>@lang('column.texturing')</th>
                            <th>@lang('column.executor')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($confirm_orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->getStatus() }}</td>
                                <td>{{ $order->getLangName() }}</td>
                                <td>
                                    <a href="{{ $order->link }}" target="_blank"><i class="text-blue fa fa-eye"></i></a>
                                </td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>
                                    @if($order->texturing !== 0)
                                        <i class="text-green fa fa-check"></i>
                                    @endif
                                </td>
                                <td>{{ $order->getExecutor() }}</td>

                                <td>
                                    <a href="{{route('modelings.edit', $order->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['modelings.destroy', $order->id], 'method'=>'delete']) }}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="text-red fa fa-remove"></i>
                                    </button>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
