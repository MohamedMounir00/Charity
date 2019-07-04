@extends('layouts.app')
@section('styles')

<link href="{{asset('admin')}}/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                {{trans('admin.beneficiary')}}
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                    @can('Beneficiary-create')
                <div class="kt-portlet__head-actions">
                    <a href="{{route('beneficiary.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                        <i class="la la-plus"></i>
                        أضف محتاج
                    </a>
                </div>
                @endcan
            </div>
        </div>
    </div>


    <div class="kt-portlet__body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>{{trans('admin.username')}}</th>
                                <th>{{trans('admin.country')}}</th>
                                <th>{{trans('admin.city')}}</th>
                                <th>{{trans('admin.office_id')}}</th>
                                <th>{{trans('admin.typePoor')}}</th>
                                <th>{{trans('admin.sons')}}</th>
                                <th>{{trans('admin.Wives')}}</th>
                                <th>{{trans('admin.address')}}</th>
                                <th>{{trans('admin.creatby')}}</th>
                                <th>{{trans('admin.action')}}</th>



                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->user_rel->office->country->name_ar}}</td>
                                    <td>{{$user->user_rel->office->city->name_ar}}</td>
                                    <td>{{$user->user_rel->office->address}}</td>
                                    <td>
                                        @if($user->typePoor==1)
                                            عادى
                                            @elseif($user->typePoor==2)
                                        متوسط
                                            @else
                                        شديد الحاجه
                                            @endif
                                    </td>
                                    <td>{{$user->sons}}</td>
                                    <td>{{$user->Wives}}</td>
                                    <td>{{$user->adderss}}</td>
                                    <td>{{$user->user_rel->name}}</td>
                                    <td >
                                        @can('Beneficiary-edit')

                                        <a style="padding: 9px;" href="{{route('beneficiary.edit', $user->id)}}" class="btn btn-primary btn-sm">{{trans('admin.edit')}}</a>

                                                  @endcan
                                            @can('Beneficiary-delete')

                                            {!! Form::open(['route'=>["beneficiary.destroy" , $user->id ], 'onsubmit' => 'return ConfirmDelete()','style'=>'display: initial;']) !!}

                                        {!! method_field('DELETE') !!}

                                        {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger btn-sm','style'=>'padding: 9px;'])!!}


                                        {!! Form::close() !!}
                                            @endcan

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>


















{{-- 

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('admin.beneficiary')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                @can('Beneficiary-create')

                                <div class="panel-heading">
                                    <a href="{{route('beneficiary.create')}}" class=" btn btn-info">اضف محتاج</a>
                                </div>
                            @endcan

                            <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>{{trans('admin.username')}}</th>
                                                <th>{{trans('admin.country')}}</th>
                                                <th>{{trans('admin.city')}}</th>
                                                <th>{{trans('admin.office_id')}}</th>
                                                <th>{{trans('admin.typePoor')}}</th>
                                                <th>{{trans('admin.sons')}}</th>
                                                <th>{{trans('admin.Wives')}}</th>
                                                <th>{{trans('admin.address')}}</th>
                                                <th>{{trans('admin.creatby')}}</th>
                                                <th>{{trans('admin.action')}}</th>



                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->user_rel->office->country->name_ar}}</td>
                                                    <td>{{$user->user_rel->office->city->name_ar}}</td>
                                                    <td>{{$user->user_rel->office->address}}</td>
                                                    <td>
                                                        @if($user->typePoor==1)
                                                            عادى
                                                            @elseif($user->typePoor==2)
                                                        متوسط
                                                            @else
                                                        شديد الحاجه
                                                            @endif
                                                    </td>
                                                    <td>{{$user->sons}}</td>
                                                    <td>{{$user->Wives}}</td>
                                                    <td>{{$user->adderss}}</td>
                                                    <td>{{$user->user_rel->name}}</td>
                                                    <td >
                                                        @can('Beneficiary-edit')

                                                        <a href="{{route('beneficiary.edit', $user->id)}}" class="btn btn-info pull-right">{{trans('admin.edit')}}</a>

                                                                  @endcan
                                                            @can('Beneficiary-delete')

                                                            {!! Form::open(['route'=>["beneficiary.destroy" , $user->id ], 'onsubmit' => 'return ConfirmDelete()']) !!}

                                                        {!! method_field('DELETE') !!}

                                                        {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger pull-right'])!!}


                                                        {!! Form::close() !!}
                                                            @endcan

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->

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
    </div>
    <!-- /.row -->
    <!-- /#page-wrapper --> --}}
@endsection
@section('scripts')
<script src="{{asset('admin/js/jquery/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/app/custom/general/crud/datatables/advanced/column-rendering.js')}}" type="text/javascript"></script>         
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "{{trans('admin.No_data_available_in_table')}}",
                    "infoEmpty": "{{trans('admin.Showing_0_to_0_of_0_entries')}}",
                    "info":           "{{trans('admin.showing')}}_START_ {{trans('admin.to')}} _END_ {{trans('admin.of')}} _TOTAL_{{trans('admin.entries')}} ",

                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "{{trans('admin.show_t')}}_MENU_ {{trans('admin.entries')}}",
                    "search": "{{trans('admin.search')}}",
                    "zeroRecords": "{{trans('admin.No_matching_records_found')}}",
                    "paginate": {
                        "first": "{{trans('admin.First')}}",
                        "last": "{{trans('admin.Last')}}",
                        "next": "{{trans('admin.Next')}}",
                        "previous": "{{trans('admin.Previous')}}"
                    }
                }
            });
        });
    </script>

    <script>

        function ConfirmDelete()
        {
            var x = confirm("'هل انت متاكد من حذف هذا المستفيد؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection