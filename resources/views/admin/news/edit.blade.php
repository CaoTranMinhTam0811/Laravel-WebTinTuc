@extends('admin.layout.index')
@section('content') 
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-book bg-c-blue"></i>
                <div class="d-inline">
                    <h4>News</h4>
                    <span>Create</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href=""><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">News</a> </li>
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
                            <h5>Edit news</h5>
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
                            <form action="admin/news/edit/{!! $news['id'] !!}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Category</label>
                                    <div class="col-sm-11">
                                        <select name="category_id" class="form-control form-control-primary" id="TheLoai">
                                            @foreach ($category as $value)
                        
                                            <option
                                            @if ($news['subcategory']['category']['id'] == $value['id'])
                                                {!! 'selected' !!}
                                            @endif
                                            value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Sub Category</label>
                                    <div class="col-sm-11">
                                        <select name="subcategory_id" class="form-control form-control-primary" id="LoaiTin">
                                            @foreach ($subcategory as $value)
                                            <option
                                            @if ($value['id'] == $news['category_id'])
                                                {!! 'selected' !!}
                                            @endif
                                            value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Title</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" value="{!! $news['title'] !!}" name="title"
                                            placeholder="Nhập tiêu đề" required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Image</label>
                                    <div class="col-sm-11">
                                        <img src="upload/news/{!! $news['image'] !!}" width="300px" alt="">
                                <br>
                                        <input type="file" name="Image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Type</label>
                                    <div class="col-sm-11">
                                        <select id="checkVideo" name="type" class="form-control form-control-primary">
                                            <option value="1"
                                            @if ($news['type'] == 1)
                                            {!! 'selected' !!}     
                                            @endif 
                                            >Text</option>
                                            <option
                                            @if ($news['type'] == 0)
                                            {!! 'selected' !!}    
                                            @endif 
                                            value="0">Video</option>
                                          
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Link</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control linkvideo" name="link"
                                            placeholder="Nhập link" value="{!! $news['link'] !!}"  disabled>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Summary</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" value="{!! $news['summary'] !!}"" name="summary"
                                            placeholder="Nhập tóm tắt" required>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Content</label>
                                    <div class="col-sm-11">
                                        <textarea name="content" id="editor">
                                            {!! $news['content'] !!}
                                        </textarea>
                                    {{-- <textarea class="form-control" name="content" rows="5" id="editor1">{!! $news['content'] !!}</textarea> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Index</label>
                                    <div class="col-sm-11 mt-2">
                                        <label class="radio-inline">
                                            <input
                                            @if($news['index'] == 1)
                                                {!! 'checked' !!}
                                            @endif
                                            name="index" value="1"  type="radio">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                            @if($news['index'] == 0)
                                            {!! 'checked' !!}
                                            @endif
                                            name="index" value="0"  type="radio">NO
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-1 col-form-label">Active</label>
                                    <div class="col-sm-11 mt-2">
                                        <label class="radio-inline">
                                            <input
                                            @if($news['active'] == 1)
                                                {!! 'checked' !!}
                                            @endif
                                            name="active" value="1"  type="radio">YES
                                        </label>
                                        <label class="radio-inline">
                                            <input
                                            @if($news['active'] == 0)
                                                {!! 'checked' !!}
                                            @endif
                                            name="active" value="0"  type="radio">NO
                                        </label>
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
                    <table class="table table-striped table-bordered table-hover" id="">
                        <thead>
                            <h4>Comment</h4>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Trạng thái</th>
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news['Comment'] as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $value['id'] !!}</td>
                                <td>{!! $value['users']['name'] !!}</td>
                                <td>{!! $value['content'] !!}</td>
                                <td>{!! $value['created_at'] !!}</td> 
                                <td>
                                    @if ($value['active'] == 1)
                                    <a href="admin/comment/block/{!! $value['id'] !!}">
                                      <img style="width: 40px" src="upload/icon/accept.png" alt="">
                                    </a>
                                    @else
                                    <a href="admin/comment/active/{!! $value['id'] !!}">
                                        <img style="width: 40px" src="upload/icon/noaccept.png" alt="">
                                    </a>
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="btn btn-outline-danger" href="admin/comment/delete/{!! $value['id'] !!}/{!! $news['id'] !!}">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>    
    $(document).ready(function(){
        $("#TheLoai").change(function(){
            var category_id = $(this).val();
            $.get("ajax/Subcategory/"+category_id,function(data){
                $("#LoaiTin").html(data);
            });
        });
        if($('#checkVideo option:selected').val()==0){
            $('.linkvideo').removeAttr('disabled');
        }
        $('#checkVideo').change(function(){
        if($('#checkVideo option:selected').val()==0)
        {
            $('.linkvideo').removeAttr('disabled');
        }
        else 
            {
                $('.linkvideo').attr('disabled','');
                }
        });
    });
</script>
@endsection
