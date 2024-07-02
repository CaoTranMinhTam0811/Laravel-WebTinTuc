@extends('layout.templateuser')
@section('content')
<div class="user__right">
    <h3 class="text-center">SỬA ẢNH ĐẠI DIỆN</h3>
    <label for="">Ảnh đại diện</label>
    <img src="upload/avatar/{!! Auth::user()->image !!}" alt="">

    <form action="editimg.html" method="POST" enctype="multipart/form-data">
        @csrf
        <br>
        <label for="">Chọn ảnh</label>
        <input type="file" name="Image" class="form-control">
        <button type="submit" class="btn mt-3 btn-danger">Cập nhật</button>
    </form>
</div>  
@endsection