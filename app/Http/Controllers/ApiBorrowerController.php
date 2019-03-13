<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Library\ClientRequest;
use Datatables;
use Carbon\Carbon;
use App\Library\GenerateCodeNumber;
use App\Library\ExportExcel;
use Illuminate\Support\Facades\Response;
use App\Library\ButtonCreator;
use Illuminate\Support\Facades\Redirect;

class ApiBorrowerController extends Controller
{  
    /*
    * borrower insert by field   officer
    */
	public function borrowerForm()
    {
        $states=$this->getStates();
        return view('borrower_register', compact('states'));
    }


    /*
     * This function return only nrc
     * When the borrower is chosen in project upload
     * By borrower's id
     */
    public function showBorrower($id)
    {

        $url = 'borrowers/'.$id;
        $borrower = ClientRequest::getClientRequest($url);
        return $borrower;
    }


    /*
    * borrower insert by field officer 
    */
    public function insertBorrower(Request $request)
    {
        $url='borrowers/store';

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
            'field_officers_id' => session('current')['id']
        ];
		
        //$url1 = "borrowers/";
        //$code_no = GenerateCodeNumber::generateCode($url1);
        //$form_value['code_no'] = "BOW-".$code_no;

        $message = ClientRequest::postClientRequest($url,$form_value);

        if($message == "User already exit"){
            return redirect('borrower/form')->with('error',$message);
        }
        return redirect('borrower/form')->with('status',$message);
    }

    /*
    * borrower edit by finance and admin
    */
    public function editBorrower($id)
    {
        $url = "borrowers/".$id;
        $states = $this->getStates();
        $township = $this->getTownship();

        $borrowers = ClientRequest::getClientRequest($url);
     
        return view('borrower_register',compact('borrowers', 'states', 'township'));     
    }
	
    /*
    * borrower update by finance and admin
    */
    public function updateBorrower(Request $request, $id)
    {
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

        $url = 'borrowers/'.$id;
        $message = ClientRequest::patchClientRequest($url,$form_value);

        return redirect('finance/borrowers-listing')->with('status', 'Successfully Updated');
    }

    /*
    * borrower delete according id by admin
    */
    public function delete($id)
    {
        $url = "borrowers/".$id;
        $message = ClientRequest::deleteClientRequest($url);
        return $message;
    }

    /*
    * Display borrower list
    */
    public function index()
    {
        return view('borrowers.index');
    }

    /*
    * get all borrowers via api and show in datatable
    */
    public function allBorrowers(Request $request,ExportExcel $exportobj)
    {
        $url = 'borrowers';

        // * call the get client request to access api to show all the lenders
        $borrowers = ClientRequest::getClientRequest($url);
        $borrowers_data = Datatables::of($borrowers["data"])
        ->editColumn('dob', function ($borrowers) {
            return $borrowers["dob"] ? with(new Carbon($borrowers["dob"]))->format('d-M-Y') : '';
        })
        ->addColumn('action', function ($borrowers) {
            return ButtonCreator::generateButtons('Borrowers', $borrowers["id"] );
        })
        ->make(true);

        $length = $request->query('length');
        if($length == -1){
            $exportobj->export(json_decode($borrowers_data->content(), true), $request->query('filename'), 'borrowers');
            return Response::json(array(
                'success' => true
            ));
        }else{
            return $borrowers_data;
        }
    }
    
    /*
    * get all states via api
    */
    public function getStates()
    {
        $url = 'state';
        $states = ClientRequest::getClientRequest($url);
        return $states;
    }

    /*
    * get township according to state via api
    */
    public function showTownship($state)
    {
        $url = 'township/'.$state;
        $townships = ClientRequest::getClientRequest($url);
        return $townships;
    }

    /*
    * get all township via api
    */
    public function getTownship()
    {
        $url = 'township';
        $township = ClientRequest::getClientRequest($url);
        return $township;
    }

    /*
    * get borrower'id from url and send to view
    */
    public function projects($id)
    {
        return view('borrowers.projects',compact('id'));
    }

    /*
    * get borrower's projects according by borrower id
    */
    public function allProjects(Request $request, $id, ExportExcel $exportobj)
    {
        $url = 'borrowers/projects/'.$id;
        $projects = ClientRequest::getClientRequest($url);

        $project = Datatables::of($projects["data"])->make(true);

        $length = $request->query('length');
        if ($length == -1){
            $exportobj->export(json_decode($project->content(), true), $request->query('filename'), 'borrower_projects');
            return Response::json(array(
                'success' => true
            ));
        } else {
            return $project;
        }

    }


    /*
    * get borrower via api according by id 
    */
    public function detail($id)
    {
        $url = 'borrowers/'.$id;
        $borrowers = ClientRequest::getClientRequest($url);

        return view('finance.borrower_detail',compact('borrowers'));


    }


    /*
    * give point to the borrower by finance or admin
    */
    public function givePoint(Request $request, $id)
    {
        $point = $request->get('points');
        $form_value = [
            'points'=>$point
        ];

        $url = "borrowers/give/point/".$id;
        $message = ClientRequest::postClientRequest($url, $form_value);
        return Redirect::back()->with('success', $message);
    }
}

    


