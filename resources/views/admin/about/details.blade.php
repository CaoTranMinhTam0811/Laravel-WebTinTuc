@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-info bg-c-blue"></i>
                <div class="d-inline">
                    <h4>About</h4>
                    {{-- <span></span> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">S
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">About</a> </li>
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
                            <h5>Edit About</h5>
                        </div>
                        <div class="card-block">
                            @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $arr)
                                    {{$arr}}<br>
                                @endforeach

                            </div>
                            @endif
                            @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                            @endif
                            <form action="admin/about" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Logo</label>
                                    <div class="col-sm-11">
                                        @if($about != null)
                                        <img src="upload/logo/{{ $about['logo'] }}" width="300px" alt="">
                                        @endif
                                        <br>
                                        <input type="file" name="Image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Phone</label>
                                   
                                    <div class="col-sm-11">
                                     
                                        <input type="text" class="form-control" value="{{($about != null) ? $about->phone : ""}}" name="phone"
                                            placeholder="Nhập tiêu đề" >
                                        <span class="messages"></span>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Email</label>
                                    <div class="col-sm-11">
                                     
                                        <input type="text" class="form-control" value="{{($about != null) ? $about->email : ""}}" name="email"
                                            placeholder="Nhập tiêu đề" >
                                        <span class="messages"></span>
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Address</label>
                                    <div class="col-sm-11">
                                       
                                        <input type="text" class="form-control" value="{{($about != null) ? $about->address : ""}}" name="address"
                                            placeholder="Nhập tiêu đề" >
                                        <span class="messages"></span>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Link Page</label>
                                    <div class="col-sm-11">
                                     
                                        <input type="text" class="form-control" value="{{($about != null) ? $about->linkfb : ""}}" name="linkfb"
                                            placeholder="Nhập tiêu đề" >
                                        <span class="messages"></span>
                         
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Copyright</label>
                                    <div class="col-sm-11">
                                    
                                        <input type="text" class="form-control" value="{{($about != null) ? $about->copyright : ""}}" name="copyright"
                                            placeholder="Nhập tiêu đề" >
                                        <span class="messages"></span>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">link</label>
                                    <div class="col-sm-11">
                                       
                                        <input type="text" class="form-control" value="{{($about != null) ? $about->linkcopyright : ""}}" name="linkcopyright"
                                            placeholder="Nhập tiêu đề" >
                                        <span class="messages"></span>
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                    </div>
                                </div>
                            
                            </form>
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