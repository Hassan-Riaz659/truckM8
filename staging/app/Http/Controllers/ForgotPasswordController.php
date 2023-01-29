
<?php
//new controller created 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);
        
        Password::sendResetLink($credentials);
        return $this->respondWithMessage(msg:"Reset password link sent on your email id.");
        
    }
    
    public function reset()
    {
        $credentials=request()->validate([
            'email' => 'required|email',
            'password' => 'required|string|max:25|confirmed',
            'token' => 'required|string'
            
             ]);
             
             Password::reset($credentials, function($user, $password)
             {
                 $user->password = $password;
                 $user->save();
             });
             
    }
}
