@extends('layouts.app')


@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        تعديل المهام
                    </h3>
                </div>

                <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{ route('roles.index') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    رجوع
                                </a>
                            </div>
                        </div>
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

                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>الأسم :</label>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الصلاحيات :</strong>
                            <br/>
                            <br>




                            {{-- @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'kt-checkbox')) }}
                                    {{ trans('admin.'.$value->name) }}</label>
                                <br/>
                            @endforeach --}}





                            <div class="form-group row">
                                    @foreach($permission as $value)
                                    <div class="col-3">
                                        <span class="kt-switch kt-switch--icon">
                                            <label>
                                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'kt-checkbox')) }}
            
                                                    {{ trans('admin.'.$value->name) }}
            
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                    @endforeach 
                                </div>


                        </div>
                    </div>
                    
                </div>
                <div class="form-actions" style="text-align:center">
                        <button type="submit" class="btn btn-brand btn-elevate btn-pill btn-sm" style="padding:10px 40px">تعديل</button>
                    </div>
                {!! Form::close() !!}
            </div>
</div>

























































{{-- 


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> تعديل المهام</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
            </div>
        </div>
    </div>


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


    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>صلحيات:</strong>
                <br/>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </div>
    {!! Form::close() !!} --}}


@endsection