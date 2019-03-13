<?php
namespace App\Http\Controllers;

use App\Http\Middleware\Project;
use Illuminate\Http\Request;
use App\Library\ClientRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Datatables;
use Illuminate\Support\Facades\Session;
use App\Library\ProjectStatus;
use App\Library\GenerateCodeNumber;
use App\Library\ExportExcel;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Mail;
use App\Library\ButtonCreator;


class ApiProjectController extends Controller
{
        /*
         * Get all projects which status are 'open_for_funding' and 'unfunded_open' via api
         * Shown in home page
         */
        public function index()
        {
            $role = session('current')['role'];
            $url = "investment/project";
            $project_investment = ClientRequest::getClientRequest($url);
            $url = "projects";
            $projects = ClientRequest::getClientRequest($url);
            return view('projects' , compact('projects','role','project_investment'));

        }


        /*
         * Get all projects which status are 'open_for_funding' and 'unfunded_open' via api
         * Shown in all projects page
         */
        public function allProject($id = null)
        {
            $role = session('current')['role'];
            $url = "investment/project";
            $project_investment = ClientRequest::getClientRequest($url);
            $url1="";
            if($id == null) {

                $url1 = "projects/all";

            }
            else {

                $url1 = "projects/all?page=" . $id;

            }
            $projects=ClientRequest::getClientRequest($url1);
            return view('all_projects' , compact('projects','role','project_investment'));
        }


        /*
         * This is the projects datatable view
         * Where finance and admin can view,update,delete and do other action
         */
        public function datatable(){

            return view('finance.project');

        }


        /*
         * Get all projects via api to show in datatable
         * Able to export the csv file
         */
        public function AllProjects(Request $request, ExportExcel $exportobj)
        {
            $url = "finance";
            $projects = ClientRequest::getClientRequest($url);

            $projects_data = Datatables::of($projects["data"])->addColumn('action', function ($projects) {

                   return ButtonCreator::generateButtons('Projects' , $projects["id"] );

                })->make(true);

            $length = $request->query('length');
            if($length == -1){

                $exportobj->export(json_decode($projects_data->content(), true), $request->query('filename'), 'projects');
                return Response::json(array(
                    'success' => true
                ));

            }else{

                return $projects_data;
            }

        }


        /*
         * This is the view of project uploading
         */
        public function projectForm()
        {
            $borrowers = $this->getBorrowers();
            $categories = $this->getCategories();
            $states = $this->getStates();
            return view('project_upload' , compact('categories','borrowers','states'));
        }


        /*
         * This is the function of inserting the project into database via api
         */
        public function insertProject(Request $request)
        {
            $url = 'projects/store';
            $form_value = [

            'borrower_id'=>$request->get('borrower_id'),
            'field_officers_id'=>session('current')['id'],
            'project_title'=>$request->get('project_title'),
            'category_id'=>$request->get('category_id'),
            'loan_value'=>$request->get('loan_value'),
            'return_estimation_proposed'=>$request->get('return_estimation_proposed'),
            'minimum_investment_amount'=>10000,
            'collateral_availability'=>$request->get('collateral_availability'),
            'collateral_estimated_value'=>$request->get('collateral_estimated_value'),
            'collateral_description'=>$request->get('collateral_description'),
            'collateral_evidence'=>$request->get('collateral_evidence'),
            'project_period'=>$request->get('project_period'),
            'state'=>$request->get('state'),
            'township'=>$request->get('township'),
            'project_location'=>$request->get('project_location'),
            'project_image'=>$request->get('project_image'),
            'project_description'=>$request->get('project_description'),
            'fund_closing_date'=>$request->get('fund_closing_date'),
            'project_start_date'=>$request->get('project_start_date'),
            'project_end_date'=>$request->get('project_end_date'),
            'status'=>'draft',
            'commodity'=>$request->get('commodity')

            ];
            //$url1 = "projects/";
            //$code_no = GenerateCodeNumber::generateCode($url1);
            //$form_value['code_no'] = "PRJ-".$code_no;
            $message = ClientRequest::postClientRequest($url , $form_value);
            return redirect('project/form')->with('status' , $message);

        }


        /*
         * This is the function of updating the project by finance via api
         */
        public function updateProject(Request $request)
        {
            $id = $request->get('id');

            $url = "projects/".$id;

            $form_value = [

                'return_estimation_approved'=>$request->get('return_estimation_approved'),
                'profit_sharing_estimation'=>$request->get('profit_sharing_estimation'),
                'profit_sharing_description'=>$request->get('profit_sharing_description'),
                'collateral_estimated_value'=>$request->get('collateral_estimated_value'),
                'project_risk'=>$request->get('project_risk'),
                'project_grade'=>$request->get('project_grade'),
                'status'=>$request->get('status'),
                'comment'=>$request->get('comment'),
                'featured'=>$request->get('featured')

            ];
            $project = ClientRequest::patchClientRequest($url,$form_value);
            return Redirect::back()->with('success' , $project);

        }


        /*
         * Get all borrowers via api
         */
        public function getBorrowers()
        {
            $url = "borrowers";
            $borrowers = ClientRequest::getClientRequest($url);
            return $borrowers;

        }

        /*
         * Get all categories via api
         */
        public function getCategories()
        {
            $url = "categories";
            $categories = ClientRequest::getClientRequest($url);
            return $categories;

        }


        /*
         * This is the view of specific project info
         * Get by the id of the project via api
         */
        public function info($id)
        {

            $role = session('current')['role'];
            $verified = "";
            if(isset(session('current')['verified'])){

                $verified=session('current')['verified'];

            }
            if($role == "lender" && $verified == '0'){

                return view('errors.error')->with('error' , 'Your account is not yet verified to start investing. Please contact administartor to start investing');
            }
            $p_status = ProjectStatus::getStatus();
            $url = "projects/".$id;
            $project = ClientRequest::getClientRequest($url);
            $payment = $this->searchPaymentByFinance($id);
            $payment_transaction_no = "";
            $giveLoanToBorrower = "";
            if($payment != "No record found")
            {
                $payment_transaction_no=$payment['data']['transaction_no'];
                $giveLoanToBorrower = $payment;
               
            }
            $profit = $this->searchRecordProfit($id);
            $profit_transaction_no = "";
            if ($profit != "No record found") {

                $profit_transaction_no = $profit['data']['transaction_no'];
            }
            if($role == "lender") {

                if ($payment_transaction_no && $profit_transaction_no) {
                    $error = "Investment cannot be made to the Project ID :" . $project['data'][0]['code_no'] . " because it is not available for funding";
                    return view('errors.error' , compact('error'));
                }
            }
            session(['project_id' => $id]);
            $total_funded = "";
            $url = "investment/project";
            $project_investment = ClientRequest::getClientRequest($url);
            for($i = 0; $i < count($project_investment['data']); $i++)
            {
                if( $id == $project_investment['data'][$i]['project_id']) {

                    $total_funded = $project_investment['data'][$i]['total_funded'];
                }
            }
            $this->projectProfitDistribution($id);
            $this->ProjectInvestments($id);
            $this->projectProgress($id);
            $this->projectLog($id);
            $total_loan_from_borrower = $this->totalLoanFromBorrower($id);
            $total_revenue =  $this->totalRevenue($id);
            //dd($project);die();
            return view('project_info' , compact('project','role','total_funded','p_status','id','payment_transaction_no','profit_transaction_no','giveLoanToBorrower','total_loan_from_borrower','total_revenue'));

        }

        /*
         * This the function of investing the particular project by a lender
         */
        public function investment(Request $request)
        {
            session()->forget('investment');
            $profit_sharing_estimation = $request->get('profit_sharing_estimation');
            $return_estimation_approved = $request->get('return_estimation_approved');
            $loan_value = $request->get('loan_value');
            $investment_info = $request->all();

            array_shift($investment_info);
            $transaction_no = $this->generateTransactionNo();
            $investment_info['transaction_no'] = "INV-".$transaction_no;
            $amount = $investment_info['amount'];
            $display_amount = $this->generateAmountToTransfer($amount);

            // check whether the display amount is over limited amount of the system or not
            if(strlen($display_amount)==6) {

                if($display_amount>$amount+200) {

                    return view('investment')->with('status' , 'error occurred');
                }
            }
            else {

                if($display_amount>$amount+200) {

                    return view('investment')->with('status','error occurred');
                }
            }

            // check whether the lender's investment amount is over total-funded or not according to loan value of the project

            $url = "check/lender/investment/project/".$request->get('project_id');
            $result = ClientRequest::getClientRequest($url);
            $total_funded_of_this_project = $result['data'][0]['total'];
            $left = $loan_value-$total_funded_of_this_project;
            if($total_funded_of_this_project == $loan_value) {

                return view('investment')->with('status' , 'The project is fully funded now');

            }
            if($amount > $left) {

                return view('investment')->with('status' , 'Your investment amount is more than needed amount of loan amount');

            }
            $profits_lenders = round(($return_estimation_approved*$profit_sharing_estimation)/100);
            $per_lender_percent = ($amount*100) / $loan_value;
            $per_lender_profit = ($profits_lenders * $per_lender_percent) / 100;
            $investment_info['profit_estimation'] = $per_lender_profit;
            $investment_info['profit_percentage'] = $per_lender_percent;
            $investment_info['display_amount'] = $display_amount;
            Session::push('investment', $investment_info);
            return view('investment');

        }


        /*
         * This is the function of generating  the transaction no for the investment
         * Checking the transaction no whether it is already in database or not
         */
        public function generateTransactionNo()
        {
            $transaction_no = "";
               while(true) {
                   $transaction_no = mt_rand(100000000,999999999);
                   $url = "investment/".$transaction_no."/search/transaction";
                   $result = ClientRequest::getClientRequest($url);
                   if($result == "No record found") {
                       break;
                   }

               }
            return $transaction_no;

        }


        /*
         * This is the function of generating the transferred amount according to a lender's investment amount
         * Investment amount is increased by 10 according to investment status
         */
        public function generateAmountToTransfer($amount)
        {

            $add = 10;
            $amount_transfer = $amount + $add;
            $display = array();
            $add1 = 10;
            $length = strlen($amount);

            if($length == 6) {

                for($i = 0;$i < 20; $i++)
                {
                    $display[] = $amount+$add1;

                    $add1 += 10;
                }
            }
            else {

                for ($i = 0; $i < 20; $i++) {
                    $display[] = $amount + $add1;

                    $add1 += 10;
                }
            }
            $amount_transfer1 = $display[count($display)-1];
            $url = "investment/" . $amount_transfer . "/" . $amount_transfer1 . "/search/display/amount";
            $result = ClientRequest::getClientRequest($url);
            if ($result == "No record found") {

                    return $amount_transfer;

            }
            else {

                    for ($i = 0; $i <count($display); $i++) {

                        if ($result['data'][count($result['data'])-1]['display_amount'] == $display[$i]) {

                            if ($result['data'][count($result['data'])-1]['status'] == "pending") {

                                return $display[$i] + $add;

                            } else {

                                return $display[$i];

                            }

                        }
                    }
            }

        }


        /*
         * This is function of confirming the investment by a lender
         */
        public function confirm()
        {
            $json = json_encode(session('investment')[0], true);
            $url = "investment/store";
            $form_value = [

                'project_id'=>session('investment')[0]['project_id'],
                'lender_id'=>session('investment')[0]['lender_id'],
                'investment_date'=>date('Y-m-d H:i:s'),
                'amount'=>session('investment')[0]['amount'],
                'profit_estimation'=>session('investment')[0]['profit_estimation'],
                'profit_percentage'=>session('investment')[0]['profit_percentage'],
                'display_amount'=>session('investment')[0]['display_amount'],
                'transaction_no'=>session('investment')[0]['transaction_no'],
                'investment_type'=>session('investment')[0]['investment_type'],
                'investment_details'=>$json,

              ];

            $message = ClientRequest::postClientRequest($url,$form_value);
            session()->forget('investment');
            return view('errors.success' , compact('message'));

        }

        /*
         * Get all investments via api to show in datatable
         */
        public function AllInvestments(Request $request)
        {
            $url = 'investments';

            // * call the get client request to access api to show all the lenders
            $investments = ClientRequest::getClientRequest($url);
            return Datatables::of($investments["data"])->make(true);

        }


        /*
         * Get all investments of the particular project by project id via api to show in datatable
         */
        public function ProjectInvestments($id)
        {

            $url = 'investments/'.$id;


            // * call the get client request to access api to show all the investments of the project
            $investments = ClientRequest::getClientRequest($url);

            return Datatables::of($investments["data"])->addColumn('action', function ($investments) {


                     return ButtonCreator::generateButtons('Investments', $investments["id"] );

            })->editColumn('investment_date', function ($investments) {

                        return $investments["investment_date"] ? with(new Carbon($investments["investment_date"]))->format('d-M-Y') : '';
            })->make(true);

        }


        /*
        * Get all project progress of the particular project by project id via api
        * To show in datatable
        */
        public function projectProgress($id)
        {

            $url = 'project/progress/'.$id;

           // * call the get client request to access api to show all the progresses of the project
            $progress = ClientRequest::getClientRequest($url);
            

            return Datatables::of($progress["data"])
            ->addColumn('action', function ($progress) {

                return ButtonCreator::generateButtons('Project_Progress', $progress["id"] );


            })

            ->editColumn('progress_date', function ($progress) {
                return $progress["progress_date"] ? with(new Carbon($progress["progress_date"]))->format('d-M-Y') : '';
            })
            ->make(true);

        }

        /*
        * Get all logs of the particular project by project id via api
        * To show in datatable
        */
        public function projectLog($name)
        {
            $url = "logs/".$name;
            $log = ClientRequest::getClientRequest($url);
            return Datatables::of($log["data"])
                ->editColumn('date', function ($log) {
                    return $log["date"] ? with(new Carbon($log["date"]))->format('d-M-Y') : '';
                })
                ->make(true);

        }

        /*
         * This is the view of list of all logs of the particular project
         */
        public function log($name)
        {

            return view('projectlog',compact('name'));
        }

        /*
         * This is the view of the project progress detail
         * By id of the project progress via api
         */
        public function detailProjectProgress($id)
        {

            $url = 'project/progress/detail/'.$id;
            $progress = ClientRequest::getClientRequest($url);
            return view('finance.project_progress_detail',compact('progress'));

        }


        /*
        * This is the view of investment detail
        * Get by id of the investment via api
        */
        public function displayInvestment($id)
        {

            $url = "investmentsdetail/".$id;
            $investment = ClientRequest::getClientRequest($url);
            $payment = $this->searchPaymentByFinance($investment['data'][0]['project_id']);
            $payment_transaction_no = "";
            if($payment != "No record found") {

                $payment_transaction_no=$payment['data']['transaction_no'];

            }
            $profit = $this->searchRecordProfit($investment['data'][0]['project_id']);
            $profit_transaction_no = "";
            if($profit != "No record found") {

                $profit_transaction_no=$profit['data']['transaction_no'];

            }
            if($investment == "Project does not exist") {

                 return view('errors.api_error')->with('error' , $investment);

            }
            return view('investment_detail' , compact('investment','payment_transaction_no','profit_transaction_no'));

        }


        /*
        * This is function of approving,rejecting and refunding the investment of the particular project
        *  By finance or admin
        */
        public function updateInvestment(Request $request)
        {
           
            $status = $request->get('status');
            $id = $request->get('id');
            $form_value = [

                'status'=>$request->get('status')
               
            ];

            $data = [

             'email'=>$request->get('email'),
              'amount'=>$request->get('amount'),
              'project_title'=>$request->get('project_title'),
              'code_no'=>$request->get('code_no'),
              'loan_value'=>$request->get('loan_value'),
              'name'=>$request->get('name'),
              'transaction_no'=>$request->get('transaction_no'),
              'investment_date'=>$request->get('investment_date')

            ];
            $state = "lender_investment_status";
            $f_url = "send/mail/flag/".$state;
            $result = ClientRequest::getClientRequest($f_url);
            $flag = $result['data'][0]['flag'];
            if ($status == "approved") {

                $project_id = $request->get('project_id');
                $loan_value = $request->get('loan_value');
                $amount = $request->get('amount');
                $url = "update_status/".$project_id;
                $total_invest = ClientRequest::getClientRequest($url);
                $value = $loan_value - $total_invest['data'][0]['total'];
                if ($amount <= $value) {

                    if($flag==1) {

                        $data['subject'] = "Your investment is approved";
                        $data['title'] = "Investment Approval";
                        $data['status'] = "approved";
                        try {
                            Mail::send('finance.mail.index', $data, function ($message) use ($data) {
                                $message->to($data['email']);
                                $message->subject($data['subject'], $data['title'], $data['code_no'], $data['transaction_no'], $data['amount'], $data['investment_date'], $data['loan_value'], $data['project_title'], $data['name'], $data['status']);

                            });
                        } catch (\Exception $e) {

                            return Redirect::back()->with('error', "Something went wrong while sending email to lender");

                        }
                    }

                    $url = "investments/".$id;
                    $investment = ClientRequest::patchClientRequest($url,$form_value);
                    return Redirect::back()->with('status' , $investment);
                }
                else{

                    return Redirect::back()->with('error' , 'Investment approval failed because it is more than required loan amount.');

                }
            }else if($status == "rejected"){

                if($flag==1) {

                    $data['subject'] = "Your investment is rejected";
                    $data['title'] = "Investment Rejection";
                    $data['status'] = "rejected";
                    try {
                        Mail::send('finance.mail.index', $data, function ($message) use ($data) {
                            $message->to($data['email']);
                            $message->subject($data['subject'], $data['title'], $data['code_no'], $data['transaction_no'], $data['amount'], $data['investment_date'], $data['loan_value'], $data['project_title'], $data['name'], $data['status']);

                        });
                    } catch (\Exception $e) {
                        return Redirect::back()->with('error', "Something went wrong while sending email to the lender");
                    }
                }

                $url = "investments/".$id;
                $investment = ClientRequest::patchClientRequest($url , $form_value);
                return Redirect::back()->with('status' , $investment);
                
            }else if($status == "refunded"){

                if($flag==1) {

                    $data['subject'] = "Your investment is refunded";
                    $data['title'] = "Investment refunded";
                    $data['status'] = "refunded";
                    try {
                        Mail::send('finance.mail.index', $data, function ($message) use ($data) {
                            $message->to($data['email']);
                            $message->subject($data['subject'], $data['title'], $data['code_no'], $data['transaction_no'], $data['amount'], $data['investment_date'], $data['loan_value'], $data['project_title'], $data['name'], $data['status']);

                        });
                    } catch (\Exception $e) {

                        return Redirect::back()->with('error', "Something went wrong while sending email to the lender");

                    }
                }
                $url = "investments/".$id;
                $investment = ClientRequest::patchClientRequest($url , $form_value);
                return Redirect::back()->with('status' , $investment);
            }
            else {

                $url = "investments/".$id;
                $investment = ClientRequest::patchClientRequest($url , $form_value);
                return Redirect::back()->with('status', $investment);

            }

        }

        /*
        *Total Loan Return From Borrower
        */
        public function totalLoanFromBorrower($id)
        {
            $url = "check/loan_return/".$id;
            $total_loan_from_borrower = ClientRequest::getClientRequest($url);
            return $total_loan_from_borrower;

        }
        /*
        *Total revenue after profit distribution
        */
        public function totalRevenue($id)
        {
            $url = "total_revenue/".$id;
            $total_revenue = ClientRequest::getClientRequest($url);
            return $total_revenue;

        }

        /*
        * Get all the lenders' profit of the particular project by project id via api
        *  To show in datatable
        */
        public function projectProfitDistribution($id)
        {

            $url = "profit_distribution/show/".$id;
            $project_profit_distribution = ClientRequest::getClientRequest($url);
            return Datatables::of($project_profit_distribution['data'])
            ->addColumn('action', function ($project_profit_distribution) {

                    return ButtonCreator::generateButtons('Profits', $project_profit_distribution["id"] );

            })->make(true);

        }

        /*
        * Check whether the payment is made to a borrower of the particular project or not
        */
        public function searchPaymentByFinance($id)
        {

            $url = "payment/".$id."/search/project";
            $result = ClientRequest::getClientRequest($url);
            return $result;

        }


        /*
        * Check whether the profit is made to lenders of the particular project or not
        */
        public function searchRecordProfit($value)
        {

            $url = "profit/".$value."/search/project";
            $result = ClientRequest::getClientRequest($url);
            return $result;

        }


        /*
        * This is the view of Profit Distribution detail
        * Get by id via api
        */
        public function profitDistribution($id)
        {

            $url = "profit_distribution/display/".$id;
            $profit_distribution = ClientRequest::getClientRequest($url);
            return view('finance.profit_distribution_detail' , compact('profit_distribution'));

        }


        /*
        * This is the function of delivering the profits to lenders by finance
        */
        public function profitDistributionUpdate(Request $request , $id)
        {
            $form_value = [

              "id"=>$request->get('profit_distribution_id'),
              'profit_paid_date'=>$request->get('profit_paid_date')

            ];
            $url = "profit_distribution/display/".$id;
            $profit_distribution = ClientRequest::patchClientRequest($url,$form_value);
            return Redirect::back()->with('status', $profit_distribution);

        }


        /*
        * This is the view of project update form
        * By project id
        */
        public function projectDetailUpdateFinanceForm($id)
        {
            $borrowers = $this->getBorrowers();
            $categories = $this->getCategories();
            $states = $this->getStates();
            $township = $this->getTownship();
            $url = "projects/".$id;
            $project = ClientRequest::getClientRequest($url);
            return view('project_upload' , compact('categories','borrowers','project','states','township'));

        }


        /*
        * This is function of updating the particular project by finance
        * By project id
        */
        public function projectDetailUpdateFinance($id , Request $request)
        {

            $url = "projects/".$id;
            $form_value = [

                "project_title"=>$request->get('project_title'),
                "borrower_id"=>$request->get('borrower_id'),
                "category_id"=>$request->get('category_id'),
                "loan_value"=>$request->get('loan_value'),
                "return_estimation_proposed"=>$request->get('return_estimation_proposed'),
                "collateral_availability"=>$request->get('collateral_availability'),
                "collateral_estimated_value"=>$request->get('collateral_estimated_value'),
                "collateral_description"=>$request->get('collateral_description') != "" ? $request->get('collateral_description') : " ",
                "collateral_evidence"=>$request->get('collateral_evidence') != "" ? $request->get('collateral_evidence') : " ",
                "project_period"=>$request->get('project_period'),
                "state"=>$request->get('state'),
                "township"=>$request->get('township'),
                "project_location"=>$request->get('project_location'),
                "project_image"=>$request->get('project_image'),
                "project_description"=>$request->get('project_description'),
                "fund_closing_date"=>$request->get('fund_closing_date'),
                "project_start_date"=>$request->get('project_start_date'),
                "project_end_date"=>$request->get('project_end_date'),
                "commodity"=>$request->get('commodity'),

            ];
            $project = ClientRequest::patchClientRequest($url  ,$form_value);
            return Redirect::back()->with('status' , $project);

        }


        /*
        * This is function of deleting the particular project by finance
        * By project id
        */
        public function delete($id)
        {

            $url = "projects/".$id;
            $message = ClientRequest::deleteClientRequest($url);
            return $message;

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


}




