@if(Session::has('success'))
<div class="container">
<div class="alert alert-success" style="font-weight: 600;
font-size: 15px;">
    <button style="margin-left:5px"  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> {{ Session::get('success') }}
</div>
</div>
@endif