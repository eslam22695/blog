@extends('layouts.admin')

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            <div class="main-title-00">
                <h4 class="page-title">Show Blog</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>
                                {{$blog->title}}
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                {{$blog->description}}
                            </td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>
                                {!!$blog->content!!}
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <img src="{{asset('admin_assets/images/blog/'.$blog->image)}}" width="100" height="100">
                            </td>
                        </tr>
                        <tr>
                            <td>Tags</td>
                            <td>
                                @foreach ($tags as $tag)
                                    {{'('.$tag->tag->title.') '}} 
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
               
            </div>
        </div><!-- end col -->
    </div>
        
@endsection