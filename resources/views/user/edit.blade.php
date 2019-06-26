@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection
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
                    {{trans('admin.edit_user')}}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- /.table-responsive -->
                                    <div class="row">

                                        {!! Form::open(['route'=>['user.update', $user->id],'method'=>'put']) !!}

                                        <div class="form-group">
                                            <label>{{trans('admin.username')}}</label>
                                            <input type="text" name="name" value="{{$user->name}}"  class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.email')}}</label>
                                            <input type="email" name="email"  value="{{$user->email}}"  class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.password')}}</label>
                                            <input type="password" name="password"   class="form-control" placeholder="Enter text" >
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.address')}}</label>
                                            <input type="text" name="address" value="{{$user->address}}"  class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.pesonal_id')}}</label>
                                            <input type="text" name="pesonal_id" value="{{$user->pesonal_id}}"  class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.mobile_1')}}</label>
                                            <input type="text" name="mobile_1" value="{{$user->mobile_1}}" class="form-control" placeholder="Enter text" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{trans('admin.mobile_2')}}</label>
                                            <input type="text" name="mobile_2" value="{{$user->mobile_2}}"  class="form-control" placeholder="Enter text" >
                                        </div>


                                        <div class="form-group">
                                            <label>تاريخ الميلاد</label>
                                            <input type="text" name="pirthdata" value="{{$user->pirthdata}}" class="form-control" id="datepicker" required>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.roles')}} </label>
                                            <div class="controls">

                                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                                    name="roles[]" style="width: 100%;" required>
                                                @foreach($roles as $cat)
                                                    <option value="{{$cat->id}}"

                                                            @foreach($user->roles as $postCat)
                                                            @if($postCat->id == $cat->id)
                                                            selected
                                                            @endif
                                                            @endforeach

                                                    > {{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.digree')}} </label>
                                            <div class="controls">
                                                <select class="form-control "data-placeholder="Select a State"
                                                        name="level_id" style="width: 100%;" required >
                                                    @foreach($studyLevel as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                        <option value="{{$c->id}}" {{($user->level_id == $c->id) ? 'selected' : ''}}>{{$c->name}} </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.country')}} </label>
                                            <div class="controls">
                                                <select   class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                                        name="country_id" style="width: 100%;" required data-region-id="one" id="countries">
                                                    @foreach($country as $c)
                                                        <option value="{{$c->id}}" {{($user->country_id == $c->id) ? 'selected' : ''}}>{{$c->name_ar}} </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.city')}} </label>
                                            <div class="controls">
                                                <select class="form-control "data-placeholder="Select a State"
                                                        name="city_id" style="width: 100%;" required  id="one">
                                                    <option value="{{$user->city_id}}">{{$user->city->name_ar}}</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="office_id">{{trans('admin.office_id')}} </label>
                                            <div class="controls">
                                                <select class=" selectpicker form-control  " data-live-search="true" data-placeholder="Select a State"
                                                        name="office_id" style="width: 100%;" required>
                                                    @foreach($offices as $office)
                                                        <option value="{{$office->id}}" {{($user->office_id == $office->id) ? 'selected' : ''}}> {{$office->city->name_ar}} --{{$office->address}} </option>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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
    <script type="text/javascript">
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    </script>
@endsection