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
                            {{trans('admin.order')}}
                    </h3>
                </div>
            </div>



            <div class="kt-portlet__body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>{{trans('admin.title')}}</th>
                                    <th>{{trans('admin.content')}}</th>
                                    <th>{{trans('admin.creatby')}}</th>
                                    <th>{{trans('admin.ststus')}}</th>
                                    <th>{{trans('admin.donation_id')}}</th>

                                    <th>{{trans('admin.action')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->title}}</td>
                                    <td>{{$order->content}}</td>

                                    <td><?php try { echo $order->user_rel->name; } catch(Exception $e) {} ?></td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->donation_id}}</td>

                                    <td >
                                        @can('user-edit')

                                        <a style="padding: 13px;" href="{{route('donation.edit', $order->donation_id)}}" class="kt-badge kt-badge--primary kt-badge--inline">تعديل التبرع</a>
                                           @endcan
                                            @can('user-delete')

                                            <a style="padding: 13px;" href="{{route('getdelete', $order->donation_id)}}" class="kt-badge kt-badge--danger kt-badge--inline">حذف التبرع</a>

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
            var x = confirm("'هل انت متاكد من حذف هذا القسم؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection