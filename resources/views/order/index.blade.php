@extends('layouts.app')
@section('styles')

<link href="{{asset('admin')}}/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
{{trans('admin.catogres')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>{{trans('admin.title')}}</th>
                                                <th>{{trans('admin.content')}}</th>
                                                <th>{{trans('admin.creatby')}}</th>
                                                <th>{{trans('admin.ststus')}}</th>
                                                <th>{{trans('admin.donation_id')}}</th>

                                                <th>{{trans('admin.action')}}</th>>

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

                                                    <a href="{{route('donation.edit', $order->donation_id)}}" class="btn btn-info pull-right">تعديل التبرع</a>
                                                       @endcan
                                                        @can('user-delete')

                                                        <a href="{{route('getdelete', $order->donation_id)}}" class="btn btn-danger pull-right">حذف التبرع</a>

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
    <!-- /#page-wrapper -->
@endsection
@section('scripts')
    <script src="{{asset('admin')}}/js/jquery/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
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