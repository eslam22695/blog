@extends('layouts.index')

@section('content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Error</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Error</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
     <div class="page-head area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="error-page">
                            <!-- map area -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="error-main-text text-center">
                                    <h1 class="high-text">404</h1>
                                    <h2 class="error-easy-text">Page Not Found</h2>
                                    <h3 class="error-bot">Oops, the page you are looking for does not exit.</h3>
                                    <a  class="error-btn" href="{{url('/')}}">Back Homepage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection