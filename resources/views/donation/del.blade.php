@extends('layouts.app')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('admin.order_delete')}}   
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                    @if(isset($errors) > 0)
                    @if(Session::has('errors'))
        
                        <div class="alert alert-danger " >
                            <ul  class="msgError">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif



                                <!-- /.panel-heading -->
                                    <!-- /.table-responsive -->

                                        <div class="form-group">
                                            <label class="control-label" for="name">{{trans('admin.donationname')}} </label>
                                            <div class="controls">
                                                <input type="text" value="{{$donation->name}}" class="form-control" name="name" id="name"  disabled/>

                                            </div>
                                        </div>


                                        {{-- <div class="form-group">
                                            <label class="control-label" for="price">{{trans('admin.price')}}</label>
                                            <div class="controls">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" name="price" class="form-control"  value="{{$donation->price}} " disabled>
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <label class="control-label" for="price">{{trans('admin.price')}}</label>
                            <div class="input-group form-group">   
                            <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="price" class="form-control"  value="{{$donation->price}} " disabled>
                        </div>




                                        <div class="form-group">
                                            <label class="control-label" for="payment_method">{{trans('admin.payment_method')}} </label>
                                            <div class="controls">
                                                <select name="payment_method" class="form-control" disabled>
                                                    <option value="cash" {{$donation->cash == 'cash' ? 'selected' : ''}}>{{ trans('admin.cash') }}</option>
                                                    <option value="visa" {{$donation->visa == 'visa' ? 'selected' : ''}}>{{ trans('admin.visa') }}</option>
                                                    <option value="check" {{$donation->check == 'check' ? 'selected' : ''}}>{{ trans('admin.check') }}</option>
                                                    <option value="goods" {{$donation->goods == 'goods' ? 'selected' : ''}}>{{ trans('admin.goods') }}</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="office_id">{{trans('admin.office_id')}} </label>
                                            <div class="controls">
                                                <select class="form-control "data-placeholder="Select a State disabled"
                                                        name="office_id" style="width: 100%;" required disabled>
                                                    @foreach($offices as $office)
                                                        <option value="{{$office->id}}" {{($donation->office_id == $office->id) ? 'selected' : ''}}> {{$office->city->name_ar}} --{{$office->address}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="control-label" for="office_id">{{trans('admin.cat_id')}} </label>
                                        <div class="controls">
                                            <select class="form-control "data-placeholder="Select a State"
                                                    name="cat_id" style="width: 100%;" required disabled>
                                                @foreach($catogrey as $cat)
                                                    <option value="{{$cat->id}}" {{($donation->cat_id == $cat->id) ? 'selected' : ''}}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="office_id">{{trans('admin.type')}} </label>
                                        <div class="controls">
                                            <select class="form-control "data-placeholder="Select a State"
                                                    name="type_id" style="width: 100%;" required disabled>
                                                @foreach($type as $cat)
                                                    <option value="{{$cat->id}}" {{($donation->type_id == $cat->id) ? 'selected' : ''}}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                    {!! Form::open(['route'=>['postdonationdel',$donation->id],'method'=>'post']) !!}



                                    <div class="form-group">
                                        <label class="control-label" for="name">{{trans('admin.reason')}} </label>
                                        <div class="controls">
                                            <textarea  name="reason" class="form-control "  required placeholder="{{trans('admin.reason')}}"></textarea>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label class="control-label" for="office_id">{{trans('admin.order_id')}} </label>
                                        <div class="controls">
                                            <select class="form-control "data-placeholder="Select a State"
                                                    name="order_id" style="width: 100%;" required>
                                                @foreach($order as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-actions" style="text-align:center">
                                        <button type="submit" class="btn btn-danger btn-elevate btn-pill btn-sm" style="padding:10px 40px">{{trans('admin.delete')}}</button>

                                    </div>

                                    {!! Form::close() !!}

                            <!-- /.panel-body -->
                        <!-- /.panel -->
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
                    {{trans('admin.order_delete')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- /.table-responsive -->
                                    <div class="row">

                                        <div class="control-group">
                                            <label class="control-label" for="name">{{trans('admin.donationname')}} </label>
                                            <div class="controls">
                                                <input type="text" value="{{$donation->name}}" class="form-control" name="name" id="name"  disabled/>

                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="price">{{trans('admin.price')}}</label>
                                            <div class="controls">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" name="price" class="form-control"  value="{{$donation->price}} " disabled>
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="payment_method">{{trans('admin.payment_method')}} </label>
                                            <div class="controls">
                                                <select name="payment_method" class="form-control" disabled>
                                                    <option value="cash" {{$donation->cash == 'cash' ? 'selected' : ''}}>{{ trans('admin.cash') }}</option>
                                                    <option value="visa" {{$donation->visa == 'visa' ? 'selected' : ''}}>{{ trans('admin.visa') }}</option>
                                                    <option value="check" {{$donation->check == 'check' ? 'selected' : ''}}>{{ trans('admin.check') }}</option>
                                                    <option value="goods" {{$donation->goods == 'goods' ? 'selected' : ''}}>{{ trans('admin.goods') }}</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.office_id')}} </label>
                                            <div class="controls">
                                                <select class="form-control "data-placeholder="Select a State disabled"
                                                        name="office_id" style="width: 100%;" required disabled>
                                                    @foreach($offices as $office)
                                                        <option value="{{$office->id}}" {{($donation->office_id == $office->id) ? 'selected' : ''}}> {{$office->city->name_ar}} --{{$office->address}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="office_id">{{trans('admin.cat_id')}} </label>
                                        <div class="controls">
                                            <select class="form-control "data-placeholder="Select a State"
                                                    name="cat_id" style="width: 100%;" required disabled>
                                                @foreach($catogrey as $cat)
                                                    <option value="{{$cat->id}}" {{($donation->cat_id == $cat->id) ? 'selected' : ''}}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="office_id">{{trans('admin.type')}} </label>
                                        <div class="controls">
                                            <select class="form-control "data-placeholder="Select a State"
                                                    name="type_id" style="width: 100%;" required disabled>
                                                @foreach($type as $cat)
                                                    <option value="{{$cat->id}}" {{($donation->type_id == $cat->id) ? 'selected' : ''}}>{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                    {!! Form::open(['route'=>['postdonationdel',$donation->id],'method'=>'post']) !!}



                                    <div class="control-group">
                                        <label class="control-label" for="name">{{trans('admin.reason')}} </label>
                                        <div class="controls">
                                            <textarea  name="reason" class="form-control "  required placeholder="{{trans('admin.reason')}}"></textarea>
                                        </div>
                                    </div>




                                    <div class="control-group">
                                        <label class="control-label" for="office_id">{{trans('admin.order_id')}} </label>
                                        <div class="controls">
                                            <select class="form-control "data-placeholder="Select a State"
                                                    name="order_id" style="width: 100%;" required>
                                                @foreach($order as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-danger">{{trans('admin.delete')}}</button>

                                    </div>

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