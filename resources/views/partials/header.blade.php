<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>لوحة تحكم الجمعية الخيرية</title>
    <!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
        <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700,900|Tajawal:300,400,500,700,800,900&display=swap&subset=arabic" rel="stylesheet">

    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
    <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="{{asset('admin/css/plugins/dataTables.bootstrap.css')}}" rel="stylesheet">


    <!--end::Layout Skins -->
    <link href="{{asset('assets/media/logos/favicon.ico')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" /> 
    <link href="{{asset('assets/custome.css')}}" rel="stylesheet" type="text/css" /> 
    

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
    <link href="{{asset('assets/demo/default/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/default/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />

    @yield('styles')

</head>
