@include('admin.layout.template.header')
    <div class="page-wrapper">
    @include('admin.layout.template.sidebar')
    <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
        @include('admin.layout.template.sidebar.rightSidebar')
        @include('admin.layout.template.sidebar.leftSidebar')
        <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
        @include('admin.layout.template.header-top')
        <!-- END BREADCRUMB-->
            @yield('content')
        </div>
    </div>
@include('admin.layout.template.footer')
@yield('script')
