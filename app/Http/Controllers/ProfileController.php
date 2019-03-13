<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\ClientRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    /*
    * get all states via api.
    */
    public function getStates()
    {
        $url = 'state';
        $states = ClientRequest::getClientRequest($url);
        return $states;
    }

    /*
    * get all township via api.
    */
    public function getTownship()
    {
        $url = 'township';
        $township = ClientRequest::getClientRequest($url);
        return $township;
    }

    /*
    * get township according to state via api.
    */
    public function showTownship($state)
    {
        $url = 'township/'.$state;
        $townships = ClientRequest::getClientRequest($url);
        return $townships;
    }

    /*
    * show the form for editing the profile of lender, borrower and field officer.
    */
    public function profileEdit()
    {
        $states = $this->getStates();
        $township = $this->getTownship();
         if(session('token')) {
             if (session('current')['role'] == 'lender' || session('current')['role'] == 'borrower' || session('current')['role'] == 'field-officer') {
                 return view('profileform' , compact('states','township'));
             }
         }
         return redirect('forbidden');
    }

    /*
    * updating the profile info to database via api.
    */
    public function profileUpdate(Request $request , $id)
    {
        $form_value = [
            'name' => $request->get('name'),
            'nrc' => $request->get('nrc'),
            'dob' => $request->get('dob'),
            'photo' => $request->get('photo'),
            'attachment' => $request->get('attachment'),
            'phone_no' => $request->get('phone_no'),
            'gender' => $request->get('gender'),
            'state'=>$request->get('state'),
            'township'=>$request->get('township'),
            'address'=>$request->get('address')
        ];

        if(session('current')['role'] == "lender"){
            $url = 'lenders/'.$id;
            $message = ClientRequest::patchClientRequest($url , $form_value);
            $this->currentUser($request);
        }

        else if(session('current')['role'] == 'borrower'){
            $url = 'borrowers/'.$id;
            $message = ClientRequest::patchClientRequest($url , $form_value);
            $this->currentUser($request);
        }

        else if(session('current')['role'] == 'field-officer'){
            $url = 'officers/edit/'.$id;
            $message = ClientRequest::patchClientRequest($url , $form_value);
            $this->currentUser($request);
        }

        return redirect('profile')->with('status',$message);
    }

    /*
    * get current login user info.
    */
    public function currentUser( Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . 'me', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $request->session()->get('token'),
            ],
        ]);

        $current = json_decode((string)$response->getBody(), true);
        // * put current login user to session named current
        $request->session()->put('current', $current);
        
    }

    /*
    * showing change password form.
    */
    public function changePasswordForm()
    {
     if(session('token')) {
            if (session('current')['role'] == 'lender' || session('current')['role'] == 'borrower' || session('current')['role'] == 'field-officer') {
                return view('change_password.change_password');
            }
        }
        return redirect('forbidden');
    }

    /*
    * change password via api.
    */
    public function changePassword(Request $request)
    {
        $user_id = session('current')['user_id'];
        $form_value = [

            "old_password"=>$request->get('old_password'),
            'password'=>$request->get('password'),
            'password_confirmation'=>$request->get("password_confirmation")

        ];

        $url = "change/password/".$user_id;
        $message = ClientRequest::patchClientRequest($url,$form_value);
        if($message == "Your old password is incorrect") {
            return Redirect::back()->with('status',$message);
        }
        return Redirect::back()->with('error',$message);
    }
}
