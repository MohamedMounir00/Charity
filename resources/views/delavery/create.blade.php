@extends('layouts.app')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('admin.newcatogres')}}
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                    @if(isset($errors) > 0)
                    @if(Session::has('errors'))
        
                        <div class="alert alert-danger " >
                            <ul >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif
                {!! Form::open(['route'=>['delavery.store'],'method'=>'POST']) !!}

                <div class="form-group">
                    <label>السعر او الكميه</label>
                    <input type="text" name="price" class="form-control" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label class="control-label" for="payment_method">طريقه الدفع</label>
                    <div class="controls">
                        <select name="type" class="form-control">
                            <option value="cash">كاش</option>
                            <option value="goods">عينيه</option>

                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label" for="office_id">  نواع التبرع</label>
                    <div class="controls">
                        <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                name="type_id" style="width: 100%;" required>
                            @foreach($type as $t)
                                <option value="{{$t->id}}">{{$t->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="office_id">اسم المحتاج </label>
                    <div class="controls">
                        <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                name="be_id" style="width: 100%;" required>
                            @foreach($Beneficiary as $b)
                                <option value="{{$b->id}}">{{$b->username}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-actions" style="text-align:center">
                <button type="submit" class="btn btn-brand btn-elevate btn-pill btn-sm" style="padding:10px 40px">{{trans('admin.add')}}</button>
                </div>
                {!! Form::close() !!}
            </div> 
</div>






































{{-- 

    <!-- /#page-wrapper -->

    <div class="row">
        @if(isset($errors) > 0)
            @if(Session::has('errors'))

                <div class="alert alert-danger " >
                    <ul >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('admin.newcatogres')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- /.table-responsive -->
                                    <div class="row">

                                        {!! Form::open(['route'=>['delavery.store'],'method'=>'POST']) !!}

                                        <div class="form-group">
                                            <label>السعر او الكميه</label>
                                            <input type="text" name="price" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="payment_method">طريقه الدفع</label>
                                            <div class="controls">
                                                <select name="type" class="form-control">
                                                    <option value="cash">كاش</option>
                                                    <option value="goods">عينيه</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="office_id">  نواع التبرع</label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                                        name="type_id" style="width: 100%;" required>
                                                    @foreach($type as $t)
                                                        <option value="{{$t->id}}">{{$t->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="office_id">اسم المحتاج </label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                                        name="be_id" style="width: 100%;" required>
                                                    @foreach($Beneficiary as $b)
                                                        <option value="{{$b->id}}">{{$b->username}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary">{{trans('admin.add')}}</button>

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div> --}}

@endsection