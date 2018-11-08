@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div >

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">مرحبا بك</div>

                <div class="card-body">

                    <h2> مرحبا بك فى نظام ادره الجمعيات الخيريه</h2>

{{--
                        <Message></Message>
id="app"
--}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
{{--

@section('scripts')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
--}}
