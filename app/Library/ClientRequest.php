<?php
namespace App\Library;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;



class ClientRequest
{

    // * to get access token from api
    public static function getAccessApiToken()
    {
        try {
            $client = new Client();

            $response = $client->post(env('API_TOKEN_URL'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' =>env('CLIENT_ID'),
                    'client_secret' =>env('CLIENT_SECRET'),
                    'username' =>env('API_DEFAULT_USER_NAME'),
                    'password' =>env('API_DEFAULT_USER_PASSWORD'),
                    'scope' => '*'
                ],
            ]);

        }
        catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
         
            $response = $e->getResponse();
            $token = json_decode((string) $response->getBody(), true);
            return $token['message'];

        }
        $token= json_decode((string) $response->getBody(), true);

        //put access token to session

        session(['token'=>$token['access_token']]);
    }


    /*
     * GET Request to access api
     */
    public static function getClientRequest($url)
    {
        try {
            $client = new Client();
            $response = $client->get(env('API_URL').$url, [
                'headers' => [

                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' .session('token'),
                ],
            ]);

            
        }
        catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            
            $response = $e->getResponse();
            $token = json_decode((string) $response->getBody()->getContents(), true);
            return $token['error']['message'];

        }
       
        return  json_decode((string) $response->getBody(),true);


    }

    /*
     * POST request to access api
     */
    public static function postClientRequest($url,$form_value)
    {
        try {
              $client = new Client();
              $response = $client->request('POST',env('API_URL') .$url, [
                  'headers' => [

                      'Accept' => 'application/json',
                      'Authorization' => 'Bearer '.session('token'),

                  ],
                'form_params' => $form_value

              ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            $response = $e->getResponse();
            $token = json_decode((string) $response->getBody(), true);
            return $token['error']['message'];

        }
        $message = json_decode((string) $response->getBody(),true);
        return $message['message'];

    }


    /*
     * DELETE request to access api
     */
    public static function deleteClientRequest($url)
    {

        try {
                $client = new Client();
                $response = $client->request('DELETE',env('API_URL'). $url, [
                     'headers' => [
                             'Accept' => 'application/json',
                             'Authorization' => 'Bearer ' . session('token'),
                         ],

                ]);
        }catch (\GuzzleHttp\Exception\BadResponseException $e)
        {

                $response = $e->getResponse();
                $token = json_decode((string) $response->getBody(), true);
                return $token['error']['message'];
        }
        $message=json_decode((string) $response->getBody(),true);
        return $message['message'];
    }


    /*
     * PATCH request to access api
     */
    public static function patchClientRequest($url,$form_value)
    {
        try {
            $client = new Client();
            $response = $client->request('PATCH',env('API_URL'). $url, [
                'headers' => [

                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),

                ],
                'form_params' => $form_value
            ]);
        }catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            $response = $e->getResponse();
            $token = json_decode((string) $response->getBody(), true);
            return $token['error']['message'];
        }
        $message = json_decode((string) $response->getBody(),true);
        return $message['message'];
    }

    public static function clientRequestRedirect($message,$url)
    {
        if($message == "User already exit") {

            return redirect($url)->with('error',$message);

        }
        if($message == "Field officer does not exist") {

            return redirect($url)->with('error',$message);

        }
        return redirect($url)->with('status',$message);

    }
}