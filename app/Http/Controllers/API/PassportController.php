<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportController extends Controller
{
    public $statusSuccess = 200;
    public $statusAccessDenied = 401;

    public function login()
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('mercadinho')->accessToken;
            return response()->json(['success' => $success], $this->statusSuccess);
        }else{
            return response()->json(['error' => 'Unauthorised'], $this->statusAccessDenied);
        }
        
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails())
        {
            return response()->json(['error' => $validator->errors()], $this->statusAccessDenied);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('mercadinho')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success' => $success], $this->statusSuccess);
    }
}