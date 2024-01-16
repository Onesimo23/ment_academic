<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Mentor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MentorRegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:mentor');
    }

    public function showRegistrationForm()
    {
        return view('auth.mentor-register');
    }

    protected function guard()
    {
        return Auth::guard('mentor');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:mentors'],
            'password' => ['required', 'confirmed', 'min:8'],
            'course' => ['required', 'string'],
            'specialization' => ['required', 'string'],
        ]);
    }

   protected function create(Request $request)
{
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:mentors'],
        'password' => ['required', 'confirmed', 'min:8'],
        'course' => ['required', 'string'], // Adicione conforme necessário
        'specialization' => ['required', 'string'], // Adicione conforme necessário
    ]);

    // return Mentor::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password']),
    //     'course' => $data['course'],
    //     'specialization' => $data['specialization'],
    //     // Adicione outros campos conforme necessário
    // ]);
    return redirect('/dashboard'); 
}

}
