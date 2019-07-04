{{-- <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a class="active" href="{{route('home')}}"> Dashboard</a>
            </li>
                @can('donation-list')

                <li>
                <a href="{{route('donation.index')}}"> {{trans('admin.donations')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan

            @can('Order-list')


            <li>
                <a href="{{route('order.index')}}"> {{trans('admin.order')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan

            @can('Office-list')

            <li>
                <a href="{{route('office.index')}}"> {{trans('admin.offices')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan

            @can('user-list')
            <li>
                <a href="{{route('user.index')}}">{{trans('admin.users')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan

            @can('beneficiary-list')
            <li>
                <a href="{{route('beneficiary.index')}}"> {{trans('admin.beneficiary')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan




            @can('Delavary-list')
            <li>
                <a href="{{route('delavery.index')}}">{{trans('admin.delavery')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan


            @can('Resignation-list')
            <li>
                <a href="{{route('resignation.index')}}"> {{trans('admin.resignation')}}
                    <span class="fa arrow"></span></a>
            </li>
            @endcan





            <li class="">
                <a href="#"><i class="fa fa-files-o fa-fw"></i>الاعدادات<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height: 0px;">
                    @can('Catogrey-list')
                        <li>
                            <a href="{{route('catogrey.index')}}"> {{trans('admin.catogres')}}
                                <span class="fa arrow"></span></a>
                            <!-- /.nav-second-level -->
                        </li>
                    @endcan
                        @can('TypeDonation-list')
                            <li>
                                <a href="{{route('typeDonation.index')}}"> {{trans('admin.typeDonation')}}
                                    <span class="fa arrow"></span></a>
                            </li>
                        @endcan
                        @can('role-list')
                            <li>
                                <a href="{{route('roles.index')}}"> {{trans('admin.roles')}}
                                    <span class="fa arrow"></span></a>
                            </li>
                        @endcan
                        @can('ArchiveDonation-list')
                            <li>
                                <a href="{{route('archiveDonation')}}"> {{trans('admin.archives')}}
                                    <span class="fa arrow"></span></a>
                            </li>
                        @endcan
                </ul>
                <!-- /.nav-second-level -->
            </li>








            <li class="">
                <a href="#"><i class="fa fa-files-o fa-fw"></i>التقارير<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" style="height: 0px;">
                    <li>
                        <a href="{{route('reportfordon')}}">    تقارير التبرعات الداخله
                            <span class="fa arrow"></span></a>                    </li>
                    <li>
                        <a href="{{route('reportfordelavary')}}"> تقارير التبرعات الخارجه
                            <span class="fa arrow"></span></a>                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    تسجيل خروج
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div> --}}







<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

        <!-- begin:: Aside -->
        <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand" kt-hidden-height="65" style="">
            <div class="kt-aside__brand-logo">
                <a href="index.html">
                        <a href="#" style="color: #FFF;
                        font-size: 20px;
                        text-align: center;
                        font-weight: 600;">
                                  <img alt="Logo" src="{{asset('assets/logo.png')}}" style="width: 160px;" />
                                 
                                 </a>
                </a>
            </div>
            <div class="kt-aside__brand-tools">
                <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "></path>
                                <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "></path>
                            </g>
                        </svg></span>
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero"></path>
                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                            </g>
                        </svg></span>
                </button>

                
<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>

            </div>
        </div>

        <!-- end:: Aside -->

        <!-- begin:: Aside Menu -->
        <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
            <div id="kt_aside_menu" class="kt-aside-menu kt-scroll ps ps--active-y" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" style="height: 284px; overflow: hidden;">
                <ul class="kt-menu__nav ">
                    



                    <!-- Dashboard -->
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('home')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text"> الرئيسية</span>
                        </a>
                    </li>




                    <!-- Donate -->
                    @can('donation-list')
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('donation.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.donations')}}</span>
                        </a>
                    </li>
                    @endcan



                    <!-- Orders -->
                    @can('Order-list')
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('order.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.order')}}</span>
                        </a>
                    </li>
                    @endcan




                    <!-- Office -->
                    @can('Office-list')                    
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('office.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.offices')}}</span>
                        </a>
                    </li>
                    @endcan
    
    
                    
                    <!-- Users -->
                    @can('user-list')
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href=" {{route('user.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.users')}}</span>
                        </a>
                    </li>
                    @endcan



                    <!-- Beneficiary -->
                    @can('beneficiary-list')    
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('beneficiary.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.beneficiary')}}</span>
                        </a>
                    </li>
                    @endcan
                  



                    <!-- Delavary -->
                    @can('Delavary-list')
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href=" {{route('delavery.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.delavery')}}</span>
                        </a>
                    </li>
                    @endcan



                    <!-- Resignation -->
                    @can('Resignation-list')
                    <li class="kt-menu__item " aria-haspopup="true">
                        <a href="{{route('resignation.index')}}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-home"></i>
                            <span class="kt-menu__link-text">{{trans('admin.resignation')}}</span>
                        </a>
                    </li>
                    @endcan



                  





                    <!-- First List -->
                    <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                            <i class="kt-menu__link-icon flaticon-layers"></i>
                            <span class="kt-menu__link-text">الإعدادات</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                    @can('Catogrey-list')
                                    <li class="kt-menu__item">
                                        <a class="kt-menu__link" href="{{route('catogrey.index')}}">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text">{{trans('admin.catogres')}}</span> 
                                        </a>
                                    </li>
                                @endcan
                                    @can('TypeDonation-list')
                                        <li class="kt-menu__item">
                                            <a class="kt-menu__link" href="{{route('typeDonation.index')}}">
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                    <span class="kt-menu__link-text">{{trans('admin.typeDonation')}}</span> 
                                            </a>
                                        </li>
                                    @endcan
                                    @can('role-list')
                                        <li class="kt-menu__item">
                                            <a class="kt-menu__link" href="{{route('roles.index')}}"> 
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                    <span class="kt-menu__link-text"> {{trans('admin.roles')}}</span>
                                                   
                                            </a>
                                        </li>
                                    @endcan
                                    @can('ArchiveDonation-list')
                                        <li class="kt-menu__item">
                                            <a class="kt-menu__link" href="{{route('archiveDonation')}}"> 
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                    <span class="kt-menu__link-text">{{trans('admin.archives')}}</span>
                                                
                                            </a>
                                        </li>
                                    @endcan
                                                                
                            </ul>
                        </div>
                    </li>













                    <!-- Second -->
                     <!-- First List -->
                     <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                            <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                <i class="kt-menu__link-icon flaticon-layers"></i>
                                <span class="kt-menu__link-text">التقارير</span>
                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item">
                                            <a class="kt-menu__link" href="{{route('reportfordon')}}">
                                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                    <span class="kt-menu__link-text">تقارير التبرعات الداخلة</span> 
                                            </a>
                                        </li>
                                            <li class="kt-menu__item">
                                                <a class="kt-menu__link" href="{{route('reportfordelavary')}}">
                                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                        <span class="kt-menu__link-text">تقارير التبرعات الخارجة</span> 
                                                </a>
                                            </li>
                                       
                                                                    
                                </ul>
                            </div>
                        </li>




                        <!-- /Logout -->
                    @can('Resignation-list')
                    <li class="kt-menu__item " aria-haspopup="true">
                     


                        <a class="kt-menu__link " href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                         <i class="kt-menu__link-icon flaticon-home"></i>
                         <span class="kt-menu__link-text">تسجيل الخروج</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endcan
                    
                    




                </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div><div class="ps__rail-y" style="top: 0px; height: 284px; right: 3px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 56px;"></div>
            </div>
        </div>
        </div>

        <!-- end:: Aside Menu -->
    </div>