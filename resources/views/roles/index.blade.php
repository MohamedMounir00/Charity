@extends('layouts.app')


@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        التحكم فى المهمات
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('roles.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                إضافة مهمة جديدة
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            
            <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>الاسم</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @if($role->name !='admin')
                                
                                                    <a style="padding: 2px;" class="btn btn-primary btn-sm" href="{{ route('roles.show',$role->id) }}">عرض</a>
                                                    @can('role-edit')
                                
                                                    <a style="padding: 2px;" class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                                                    @endcan
                                                    @can('role-delete')
                                                            @if($role->name !='user')
                                
                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline' , 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                        {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm','style'=>'padding: 2px;']) !!}
                                                        {!! Form::close() !!}
                                                            @endif
                                
                                                        @endcan
                                                        @endif
                                
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                
                                    {!! $roles->render() !!}
                            </div>
                    </div>
                </div>
</div>
















{{-- 

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>التحكم فى المهمات</h2>
            </div>
            @can('role-create')

            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> اضافه مهام جديه</a>
            </div>
                @endcan
        </div>
    </div>





    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @if($role->name !='admin')

                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                    @can('role-edit')

                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                    @endcan
                    @can('role-delete')
                            @if($role->name !='user')

                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline' , 'onsubmit' => 'return ConfirmDelete()']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                            @endif

                        @endcan
                        @endif

                </td>
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!} --}}


@endsection

@section('scripts')


>

    <script>

        function ConfirmDelete()
        {
            var x = confirm("'هل انت متاكد من حذف هذه المهام؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>


@endsection