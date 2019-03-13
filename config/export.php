<?php
return [
    'excel' => [
        'lenders' => array('id' => 'ID', 'name' => 'Name', 'nrc' => 'NRC', 'dob' => 'DOB', 'state' => 'State' , 'township' => 'Township', 'address'=> 'Address'),

        'officers' => array('id' => 'ID', 'name' => 'Name', 'nrc' => 'NRC', 'dob' => 'DOB', 'state' => 'State' , 'township' => 'Township', 'address'=> 'Address'),
        'borrowers' => array('id' => 'ID', 'name' => 'Name', 'nrc' => 'NRC', 'dob' => 'DOB', 'state' => 'State' , 'township' => 'Township', 'address'=> 'Address'),
        'projects'=>array('code_no'=>'Code No','project_title'=>'Project Title','title'=>'Project Category','name'=>'Name','nrc'=>'NRC','status'=>'Status'),
        'pages'=>array('id'=>'ID','title'=>'Title','route'=>'Route'),

        'lender_investments' =>array('code_no'=> 'Code No', 'project_title' =>'Project Title', 'title' => 'Category', 'transaction_no'=>'Transaction No', 'investment_date'=>'Investment Date', 'amount' => 'Amount', 'profit_estimation' => 'Profit Estimation', 'profit_percentage' => 'Profit Percentage', 'status' => 'Status'),

        'borrower_projects' => array('id' => 'Id', 'borrower_id' => 'Borrower Id', 'field_officers_id' => 'Field Officers Id', 'code_no' => 'Code No', 'project_title' => 'Project Title', 'loan_value' => 'Loan Value', 'return_estimation_proposed' => 'Return Estimation Proposed', 'return_estimation_approved' => 'Return Estimation Approved', 'profit_sharing_estimation' => 'Profit Sharing Estimation', 'profit_sharing_description' => 'Profit Sharing Description', 'minimum_investment_amount' => 'Minimum Investment Amount', 'collateral_availability' => 'Collateral Availability', 'collateral_estimated_value' => 'Collateral Estimated Value')

    ]
];