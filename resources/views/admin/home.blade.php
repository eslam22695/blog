@extends('layouts.admin')    

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            <div class="main-title-00">
                <h4 class="page-title">Home</h4>
                <p class="text-muted page-title-alt">Welcome To Momentum</p>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-info pull-left">
                    <i class="md-folder text-info"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$blog}}</b></h3>
                    <p class="text-muted mb-0">Total Blogs</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-pink pull-left">
                    <i class="md-account-circle text-pink"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$tag}}</b></h3>
                    <p class="text-muted mb-0">Total Tags</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-purple pull-left">
                    <i class="md-assignment text-purple"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$comment}}</b></h3>
                    <p class="text-muted mb-0">Total Comments</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-success pull-left">
                    <i class="md-account-child text-success"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{$user}}</b></h3>
                    <p class="text-muted mb-0">Total Users</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

<section class="">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <form style=" background: #fff;  padding: 30px;  box-shadow: -2px 7px 13px #e8e8e8dd; " action="{{ route('admin.home') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label > Change Email </label>
                        <input type="email" name="email" class="form-control" placeholder=" Enter Email  ">
                    </div>
                    <div class="form-group">
                        <label > Change Password </label>
                        <input type="password" name="password" class="form-control" placeholder=" Enter Password ">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin: auto; display: table; padding: 8px 20px;"> Update </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
