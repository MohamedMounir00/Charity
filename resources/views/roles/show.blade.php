@extends('layouts.app')


@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        عرض الأدوار
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
                    <div class="form-group">
                            <strong>الأسم : </strong>
                            {{ $role->name }}
                        </div>



                        {{-- <div class="form-group">
                                <strong>الصلاحيات : </strong>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        <label class="kt-badge kt-badge--success kt-badge--inline">    {{ trans('admin.'.$v->name) }}
                                        </label>
                                    @endforeach
                                @endif
                            </div> --}}



                            <div class="form-group row">
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                    <div class="col-3">
                                        <span class="kt-switch kt-switch--icon">
                                            <label>
                                                {{ Form::checkbox('permission[]', $v->id, true, array('class' => 'kt-checkbox','disabled')) }}

                                                {{ trans('admin.'.$v->name) }}
            
                                                <span></span>
                                            </label>
                                        </span>
                                    </div>
                                    @endforeach
                                    @endif 
                                </div>
            </div>
</div>































{{-- 



    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div> --}}
@endsection