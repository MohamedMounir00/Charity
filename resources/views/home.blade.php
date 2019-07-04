@extends('layouts.app')

@section('content')




<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title" style="font-size: 20px;
                font-weight: 600;">
                    نظام إدارة الأعمال الخيرية
                </h3>
            </div>
         
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-widget17">
                <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #1e1e2dd1;height: 151px;">
                    <div class="kt-widget17__chart" style="height:320px;"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="kt_chart_activities" width="1044" height="216" class="chartjs-render-monitor" style="display: block; width: 1044px; height: 216px;"></canvas>
                    </div>
                </div>
                <div class="kt-widget17__stats">



                    <div class="kt-widget17__items">


                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle" style="font-weight: 700;
                            font-size: 30px;">
                                    {{$users}}
                            </span>
                            <span class="kt-widget17__desc" style="font-size: 17px;
                            font-weight: 600;">
                                الموظفين
                            </span>
                            <br>
                            <a class="btn btn-sm btn-default btn-bold btn-upper" href="{{route('user.index')}}">التفاصيل</a>
                        </div>


                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <circle id="Oval-5" fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                            <rect id="Rectangle" fill="#000000" x="6" y="11" width="12" height="2" rx="1"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle" style="font-weight: 700;
                            font-size: 30px;">
                                    {{$delavery}}
                            </span>
                            <span class="kt-widget17__desc" style="font-size: 17px;
                            font-weight: 600;">
                                التبرعات الخارجة
                            </span>
                            <br>
                            <a class="btn btn-sm btn-default btn-bold btn-upper" href="{{route('delavery.index')}}">التفاصيل</a>
                        </div>


                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <circle id="Oval-5" fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" id="Combined-Shape" fill="#000000"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle" style="font-weight: 700;
                            font-size: 30px;">
                                    {{$donation}}
                            </span>
                            <span class="kt-widget17__desc" style="font-size: 17px;
                            font-weight: 600;">
                                التبرعات الداخلة
                            </span>
                            <br>
                           
                            <a class="btn btn-sm btn-default btn-bold btn-upper" href=" {{route('donation.index')}}">التفاصيل</a>
                            
                        </div>


                        <div class="kt-widget17__item">
                            <span class="kt-widget17__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path d="M6,20 L4,20 C4,17.2385763 6.23857625,16 9,16 L15,16 C17.7614237,16 20,17.2385763 20,20 L18,20 C18,18.3431458 16.6568542,18 15,18 L9,18 C7.34314575,18 6,18.3431458 6,20 Z" id="Path-61" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M23,8 L21.173913,8 C20.0693435,8 19.173913,8.8954305 19.173913,10 L19.173913,12 C19.173913,12.5522847 18.7261978,13 18.173913,13 L5.86956522,13 C5.31728047,13 4.86956522,12.5522847 4.86956522,12 L4.86956522,10 C4.86956522,8.8954305 3.97413472,8 2.86956522,8 L1,8 C1,6.34314575 2.34314575,5 4,5 L20,5 C21.6568542,5 23,6.34314575 23,8 Z" id="Path" fill="#000000" opacity="0.3"/>
                                            <path d="M23,10 L23,15 C23,16.6568542 21.6568542,18 20,18 L4,18 C2.34314575,18 1,16.6568542 1,15 L1,10 L2.86956522,10 L2.86956522,12 C2.86956522,13.6568542 4.21271097,15 5.86956522,15 L18.173913,15 C19.8307673,15 21.173913,13.6568542 21.173913,12 L21.173913,10 L23,10 Z" id="Combined-Shape" fill="#000000"/>
                                        </g>
                                    </svg> </span>
                            <span class="kt-widget17__subtitle" style="font-weight: 700;
                            font-size: 30px;">
                                    {{$office}}
                            </span>
                            <span class="kt-widget17__desc" style="font-size: 17px;
                            font-weight: 600;">
                                المكاتب
                            </span>
                            <br>
                            <a class="btn btn-sm btn-default btn-bold btn-upper" href="{{route('office.index')}}">التفاصيل</a>
                        </div>





                    </div>



                    
                </div>
            </div>
            <br>

        </div>

    </div>



@endsection
{{--

@section('scripts')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
--}}
