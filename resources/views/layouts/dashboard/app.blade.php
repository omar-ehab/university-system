<!DOCTYPE html>
<html lang="en">
<!-- head navigation -->
@include('layouts.dashboard._head')
<title>@yield('title')</title>
@stack('styles')
<!-- /head navigation -->
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- side navigation -->
    @include('layouts.dashboard._sideNav')
    <!-- /side navigation -->

        <!-- top navigation -->
    @include('layouts.dashboard._topNav')
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
    @include('layouts.dashboard._footer')
    <!-- /footer content -->
    </div>
</div>

<!-- scripts content -->
@include('layouts.dashboard._scripts')
@stack('scripts')
<!-- /scripts content -->
<!-- session messages -->
@include('partials._session')
<!-- /session messages -->
</body>
</html>

