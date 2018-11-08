@extends('layouts.app')
@section('styles')

<link href="{{asset('admin')}}/css/plugins/dataTables.bootstrap.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
{{trans('admin.delavery')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                @can('Delavary-create')

                                <div class="panel-heading">
                                    <a href="{{route('delavery.create')}}" class=" btn btn-info">{{trans('admin.addnewdonations')}}</a>
                                </div>
                                @endcan
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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

                                                    <a href="{{route('delavery.edit', $d->id)}}" class="btn btn-info pull-right">{{trans('admin.edit')}}</a>

                                                    @endcan
                                                        @can('Delavary-delete')

                                                        {!! Form::open(['route'=>["delavery.destroy" , $d->id ], 'onsubmit' => 'return ConfirmDelete()']) !!}

                                                    {!! method_field('DELETE') !!}

                                                    {!! Form::submit(trans('admin.delete'),['class'=>'btn btn-danger pull-right'])!!}


                                                    {!! Form::close() !!}
                                                        @endcan
                                                        <a href="{{route('printdelavey',  $d->id)}}" class="btn btn-primary pull-right">طباعه</a>

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
            var x = confirm("'هل انت متاكد من حذف هذا التبرع؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endsection