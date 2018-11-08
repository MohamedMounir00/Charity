@extends('layouts.app')

@section('content')
    <!-- /#page-wrapper -->

    <div class="row">
        @if(isset($errors) > 0)
            @if(Session::has('errors'))

                <div class="alert alert-danger " >
                    <ul >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{trans('admin.newcatogres')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- /.table-responsive -->
                                    <div class="row">

                                        {!! Form::open(['route'=>['beneficiary.store'],'method'=>'POST']) !!}

                                        <div class="form-group">
                                            <label>{{trans('admin.username')}}</label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.personal_id')}}</label>
                                            <input type="number" name="personal_id" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.sons')}}</label>
                                            <input type="number" name="sons" class="form-control" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.Wives')}}</label>
                                            <input type="number" name="Wives" class="form-control" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.adderss')}}</label>
                                            <input type="text" name="adderss" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="payment_method">{{trans('admin.typePoor')}} </label>
                                            <div class="controls">
                                                <select name="typePoor" class="form-control">
                                                    <option value="1">عادى</option>
                                                    <option value="2">متوسط</option>
                                                    <option value="3">شديد الحاجه</option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.desc')}}</label>
                                            <textarea name="desc" class="form-control"> </textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{trans('admin.add')}}</button>

                                        {!! Form::close() !!}

                                    </div>
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

@endsection