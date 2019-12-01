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
                <h4 class="page-title">Admins</h4>
            </div>

            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif

            @if ($errors->has('password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif

            @if ($errors->has('type'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('type') }}</strong>
                </div>
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="col-sm-12">
                    <div>
                        <!-- Responsive modal -->
                        <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#add"> <i class="fa fa-plus" aria-hidden="true"></i></button>

                        <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <form method="POST" action="{{route('admin.admins.store')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="icon" class="control-label">Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="icon" class="control-label">Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="icon" class="control-label">Password</label>
                                                        <input type="password" class="form-control" name="password" value="{{old('password')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="icon" class="control-label">Type</label>
                                                        <select class="form-control" name="type" required>
                                                            <option value="" disabled>...</option>
                                                            <option value="0">Adminstrator</option>
                                                            <option value="1">Editor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-default waves-effect waves-light form-control">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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
                                <th data-field="Logo" data-align="center">Name</th>
                                <th data-field="Email" data-align="center">Email</th>
                                <th data-field="Type" data-align="center">Type</th>
                                <th data-field="Action" data-align="center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($admins))
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->type == 0 ? 'Admin':'Editor'}}</td>

                                        
                                        <td class="actions">
                                            @if($admin->id == 1)
                                                <button type="button" class="btn btn-warning waves-effect">Can Not Edit Delete Or Edit</button>
                                            @else
                                                <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#{{$admin->id}}edit"> <i class="fa fa-edit" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$admin->id}}delete"> <i class="fa fa-times" aria-hidden="true"></i></button>
                                            @endif
                                        </td>
                                    </tr>

                                    <div id="{{$admin->id}}edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form method="POST" action="{{route('admin.admins.update',$admin->id)}}" enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="icon" class="control-label">Name</label>
                                                                    <input type="text" class="form-control" name="name" value="{{$admin->name}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="icon" class="control-label">Email</label>
                                                                    <input type="email" class="form-control" name="email" value="{{$admin->email}}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="icon" class="control-label">Password</label>
                                                                    <input type="password" class="form-control" name="password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="icon" class="control-label">Type</label>
                                                                    <select class="form-control" name="type" required>
                                                                        <option value="" disabled>...</option>
                                                                        <option {{$admin->type == 0 ? 'selected':''}} value="0">Adminstrator</option>
                                                                        <option {{$admin->type == 1 ? 'selected':''}} value="1">Editor</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-default waves-effect waves-light form-control">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div id="{{$admin->id}}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
                                                    <form action="{{action('Admin\AdminController@destroy', $admin['id'])}}" method="post">
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