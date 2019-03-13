<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\ProjectStatus;
use App\Library\ClientRequest;
use App\Library\GenerateCodeNumber;
use Illuminate\Support\Facades\Redirect;
use Datatables;

class ApiFinanceController extends Controller
{
    /*
     * This is the view of list of all officers
     */
    public function index()
    {
        return view('finance.finance_dashboard');
    }

    /*
     * This is the view of list of all borrowers
     */
    public function borrower()
    {
        return view('finance.borrower');
    }


    /*
     * This is the view of list of all lenders
    */
    public function lender()
    {
        return view('finance.lender');
    }


    /*
     * This is the view of list of all projects
    */
     public function project()
    {
        return view('finance.project');
    }


    /*
     * This is the form  of payment to a borrower by finance
    */
    public function payment($id)
    {
        $p_status = ProjectStatus::getStatus();
        $url = "projects/".$id;
        $project = ClientRequest::getClientRequest($url);
        $role = session('current')['role'];
        $total_funded = "";
        $url = "investment/project";
        $project_investment = ClientRequest::getClientRequest($url);

        // Search if the payment of this project is already paid or not to borrower
        $payment = $this->searchPaymentByFinance($id);
        $payment_transaction_no = "";
        if ($payment != "No record found") {
            $payment_transaction_no = $payment['data']['transaction_no'];
        }

        //Search if the profit of this project is calculated or not
        $profit = $this->searchRecordProfit($id);
        $profit_transaction_no = "";

        if($profit != "No record found") {
            $profit_transaction_no = $profit['data']['transaction_no'];
        }

        for($i = 0; $i < count($project_investment['data']); $i++) {
            if( $id == $project_investment['data'][$i]['project_id']) {
                $total_funded = $project_investment['data'][$i]['total_funded'];
            }
        }

        return view('finance.payment',compact('project','role','total_funded','p_status','payment_transaction_no','profit_transaction_no'));
    }


    /*
     * This is the function of inserting the payment into database via api
     */
    public function insertPayment(Request $request)
    {
        $url = "payment/store";
        $form_value = [
            'project_id' => $request->get('project_id'),
            'payment_date' => $request->get('payment_date'),
            'amount' => $request->get('amount'),
            'remark' => $request->get('remark'),
            'attachment' => $request->get('attachment'),
        ];

        $loan_value=$request->get('loan_value');
        $amount=$request->get('amount');
        if($loan_value != $amount) {
            return Redirect::back()->with('status','The project have not received the required investment amount');
        }

        $status = $this->searchPaymentByFinance($request->get('project_id'));
        if($status != "No record found") {
            return Redirect::back()->with('status','Payment has already made to Borrower');
        }

        $transaction_no = $this->generateTransactionNoForPayment();
        $form_value['transaction_no'] = "LON-".$transaction_no;
        $message = ClientRequest::postClientRequest($url, $form_value);
        return view('errors.success',compact('message'));
    }


    /*
     * This is the view of list of all investments
    */
    public function investments()
    {
        return view('finance.investments');
    }


    /*
     * This is the form  of profit distribution to lenders by finance
    */
    public function profit($id)
    {
        $p_status = ProjectStatus::getStatus();
        $url = "projects/".$id;
        $project = ClientRequest::getClientRequest($url);
        $role = session('current')['role'];
        $total_funded = "";
        $url1 = "investment/project";
        $project_investment = ClientRequest::getClientRequest($url1);
        
        for($i = 0; $i < count($project_investment['data']); $i++) {
            if( $id == $project_investment['data'][$i]['project_id']) {
                    $total_funded = $project_investment['data'][$i]['total_funded'];
            }
        }
        // Search if the payment of this project is already in payment table or not
        $payment = $this->searchPaymentByFinance($id);
        $payment_transaction_no = "";
        
        if($payment != "No record found") {
            $payment_transaction_no = $payment['data']['transaction_no'];
        }
        //Search if the profit of this project is already in profit table or not
        $profit = $this->searchRecordProfit($id);
        $profit_transaction_no = "";
        
        if($profit != "No record found") {
            $profit_transaction_no = $profit['data']['transaction_no'];
        }
        //$this->loanReturn($id);

        $url2 = "check/loan_return/".$id;
        $loan_return_amount = ClientRequest::getClientRequest($url2);
        $loan_amount = $loan_return_amount['data'][0]['totalloanreturn'];
        $revenue = $project['data'][0]['loan_value'] + $project['data'][0]['return_estimation_approved'];
        $remaining_value = $revenue - $loan_amount;

        return view('finance.profit',compact('project','role','total_funded','p_status','payment_transaction_no','profit_transaction_no','id','loan_amount','revenue','remaining_value'));
        
    }



    /*
     * This is the function of inserting the profit distribution and profit into database via api
     */
    public function profitCalculation(Request $request)
    {
        $form_value = [
            'project_id'=>$request->get('project_id'),
            'profit_generated_date'=>$request->get('profit_generated_date'),
            'remark'=>$request->get('remark'),
            'attachment'=>$request->get('attachment')
        ];
        $status = $this->searchPaymentByFinance($request->get('project_id'));
        if($status == "No record found") {
            return Redirect::back()->with('status','Payment has not made to Borrower');
        }

        $result = $this->searchRecordProfit($request->get('project_id'));
        if($result != "No record found") {
            return Redirect::back()->with('status','Profit has already made to lenders');
        }

        $percent = $request->get('percent');
        $loan_value = $request->get('loan_value');
        $revenue = $request->get('revenue');
        $profit = $revenue-$loan_value;
        $form_value['profit'] = $profit;
        $form_value['revenue'] = $revenue;
        $url = "profit/";
        $transaction_no = GenerateCodeNumber::generateTransaction($url);
        $form_value['transaction_no'] = "PFT-".$transaction_no;
        $profit_revenue = ($profit*$percent)/100;
        $profit_id = $this->insertProfit($form_value);
        $investment = $this->GetInvestmentsByProject($request->get('project_id'));
        $lenders = [];

        for($i = 0; $i<count($investment['data']); $i++) {
            $percent_lender = ($investment['data'][$i]['amount']*100)/$loan_value;
            $profit_amount_lender = ($profit_revenue*$percent_lender)/100;
            $profit_revenue_lender=($investment['data'][$i]['amount']+$profit_amount_lender);
            $url1 = "profit_distribution/";
            $transaction_no1 = GenerateCodeNumber::generateTransaction($url1);
            array_push($lenders,
                ["lender_id"=>$investment['data'][$i]['lender_id'],
                "investment_id"=>$investment['data'][$i]['id'],
                "profit"=>$profit_amount_lender,
                "revenue"=>$profit_revenue_lender,
                "profit_id"=>$profit_id,
                "transaction_no"=>"DIS-".$transaction_no1,
                "profit_distribution_percentage"=>$percent_lender,
                'profit_paid_date'=>$request->get('profit_generated_date')
                ]);
        }

        $message = $this->insertProfitDistribution($lenders);
        return view('errors.success',compact('message'));
    }



    /*
     * This is the function of inserting the profit into database via api
     */
    public function insertProfit($form_value)
    {
        $url = "profit/store";
        $profit = ClientRequest::postClientRequest($url, $form_value);
        return $profit;
    }



    /*
     * This is the function of getting the investment of the specific project via api
     */
    public function GetInvestmentsByProject($id)
    {
        $url = "investments/project/".$id;
        $investment = ClientRequest::getClientRequest($url);
        return $investment;
    }

    /*
     * This is the function of inserting the profit distribution into database via api
     */
    public function insertProfitDistribution($form_value)
    {
        $result = "";
        for($i = 0; $i<count($form_value); $i++) {
            $url = "profit_distribution/store";
            $result = ClientRequest::postClientRequest($url, $form_value[$i]);
        }
        return $result;
    }


    /*
     * This is the function of generating  the transaction no for the payment
     * Checking the transaction no whether it is already in database or not
     */
    public function generateTransactionNoForPayment()
    {
        $transaction_no = "";
        while(true) {
            $transaction_no = mt_rand(100000000,999999999);
            $url = "payment/".$transaction_no."/search/transaction";
            $result = ClientRequest::getClientRequest($url);
            if($result == "No record found") {
                break;
            }
        }
        return $transaction_no;
    }


    /*
     * This is the function of searching the payment record to a borrower
     * Checking the payment record whether it is already in database or not
    */
    public function searchPaymentByFinance($id)
    {
        $url = "payment/".$id."/search/project";
        $result = ClientRequest::getClientRequest($url);
        return $result;
    }


    /*
     * This is the function of searching the profit record to lenders
     * Checking the profit record whether it is already in database or not
    */
    public function searchRecordProfit($value)
    {
      $url = "profit/".$value."/search/project";
      $result = ClientRequest::getClientRequest($url);
      return $result;
    }


    /*
     * This is the view project progress form
    */
    public function projectProgressForm()
    {
        return view('project_progress');
    }


    /*
     * This is the function of inserting the project progress into database via api
    */
    public function projectProgressStore(Request $request)
    {
        $url = "project/progress/store";
        $form_value = [
            'percentage'=>$request->get('percentage'),
            'attachment'=>$request->get('attachment'),
            'remark'=>$request->get('remark'),
            'project_id'=>$request->get('project_id'),
            'progress_date'=>$request->get('progress_date'),
        ];
        $message = ClientRequest::postClientRequest($url, $form_value);
        return redirect('projects/info/'.session('project_id'))->with('success', $message);
       
    }

    public function loanReturn($id)
    {
        $url = "loan_return/".$id."/search";

        // * call the get client request to access api to show all loan returns of the particular project
        $loan_returns = ClientRequest::getClientRequest($url);
        return Datatables::of($loan_returns["data"])->make(true);
    }

    public function insertLoanReturn(Request $request)
    {
        $url1 = "loan_return/";
        $transaction_no = GenerateCodeNumber::generateTransaction($url1);
        $url = "loan_return/store";
        $form_value = [
            'project_id'=>$request->get('project_id'),
            'payment_date'=>$request->get('payment_date'),
            'amount'=>$request->get('amount'),
            'remark'=>$request->get('remark'),
            'attachment'=>$request->get('attachment'),
            'transaction_no'=>"LRP-".$transaction_no
        ];
        $message = ClientRequest::postClientRequest($url,$form_value);
        //return $message;
        return Redirect::back()->with('success',$message);
    }

}
