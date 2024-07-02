<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    //* show view chỉnh sửa about
    public function getEdit()
    {
        $about = About::find(1);
        return view('admin.about.details', [
            'about' => $about
        ]);
    }

    //* xử lý chỉnh sửa about
    public function postEdit(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'linkfb' => 'required',
            'copyright' => 'required',
            'linkcopyright' => 'required'
        ]);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $format = $file->getClientOriginalExtension();
            if ($format != 'jpg' && $format != 'png' && $format != 'jpeg') {
                return redirect('about')->with('thongbao', 'Không hỗ trợ' . $format);
            }
            $name = $file->getClientOriginalName();

            $file->move('upload/logo', $name);
            if ($request['logo'] != '') {
                unlink('upload/logo/' . $request['logo']);
            }
            $request['logo'] = $name;
        }

        About::find(1)->update($request->all());

        return redirect('admin/about')->with('thongbao', 'Thành công');
    }
}
