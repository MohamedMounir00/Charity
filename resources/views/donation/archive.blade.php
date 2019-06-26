@extends('layouts.app')
@section('styles')

    <link href="{{asset('admin')}}/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('admin.archives')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>{{trans('admin.donationname')}}</th>
                                                <th>{{trans('admin.price')}}</th>
                                                <th>{{trans('admin.payment_method')}}</th>
                                                <th>{{trans('admin.creatby')}}</th>
                                                <th>{{trans('admin.date_add')}}</th>
                                                <th>{{trans('admin.date_delete')}}</th>
                                                <th>{{trans('admin.office_id')}}</th>
                                                <th>{{trans('admin.cat_id')}}</th>
                                                <th>{{trans('admin.proccess_type')}}</th>



                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($archive as $donation)
                                                <tr>
                                                    <td>{{$donation->name}}</td>
                                                    <td>{{$donation->price}}.EGP</td>
                                                    <td><?php try { echo $donation->payment_method;} catch(Exception $e) {} ?></td>
                                                    <td><?php try {echo  $donation->user_rel->name;} catch(Exception $e) {}  ?></td>
                                                    <td>{{date('Y-m-d', strtotime($donation->created_at))}}</td>
                                                    <td>{{date('Y-m-d', strtotime($donation->date))}}</td>
                                                    <td><?php try { echo $donation->offices_rel->city->name_ar;} catch(Exception $e) {} ?></td>


                                                    <td><?php try {echo $donation->cat_rel->name;} catch(Exception $e) {} ?></td>
                                                    <td>{{$donation->proccess_type}}</td>


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
    <!-- /#page-wrapper -->
@endsection
@section('scripts')
    <script src="{{asset('admin')}}/js/jquery/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap/dataTables.bootstrap.min.js"></script>

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