<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\ClientRequest;
use Datatables;
use DB;
use Carbon\Carbon;
use App\Library\GenerateCodeNumber;
use App\Library\ExportExcel;
use App\Library\ButtonCreator;
use Illuminate\Support\Facades\Response;

class ApiFieldOfficerController extends Controller
{

    /*
     * This the form view of field officer register
    */
    public function officerForm()
    {
        $states = $this->getStates();
        return view ('fieldofficer_register',compact('states'));
    }


    /*
     * Get all field officers' record via api to show in datatable
     * Able to export the csv file
    */
    public function AllOfficers(Request $request, ExportExcel $exportobj)
    {
        // *url of officer api to show all the field-officers
        $url = 'officers';

        // * call the get client request to access api to show all the field-officers
        $officers = ClientRequest::getClientRequest($url);
        $officers_data = Datatables::of($officers["data"])
            ->editColumn('dob', function ($officers) {
                return $officers["dob"] ? with(new Carbon($officers["dob"]))->format('d-M-Y') : '';
            })->addColumn('action', function ($officers) {
                return ButtonCreator::generateButtons('Officers', $officers["id"] );
            })->make(true);

        $length = $request->query('length');
        if ($length == -1){
            $exportobj->export(json_decode($officers_data->content(), true), $request->query('filename'), 'officers');
            return Response::json(array(
                'success' => true
            ));
        } else {
            return $officers_data;
        }
    }


    /*
     * This is the form view of updating a field officer officer's record by finance
    */
    public function EditOfficer($id)
    {
        $url = "officers/edit/".$id;
        $states = $this->getStates();
        $township = $this->getTownship();
        $officers = ClientRequest::getClientRequest($url);
        return view('fieldofficer_register', compact('officers', 'states', 'township'));  
    }


    /*
     * This is the function of inserting a field officer's info via api
    */
    public function insertOfficer(Request $request)
    {
        // * url of officer api to store a field-officer
        $url = 'officers/store';

       // * form value from UI
        $form_value = [
                'name'=>$request->get('name'),
                'nrc'=>$request->get('nrc'),
                'dob'=>$request->get('dob'),
                'state'=>$request->get('state'),
                'township'=>$request->get('township'),
                'phone_no'=>$request->get('phone_no'),
                'address'=>$request->get('address'),
                'photo'=>$request->get('photo'),
                'attachment'=>$request->get('attachment'),
                'gender'=>$request->get('gender'),
                'email'=>$request->get('email'),
                'password'=>$request->get('password'),
                'admin_id'=>session('current')['id'],
        ];
        //$url1 = "officers/";
        //$code_no = GenerateCodeNumber::generateCode($url1);
        //$form_value['code_no'] = "FOF-".$code_no;
        // * call the post client request to access api to store a field-officer
        $message = ClientRequest::postClientRequest($url, $form_value);

        if($message == "User already exit")
        {
            return redirect('officer/form')->with('error', $message);
        }
        return redirect('officer/form')->with('status', $message);
    }


    /*
     * This is the function of deleting a field officer's record by admin via api
    */
    public function delete($id)
    {
       // * url of officer api to delete a field-officer by id
        $url = 'officers/'.$id;

       // * call the delete client request to access api to delete a field-officer by id
        $officer = ClientRequest::deleteClientRequest($url);
        return $officer;
    }


    /*
     * This is the function of updating a field officer's record via api
    */
    public function updateOfficer(Request $request, $id)
    {
        $url = 'officers/edit/'.$id;
        $form_value = [
            'name' => $request->get('name'),
            'dob' => $request->get('dob'),
            'nrc' => $request->get('nrc'),
            'photo' => $request->get('photo'),
            'attachment'=>$request->get('attachment'),
            'gender' => $request->get('gender'),
            'state'=>$request->get('state'),
            'township'=>$request->get('township'),
            'phone_no'=>$request->get('phone_no'),
            'address'=>$request->get('address')
        ];
        $message = ClientRequest::patchClientRequest($url, $form_value);

        return redirect('finance/field-officers-listing')->with('status','Successful Updated');
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
     * This is the view of a field officer 's info detail
    */
    public function detail($id)
    {
        $url = 'officers/'.$id;
        $officers = ClientRequest::getClientRequest($url);
        return view('finance.officer_detail',compact('officers'));
    }
}
