@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_content')
                <small>@lang('admin.the_content_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.content')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'contents.store'
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.content')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('contents.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.is_active')</th>
                            <th>@lang('column.title')</th>
                            <th>@lang('column.headline')</th>
                            <th>@lang('column.sub_headline')</th>
                            <th>@lang('column.text')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>
                                    @if($content->is_active === 1)
                                        <a href="/admin/contents/toggle/{{ $content->id }}" class="text-green fa fa-thumbs-o-up"></a>
                                    @else
                                        <a href="/admin/contents/toggle/{{ $content->id }}" class="text-muted fa fa-lock"></a>
                                    @endif
                                </td>
                                <td>{{ $content->title}}</td>
                                <td>{!! $content->content ? $content->content->headline->$locale : '' !!}</td>
                                <td>{!! $content->content ? $content->content->sub_headline->$locale : '' !!}</td>
                                <td>{!! $content->content ? $content->content->text->$locale : '' !!}</td>
                                <td>
                                    {{--<a href="{{route('contents.show', $content->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('contents.edit', $content->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['contents.destroy', $content->id], 'method'=>'delete']) }}
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
