@extends('layouts.app')

@section('content')

<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('admin.edit_office')}} 
                    </h3>
                </div>
            </div>

            <div class="kt-portlet__body">

                    @if(isset($errors) > 0)
                    @if(Session::has('errors'))
        
                        <div class="alert alert-danger " >
                            <ul  class="msgError">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endif

                {!! Form::open(['route'=>['office.update', $offce->id],'method'=>'put']) !!}

                <div class="form-group">
                    <label>{{trans('admin.address')}}</label>
                    <input type="text" name="address" value="{{$offce->address}}" class="form-control" placeholder="Enter text" required>
                </div>

                <div class="form-group">
                    <label class="control-label" for="office_id">{{trans('admin.country')}} </label>
                    <div class="controls">
                        <select class="form-control "data-placeholder="Select a State"
                                name="country_id" style="width: 100%;" required data-region-id="one" id="countries">
                            @foreach($country as $c)
                                <option value="{{$c->id}}" {{($offce->country_id == $c->id) ? 'selected' : ''}}>{{$c->name_ar}} </option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="office_id">{{trans('admin.city')}} </label>
                    <div class="controls">
                        <select class="form-control "data-placeholder="Select a State"
                                name="city_id" style="width: 100%;" required  id="one">
                            <option value="{{$offce->city_id}}">{{$offce->city->name_ar}}</option>

                        </select>
                    </div>
                </div>

                <div class="form-actions" style="text-align:center">
                <button type="submit" class="btn btn-brand btn-elevate btn-pill btn-sm" style="padding:10px 40px">{{trans('admin.edit')}}</button>
            </div>

                {!! Form::close() !!}
            </div>
</div>

































{{-- 



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
                    {{trans('admin.edit_office')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- /.table-responsive -->
                                    <div class="row">

                                        {!! Form::open(['route'=>['office.update', $offce->id],'method'=>'put']) !!}

                                        <div class="form-group">
                                            <label>{{trans('admin.address')}}</label>
                                            <input type="text" name="address" value="{{$offce->address}}" class="form-control" placeholder="Enter text" required>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.country')}} </label>
                                            <div class="controls">
                                                <select class="form-control "data-placeholder="Select a State"
                                                        name="country_id" style="width: 100%;" required data-region-id="one" id="countries">
                                                    @foreach($country as $c)
                                                        <option value="{{$c->id}}" {{($offce->country_id == $c->id) ? 'selected' : ''}}>{{$c->name_ar}} </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.city')}} </label>
                                            <div class="controls">
                                                <select class="form-control "data-placeholder="Select a State"
                                                        name="city_id" style="width: 100%;" required  id="one">
                                                    <option value="{{$offce->city_id}}">{{$offce->city->name_ar}}</option>

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
    </div> --}}

@endsection


@section('scripts')
    <script type="application/javascript">
        function getCities(country) {
            $.ajax({
                url: "{{route('get_cities')}}",
                data: {"_token": "{{ csrf_token() }}",'country_id' : country},
                type:"POST",
                success: function(result){
                    var $dropdown = $("#one");
                    $dropdown.empty()
                    $.each(result, function() {
                        $dropdown.append($("<option />").val(this.id).text(this.name));
                    });
                }});
        }

        $('#countries').on('change', function() {
            getCities(this.value)
        });
    </script>

@endsection