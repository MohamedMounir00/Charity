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

                {!! Form::open(['route'=>['beneficiary.update', $user->id],'method'=>'put']) !!}

                <div class="form-group">
                    <label>{{trans('admin.username')}}</label>
                    <input type="text" name="username" class="form-control" value="{{$user->username}}" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>{{trans('admin.personal_id')}}</label>
                    <input type="number" name="personal_id" class="form-control"  value="{{$user->personal_id}}" placeholder="Enter text" required>
                </div>
                <div class="form-group">
                    <label>{{trans('admin.sons')}}</label>
                    <input type="number" name="sons" class="form-control"  value="{{$user->sons}}" placeholder="Enter text" >
                </div>
                <div class="form-group">
                    <label>{{trans('admin.Wives')}}</label>
                    <input type="number" name="Wives" class="form-control"  value="{{$user->sons}}" placeholder="Enter text" >
                </div>
                <div class="form-group">
                    <label>{{trans('admin.adderss')}}</label>
                    <input type="text" name="adderss" class="form-control"  value="{{$user->sons}}" placeholder="Enter text" required>
                </div>
                <div class="control-group">
                    <label class="control-label" for="payment_method">{{trans('admin.typePoor')}} </label>
                    <div class="controls">
                        <select name="typePoor" class="form-control">
                            <option value="1">عادى</option>
                            <option value="2">متوسط</option>
                            <option value="3">شديد الحاجه</option>

                        </select>

                    </div>

                </div>
                <div class="form-group">
                    <label>{{trans('admin.desc')}}</label>
                    <textarea name="desc" class="form-control">{{$user->content}} </textarea>
                </div>
                <div class="form-actions" style="text-align:center">
                <button type="submit" class="btn btn-brand btn-elevate btn-pill btn-sm" style="padding:10px 40px">{{trans('admin.edit')}}</button>
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

                                        {!! Form::open(['route'=>['beneficiary.update', $user->id],'method'=>'put']) !!}

                                        <div class="form-group">
                                            <label>{{trans('admin.username')}}</label>
                                            <input type="text" name="username" class="form-control" value="{{$user->username}}" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.personal_id')}}</label>
                                            <input type="number" name="personal_id" class="form-control"  value="{{$user->personal_id}}" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.sons')}}</label>
                                            <input type="number" name="sons" class="form-control"  value="{{$user->sons}}" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.Wives')}}</label>
                                            <input type="number" name="Wives" class="form-control"  value="{{$user->sons}}" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.adderss')}}</label>
                                            <input type="text" name="adderss" class="form-control"  value="{{$user->sons}}" placeholder="Enter text" required>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="payment_method">{{trans('admin.typePoor')}} </label>
                                            <div class="controls">
                                                <select name="typePoor" class="form-control">
                                                    <option value="1">عادى</option>
                                                    <option value="2">متوسط</option>
                                                    <option value="3">شديد الحاجه</option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.desc')}}</label>
                                            <textarea name="desc" class="form-control">{{$user->content}} </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{trans('admin.edit')}}</button>

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