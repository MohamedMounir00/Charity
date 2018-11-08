@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>التحكم فى المهمات</h2>
            </div>
            @can('role-create')

            <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> اضافه مهام جديه</a>
            </div>
                @endcan
        </div>
    </div>





    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @if($role->name !='admin')

                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                    @can('role-edit')

                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                    @endcan
                    @can('role-delete')
                            @if($role->name !='user')

                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline' , 'onsubmit' => 'return ConfirmDelete()']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                            @endif

                        @endcan
                        @endif

                </td>
            </tr>
        @endforeach
    </table>


    {!! $roles->render() !!}


@endsection

@section('scripts')
>

    <script>

        function ConfirmDelete()
        {
            var x = confirm("'هل انت متاكد من حذف هذه المهام؟'");
            if (x)
                return true;
            else
                return false;
        }

    </script>


@endsection