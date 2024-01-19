<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showStudentLoginForm()
    {
        return view('auth.student-login');
    }

    public function studentLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('student')->attempt($credentials, $request->remember)) {
            return redirect()->route('activity.index');
        }

        return redirect()->route('student.login')->with('error', 'Credenciais inválidas.');
    }
}
