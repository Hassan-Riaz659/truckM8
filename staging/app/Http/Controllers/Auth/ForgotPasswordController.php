<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
    //remove if any functionality issues occur
   /*  protected function sendResetResponse(Request $request, $response)
     {
         return response(['message' => $response]);
     }
     
     protected function sendResetFailedResponse(Request $request, $response)
     {
         return response(['error' => $response], status 422);
     }*/
// new function    
    public function showLinkRequestForm()
    {
        return view('admin.passwords.email');
    }
}
