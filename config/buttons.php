<?php
return [
    'buttons' => [
        'View' => array('color' => 'btn-info', 'icon' => 'fa-eye', 'text' => 'View'),
        'Update' => array('color' => 'btn-success', 'icon' => 'fa-edit', 'text' => 'Update'),
        'Delete' => array('color' => 'btn-warning', 'icon' => 'fa-times', 'text' => 'Delete'),
        'Give_Loan'=>array('color' => 'btn-primary', 'icon' => 'fa-money', 'text' => 'Giving Loan to borrower'),
        'Profit_Distribution'=>array('color' => 'btn-primary', 'icon' => 'fa-credit-card', 'text' => 'Profit Distribution'),
        'Preview'=>array('color' => 'btn-info cms-preview', 'icon' => 'fa fa-eye', 'text' => 'Preview')

        
    ],
    'buttons_access' =>[
    	 'admin' => [
    	 	"Officers" => array('View', 'Update', 'Delete'),
    	 	"Borrowers"=> array('View', 'Update', 'Delete'),
		    "Lenders"=> array('View', 'Update', 'Delete'),
             "Projects"=> array('View', 'Update', 'Give_Loan', 'Profit_Distribution', 'Delete'),
		    "CMS"=> array('Preview', 'Update', 'Delete'),
             "Investments"=>array('Update'),
             "Profits"=>array('Update'),
            "Project_Progress"=>array('View')

    	 ],
    	 'finance' => [
    	 	 "Officers" => array('View'),
		     "Borrowers"=> array('View'),
		     "Lenders"=> array('View'),
             "Projects"=> array('View', 'Update', 'Give_Loan', 'Profit_Distribution'),
		     "CMS"=> array('Preview', 'Update'),
             "Investments"=>array('Update'),
             "Profits"=>array('Update'),
             "Project_Progress"=>array('View')
    	 ]
    ],
    'buttons_paths' => [
    	"Officers" => array('View'=>'/officers/info/', 'Update'=>'/officers/edit/', 'Delete'=>'/officers/delete/'),
	 	"Borrowers"=> array('View'=>'/borrowers/info/', 'Update'=>'/borrowers/edit/', 'Delete'=>'/borrowers/delete/'),
	    "Lenders"=> array('View'=>'/lenders/detail/', 'Update'=>'/lenders/edit/','Delete'=>'/lenders/delete/'),
	    "Projects"=> array('View'=>'/projects/info/', 'Update'=>'/finance/projects/detail/update/', 'Delete'=>'/finance/projects/delete/', 'Give_Loan'=>'/finance/give-loan-to-borrower/', 'Profit_Distribution'=>'/finance/receive-payment/'),
	    "CMS"=> array('Preview'=>'#','Update'=>'/pages/edit/', 'Delete'=>'/pages/delete/'),
        "Investments"=>array('Update'=>'/investments/display/'),
        "Profits"=>array('Update'=>'/profit_distribution/display/'),
        "Project_Progress"=>array('View'=>'/project_progress/detail/'),
    ]
];