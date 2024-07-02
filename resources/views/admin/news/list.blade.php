@extends('admin.layout.index')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-book bg-c-blue"></i>
                <div class="d-inline">
                    <h4>News</h4>
                    <span>List</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="feather icon-home"></i></a>
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
                        <div class="card-block"> 
                            <a href="admin/news/create" class="text-light">
                                <button class=" btn btn-primary float-right mb-3" >Add</button>
                            </a>
                            <div class="dt-responsive table-responsive">
                                {{-- <table class="table table-bordered nowrap"> --}}
                                <table class="table table-bordered nowrap">
                                    <thead>
                                        <tr align="center">
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Index</th>
                                            <th>Active</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as $value)
                                        <tr align="center">
                                            <td>{!! $value['id'] !!}</td>
                                            <td style="white-space:pre-wrap">{!! $value['title'] !!}</td>
                                            <td>{!! $value['subcategory']['category']['name'] !!}</td>
                                            <td>{!! $value['subcategory']['name'] !!}</td>
                                            <td>
                                                <div style="white-space:pre-wrap;text-align:left;text-align: center">{!! $value['TieuDe'] !!}</div>
                                                <img width="100px" src="upload/news/{!! $value['image'] !!}" alt="">
                                            </td>
                                            <td>
                                                @if ($value['type'] == 1)
                                                   {!! 'Text' !!} 
                                                @else
                                                   {!! 'Video' !!} 
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value['index'] == 1)
                                                    {!! 'Có' !!} 
                                                @else
                                                    {!! 'Không' !!} 
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value['active'] == 1)
                                                <a href="admin/news/block/{!! $value['id'] !!}">
                                                    <img style="width: 40px" src="upload/icon/accept.png" alt="">
                                                </a>
                                                @else
                                                <a href="admin/news/active/{!! $value['id'] !!}">
                                                    <img style="width: 40px" src="upload/icon/noaccept.png" alt="">
                                                </a>
                                                @endif
                                            </td>
                                            <td  class="center"><a class="btn btn-danger " href="admin/news/delete/{!! $value['id'] !!}"> Delete</a></td>
                                            <td class="center"><a class="btn btn-warning " href="admin/news/edit/{!! $value['id'] !!}">Edit</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection