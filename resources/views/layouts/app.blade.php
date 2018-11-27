<!DOCTYPE html>
<html lang="en">
@include('partials.header')
<body>

<div id="wrapper ">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">

        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->

            <!-- /.dropdown -->

            <!-- /.dropdown -->



            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

    @include('partials.sidbar')
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
        @include('partials.messages')


            <!-- Yielding main content -->
            @yield('content')


        </div>
        <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->
</div>


@include('partials.footer')

</body>

</html>
