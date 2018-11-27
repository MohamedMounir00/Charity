@extends('layouts.app')

@section('content')
    <!-- /#page-wrapper -->

    <div class="row">
        @if(isset($errors) > 0)
            @if(Session::has('errors'))

                <div class="alert alert-danger ">
                    <ul>
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

                                        {!! Form::open(['route'=>['delavery.update', $delavary->id],'method'=>'put']) !!}

                                        <div class="form-group">
                                            <label>السعر او الكميه</label>
                                            <input type="text" name="price" class="form-control"
                                                   placeholder="Enter text" value="{{$delavary->price}}" required>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="payment_method">طريقه الدفع</label>
                                            <div class="controls">
                                                <select name="type" class="form-control">
                                                    <option value="cash" {{$delavary->cash == 'cash' ? 'selected' : ''}}>{{ trans('admin.cash') }}</option>

                                                    <option value="goods" {{$delavary->goods == 'goods' ? 'selected' : ''}}>{{ trans('admin.goods') }}</option>

                                                </select>

                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label" for="office_id"> نواع التبرع</label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true"
                                                        data-placeholder="Select a State"
                                                        name="type_id" style="width: 100%;" required>
                                                    @foreach($type as $t)
                                                        <option value="{{$t->id}}" {{($delavary->type_id == $t->id) ? 'selected' : ''}}>{{$t->name}} </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="office_id">اسم المحتاج </label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true"
                                                        data-placeholder="Select a State"
                                                        name="be_id" style="width: 100%;" required>
                                                    @foreach($Beneficiary as $b)
                                                        <option value="{{$b->id}}" {{($delavary->be_id == $b->id) ? 'selected' : ''}}>{{$b->username}} </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{trans('admin.edit')}}</button>

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