@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')


<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                            {{trans('admin.new_user')}}
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

            {!! Form::open(['route'=>['user.store'],'method'=>'POST']) !!}

            <div class="form-group">
                <label>{{trans('admin.username')}}</label>
                <input type="text" name="name" class="form-control" placeholder="{{trans('admin.username')}}" required>
            </div>
            <div class="form-group">
                <label>{{trans('admin.email')}}</label>
                <input type="email" name="email" class="form-control" placeholder="{{trans('admin.email')}}" required>
            </div>
            <div class="form-group">
                <label>{{trans('admin.password')}}</label>
                <input type="password" name="password" class="form-control" placeholder="{{trans('admin.password')}}" required>
            </div>
            <div class="form-group">
                <label>{{trans('admin.address')}}</label>
                <input type="text" name="address" class="form-control" placeholder="{{trans('admin.address')}}" required>
            </div>
            <div class="form-group">
                <label>{{trans('admin.pesonal_id')}}</label>
                <input type="text" name="pesonal_id" class="form-control" placeholder="{{trans('admin.pesonal_id')}}" required>
            </div>
            <div class="form-group">
                <label>{{trans('admin.mobile_1')}}</label>
                <input type="text" name="mobile_1" class="form-control" placeholder="{{trans('admin.mobile_1')}}" required>
            </div>
            <div class="form-group">
                <label>{{trans('admin.mobile_2')}}</label>
                <input type="text" name="mobile_2" class="form-control" placeholder="{{trans('admin.mobile_2')}}" >
            </div>


            <div class="form-group">
                <label>{{trans('admin.date')}}</label>
                <input type="text" name="pirthdata" class="form-control" id="datepicker" placeholder="{{trans('admin.date')}}" required>
            </div>
                <div class="form-group">

                    <label class="col-md-12">{{ trans('admin.roles') }}</label>

                    <select class=" form-control select2" multiple="multiple" data-placeholder="Select a State"
                            name="roles[]" style="width: 100%;" required>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}} </option>
                        @endforeach
                    </select>
                </div>


            <div class="form-group">
                <label class="control-label" for="office_id">{{trans('admin.digree')}} </label>
                <div class="controls">
                    <select class=" chosen form-control "data-placeholder="Select a State"
                            name="level_id" style="width: 99%;" required >
                        @foreach($studyLevel as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="office_id">{{trans('admin.country')}} </label>
                <div class="controls">
                    <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                            name="country_id" style="width: 99%;" required data-region-id="one" id="countries"  >
                        <option value="" >-------</option>

                    @foreach($country as $c)
                            <option value="{{$c->id}}">{{$c->name_ar}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class=" control-label" for="office_id">{{trans('admin.city')}} </label>
                <div class="controls">
                    <select class="  form-control "data-placeholder="Select a State"
                            name="city_id" style="width: 99%;" required  id="one">
                        <option  value="">-------</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label" for="office_id">{{trans('admin.office_id')}} </label>
                <div class="controls">
                    <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                            name="office_id" style="width: 99%;" required>
                        @foreach($offices as $office)
                            <option value="{{$office->id}}">{{$office->city->name_ar}} --{{$office->address}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-actions" style="text-align:center">
            <button type="submit" class="btn btn-brand btn-elevate btn-pill btn-sm" style="padding:10px 40px">{{trans('admin.add')}}</button>
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
                    {{trans('admin.new_user')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- /.table-responsive -->
                                    <div class="row">

                                        {!! Form::open(['route'=>['user.store'],'method'=>'POST']) !!}

                                        <div class="form-group">
                                            <label>{{trans('admin.username')}}</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.email')}}</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.password')}}</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.address')}}</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.pesonal_id')}}</label>
                                            <input type="text" name="pesonal_id" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.mobile_1')}}</label>
                                            <input type="text" name="mobile_1" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.mobile_2')}}</label>
                                            <input type="text" name="mobile_2" class="form-control" placeholder="Enter text" >
                                        </div>


                                        <div class="form-group">
                                            <label>{{trans('admin.date')}}</label>
                                            <input type="text" name="pirthdata" class="form-control" id="datepicker" required>
                                        </div>
                                            <div class="form-group">

                                                <label class="col-md-12">{{ trans('admin.roles') }}</label>

                                                <select class=" form-control select2" multiple="multiple" data-placeholder="Select a State"
                                                        name="roles[]" style="width: 100%;" required>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.digree')}} </label>
                                            <div class="controls">
                                                <select class=" chosen form-control "data-placeholder="Select a State"
                                                        name="level_id" style="width: 99%;" required >
                                                    @foreach($studyLevel as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.country')}} </label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                                        name="country_id" style="width: 99%;" required data-region-id="one" id="countries"  >
                                                    <option value="" >-------</option>

                                                @foreach($country as $c)
                                                        <option value="{{$c->id}}">{{$c->name_ar}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class=" control-label" for="office_id">{{trans('admin.city')}} </label>
                                            <div class="controls">
                                                <select class="  form-control "data-placeholder="Select a State"
                                                        name="city_id" style="width: 99%;" required  id="one">
                                                    <option  value="">-------</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.office_id')}} </label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                                        name="office_id" style="width: 99%;" required>
                                                    @foreach($offices as $office)
                                                        <option value="{{$office->id}}">{{$office->city->name_ar}} --{{$office->address}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
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
    </div> --}}

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat : 'mm/dd/yy',
                changeMonth : true,
                changeYear : true,
                yearRange: '-100y:c+nn',
                maxDate: '-1d'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection