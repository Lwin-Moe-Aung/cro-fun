<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\ClientRequest;
use Datatables;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Library\GenerateCodeNumber;
use Illuminate\Support\Facades\Response;
use App\Library\ExportExcel;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Library\ButtonCreator;


class ApiLenderController extends Controller
{

    /*
     * This the form view of lender register
     */
    public function lenderForm()
    {
         $states = $this->getStates();
         return view('lender_register',compact('states'));
    }


    /*
     * This is the form view of updating the profile
     */
    public function lenderEdit()
    {
        $states = $this->getStates();
        return view('profileform',compact('states'));
    }


    /*
     * This is the function of inserting the lender's info via api
     */
    public function insertLender(Request $request)
    {
        $url = 'lenders/store';

        $form_value = [
            'name' => $request->get('name'),
            'nrc' => $request->get('nrc'),
            'dob' => $request->get('dob'),
            'state' => $request->get('state'),
            'township' => $request->get('township'),
            'phone_no' => $request->get('phone_no'),
            'address' => $request->get('address'),
            'photo' => $request->get('photo'),
            'attachment' => $request->get('attachment'),
            'gender' => $request->get('gender'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        //$url1 = "lenders/";
        //$code_no = GenerateCodeNumber::generateCode($url1);
        //$form_value['code_no'] = "LND-".$code_no;
        $message = ClientRequest::postClientRequest($url,$form_value);

        if($message == "User already exit"){
            return redirect('lender/form')->with('error',$message);
        }
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

        if (array_key_exists("access_token",$token))
        {
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

            // * put current login user to session named current
            $request->session()->put('current', $current);

            /* ------------------------ end of current login user---------------------------*/
            return redirect('/');
        }
    }


    /*
     * This is the form view of updating a lender's record
     */
    public function editLender($id)
    {
        $url = "lenders/".$id;
        $states = $this->getStates();
        $township = $this->getTownship();
        $lenders = ClientRequest::getClientRequest($url);

        return view('lender_register',compact('lenders','states','township'));
    }


    /*
     * This is the function of updating a lender's record via api
     */
    public function updateLender(Request $request, $id)
    {
        $url = 'lenders/'.$id;
        $form_value = [
            'name' => $request->get('name'),
            'dob' => $request->get('dob'),
            'nrc' => $request->get('nrc'),
            'photo' => $request->get('photo'),
            'gender' => $request->get('gender'),
            'state' => $request->get('state'),
            'township' => $request->get('township'),
            'phone_no' => $request->get('phone_no'),
            'attachment' => $request->get('attachment'),
            'address' => $request->get('address')
        ];

        $message = ClientRequest::patchClientRequest($url,$form_value);

        return redirect('finance/lenders-listing')->with('status', 'Successfully Updated');
    }


    /*
     * Get all lenders' records via api to show in datatable
     * Able to export the csv file
    */
    public function allLenders(Request $request, ExportExcel $exportobj)
    {
        $url = 'lenders';

        // * call the get client request to access api to show all the lenders
        $lenders = ClientRequest::getClientRequest($url);

        $lenders_data = Datatables::of($lenders["data"])
            ->editColumn('dob', function ($lenders) {
                return $lenders["dob"] ? with(new Carbon($lenders["dob"]))->format('d-M-Y') : '';
                })
            ->addColumn('action', function ($lenders) {
                return  ButtonCreator::generateButtons('Lenders', $lenders["id"] );
            })
            ->make(true);

        $length = $request->query('length');
        if($length == -1){
            $exportobj->export(json_decode($lenders_data->content(), true), $request->query('filename'), 'lenders');
            return Response::json(array(
                    'success' => true  
                ));
        }else{
             return $lenders_data;
        }
    }


    /*
     * Get all states via api
     */
    public function getStates()
    {
        $url = 'state';
        $states = ClientRequest::getClientRequest($url);
        return $states;
    }


    /*
     * Get all townships via api
    */
    public function getTownship()
    {
        $url = 'township';
        $township = ClientRequest::getClientRequest($url);
        return $township;
    }


    /*
     * Get the township according to the state via api
     */
    public function showTownship($state)
    {
        $url = 'township/'.$state;
        $townships = ClientRequest::getClientRequest($url);
        return $townships;
    }


    /*
     * This is the view of a lenders'info and its related overall investment info
     */
    public function activeFundingInvestment()
    {
        $id = session('current')['id'];
        $name = session('current')['name'];

        $url = 'lenderprofile/'.$id;
        $lenderprofile = ClientRequest::getClientRequest($url);
        $total_amount = $lenderprofile['data']['active'][0]['totalinvest'] + $lenderprofile['data']['funding'][0]['totalinvest'];

        //calculating  Percentage
        $profile_image=session('current')['photo'];

        $result = array();

        if ($total_amount >0){

            $active_percentage = round(($lenderprofile['data']['active'][0]['totalinvest'] / $total_amount)*100,2);
            $funding_percentage = round(($lenderprofile['data']['funding'][0]['totalinvest'] / $total_amount)*100,2);

            $profile_image = session('current')['photo'];
            $result = array();
            $result = array(
                            array(  
                                "value" => $active_percentage,
                                "color" => self::dynamicColors(),
                                "highlight" => "yellowgreen",
                                "label" => "Active Invest",
                                ),
                            array(  
                                "value" =>$funding_percentage,
                                "color" => self::dynamicColors(),
                                "highlight" => "yellowgreen",
                                "label" => "Funding Process",
                                )
                            );

            return view('lender_profile',compact('lenderprofile','result','profile_image'));
        }else{
            return view('lender_profile',compact('lenderprofile','result','profile_image'));
        }
    }

    /*
     * This is the function of creating color randomly
    */
    public static function dynamicColors()
    {
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

        return $color;    
    }


    /*
    * This is the view of a lender's investment
    */
    public function investments($id)
    {   
         return view('lenders.my_investments',compact('id'));
    }


    /*
    * Get a lender's investment via api
    */
    public function my_investments(Request $request, $id, ExportExcel $exportobj)
    {
        $url = 'lenderInvestments/'.$id;

        $lenders = ClientRequest::getClientRequest($url);
       // dd($lenders);die();
        $lender = Datatables::of($lenders["data"])
        ->editColumn('investment_date', function ($lenders) {
                return $lenders["investment_date"] ? with(new Carbon($lenders["investment_date"]))->format('d-M-Y') : '';
            })
        ->make(true);

        $length = $request->query('length');
        if ($length == -1){
            $exportobj->export(json_decode($lender->content(), true), $request->query('filename'), 'lender_investments');
            return Response::json(array(
                'success' => true
            ));
        } else {
            return $lender;
        }

    }
    


    /*
    * This is the view of a lender's info detail
    */
    public function detail($id)
    {
        $url = "lenders/".$id;
        $lender = ClientRequest::getClientRequest($url);
        return view('finance.lender_detail',compact('lender'));
    }


    /*
    * This is the function of verifying a lender's account by finance and admin via api
    */
    public function updateAccountStatus(Request $request, $id)
    {
        $verified = $request->get('verified');
        $form_value = [
            'verified' => $verified
        ];

        $url = "lender/account/verified/".$id;
        $message = ClientRequest::postClientRequest($url,$form_value);
        return Redirect::back()->with('success',$message);
    }


    /*
    * This is the function of deleting a lender's record by admin via api
    */
    public function delete($id)
    {
        $url = "lenders/".$id;
        $message = ClientRequest::deleteClientRequest($url);
        return $message;
    }

     /*
    * This is the view of a lender's dashboard
    */
    public function available($id)
    {   
         return view('lenders.revenue_available',compact('id'));
    }

    public function notAvailable($id)
    {   
         return view('lenders.revenue_notAvailable',compact('id'));
    }

   /*
    * Get revenue amount from borrower

   */
    public function revenue_Available(Request $request, $id, ExportExcel $exportobj)
    {
        $url = 'lender/getmoney/'.$id;

        $lenders = ClientRequest::getClientRequest($url);
        $lender = Datatables::of($lenders["data"])->make(true);

        $length = $request->query('length');
        if ($length == -1){
            $exportobj->export(json_decode($lender->content(), true), $request->query('filename'), 'lender_get_profit');
            return Response::json(array(
                'success' => true
            ));
        } else {
            return $lender;
        }
    }

     /*
    * left to get revenue amount from borrower

   */
    public function revenue_notAvailable(Request $request, $id, ExportExcel $exportobj)
    {
        $url = 'lender/notgetmoney/'.$id;

        $lenders = ClientRequest::getClientRequest($url);

        $lender = Datatables::of($lenders["data"])->make(true);

        $length = $request->query('length');
        if ($length == -1){
            $exportobj->export(json_decode($lender->content(), true), $request->query('filename'), 'lender_notget_profit');
            return Response::json(array(
                'success' => true
            ));
        } else {
            return $lender;
        }
    }
    /*
    *project progress table for lender dashboard
    */
    public function progress_form($id)
    {   
         return view('lenders.project_progress',compact('id'));
    }

   /*
    * project progress for lender dashboard

   */
    public function projectProgress(Request $request, $id, ExportExcel $exportobj)
    {
        $url = 'lender/proj-progress/'.$id;

        $lenders = ClientRequest::getClientRequest($url);
        $lender = Datatables::of($lenders["data"])->make(true);

        $length = $request->query('length');
        if ($length == -1){
            $exportobj->export(json_decode($lender->content(), true), $request->query('filename'), 'lender_progress_project');
            return Response::json(array(
                'success' => true
            ));
        } else {
            return $lender;
        }
    }
}
