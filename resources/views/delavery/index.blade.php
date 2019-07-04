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
                            {{trans('admin.delavery')}}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                            @can('Delavary-create')
                        <div class="kt-portlet__head-actions">
                            
                            <a href="{{route('delavery.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                {{trans('admin.addnewdonations')}}
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
                                            <th>{{trans('admin.price')}}</th>
                                            <th>نواع التبرع</th>
                                            <th>اسم المنتفع</th>
                                            <th>{{trans('admin.office_id')}}</th>
                                            <th>{{trans('admin.creatby')}}</th>


                                            <th>{{trans('admin.action')}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($delavary as $d)
                                        <tr>
                                            <td>{{$d->price}}</td>
                                            <td>{{$d->type}}</td>
                                            <td>{{$d->beneficiary->username}}</td>
                                            <td>{{$d->user_rel->office->city->name_ar}}</td>
                                            <td>{{$d->user_rel->name}}</td>

                                            <td >
                                                @can('Delavary-edit')

                                                <a  style="padding: 9px;" href="{{route('delavery.edit', $d->id)}}" class="btn btn-primary btn-sm">{{trans('admin.edit')}}</a>

                                                @endcan
                                                    @can('Delavary-delete')

                                                    {!! Form::open(['route'=>["delavery.destroy" , $d->id ], 'onsubmit' => 'return ConfirmDelete()','style'=>'display: initial;']) !!}

                                                {!! method_field('DELETE') !!}

                                                {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger btn-sm','style'=>'padding: 9px;'])!!}


                                                {!! Form::close() !!}
                                                    @endcan
                                                    <a style="padding: 9px;" href="{{route('printdelavey',  $d->id)}}" class="btn btn-primary btn-sm">طباعه</a>

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
































@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

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
            var x = confirm("'هل انت متاكد من حذف هذا التبرع؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection