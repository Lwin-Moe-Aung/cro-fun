<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        /*------------------ get access token------------------*/

        $form_value=[
          'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password'])
        ];
        try {
            $client = new Client();

            $response = $client->post('http://uat.crowd.funding.api.com/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('CLIENT_ID',7),
                    'client_secret' => env('CLIENT_SECRET', 'isLcqAyqLDxWX2QUMDteDALMoiiimyitqq0AgHg9'),
                    'username' => 'khinmon@global-connect.asia',
                    'password' =>  '123456',
                    'scope' => '*'
                ],
            ]);
        }
        catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            $response=$e->getResponse();
            $token= json_decode((string) $response->getBody(), true);
            return redirect('register')->with('error',$token['message']);
        }
        $token= json_decode((string) $response->getBody(), true);

        /*----------------- end of access token --------------------------------------------------*/



        /*----------------- insert user ---------------------------------------*/
        try {
            $client = new Client();
            $response = $client->request('POST','http://uat.crowd.funding.api.com/api/users/store', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer '.$token['access_token'],
                ],
                'form_params' => $form_value

            ]);
        }
        catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            $response=$e->getResponse();
            $token= json_decode((string) $response->getBody(), true);
            //return $token['error']['message'];
            return redirect('register')->with('error',$token['error']['message']);
        }
        $user= json_decode((string) $response->getBody(),true);

        return  redirect('/')->with('status',$user['message']);


        /*--------------------------- end of inserting user  ------------------------------*/


    }
}
