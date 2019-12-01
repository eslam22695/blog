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
                <h4 class="page-title">Blog</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="col-sm-12">
                    <div>
                        <!-- Responsive modal -->
                        <a href="{{route('admin.blog.create')}}" class="btn btn-default waves-effect"> <i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table  data-toggle="table"
                            data-search="true"
                            data-show-columns="true"
                            data-sort-name="id"
                            data-page-list="[8, 16, 32]"
                            data-page-size="8"
                            data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                                    
                        <thead>
                            <tr>
                                <th data-field="Title" data-align="center">Title</th>
                                <th data-field="Editor" data-align="center">Editor</th>
                                <th data-field="Created At" data-align="center">Created At</th>
                                <th data-field="Action" data-align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($blogs))
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->editor != null ? $blog->editor->name : ''}}</td>
                                        <td>{{$blog->created_at}}</td>

                                        <td class="actions">
                                            <a href="{{route('admin.blog.show',$blog->id)}}" class="btn btn-inverse waves-effect"> <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('admin.blog.edit',$blog->id)}}" class="btn btn-success waves-effect"> <i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$blog->id}}delete"> <i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>

                                    <div id="{{$blog->id}}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div>
                                                    <h4 style="text-align:center;">DELETE Confirm</h4>
                                                </div>
                                                <div class="modal-footer" style="text-align:center">
                                                    <form action="{{action('Admin\BlogController@destroy', $blog->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
    
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div><!-- end col -->
    </div>
        
@endsection