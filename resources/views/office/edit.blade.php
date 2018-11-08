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

@endsection