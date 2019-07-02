<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" >

@include('partials.header')
{{-- @include('partials.sidbar')
    @include('partials.messages')
    @yield('content')
    @include('partials.footer') --}}

    <body style="font-family: 'Cairo', sans-serif;
    " class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed">

            <!-- begin:: Page -->
    
            <!-- begin:: Header Mobile -->
            <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
                <div class="kt-header-mobile__logo">
                    <a href="index.html">
                        <img alt="Logo" src="../assets/media/logos/logo-light.png">
                    </a>
                </div>
                <div class="kt-header-mobile__toolbar">
                    <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
                    <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
                </div>
            </div>
    
            <!-- end:: Header Mobile -->
            <div class="kt-grid kt-grid--hor kt-grid--root">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
    
                    <!-- begin:: Aside -->
                    <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>



                    @include('partials.sidbar')

                    
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
    
                        <!-- begin:: Header -->
                        <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    
                            <!-- begin:: Header Menu -->
                            <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                                
                            </div>
    
                            <!-- end:: Header Menu -->
    
                            <!-- begin:: Header Topbar -->
                            <div class="kt-header__topbar">
    
    
                             
    
                                <!--begin: User Bar -->
                                <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                        <div class="kt-header__topbar-user">
                                            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                            <span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
                                            <img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg">
    
                                            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
    
                                        <!--begin: Head -->
                                        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(../assets/media/misc/bg-1.jpg)">
                                            <div class="kt-user-card__avatar">
                                                <img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg">
    
                                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                                <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
                                            </div>
                                            <div class="kt-user-card__name">
                                                Sean Stone
                                            </div>
                                        </div>
    
                                        <!--end: Head -->
    
                                        <!--begin: Navigation -->
                                        <div class="kt-notification">
                                            
                                            <div class="kt-notification__custom">
                                                <a href="{{ route('logout') }}" target="_blank" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
                                            </div>
                                        </div>
    
                                        <!--end: Navigation -->
                                    </div>
                                </div>
    
                                <!--end: User Bar -->
                            </div>
    
                            <!-- end:: Header Topbar -->
                        </div>
    
                        <!-- end:: Header -->
                        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    
    
                            <!-- begin:: Content -->
                            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                                
                                    @yield('content')
                            
                            </div>
    
                            <!-- end:: Content -->
                        </div>
    
                        <!-- begin:: Footer -->
                        <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
                            <div class="kt-footer__copyright">
                                2019&nbsp;©&nbsp;<a href="#" target="_blank" class="kt-link">شركة سبرنتس للبرمجيات</a>
                            </div>
                         
                        </div>
    
                        <!-- end:: Footer -->
                    </div>
                </div>
            </div>
    
            <!-- end:: Page -->
    
            <!-- begin::Quick Panel -->
            <div id="kt_quick_panel" class="kt-quick-panel">
                <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
                <div class="kt-quick-panel__nav" kt-hidden-height="66" style="">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
                        </li>
                    </ul>
                </div>
                <div class="kt-quick-panel__content">
                    <div class="tab-content">
                        <div class="tab-pane fade show kt-scroll active ps ps--active-y" id="kt_quick_panel_tab_notifications" role="tabpanel" style="height: 265px; overflow: hidden;">
                            <div class="kt-notification">
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-line-chart kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New order has been received
                                        </div>
                                        <div class="kt-notification__item-time">
                                            2 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-box-1 kt-font-brand"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New customer is registered
                                        </div>
                                        <div class="kt-notification__item-time">
                                            3 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-chart2 kt-font-danger"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            Application has been approved
                                        </div>
                                        <div class="kt-notification__item-time">
                                            3 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-image-file kt-font-warning"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New file has been uploaded
                                        </div>
                                        <div class="kt-notification__item-time">
                                            5 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-bar-chart kt-font-info"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New user feedback received
                                        </div>
                                        <div class="kt-notification__item-time">
                                            8 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            System reboot has been successfully completed
                                        </div>
                                        <div class="kt-notification__item-time">
                                            12 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-favourite kt-font-danger"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New order has been placed
                                        </div>
                                        <div class="kt-notification__item-time">
                                            15 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item kt-notification__item--read">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-safe kt-font-primary"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            Company meeting canceled
                                        </div>
                                        <div class="kt-notification__item-time">
                                            19 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-psd kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New report has been received
                                        </div>
                                        <div class="kt-notification__item-time">
                                            23 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon-download-1 kt-font-danger"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            Finance report has been generated
                                        </div>
                                        <div class="kt-notification__item-time">
                                            25 hrs ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon-security kt-font-warning"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New customer comment recieved
                                        </div>
                                        <div class="kt-notification__item-time">
                                            2 days ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification__item">
                                    <div class="kt-notification__item-icon">
                                        <i class="flaticon2-pie-chart kt-font-warning"></i>
                                    </div>
                                    <div class="kt-notification__item-details">
                                        <div class="kt-notification__item-title">
                                            New customer is registered
                                        </div>
                                        <div class="kt-notification__item-time">
                                            3 days ago
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 265px; right: 5px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 86px;"></div></div></div>
                        <div class="tab-pane fade kt-scroll ps" id="kt_quick_panel_tab_logs" role="tabpanel" style="height: 265px; overflow: hidden;">
                            <div class="kt-notification-v2">
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon-bell kt-font-brand"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            5 new user generated report
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            Reports based on sales
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon2-box kt-font-danger"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            2 new items submited
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            by Grog John
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon-psd kt-font-brand"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            79 PSD files generated
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            Reports based on sales
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon2-supermarket kt-font-warning"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            $2900 worth producucts sold
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            Total 234 items
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon-paper-plane-1 kt-font-success"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            4.5h-avarage response time
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            Fostest is Barry
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon2-information kt-font-danger"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            Database server is down
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            10 mins ago
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon2-mail-1 kt-font-brand"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            System report has been generated
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            Fostest is Barry
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="kt-notification-v2__item">
                                    <div class="kt-notification-v2__item-icon">
                                        <i class="flaticon2-hangouts-logo kt-font-warning"></i>
                                    </div>
                                    <div class="kt-notification-v2__itek-wrapper">
                                        <div class="kt-notification-v2__item-title">
                                            4.5h-avarage response time
                                        </div>
                                        <div class="kt-notification-v2__item-desc">
                                            Fostest is Barry
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 5px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll ps" id="kt_quick_panel_tab_settings" role="tabpanel" style="height: 265px; overflow: hidden;">
                            <form class="kt-form">
                                <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-8 col-form-label">Enable Notifications:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--success kt-switch--sm">
                                            <label>
                                                <input type="checkbox" checked="checked" name="quick_panel_notifications_1">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-8 col-form-label">Enable Case Tracking:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--success kt-switch--sm">
                                            <label>
                                                <input type="checkbox" name="quick_panel_notifications_2">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-group-last form-group-xs row">
                                    <label class="col-8 col-form-label">Support Portal:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--success kt-switch--sm">
                                            <label>
                                                <input type="checkbox" checked="checked" name="quick_panel_notifications_2">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                                <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-8 col-form-label">Generate Reports:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--sm kt-switch--danger">
                                            <label>
                                                <input type="checkbox" checked="checked" name="quick_panel_notifications_3">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-8 col-form-label">Enable Report Export:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--sm kt-switch--danger">
                                            <label>
                                                <input type="checkbox" name="quick_panel_notifications_3">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-group-last form-group-xs row">
                                    <label class="col-8 col-form-label">Allow Data Collection:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--sm kt-switch--danger">
                                            <label>
                                                <input type="checkbox" checked="checked" name="quick_panel_notifications_4">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
                                <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-8 col-form-label">Enable Member singup:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--sm kt-switch--brand">
                                            <label>
                                                <input type="checkbox" checked="checked" name="quick_panel_notifications_5">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-group-xs row">
                                    <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--sm kt-switch--brand">
                                            <label>
                                                <input type="checkbox" name="quick_panel_notifications_5">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-group-last form-group-xs row">
                                    <label class="col-8 col-form-label">Enable Customer Portal:</label>
                                    <div class="col-4 kt-align-right">
                                        <span class="kt-switch kt-switch--sm kt-switch--brand">
                                            <label>
                                                <input type="checkbox" checked="checked" name="quick_panel_notifications_6">
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 5px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                    </div>
                </div>
            </div>
    
            <!-- end::Quick Panel -->
    
            <!-- begin::Scrolltop -->
            <div id="kt_scrolltop" class="kt-scrolltop">
                <i class="fa fa-arrow-up"></i>
            </div>
    
            <!-- end::Scrolltop -->
    
        
    
            <!-- begin::Demo Panel -->
            <div id="kt_demo_panel" class="kt-demo-panel">
                <div class="kt-demo-panel__head" kt-hidden-height="49" style="">
                    <h3 class="kt-demo-panel__title">
                        Select A Demo
    
                        <!--<small>5</small>-->
                    </h3>
                    <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
                </div>
                <div class="kt-demo-panel__body kt-scroll ps ps--active-y" style="height: 227px; overflow: hidden;">
                    <div class="kt-demo-panel__item kt-demo-panel__item--active">
                        <div class="kt-demo-panel__item-title">
                            Default
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-_Default.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../default/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 2
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-2.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 3
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-3.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 4
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-4.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 5
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-5.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 6
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-6.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 7
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-7.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 8
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-8.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 9
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-9.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 10
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-10.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 11
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-11.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 12
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-12.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="../demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 13
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-13.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-demo-panel__item ">
                        <div class="kt-demo-panel__item-title">
                            Demo 14
                        </div>
                        <div class="kt-demo-panel__item-preview">
                            <img src="../assets/media/demos/Demo-14.jpg" alt="">
                            <div class="kt-demo-panel__item-preview-overlay">
                                <a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
                            </div>
                        </div>
                    </div>
                    <a href="" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
                        Buy Metronic Now!
                    </a>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 227px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;"></div></div></div>
            </div>
    
            <!-- end::Demo Panel -->
    
    
        <!-- end::Body -->
    @include('partials.footer')    
</body>
</html>
