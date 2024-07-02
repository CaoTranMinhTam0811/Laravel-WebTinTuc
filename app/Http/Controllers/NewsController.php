<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    //* show tất cả bài báo
    public function list()
    {
        $news = News::all();

        return view('admin.news.list', ['news' => $news]);
    }

    //* show view tạo bài báo
    public function getCreate()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();

        return view('admin.news.create', [
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }

    //* xử lý tạo bài báo
    public function postCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1',
            'summary' => 'required|min:1',
            'content' => 'required|min:1',
            'type' => 'required',
        ], [
            'subcategory_id.required' => 'Vui lòng chọn',
            'title.required' => 'Vui lòng nhập',
            'title.min' => 'Tên chứa ít nhất 1 kí tự',
            'summary.required' => 'Vui lòng nhập',
            'summary.min' => 'Chứa ít nhất 1 kí tự',
            'content.required' => 'Vui lòng nhập',
            'content.min' => 'Chứa ít nhất 1 kí tự'
        ]);

        $request['sort_title'] = changeTitle($request['title']);
        $request['user_id'] = Auth::user()['id'];

        if ($request['type'] == 0) {
            $request->validate([
                'link' => 'required'
            ]);
        }

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('news/create')->with('thongbao', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists('upload/news/' . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('upload/news', $img);
            $request['image'] = $img;

        } else {
            $request['image'] = '';
        }
        News::create($request->all());

        return redirect('admin/news/list')->with('thongbao', 'Bạn đã thêm thành công');
    }

    //* show view chỉnh sửa bài báo
    public function getEdit($id)
    {
        $category = Category::all();
        $subcategory = Subcategory::all();
        $news = News::find($id);

        return view('admin.news.edit', [
            'category' => $category,
            'subcategory' => $subcategory,
            'news' => $news
        ]);
    }

    //* xử lý sửa bài báo
    public function postEdit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:1',
            'summary' => 'required|min:1',
            'content' => 'required|min:1',
        ], [
            'subcategory_id.required' => 'Vui lòng chọn',
            'title.required' => 'Vui lòng nhập',
            'title.min' => 'Tên chứa ít nhất 1 kí tự',
            'summary.required' => 'Vui lòng nhập',
            'summary.min' => 'Chứa ít nhất 1 kí tự',
            'content.required' => 'Vui lòng nhập',
            'content.min' => 'Chứa ít nhất 1 kí tự'
        ]);

        $request['sort_title'] = changeTitle($request['title']);
        $request['user_id'] = Auth::user()['id'];

        if ($request['type'] == 0) {
            if ($request['link'] != '') {
                $request->validate([
                    'link' => 'required',
                ]);
            }
        }

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('news/create')->with('thông báo', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists('upload/news/' . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $news = News::find($id);
            $file->move('upload/news', $img);
            if ($news['image'] != '') {
                unlink('upload/news/' . $news['image']);
            }
            $request['image'] = $img;

        }
        News::find($id)->update($request->all());

        return redirect('admin/news/list')->with('thongbao', 'Bạn đã sửa thành công');
    }

    //* bật active
    public function postActive($id)
    {
        News::where('id', $id)->update(['active' => 1]);

        return redirect('admin/news/list')->with('thongbao', 'Update thành công');
    }

    //* tắt active
    public function postNoActive($id)
    {
        News::where('id', $id)->update(['active' => 0]);

        return redirect('admin/news/list')->with('thongbao', 'Update thành công');
    }

    //* xử lý xóa bài báo
    public function getDelete($id)
    {
        News::destroy($id);

        return redirect('admin/news/list');
    }
}
