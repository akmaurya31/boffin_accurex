<?php 

if (!function_exists('get_job_status_details')) {
    function get_job_status_details($id) {
        // Define status and sub-status mapping
        $statuses = [
            1 => [
                'status' => 'In Progress',
                'sub_status' => 'Reviewed (Can be started)',
                'badge_color' => 'badge-success'
            ],
            2 => [
                'status' => 'On Hold',
                'sub_status' => 'On Hold Job',
                'badge_color' => 'badge-warning'
            ],
            3 => [
                'status' => 'Draft',
                'sub_status' => 'Under Review',
                'badge_color' => 'badge-info'
            ],
            4 => [
                'status' => 'Completed',
                'sub_status' => 'Completed Job',
                'badge_color' => 'badge-primary'
            ],
            5 => [
                'status' => 'Reviewed (Can be started)',
                'sub_status' => 'In Progress',
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


?>