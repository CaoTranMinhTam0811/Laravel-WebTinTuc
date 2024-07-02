@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h4>User</h4>
                    <span>Create</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">User</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Edit user</h5>
                        </div>
                        <div class="card-block">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                {{ $arr }}<br>
                                @endforeach

                            </div>
                            @endif
                            @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                            @endif
                        <form action="admin/user/edit/{!! $user['id'] !!}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{!! $user['name'] !!}" placeholder="Enter Fullname" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" value="{!! $user['email'] !!}"  name="email" placeholder="Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" type="text" name="username" value="{!! $user['username'] !!}"  placeholder="Enter Username" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="checkChangpassword" name="changepassword">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="password form-control" name="password" disabled placeholder="Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại password</label>
                                <input type="password" class="password form-control" name="passwordagain" disabled placeholder="Enter RePassword" />
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <br>
                                <label class="radio-inline">
                                    <input name="role" value="1"
                                    @if ($user['role'] == 1)
                                    {!! 'checked' !!}
                                @endif  type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="2"
                                    @if ($user['role'] == 2)
                                    {!! 'checked' !!}
                                @endif
                                   type="radio">Nhân viên
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="0" 
                                    @if ($user['role'] == 0)
                                    {!! 'checked' !!}
                                @endif
                                    type="radio">Thường
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Active</label>
                                <br>
                                <label class="radio-inline">
                                    <input name="active" value="1" 
                                    @if ($user['active'] == 1)
                                        {!! 'checked' !!}
                                    @endif
                                    type="radio">Active
                                </label>
                    
                                <label class="radio-inline">
                                    <input name="active" value="0"
                                    @if ($user['active'] == 0)
                                    {!! 'checked' !!}
                                @endif
                                    type="radio">Lock
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#checkChangpassword').change(function(){
            if($(this).is(":checked"))
            {
                $('.password').removeAttr('disabled');
            }
            else 
                {
                 $('.password').attr('disabled','');
                 }
            });
        });
    </script>
@endsection