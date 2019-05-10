
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">@lang('admin.main_navigation')</li>
    <li>
        <a href="{{route('admin')}}">
            <i class="fa fa-dashboard"></i> <span>@lang('admin.dashboard')</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
    <li>
        <a href="{{route('contents.index')}}">
            <i class="fa fa-bars"></i> <span>@lang('admin.content')</span>
            <span class="pull-right-container">
                  <small class="label pull-right bg-red-gradient">{{ $content_not_active }}</small>
                  <small class="label pull-right bg-green">{{ $content_is_active }}</small>
            </span>
        </a>
    </li>
    {{--<li>--}}
        {{--<a href="{{route('inf_pages.index')}}">--}}
            {{--<i class="fa fa-newspaper-o"></i> <span>@lang('admin.pages')</span>--}}
            {{--<span class="pull-right-container"></span>--}}
        {{--</a>--}}
    {{--</li>--}}

    {{--<li>--}}
        {{--<a href="{{route('terms.index')}}">--}}
            {{--<i class="fa fa-file-text-o" aria-hidden="true"></i> <span>@lang('admin.terms')</span>--}}
            {{--<span class="pull-right-container"></span>--}}
        {{--</a>--}}
    {{--</li>--}}

    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-image"></i>--}}
            {{--<span>@lang('admin.images')</span>--}}
            {{--<span class="pull-right-container">--}}
                {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="{{ route('image_categories.index') }}"><i class="fa fa-list-alt"></i> @lang('admin.images_categories')</a></li>--}}
            {{--<li><a href="{{ route('images.index') }}"><i class="fa fa-image"></i> @lang('admin.images')</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}

    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i> <span>@lang('admin.components')</span>
            <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{route('languages.index')}}">
                    <i class="fa fa-language"></i> <span>@lang('admin.languages')</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-red-gradient">{{ $language_not_active }}</small>
                        <small class="label pull-right bg-green">{{ $language_is_active }}</small>
                    </span>
                </a>
            </li>
            {{--<li><a href="{{route('id_documents.index')}}"><i class="fa fa-newspaper-o"></i> @lang('admin.documents_id')</a></li>--}}
            {{--<li><a href="{{route('countries.index')}}"><i class="fa fa-flag"></i> @lang('admin.countries')</a></li>--}}
            {{--<li><a href="{{route('social_links.index')}}"><i class="fa fa-share-alt"></i> @lang('admin.social_links')</a></li>--}}
        </ul>
    </li>
    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-home"></i>--}}
            {{--<span>@lang('admin.home_page')</span>--}}
            {{--<span class="pull-right-container">--}}
      {{--<i class="fa fa-angle-left pull-right"></i>--}}
    {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li><a href="{{route('introduction_points.index')}}"><i class="fa fa-map-marker"></i> @lang('admin.introduction_points')</a></li>--}}
            {{--<li><a href="{{route('introductions.index')}}"><i class="fa fa-file-text"></i> @lang('admin.introduction')</a></li>--}}
        {{--</ul>--}}
    {{--</li>--}}



    <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
</ul>

