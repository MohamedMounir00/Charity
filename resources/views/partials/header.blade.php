<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin')}}/css/rtl/bootstrap.min.css" rel="stylesheet">

    <!-- not use this in ltr -->
    <link href="{{asset('admin')}}/css/rtl/bootstrap.rtl.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('admin')}}/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{asset('admin')}}/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin')}}/css/rtl/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('admin')}}/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin')}}/css/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('admin')}}/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')

</head>
