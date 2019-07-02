@extends('layouts.app')
@section('styles')

@endsection

@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('admin.resignation')}}
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-sm-12">
    <div class="table-responsive">                           
<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer" id="dataTables-example">
        <thead>
        <tr>
            <th>{{trans('admin.username')}}</th>
            <th>{{trans('admin.country')}}</th>
            <th>{{trans('admin.city')}}</th>
            <th>{{trans('admin.office_id')}}</th>
            <th>{{trans('admin.resignation_desc')}}</th>


            <th>{{trans('admin.action')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($resignation as $r)
        <tr>
            <td>{{$r->user_rel->name}}</td>
            <td>{{$r->user_rel->office->country->name_ar}}</td>
            <td>{{$r->user_rel->office->city->name_ar}}</td>
            <td>{{$r->user_rel->office->address}}</td>

            <td>{{str_limit($r->desc,50)}}</td>


            <td >
                <a style="padding: 2px;margin:2px" href="{{route('resignation.show', $r->id)}}" class="btn btn-primary btn-sm">عرض</a>

            @can('Resignation-delete')


                {!! Form::open(['route'=>["resignation.destroy" , $r->id ], 'onsubmit' => 'return ConfirmDeletee()']) !!}

                {!! method_field('DELETE') !!}

                {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger btn-sm','style'=>'padding: 2px;margin:2px'])!!}


                {!! Form::close() !!}

                {!! Form::open(['route'=>["accept" , $r->id], 'onsubmit' => 'return ConfirmDelete()','style'=>'display: inline;']) !!}

                {!! method_field('DELETE') !!}

                {!! Form::submit(trans('admin.accept'),['class'=>'btn btn-primary btn-sm','style'=>'padding: 2px;margin:2px'])!!}


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
            var x = confirm("'هل انت متاكد من قبول هذه الاستقاله؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>
    <script>

        function ConfirmDeletee()
        {
            var x = confirm("'هل انت متاكد من حذف هذه الاستقاله؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>


@endsection