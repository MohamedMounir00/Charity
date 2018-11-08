@extends('layouts.app')
@section('styles')

<link href="{{asset('admin')}}/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
{{trans('admin.typeDonation')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                @can('TypeDonation-create')

                                <div class="panel-heading">
                                    <a href="{{route('typeDonation.create')}}" class=" btn btn-info">{{trans('admin.typecreate')}}</a>
                                </div>
                            @endcan

                            <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>{{trans('admin.type')}}</th>


                                                <th>{{trans('admin.action')}}</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($type as $t)
                                            <tr>
                                                <td>{{$t->name}}</td>

                                                <td >
                                                    @can('TypeDonation-edit')

                                                    <a href="{{route('typeDonation.edit', $t->id)}}" class="btn btn-info pull-right">{{trans('admin.edit')}}</a>
                                                    @endcan

                                                        @can('TypeDonation-delete')

                                                    {!! Form::open(['route'=>["typeDonation.destroy" , $t->id ], 'onsubmit' => 'return ConfirmDelete()']) !!}

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