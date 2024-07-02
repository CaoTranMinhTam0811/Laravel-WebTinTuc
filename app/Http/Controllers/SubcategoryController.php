<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;

class SubcategoryController extends Controller
{
    //* show tất cả danh mục con
    public function list()
    {
        $subcategory = Subcategory::all();

        return view('admin.subcategory.list', [
            'subcategory' => $subcategory
        ]);
    }

    //* show view tạo danh mục con
    public function getCreate()
    {
        $category = Category::all();

        return view('admin.subcategory.create', [
            'category' => $category
        ]);
    }

    //* xử lý tạo danh mục con
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories|min:1',
            'category_id' => 'required'
        ], [
            'category_id.required' => 'Vui lòng chọn Category',
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Name đã tồn tại',
            'name.min' => 'Name phải chứa ít nhất 1 kí tự'
        ]);
        $request['sort_name'] = changeTitle($request['name']);

        Subcategory::create($request->all());

        return redirect('admin/subcategory/list')->with('thongbao', 'Thêm thành công');
    }

    //* show view chỉnh sửa danh mục
    public function getEdit($id)
    {
        $subcategory = Subcategory::find($id);
        $category = Category::all();
        return view('admin.subcategory.edit', [
            'subcategory' => $subcategory,
            'category' => $category
        ]);
    }

    //* xử lý chỉnh sửa danh mục
    public function postEdit(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $request->validate([
            'name' => 'required|min:1',
            'category_id' => 'required'
        ], [
            'category_id.required' => 'Vui lòng chọn Category',
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Name phải chứa ít nhất 1 kí tự'
        ]);
        $request['sort_name'] = changeTitle($request['name']);

        $subcategory->update($request->all());

        return redirect('admin/subcategory/edit/' . $id)->with('thongbao', 'Sửa thành công');
    }

    //* bật active
    public function postActive($id)
    {
        Subcategory::where('id', $id)->update(['active' => 1]);

        return redirect('admin/subcategory/list')->with('thongbao', 'Update thành công');
    }

    //* tắt active
    public function postNoActive($id)
    {
        Subcategory::where('id', $id)->update(['active' => 0]);

        return redirect('admin/subcategory/list')->with('thongbao', 'Update thành công');
    }

    public function getDelete($id)
    {
        $check = count(News::where('subcategory_id', $id)->get());
        if ($check == 0) {
            Subcategory::destroy($id);
            return redirect('admin/subcategory/list');
        } else {
            return redirect('admin/subcategory/list')->with('thongbao', 'Không thể xóa vì tồn tại bài viết');
        }

    }
}
