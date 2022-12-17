<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Database;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index1()
    {
        return view('admin.users.register', [
            'title' => 'Trang Đăng Ký'
        ]);
    }

    public function register(Request $request)
    {
        $query = DB::table('users')->get();

        if ($request->validate([
            'name' => '',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|confirmed|mixed',
            'password' => 'required|min:8',
            'passwordConfirm' => 'required|min:8|same:password',
        ])) {
            if (!($query == [''])) {
                $count = 0;
                foreach ($query as $row) {
                    if ($row->email == $request->email) {
                        $count++;
                    }
                }
                if ($request->input('password') === $request->input('passwordConfirm')) {
                    if ($count == 0) {
                        DB::table('users')->insert(
                            [
                                'name' => $request->name,
                                'email' => $request->email,
                                'password' => bcrypt($request->password),
                            ]
                        );
                        return redirect()->route('login');
                    } else {
                        Session::flash('error', 'Tài khoản đã tồn tại');
                        return redirect()->back()->withInput();
                    }
                } else {
                    session()->flash('error', 'Mật khẩu không khớp');
                    return redirect()->back()->withInput();
                }
            } else {
                DB::table('users')->insert(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                    ]
                );
                return redirect()->route('login');
            }
        }
    }
}
// }