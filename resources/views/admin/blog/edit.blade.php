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
                <h4 class="page-title">Update Blog</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <form method="POST" action="{{route('admin.blog.update',$blog->id)}}" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>
                                    <input type="text" name="title" class="form-control" value="{{$blog->title}}" required>
                                    @if ($errors->has('title'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>
                                    <textarea id="textarea" name="description" class="form-control" maxlength="500" rows="2">{{$blog->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td>
                                    <textarea id="content" name="content" >{{$blog->content}}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>
                                    <input type="file" name="image" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload">
                                    @if ($errors->has('image'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tags</td>
                                <td>
                                    <select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Select ..." name="tags[]">
                                        @foreach ($tags as $tag)
                                            <option {{$tag->blog_tag($tag->id,$blog->id) == true ? 'selected' : ' '}} value="{{$tag->id}}">{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tags[]'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('tags[]') }}</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">Submit</button></td>
                            </tr>

                        </tbody>
                    </table>
                </form>
               
            </div>
        </div><!-- end col -->
    </div>
        
@endsection