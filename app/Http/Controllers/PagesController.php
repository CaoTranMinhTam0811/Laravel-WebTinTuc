<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\About;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    //* khởi tạo dữ liệu ban đầu
    function __construct()
    {
        $category = Category::all();
        $banner = Banner::all();
        $subcategory = Subcategory::all();
        $about = About::find(1);
        $baivietmoinhat = News::get()->where('type', 1)->where('active', 1)->sortByDesc('created_at')->take(4);
        $baivietnoibat = News::get()->where('type', 1)->where('index', 1)->where('active', 1)->sortByDesc('created_at')->take(4);
        view()->share('baivietnoibat', $baivietnoibat);
        view()->share('baivietmoinhat', $baivietmoinhat);
        view()->share('banner', $banner);
        view()->share('category', $category);
        view()->share('subcategory', $subcategory);
        view()->share('about', $about);
    }

    //* trang chủ
    public function trangchu()
    {
        $videomoinhat = News::get()->where('type', 0)->where('active', 1)->sortByDesc('created_at')->take(4);
        $videonoibat = News::get()->where('type', 0)->where('index', 1)->where('active', 1)->sortByDesc('created_at')->take(4);

        $name = 'Trang chủ';

        return view('pages.trangchu', [
            'name' => $name,
            'videomoinhat' => $videomoinhat,
            'videonoibat' => $videonoibat
        ]);
    }

    //* trang blog
    public function blog()
    {
        $news = News::where('type', 1)->where('active', 1)->orderby('created_at', 'DESC')->simplePaginate(5);
        $name = 'Blog';
        return view('pages.blog', [
            'name' => $name,
            'news' => $news
        ]);
    }

    //* trang video
    public function video()
    {
        $news = News::where('type', 0)->where('active', 1)->orderby('created_at', 'DESC')->paginate(5);
        $name = 'Video';
        return view('pages.blog', [
            'name' => $name,
            'news' => $news
        ]);
    }

    //* trang chi tiết
    public function detailsNews($id)
    {
        $news = News::find($id);
        if ($news['type'] == 1) {
            $name = 'Tin tức';
        } else {
            $name = 'Video';
        }
        // $_SESSION['view'] ='news/'.$id.'_'.$news->Sort_Title;

        $title = $news['title'];

        $tinlienquan = News::where('subcategory_id', $news['subcategory_id'])->take(4)->get();
        return view('pages.details', [
            'news' => $news,
            'name' => $name,
            'title' => $title,
            'tinlienquan' => $tinlienquan
        ]);
    }

    //* trang đăng nhập
    public function getLogin()
    {
        return view('pages.login');
    }

    //* xử lý đăng nhập
    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6|max:32',
        ], [
            'username.required' => 'Chưa nhập tài khoản',
            'password.required' => 'Chưa nhập password',
            'password.min' => 'từ 6-32 kí tự',
            'password.max' => 'từ 6-32 kí tự',
        ]);
        if (
            Auth::attempt(['email' => $request['username'], 'password' => $request['password']])
            || Auth::attempt(['username' => $request['username'], 'password' => $request['password']])
        ) {
            return redirect('/');
        } else {
            return redirect('/login')->with('thongbao', 'đăng nhập không thành công');
        }
    }

    //* trang đăng ký
    public function getSignup()
    {
        return view('pages.signup');
    }

    //* xử lý đăng ký
    public function postSignup(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|unique:users,email',
            'username' => 'required|min:1|max:255|unique:users,username',
            'password' => 'required|min:6|max:32',
            'passwordagain' => 'required|same:password'
        ], [
            'name.required' => 'Nhập tên',
            'name.min' => 'Tên ít nhất 1 kí tự',
            'email.required' => 'Nhập email',
            'email.unique' => 'email đã tồn tại',
            'username.required' => 'Nhập username',
            'username.min' => 'username hợp lệ từ 1-255 kí tự',
            'username.max' => 'username hợp lệ từ 1-255 kí tự',
            'username.unique' => 'username đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu hợp lệ từ 6-32 kí tự',
            'password.max' => 'Mật khẩu hợp lệ từ 6-32 kí tự',
            'passwordagain.required' => 'Vui lòng nhập lại mật khẩu',
            'passwordagain.same' => 'Mật khẩu không trùng nhau'
        ]);
        $request['role'] = 3;
        $request['active'] = 1;
        $request['image'] = 'avatar.jpg';
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());

        return redirect('/login')->with('thongbao', 'đăng kí thành công');
    }

    //* xử lý đăng xuất
    public function getLogout()
    {
        Auth::logout();

        return redirect('/');
    }

    //* trang thông tin user
    public function userDetails()
    {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return redirect('/login');
        }

        $name = "Trang cá nhân";

        return view('pages.user', [
            'user' => $user,
            'name' => $name
        ]);
    }

    //* trang ảnh avatar
    public function getEditImg()
    {
        $name = 'Sửa ảnh';

        return view('pages.user.editimg', [
            'name' => $name
        ]);
    }

    //* xử lý đổi ảnh avatar
    public function postEditImg(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('/editimg.html')->with('thongbao', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4) . '-' . $name;
            while (file_exists('upload/avatar/' . $img)) {
                $img = Str::random(4) . '-' . $name;
            }
            $file->move('upload/avatar', $img);
            if ($user['image'] != '') {
                if ($user['image'] != $user['image']) {
                    unlink('upload/avatar/' . $user->Image);
                }
            }
            User::where('id', Auth::user()->id)->update(['image' => $img]);
        }
        return redirect('/trangcanhan')->with('thongbao', 'Bạn đã sửa thành công');
    }

    //* xử lý tìm kiếm
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $news = News::where('title', 'like', "%$keyword%")->Where('active', 1)->orWhere('summary', 'like', "%$keyword%")->orWhere('content', 'like', "%$keyword%")->take(10)->paginate(5);

        $name = 'Tìm kiếm';

        return view('pages.search', [
            'name' => $name,
            'news' => $news,
            'keyword' => $keyword
        ]);
    }

    //* trang báo theo danh mục
    public function subcategory($id)
    {
        $subcategory = SubCategory::find($id);
        $news = News::where('subcategory_id', $id)->paginate(5);

        return view('pages.subcategory', [
            'name' => $subcategory['name'],
            'title' => $subcategory['name'],
            'news' => $news
        ]);
    }

    //* trang báo theo danh mục con
    public function category($id)
    {
        $category = Category::find($id);
        $news = News::where('category_id', $id)->paginate(5);

        return view('pages.category', [
            'name' => $category['name'],
            'title' => $category['name'],
            'news' => $news
        ]);
    }
}
