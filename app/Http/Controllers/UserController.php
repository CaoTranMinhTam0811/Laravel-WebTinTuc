<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //* show tất cả user
    public function list()
    {
        $user = User::all();
        return view('admin.user.list', ['user' => $user]);
    }

    //* show view tạo user
    public function getCreate()
    {
        return view('admin.user.create');
    }

    //* xử lý tạo user
    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|unique:users,email',
            'username' => 'required|min:1|max:255|unique:users,username',
            'password' => 'required|min:5|max:32',
            'passwordagain' => 'required|same:password',
            'role' => 'required',
            'active' => 'required'
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
            'password.min' => 'Mật khẩu hợp lệ từ 5-32 kí tự',
            'password.max' => 'Mật khẩu hợp lệ từ 5-32 kí tự',
            'passwordagain.required' => 'Vui lòng nhập lại mật khẩu',
            'passwordagain.same' => 'Mật khẩu không trùng nhau'
        ]);
        $request['password'] = bcrypt($request['password']);
        $request['image'] = 'avatar.jpg';
        $request['role'] = 0;

        User::create($request->all());

        return redirect('admin/user/list')->with('thongbao', 'thêm thành công');
    }

    //* show view chỉnh sửa user
    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    //* xử lý chỉnh sửa user
    public function postEdit(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|min:1',
            'email' => 'required',
            'username' => 'required|min:1|max:255',
            'role' => 'required',
            'active' => 'required'
        ], [
            'name.required' => 'Nhập tên',
            'name.min' => 'Tên ít nhất 1 kí tự',
            'email.required' => 'Nhập email',
            'email.unique' => 'email đã tồn tại',
            'username.required' => 'Nhập username',
            'username.min' => 'username hợp lệ từ 1-255 kí tự',
            'username.max' => 'username hợp lệ từ 1-255 kí tự',
            'username.unique' => 'username đã tồn tại',
        ]);

        if ($request['changepassword'] == 'on') {
            $request->validate([
                'password' => 'required|min:6|max:32',
                'passwordagain' => 'required|same:password',
            ], [
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu hợp lệ từ 6-32 kí tự',
                'password.max' => 'Mật khẩu hợp lệ từ 6-32 kí tự',
                'passwordagain.required' => 'Vui lòng nhập lại mật khẩu',
                'passwordagain.same' => 'Mật khẩu không trùng nhau'
            ]);
            $request['password'] = bcrypt($request['password']);
        }

        User::find($id)->update($request->all());
        return redirect('admin/user/list')->with('thongbao', 'Sửa thành công');
    }

    //* show view đăng nhập
    public function getLogin()
    {
        return view('admin.login');
    }

    //* xử lý đăng nhập
    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Chưa nhập tài khoản',
            'password.required' => 'Chưa nhập password',

        ]);

        //* check username và mật khẩu
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password]) || Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect('admin/user/list');
        } else {
            return redirect('admin/login')->with('thongbao', 'đăng nhập không thành công');
        }
    }

    //* xử lý đăng xuất
    public function getdangxuatadmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    //* bật active
    public function postActive($id)
    {
        User::where('id', $id)->update(['active' => 1]);
        return redirect('admin/user/list')->with('thongbao', 'Update thành công');
    }

    //* tắt active
    public function postNoActive($id)
    {
        User::where('id', $id)->update(['active' => 0]);
        return redirect('admin/user/list')->with('thongbao', 'Update thành công');
    }

    //* xử lý xóa user
    public function getDelete($id)
    {
        $user = User::find($id);
        if ($user['role'] != 0) {
            return redirect('admin/user/list')->with('thongbao', 'Không thể xóa tài khoản admin');
        } else {
            User::destroy($id);
            return redirect('admin/user/list');
        }
    }
}
