<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;;

class ForgetPasswordHandle extends Controller
{


    public function forgetPass()
    {
        return view('admin.users.ForgetPass');
    }

    public function postForgetPass(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $token = strtoupper(Str::random(10));
        $users = DB::table('users')->where('email', $request->email)->first();
        DB::table('users')->where('email', $request->email)->update(['token' => $token]);
        // $users->update(['token' => $token]);
        $user = DB::table('users')->where('email', $request->email)->first();
        Mail::send('admin.users.getPass', ['user' => $user], function ($email) use ($users) {
            $email->subject('Lấy lại mật khẩu');
            $email->to($users->email, $users->name);
            return redirect()->back()->with('yes', 'Vui lòng check mail để thực hiện thay đổi mật khẩu');
        });
    }
    public function getPass(User $user, $token)
    {
        if ($user->token === $token) {
            return view('admin.users.updatePass');
        }

        return abort(404);
    }

    public function postGetPass(User $user, $token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            'passwordConfirm' => 'required|same:password',
        ]);

        $user->update(['password' => bcrypt($request->password), 'token' => null]);
        return redirect()->route('login')->with('yes', 'Đặt lại mật khẩu thành công, bạn có thể đăng nhập');
    }
}
