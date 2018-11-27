@extends('layouts.app')

@section('content')
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">نظام اداره الجمعيات الخيريه</h1>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row            'users','donation','delavery','office' -->
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i class="fa fa-users fa-5x"></i>
                                            </div>
                                            <div class="col-xs-8 text-right">
                                                <div class="huge">{{$users}}</div>
                                                <div>الموظفين</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('user.index')}}">
                                        <div class="panel-footer">
                                            <span class="pull-left">تفاصيل</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i class="fa fa-tasks fa-5x"></i>
                                            </div>
                                            <div class="col-xs-8 text-right">
                                                <div class="huge">{{$delavery}}</div>
                                                <div>التبرعات الخارجه</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('delavery.index')}}">
                                        <div class="panel-footer">
                                            <span class="pull-left">التفاصيل</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i class="fa fa-shopping-cart fa-5x"></i>
                                            </div>
                                            <div class="col-xs-8 text-right">
                                                <div class="huge">{{$donation}}</div>
                                                <div>التبرعات الداخله</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('donation.index')}}">
                                        <div class="panel-footer">
                                            <span class="pull-left">التفاصيل</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i class="fa fa-support fa-5x"></i>
                                            </div>
                                            <div class="col-xs-8 text-right">
                                                <div class="huge">{{$office}}</div>
                                                <div>المكاتب</div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{route('office.index')}}">
                                        <div class="panel-footer">
                                            <span class="pull-left">التفاصيل</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->



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
