<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    //* show tất cả banner
    public function list()
    {
        $banner = Banner::all();
        return view('admin.banner.list', [
            'banner' => $banner
        ]);
    }

    //* show view tạo banner
    public function getCreate()
    {
        return view('admin.banner.create');
    }

    //* xử lý tạo banner
    public function postCreate(Request $request)
    {
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('news/create')->with('thongbao', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists("upload/banner/" . $img)) {
                $img = Str::random(4) . "-" . $name;
            }
            $file->move('upload/banner', $img);
            $request['image'] = $img;
        } else {
            $request['image'] = '';
        }

        Banner::create($request->all());

        return redirect('admin/banner/list')->with('thongbao', 'Bạn đã thêm thành công');
    }

    //* show view chỉnh sửa banner
    public function getEdit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', ['banner' => $banner]);
    }

    //* xử lý chỉnh sửa banner
    public function postEdit(Request $request, $id)
    {
        $banner = Banner::find($id);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('news/create')->with('thongbao', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists('upload/banner/' . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('upload/banner', $img);
            if ($banner->Image != '') {
                unlink('upload/banner/' . $banner->image);
            }
            $request['image'] = $img;
        }

        $banner->update($request->all());

        return redirect('admin/banner/list')->with('thongbao', 'Bạn đã sửa thành công');
    }

    //* bật active
    public function postActive($id)
    {
        Banner::find($id)->update(['active' => 1]);

        return redirect('admin/banner/list')->with('thongbao', 'Update thành công');
    }

    //* tắt active
    public function postNoActive($id)
    {
        Banner::find($id)->update(['active' => 0]);
        return redirect('admin/banner/list')->with('thongbao', 'Update thành công');
    }

    //* xử lý xóa banner
    public function getDelete($id)
    {
        Banner::destroy($id);
        return redirect('admin/subcategory/list');
    }
}
