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
                            {{trans('admin.donations')}}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    
                    <div class="kt-portlet__head-wrapper">
                            @can('donation-create')
                        <div class="kt-portlet__head-actions">
                            <a href="{{route('donation.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
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
           <th class="sorting">{{trans('admin.donationname')}}</th>
           <th class="sorting">{{trans('admin.price')}}</th>
           <th class="sorting">{{trans('admin.payment_method')}}</th>
           <th class="sorting">{{trans('admin.creatby')}}</th>
           <th class="sorting">{{trans('admin.date')}}</th>
           <th class="sorting">{{trans('admin.office_id')}}</th>
           <th class="sorting">{{trans('admin.cat_id')}}</th>
           <th class="sorting">{{trans('admin.type')}}</th>
           <th class="sorting">{{trans('admin.action')}}</th>


       </tr>
       </thead>
       <tbody>
       @foreach($donations as $donation)
       <tr>
           <td>{{$donation->name}}</td>
           <td>{{$donation->price}}.EGP</td>
           <td><?php try { echo $donation->payment_method;} catch(Exception $e) {} ?></td>
           <td><?php try {echo  $donation->user_rel->name;} catch(Exception $e) {}  ?></td>
           <td>{{date('Y-m-d', strtotime($donation->date))}}</td>
           <td><?php try { echo $donation->offices_rel->city->name_ar;} catch(Exception $e) {} ?></td>


           <td><?php try {echo $donation->cat_rel->name;} catch(Exception $e) {} ?></td>
           <td><?php try {echo $donation->type->name;} catch(Exception $e) {} ?></td>
           <td >
               @can('Order-create')

               <a style="padding: 13px;" href="{{route('gettorderdonation', $donation->id)}}" class="kt-badge kt-badge--primary kt-badge--inline">{{trans('admin.order_edit')}}</a>
               
               @endcan

           @can('donation-edit')

               <a style="padding: 13px;" href="{{route('donation.edit', $donation->id)}}" class="kt-badge kt-badge--primary kt-badge--inline">{{trans('admin.edit')}}</a>
                     @endcan
               @can('Order-create')

               <a style="padding: 13px;" href="{{route('gettorderdonation', $donation->id)}}" class="kt-badge kt-badge--danger kt-badge--inline">{{trans('admin.order_delete')}}</a>
               @endcan

                   @can('donation-delete')

               <a style="padding: 13px;" href="{{route('getdelete',  $donation->id)}}" class="kt-badge kt-badge--danger kt-badge--inline">{{trans('admin.delete')}}</a>
                @endcan
                   <a style="padding: 13px;" href="{{route('printDon',  $donation->id)}}" class="kt-badge kt-badge--primary kt-badge--inline">{{trans('admin.print')}}</a>

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