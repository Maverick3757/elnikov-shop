<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticate(Request $data){
        $validator = Validator::make($data->all(), [
            'telephone' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);
        if(count($validator->errors())) return response()->json(['success'=>false,'data'=>$validator->errors()]);
        if (Auth::attempt(['telephone' => $data['telephone'], 'password' => $data['password']])) {
            return response()->json(['success'=>true,'data'=>Auth::user()]);
        }else{
            return response()->json(['success'=>false,'data'=>'Не верные данные']);
        }
    }
    public function logout(){
        Auth::logout();
        return response()->json(true);
    }
    public function username()
    {
        return 'telephone';
    }
}
