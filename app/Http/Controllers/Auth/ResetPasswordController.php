<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Library\ClientRequest;
use Mail;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /*
    * This is the form view of requesting the reset password
    * By entering the email
    * Send the reset form link via email
    */
    public function reset(Request $request)
    {

        $email = $request->get('email');
        $url = "users/search/".$email;
        $user = ClientRequest::getClientRequest($url);
        if($user=="User does not exist") {

            return redirect()->back()->with('error','We can\'t find a user with that e-mail address.');

        }
        else {

            $user['data']['token'] = str_random(30);
            $url = "password_reset/store";
            $form_value = [

                'email'=>$user['data']['email'],
                'token'=>$user['data']['token'],
                'created_at'=>date('Y-m-d H:m:s')

            ];
            try {
                  Mail::send('forgot_password.mail.send_request_mail', $user['data'], function ($message) use ($user) {
                      $message->to($user['data']['email']);
                      $message->subject('Reset Password');

                  });
                  ClientRequest::postClientRequest($url,$form_value);

            }
            catch (\Exception $e)
            {
               $url = "password_reset/".$user['data']['email'];
               ClientRequest::deleteClientRequest($url);
               return redirect()->back()->with('error' , 'Something went wrong while sending email');

            }
            return redirect()->back()->with('status','We send the link to reset your password via email');

        }
    }


    /*
    * This is the form view of reset password
    *
    */
    public  function showResetForm($email,$token)
    {
        $url="users/search/".$email;
        $user=ClientRequest::getClientRequest($url);

        if($user!="User does not exist")
        {
            //$user_token=DB::table('password_resets')->where('token',$token)->first();
            $url="password_reset/show/".$token;
            $info=ClientRequest::getClientRequest($url);

            if(count($info['data'])>0)
            {
                return view('forgot_password.mail.reset_form')->with(
                    ['token' => $token, 'email' => $email]);
            }
            else
            {
                return redirect('forget/password')->with('error','Sorry You didn\'t request for password reset');
            }

        }
    }


    /*
     * This is the function of resetting the password via api
     */
    public  function resetPassword(Request $request , $email, $token)
    {

        $email = $request->get('email');
        $url = "users/search/".$email;
        $user = ClientRequest::getClientRequest($url);
        if(count($user) > 0) {

            $url = "password_reset/show/".$token;
            $info = ClientRequest::getClientRequest($url);
            if(count($info['data']) > 0) {

                $user['data']['password'] = bcrypt($request->get('password'));
                $form_value = ['password'=>$user['data']['password']];
                $url = "users/".$user['data']['id'];
                ClientRequest::patchClientRequest($url , $form_value);
                $url1 = "password_reset/".$email;
                ClientRequest::deleteClientRequest($url1);
                return redirect('login')->with('status' , 'You can login with your new password');

            }
            else {

                return redirect('forget/password')->with('error','Sorry You didn\'t request for password reset');

            }

        }

    }

}
