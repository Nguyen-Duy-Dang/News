<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    protected $redirectTo = '/home'; // Đường dẫn mặc định sau khi đăng nhập

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Kiểm tra email của người dùng và điều hướng
        if ($user->email === 'nguyenduydang034@gmail.com') {
            return Redirect::route('admin.dashboard'); // Đường dẫn đến trang quản trị
        }

        return Redirect::route('user.index'); // Đường dẫn đến trang người dùng
    }
}
