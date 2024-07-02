<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    //* show tất cả danh mục
    public function list()
    {
        $category = Category::all();

        return view('admin.category.list', [
            'category' => $category
        ]);
    }

    //* show view tạo danh mục
    public function getCreate()
    {
        return view('admin.category.create');
    }

    //* xử lý tạo danh mục
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|min:3'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên đã tồn tại',
            'name.min' => 'Số kí tự phải từ 3 trở lên'
        ]);
        $request['sort_name'] = changeTitle($request['name']);

        Category::create($request->all());

        return redirect('admin/category/list')->with('thongbao', 'Thêm thành công');
    }

    //* show view chỉnh sửa danh mục
    public function getEdit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    //* xử lý chỉnh sửa danh mục
    public function postEdit(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            'name' => 'required|unique:categories|min:3'
        ], [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên tồn tại',
            'name.min' => 'Tên phải lớn hơn 3 kí tự'
        ]);
        $request['sort_name'] = changeTitle($request['name']);

        $category->update($request->all());

        return redirect('admin/category/list')->with('thongbao', 'Sửa thành công');
    }

    //* bật active
    public function postActive($id)
    {
        Category::where('id', $id)->update(['active' => 1]);

        return redirect('admin/category/list')->with('thongbao', 'Update thành công');
    }

    //* tắt active
    public function postNoActive($id)
    {
        Category::where('id', $id)->update(['active' => 0]);

        return redirect('admin/category/list')->with('thongbao', 'Update thành công');
    }

    //* xử lý xóa danh mục
    public function getDelete($id)
    {
        $check = count(News::where('category_id', $id)->get());
        if ($check == 0) {
            Category::destroy($id);
            return redirect('admin/category/list');
        } else {
            return redirect('admin/category/list')->with('thongbao', 'Không thể xóa vì tồn tài bài viết');
        }


    }
}
