@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_menu_points')
                <small>@lang('admin.it_all_menu_points_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_menu_points')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'menus.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_menu_points')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('menus.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.section')</th>
                            <th>@lang('column.title')</th>
                            <th>@lang('column.is_active')</th>
                            <th>@lang('column.url')</th>
                            <th>@lang('column.parent')</th>
                            <th>@lang('column.sort')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menu_points as $point)
                            <tr>
                                <td>{{ $point->id }}</td>
                                <td>@lang('sections.'.$menu_blocks[$point->section])</td>
                                <td>{!! $point->title ? $point->title->$locale : '' !!}</td>
                                <td>
                                    @if($point->is_active === 1)
                                        <a href="/admin/menus/toggle/{{ $point->id }}" class="text-green fa fa-thumbs-o-up"></a>
                                    @else
                                        <a href="/admin/menus/toggle/{{ $point->id }}" class="text-muted fa fa-lock"></a>
                                    @endif
                                </td>
                                <td>{{ $point->url }}</td>
                                <td>{{ $point->getParent() }}</td>
                                <td>{{ $point->sort }}</td>
                                <td>
                                    <a href="{{route('menus.edit', $point->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['menus.destroy', $point->id], 'method'=>'delete']) }}
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

