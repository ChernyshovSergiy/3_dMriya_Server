@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('admin.listing_languages')
                <small>@lang('admin.it_all_languages_here')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> @lang('admin.home')</a></li>
                <li class="active">@lang('admin.listing_languages')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        {{ Form::open([
            'route' => 'languages.store',
            'files' => true
        ]) }}
        <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">@lang('admin.listing_languages')</h3>
                    @include('admin.error')
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('languages.create') }}" class="btn btn-success">@lang('button.add')</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>@lang('column.id')</th>
                            <th>@lang('column.is_active')</th>
                            <th>@lang('column.flag_id')</th>
                            <th>@lang('column.code')</th>
                            <th>@lang('column.iso')</th>
                            <th>@lang('column.file')</th>
                            <th>@lang('column.lang_name')</th>
                            <th>@lang('column.flag')</th>
                            <th>@lang('column.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->id }}</td>
                                <td>
                                    @if($language->is_active === 1)
                                        <a href="/admin/languages/toggle/{{ $language->id }}" class="text-green fa fa-thumbs-o-up"></a>
                                    @else
                                        <a href="/admin/languages/toggle/{{ $language->id }}" class="text-muted fa fa-lock"></a>
                                    @endif
                                </td>
                                <td>{{ $language->flag_country }}</td>
                                <td>{{ $language->code }}</td>
                                <td>{{ $language->iso }}</td>
                                <td>{{ $language->file }}</td>
                                <td>{{ $language->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/flags_svg/'.$language->flag_country.'.svg') }}" alt="{{ asset('img/no-image.png') }}" width="30">
                                </td>
                                <td>
                                    {{--<a href="{{route('languages.show', $language->id)}}" class="fa fa-eye"></a>--}}
                                    <a href="{{route('languages.edit', $language->id)}}" class="text-yellow fa fa-pencil"></a>
                                    {{ Form::open(['route'=>['languages.destroy', $language->id], 'method'=>'delete']) }}
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
