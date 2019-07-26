@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_printing_orders')
                <small>@lang('admin.it_all_conf_printing_orders')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_printing_orders')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'printings.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_printing_orders')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('printings.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.status')</th>
                            <th>@lang('column.lang_name')</th>
                            <th>@lang('column.materials')</th>
                            <th>@lang('column.name')</th>
{{--                            <th>@lang('column.email')</th>--}}
                            <th>@lang('column.address')</th>
                            <th>@lang('column.option')</th>
                            <th>@lang('column.size')</th>
                            <th>@lang('column.print_mat')</th>
                            <th>@lang('column.quality')</th>
                            <th>@lang('column.quantity')</th>
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
{{--                                <td>{{ $order->email }}</td>--}}
                                <td>
                                    @if($order->email)
                                        <a href="mailto:{{ $order->email }}?subject=PRG&ndash;{{ $order->id }}&amp;body=Текст"><i class="text-blue fa fa fa-envelope">&emsp;{{ $order->email }}</i></a><br>
                                    @endif
                                    @if($order->latitude !== null && $order->longitude !== null )
                                        <a href="{{ $order->getMapLink() }}" target="_blank"><i class="text-green fa fa-map-marker"></i></a>
                                    @else
                                        <i class="text-gray fa fa-map-marker"></i>
                                    @endif
                                    {{ $order->getAddress() }}
                                </td>
                                <td>
                                    @if($order->hollow !== 0)
                                        <i class="text-blue fa fa-circle-o"></i>
                                    @else
                                        <i class="text-gray fa fa-circle-o"></i>
                                    @endif
                                    @if($order->support !== 0)
                                        <i class="text-green fa fa-map-pin"></i>
                                    @else
                                        <i class="text-gray fa fa-map-pin"></i>
                                    @endif
                                    @if($order->post_processing !== 0)
                                        <i class="text-yellow fa fa-eraser"></i>
                                    @else
                                        <i class="text-gray fa fa-eraser"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($order->size_id !== 0)
                                        <i class="text-green fa fa-registered"></i>
                                    @else
                                        <i class="text-blue fa fa-arrows-v"></i>
                                    @endif
                                    {{ $order->getSize() }}
                                </td>
                                <td>{{ $order->getMaterials() }}</td>
                                <td>{{ $order->getQuality() }}</td>
                                <td>{{ $order->quantity }} @lang('admin.pieces')</td>
                                <td>{{ $order->getExecutor() }}</td>

                                <td>
                                    <a href="{{route('printings.edit', $order->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['printings.destroy', $order->id], 'method'=>'delete']) }}
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
