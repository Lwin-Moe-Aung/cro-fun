<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Library\ClientRequest;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

       /* ----------validation for login----------- */

        $this->validate($request,[
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        /*------------end of validation----------------*/

        /*-----------get access token from api-----------------*/

        $client = new Client();
        $response = $client->post(env('API_URL') . 'login', [
                  'form_params' => [
                      'grant_type' => 'password',
                      'client_id' => env('CLIENT_ID'),
                      'client_secret' => env('CLIENT_SECRET'),
                      'username' => $request['email'],
                      'password' => $request['password'],
                      'scope' => '*'
                  ],
        ]);
        $token = json_decode((string) $response->getBody(), true);
        if (array_key_exists("access_token",$token)) {

            // * put access token to session named token
            $request->session()->put('token', $token['access_token']);

            /*  ----------------------get current login user------------------------------*/

            $client = new Client();
            $response = $client->request('GET', env('API_URL') . 'me', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $request->session()->get('token'),
                ],
            ]);
            $current = json_decode((string)$response->getBody(), true);
            //check the login user is soft deleted or not
            if($current==null){

                return view('errors.invalid_user');
            }

            // * put current login user to session named current
            $request->session()->put('current', $current);

            /* ------------------------ end of current login user---------------------------*/
            return redirect('/');

        }
        return redirect('login')->with('error' , $token['message']);

    }
    public function loginForm()
    {
        if(!session('token')) {

            return view('login');

        }
        else
        {

            return redirect('/');

        }
    }


}

