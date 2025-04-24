<?php 

if (!function_exists('get_job_status_details')) {
    function get_job_status_details($id) {
        // Define status and sub-status mapping

        // Live 1 
        // In Progress  >> In Progress 
        // Under Review  >> TL Review (Sub Status)

        // On Hold  2 
        // On Hold >> On Hold 

        // Compeleted 4 
        // Completed
        // completed 

        // Draft 3 
       // Reviewed
       // sub status: (Can be started) / TL 

        $statuses = [
            1 => [
                'status' => 'In Progress',  //working
                'sub_status' => 'Reviewed (Can be started)',
                'badge_color' => 'badge-success'
            ],
            2 => [
                'status' => 'On Hold',  
                'sub_status' => 'On Hold',
                'badge_color' => 'badge-warning'
            ],
            3 => [
                'status' => 'Reviewed',
                'sub_status' => 'Can be started',  // junior ne completed >> senior in hand >> in Progress part   >> Live 
                'badge_color' => 'badge-info'
            ],
            4 => [
                'status' => 'Completed',
                'sub_status' => 'Completed',
                'badge_color' => 'badge-primary'
            ],
            5 => [
                'status' => ' Under Review',
                'sub_status' => 'TL Review',
                'badge_color' => 'badge-secondary'
            ],
        ];

        // Return the details based on job ID
        if (array_key_exists($id, $statuses)) {
            return $statuses[$id];
        } else {
            return null; // If no matching ID found
        }
    }
}

 

function getAllChecklists()
{
    return [
        ['id' => 1, 'assignment_type' => 'Year End Account', 'title' => 'Previous year Final account and Trial balance'],
        ['id' => 2, 'assignment_type' => 'Year End Account', 'title' => 'Previous year working paper'],
        ['id' => 3, 'assignment_type' => 'Year End Account', 'title' => 'Sales details'],
        ['id' => 4, 'assignment_type' => 'Year End Account', 'title' => 'Purchase / expenses details'],
        ['id' => 5, 'assignment_type' => 'Year End Account', 'title' => 'Bank account statements'],
        ['id' => 6, 'assignment_type' => 'Year End Account', 'title' => 'Credit card statement'],
        ['id' => 7, 'assignment_type' => 'Year End Account', 'title' => 'Loan / HP statements'],
        ['id' => 8, 'assignment_type' => 'Year End Account', 'title' => 'Payroll / CIS records'],
        ['id' => 9, 'assignment_type' => 'Year End Account', 'title' => 'Expenses re-imbursement details'],
        ['id' => 10, 'assignment_type' => 'Year End Account', 'title' => 'Client cashbook'],
        ['id' => 11, 'assignment_type' => 'Year End Account', 'title' => 'Others'],
        ['id' => 12, 'assignment_type' => 'Year End Account', 'title' => 'Any key events in the year'],
        ['id' => 13, 'assignment_type' => 'Year End Account', 'title' => 'Closing stock value'],
        ['id' => 14, 'assignment_type' => 'Year End Account', 'title' => 'VAT Scheme'],
        ['id' => 15, 'assignment_type' => 'Year End Account', 'title' => 'VAT Computation Method'],
        ['id' => 16, 'assignment_type' => 'Year End Account', 'title' => 'VAT Returns and Working'],
        ['id' => 17, 'assignment_type' => 'Bookkeeping', 'title' => 'Nature of Business'],
        ['id' => 18, 'assignment_type' => 'Bookkeeping', 'title' => 'VAT Scheme (Cash/Standard/Flat rate/Margin)'],
        ['id' => 19, 'assignment_type' => 'Bookkeeping', 'title' => 'Previous VAT Returns'],
        ['id' => 20, 'assignment_type' => 'Bookkeeping', 'title' => 'Bank account statements (all business accounts)'],
        ['id' => 21, 'assignment_type' => 'Bookkeeping', 'title' => 'Credit card statements (all business credit cards)'],
        ['id' => 22, 'assignment_type' => 'Bookkeeping', 'title' => 'HP/Loan statements (if applicable)'],
        ['id' => 23, 'assignment_type' => 'Bookkeeping', 'title' => 'Accounting software (Sage, QuickBooks, Xero)'],
        ['id' => 24, 'assignment_type' => 'Bookkeeping', 'title' => 'Copies of sales invoices issued'],
        ['id' => 25, 'assignment_type' => 'Bookkeeping', 'title' => 'Receipts for business expenses'],
        ['id' => 26, 'assignment_type' => 'Bookkeeping', 'title' => 'Access to POS system reports (if applicable)'],
        ['id' => 27, 'assignment_type' => 'Bookkeeping', 'title' => 'Expense reimbursement details e.g., mileage logs'],
        ['id' => 28, 'assignment_type' => 'Bookkeeping', 'title' => 'Payroll Reports (Payroll Summary, P32 report)'],
        ['id' => 29, 'assignment_type' => 'Bookkeeping', 'title' => 'Cash expenses report'],
        ['id' => 30, 'assignment_type' => 'Personal Tax Return', 'title' => 'Source of Income'],
        ['id' => 31, 'assignment_type' => 'Personal Tax Return', 'title' => 'Employment'],
        ['id' => 32, 'assignment_type' => 'Personal Tax Return', 'title' => 'Pension Income'],
        ['id' => 33, 'assignment_type' => 'Personal Tax Return', 'title' => 'Self Employment'],
        ['id' => 34, 'assignment_type' => 'Personal Tax Return', 'title' => 'UK Property'],
        ['id' => 35, 'assignment_type' => 'Personal Tax Return', 'title' => 'Partnership'],
        ['id' => 36, 'assignment_type' => 'Personal Tax Return', 'title' => 'Interest Income'],
        ['id' => 37, 'assignment_type' => 'Personal Tax Return', 'title' => 'Dividend Income'],
        ['id' => 38, 'assignment_type' => 'Personal Tax Return', 'title' => 'Foreign Income'],
        ['id' => 39, 'assignment_type' => 'Personal Tax Return', 'title' => 'Capital Gain'],
        ['id' => 40, 'assignment_type' => 'Personal Tax Return', 'title' => 'Any Other Income'],
        ['id' => 41, 'assignment_type' => 'Personal Tax Return', 'title' => 'Last Year Tax Return'],
        ['id' => 42, 'assignment_type' => 'Personal Tax Return', 'title' => 'Payment On Account'],
        ['id' => 43, 'assignment_type' => 'Personal Tax Return', 'title' => 'Any Other Info'],
    ];
}

function getChecklistByAssignmentType($type)
{
    $checklists = getAllChecklists();
    return array_filter($checklists, function ($item) use ($type) {
        return strtolower($item['assignment_type']) === strtolower($type);
    });
}
