<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','ApiProjectController@index');

Route::get('login','Auth\LoginController@loginForm');
Route::post('login','Auth\LoginController@login');
/*
Route::get('welcome',function(){
    if(session('token'))
    {
        return view('home');
    }
    return redirect('login');

});
*/
Route::get('forbidden',function(){
    return view('errors.forbidden');
});

Route::get('logout','Auth\LoginController@logout');


/* ----------------Filed Officers Route----------------------*/

Route::get('officer/form','ApiFieldOfficerController@officerForm')->middleware('Officer');
Route::post('officer/form','ApiFieldOfficerController@insertOfficer');

/*------------- data table--------------------------*/
Route::get('officers/getdata','ApiFieldOfficerController@AllOfficers');




Route::get('officers/edit/{id}','ApiFieldOfficerController@EditOfficer')->middleware('Finance');
Route::post('officers/edit/{id}','ApiFieldOfficerController@UpdateOfficer')->middleware('Finance');
Route::get('officers/delete/{id}','ApiFieldOfficerController@delete')->middleware('Finance');
Route::get('officers/info/{id}','ApiFieldOfficerController@detail')->middleware('Finance');


/*----------------   end --------------------------------*/

/* ---------------- Lenders Route----------------------*/

Route::get('lender/form','ApiLenderController@lenderForm');
Route::post('lender/form','ApiLenderController@insertLender');
Route::get('lenders/edit/{id}','ApiLenderController@editLender')->middleware('Finance');
Route::post('lenders/edit/{id}','ApiLenderController@updateLender');
Route::get('lenders/detail/{id}','ApiLenderController@detail')->middleware('Finance');
Route::post('lenders/detail/{id}','ApiLenderController@updateAccountStatus')->middleware('Finance');



Route::get('lender/my-investments/{id}','ApiLenderController@investments');



Route::get('lenders/delete/{id}','ApiLenderController@delete')->middleware('Finance');

/*------------- data table--------------------------*/

Route::get('lenders/getdata','ApiLenderController@allLenders');
Route::get('lenders/getdata/{id}','ApiLenderController@my_investments');

Route::get('lender/available-revenue/{id}','ApiLenderController@available');
Route::get('lender/revenueData/{id}','ApiLenderController@revenue_Available');

Route::get('lender/not-available-revenue/{id}','ApiLenderController@notAvailable');
Route::get('lender/notrevenueData/{id}','ApiLenderController@revenue_notAvailable');

Route::get('lender/project-progress/{id}','ApiLenderController@progress_form');
Route::get('lender/progressData/{id}','ApiLenderController@projectProgress');




/*----------------   end --------------------------------*/

/* ----------------Borrowers Route----------------------*/

Route::get('borrower/form','ApiBorrowerController@borrowerForm')->middleware('Borrower');
Route::post('borrower/form','ApiBorrowerController@insertBorrower');

Route::get('borrowers/edit/{id}','ApiBorrowerController@editBorrower')->middleware('Finance');
Route::post('borrowers/edit/{id}','ApiBorrowerController@updateBorrower');

Route::get('borrowers/delete/{id}','ApiBorrowerController@delete')->middleware('Finance');
Route::get('borrowers/my-projects/{id}','ApiBorrowerController@projects');

Route::get('borrowers/info/{id}','ApiBorrowerController@detail')->middleware('Finance');
Route::post('borrowers/info/{id}','ApiBorrowerController@givePoint')->middleware('Finance');

Route::get('borrowers/{id}','ApiBorrowerController@showBorrower');


/*------------- data table--------------------------*/
Route::get('borrowers','ApiBorrowerController@index')->middleware('Officer');
Route::get('borrowerData','ApiBorrowerController@allBorrowers');
Route::get('borrowerData/{id}','ApiBorrowerController@allProjects');


/*----------------   end --------------------------------*/


/*------------------ Projects Route -----------------*/

Route::get('project/form','ApiProjectController@projectForm')->middleware('Project');
Route::post('project/form','ApiProjectController@insertProject');
Route::post('projects/update','ApiProjectController@updateProject');
Route::get('projects','ApiProjectController@index');
Route::get('projects/page/{id?}','ApiProjectController@allProject');
Route::get('projects/info/{id}','ApiProjectController@info');
Route::post('projects/info/{id}','ApiProjectController@investment');

Route::get('payment/bank-transfer-successful','ApiProjectController@confirm');

Route::get('projects/getdata','ApiProjectController@allProjects');

Route::get('finance/projects/detail/update/{id}','ApiProjectController@projectDetailUpdateFinanceForm')->middleware('Finance');
Route::post('finance/projects/detail/update/{id}','ApiProjectController@projectDetailUpdateFinance');
Route::get('finance/projects/delete/{id}','ApiProjectController@delete');

/*----------------------- end -----------------------*/

/*----------------------- Data Table -----------------------*/

Route::get('investments/getdata','ApiProjectController@AllInvestments');
Route::post('investment/update','ApiProjectController@updateInvestment');
Route::get('projectinvestment/getdata/{id}','ApiProjectController@ProjectInvestments')->middleware('Finance');
Route::get('project/profit/distribution/getdata/{id}','ApiProjectController@projectProfitDistribution')->middleware('Finance');

Route::get('investments/display/{id}','ApiProjectController@displayInvestment')->middleware('Finance');
Route::get('profit_distribution/display/{id}','ApiProjectController@profitDistribution')->middleware('Finance');
Route::post('profit_distribution/display/{id}','ApiProjectController@profitDistributionUpdate')->middleware('Finance');

/*----------------------- end -----------------------*/


/*--------------------FileUpload----------------------------*/

Route::post('/upload/file','FileController@uploadFile');


/*---------------------end----------------------------*/


/* ------------------- finance -------------------------*/

Route::get('finance/field-officers-listing','ApiFinanceController@index')->middleware('Finance');
Route::get('finance/borrowers-listing','ApiFinanceController@borrower')->middleware('Finance');
Route::get('finance/lenders-listing','ApiFinanceController@lender')->middleware('Finance');
Route::get('finance/projects-listing','ApiFinanceController@project')->middleware('Finance');

Route::get('finance/give-loan-to-borrower/{id}','ApiFinanceController@payment')->middleware('Finance');
Route::post('finance/give-loan-to-borrower/{id}','ApiFinanceController@insertPayment')->middleware('Finance');
Route::get('/finance/loan-return/getdata/{id}','ApiFinanceController@loanReturn')->middleware('Finance');
Route::post('finance/loan-return/pay','ApiFinanceController@insertLoanReturn')->middleware('Finance');
Route::get('finance/receive-payment/{id}','ApiFinanceController@profit')->middleware('Finance');
Route::post('finance/profit-distribution','ApiFinanceController@profitCalculation')->middleware('Finance');
Route::get('finance/project/progress/form','ApiFinanceController@projectProgressForm')->middleware('Finance');
Route::post('finance/project/progress/form','ApiFinanceController@projectProgressStore')->middleware('Finance');
Route::get('project/progress/{id}','ApiProjectController@projectProgress')->middleware('Finance');
Route::get('project_progress/detail/{id}','ApiProjectController@detailProjectProgress')->middleware('Finance');
Route::get('project/log/{table}','ApiProjectController@projectLog')->middleware('Finance');
Route::get('project/log/detail/{table}','ApiProjectController@log')->middleware('Finance');


/* ------------------- showing investment table -------------------------*/

// ------------ **********----------------
Route::get('finance/dashboard/investments','ApiFinanceController@investments')->middleware('Finance');


/* ------------------- end ----------------------------*/
Route::get('profile',function(){
    if(session('token')) {
        if(session('current')['role']=='lender' || session('current')['role']=='borrower' || session('current')['role']=='field-officer')
        return view('profile');
    }
    return redirect('forbidden');
});




Route::get('township/{state}','ApiLenderController@showTownship');

/*---------------- forgot password ------------------------------*/
Route::get('forgot/password','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('forgot/password','Auth\ResetPasswordController@reset');
Route::get('reset/password/{email}/{token}','Auth\ResetPasswordController@showResetForm');
Route::post('reset/password/{email}/{token}','Auth\ResetPasswordController@resetPassword');
/*----------------  end ------------------------------------------------*/

/*------------------ edit profile/password---------------------------*/
Route::get('edit/profile','ProfileController@profileEdit');
Route::post('edit/profile/{id}','ProfileController@profileUpdate');
Route::get('change/password','ProfileController@changePasswordForm');
Route::post('change/password','ProfileController@changePassword');


Route::get('lender/profile','ApiLenderController@activeFundingInvestment')->middleware('Lender');
Route::post('lender/profile','ApiLenderController@TestUpload');

/*----------------------- end --------------------------------*/

Route::get('pages','ApiPagesController@create')->middleware('Finance');;
Route::post('pages','ApiPagesController@store')->middleware('Finance');;
Route::get('finance/page','ApiPagesController@index')->middleware('Finance');
Route::get('pageData','ApiPagesController@allPages')->middleware('Finance');;
Route::get('pages/{slug}','ApiPagesController@show')->middleware('Finance');;
Route::get('/pages/delete/{id}','ApiPagesController@destroy')->middleware('Finance');;

Route::get('pages/edit/{id}','ApiPagesController@edit');
Route::post('pages/edit/{id}','ApiPagesController@update');









