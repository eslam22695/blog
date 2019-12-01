@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    You Can't Access This Page
                    <a href="{{url('/admin/home')}}">Back To Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection