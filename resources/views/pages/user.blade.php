@extends('layout.templateuser')
@section('content')
<div class="user__right">
    <h3 class="text-center">THÔNG TIN TÀI KHOẢN</h3>
    @if($user!=null)
        <div class="row user__right--content">
            <div class="col-5 col-xl-3 col-lg-3 col-md-5 col-sm-5 user__right--l">Username</div>
            <div class="col-7 col-xl-9 col-lg-9 col-md-7 col-sm-7 user__right--r">{{$user->username}}</div>
        </div>
        <div class="row user__right--content">
            <div class="col-5 col-xl-3 col-lg-3 col-md-5 col-sm-5 user__right--l">Họ tên</div>
            <div class="col-7 col-xl-9 col-lg-9 col-md-7 col-sm-7 user__ri user__right--r">{{$user->name}}</div>
        </div>
        <div class="row user__right--content">
            <div class="col-5 col-xl-3 col-lg-3 col-md-5 col-sm-5 user__right--l">Email</div>
            <div class="col-7 col-xl-9 col-lg-9 col-md-7 col-sm-7 user__ri user__right--r">{{$user->email}}</div>
        </div>
        
        <div class="row user__right--content">
            <div class="col-5 col-xl-3 col-lg-3 col-md-5 col-sm-5 user__right--l">Ngày tham gia</div>
            <div class="col-7 col-xl-9 col-lg-9 col-md-7 col-sm-7 user__ri user__right--r">{{ ($user['created_at'] != null) ? $user['created_at']->format('d/m/Y H:i') : '' }}</div>
        </div>
        <!-- <div class="row user__right--content">
            <button type="button" class="btn m-auto btn-primary">Đổi thông tin</button>
        </div> -->
     @endif   
</div>
@endsection