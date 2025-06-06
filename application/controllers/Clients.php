<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Clients extends CI_Controller
    {
        public $attach_from = "newJob"; 

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Client_model'); // Load the model
        }
    
        // coding by uttam patel starting
        public function index()
        {
            $this->load->view('Client_portal/login',$data);
        }
    
       
        
        public function ClientForgetPassword()
        {
            $this->load->view('Client_portal/ClientForgetPassword',$data);
        }
    
        public function ClientsSetNewPassword()
        {
            $this->load->view('Client_portal/ClientsSetNewPassword',$data);
        }
        
        public function ClientsOTPVerification()
        {
            $this->load->view('Client_portal/ClientsOTPVerification',$data);
        }
        
        public function ClientsAddNewJobs()
        {
            //  die("ASdfa");
            // $data='aa';
            $this->load->view('Client_portal/ClientsAddNewJobs',$data);
        }

        // public function ClientsAddNewJobs_POST()
        // {
        //      $_POST[]
        //     	user_id	jobcode	assignment_type	client_name	contact_person	email_address	year_end	budgeted_hours	accountancy_fee_net	additional_comment	created_at	updated_at ↓ 
        //     $this->load->view('Client_portal/ClientsAddNewJobs',$data);
        // }



       
        // public function ClientsNotification()
        // {
        //     $this->load->view('Client_portal/ClientsNotification',$data);
        // }
        
        public function clientProfileInformation()
        {
            $this->load->view('Client_portal/clientProfileInformation',$data);
        }


        public function ClientsAddNewJobs_POST() {
            // Get POST data
            $user_id = 1; //$this->input->post('user_id');
            // $jobcode = 2002;//$this->input->post('jobcode');
            $assignment_type = $this->input->post('assignment_type');
            $client_name = $this->input->post('client_name');
            $contact_person = $this->input->post('contact_person');
            $email_address = $this->input->post('email_address');
            // $year_end = $this->input->post('year_end');
            $budgeted_hours = $this->input->post('budgeted_hours');
            $accountancy_fee_net = $this->input->post('accountancy_fee_net');
            $additional_comment = $this->input->post('additional_comment');

            $lastJobId = $this->Client_model->getLastJobId();
            $nextId = $lastJobId + 1;
        
            // Generate jobcode
            $currentYear = date('Y'); // 2025
            $jobcode = 'PS' . $currentYear . str_pad($nextId, 5, '0', STR_PAD_LEFT);

            $year_end = '';
            if ($assignment_type === 'year_end_account') {
                $year_end = $this->input->post('year_end');
            } elseif ($assignment_type === 'bookkeeping') {
                $year_end = $this->input->post('qtr_year_end');
            } elseif ($assignment_type === 'personal_tax_return') {
                $year_end = $this->input->post('tax_year_end');
            } else {
                $year_end = $this->input->post('year_end');
            }

            // Prepare the data array to insert into database
            $data = [
                'user_id' => $user_id,
                'jobcode' => $jobcode,
                'assignment_type' => $assignment_type,
                'client_name' => $client_name,
                'contact_person' => $contact_person,
                'email_address' => $email_address,
                'year_end' => $year_end,
                'budgeted_hours' => $budgeted_hours,
                'accountancy_fee_net' => $accountancy_fee_net,
                'additional_comment' => $additional_comment,
                'status' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
    
            // Insert data into the database using the model function
            $inserted = $this->Client_model->insert_job($data);
    
            // Prepare the JSON response
            if ($inserted) {
                // Success response

                $employment_data = [];

                if ($assignment_type === 'year_end_account') {
                    $employment_data = $this->prepare_employment_data('yea_employment', 17, $jobcode);
                }

                if ($assignment_type === 'bookkeeping') {
                    $employment_data = $this->prepare_employment_data('book_employment', 13, $jobcode);
                }

                if ($assignment_type === 'personal_tax_return') {
                    $employment_data = $this->prepare_employment_data('ptr_employment', 14, $jobcode);
                }
                
                if (!empty($employment_data)) {
                    $this->Client_model->insert_job_checklist_bulk($employment_data);
                }

                // 2. Upload Attachments
                $this->upload_attachments($jobcode); // this saves files to job_attachments table

                $response = [
                    'status' => 'success',
                    'message' => 'Thank you! Your form has been successfully submitted.'
                ];
            } else {
                // Failure response
                $response = [
                    'status' => 'error',
                    'message' => 'There was an issue with submitting your form. Please try again.'
                ];
            }
    
            // Send JSON response
            echo json_encode($response);
        }


        private function prepare_employment_data($type_prefix, $total, $jobcode) {
            $data = [];
        
            for ($i = 1; $i <= $total; $i++) {
                $checkbox = $this->input->post("{$type_prefix}_$i");
                $comment = $this->input->post("{$type_prefix}_text_$i");
        
                if ($checkbox === "on" || !empty($comment)) {
                    $data[] = [
                        'jobcode' => $jobcode,
                        'checklist_id' => "{$type_prefix}_$i",
                        'checklist_comment' => $comment,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }
            }
        
            return $data;
        }


        public function upload_attachments($job_code)
        {
            // $job_code = $this->input->post('job_code');
            $files = $_FILES;
            $count = count($_FILES['attachments']['name']);
            $total_size = 0;

            $upload_path = './uploads/job_attachments/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $uploaded_files = [];

            for ($i = 0; $i < $count; $i++) {
                if (!empty($files['attachments']['name'][$i])) {
                    $file_size = $files['attachments']['size'][$i];
                    $total_size += $file_size;

                    if ($file_size > 2 * 1024 * 1024) {
                        // echo "File " . $files['attachments']['name'][$i] . " exceeds 2MB size limit.";
                        return;
                    }

                    $config['upload_path'] = $upload_path;
                    $config['allowed_types'] = 'jpg|jpeg|png|webp|pdf|doc|docx|xls|xlsx';
                    $config['max_size'] = 2048; // KB
                    $config['file_name'] = time() . '_' . $files['attachments']['name'][$i];

                    $this->load->library('upload', $config);
                    $_FILES['attachment']['name'] = $files['attachments']['name'][$i];
                    $_FILES['attachment']['type'] = $files['attachments']['type'][$i];
                    $_FILES['attachment']['tmp_name'] = $files['attachments']['tmp_name'][$i];
                    $_FILES['attachment']['error'] = $files['attachments']['error'][$i];
                    $_FILES['attachment']['size'] = $files['attachments']['size'][$i];

                    if (!$this->upload->do_upload('attachment')) {
                        // echo $this->upload->display_errors();
                        return;
                    } else {
                        $data = $this->upload->data();
                        $uploaded_files[] = [
                            'job_code' => $job_code,
                            'file_path' => 'uploads/job_attachments/' . $data['file_name']
                        ];
                    }
                }
            }

            if ($total_size > 50 * 1024 * 1024) {
                // echo "Total upload exceeds 50MB.";
                return;
            }

            // Insert to DB
            if (!empty($uploaded_files)) {
                $this->load->model('Client_model');
                $this->Client_model->attach_from = 'queryJob';
                $this->Client_model->insert_job_attachments($uploaded_files);
                // echo "Files uploaded successfully.";
            } else {
                // echo "No files uploaded.";
            }
        }


        public function dashboard() {
            // Initial load pe 1st page ke 20 records dikhenge
            $limit = 20;
            $offset = 0;
        
            $data['jobs'] = $this->Client_model->get_filtered_jobs($limit, $offset);
            $data['total'] = $this->Client_model->count_filtered_jobs();

           // print_r($data); die("ASdfa");
        
            $this->load->view('Client_portal/dashboard', $data);
        }

        public function fetch_completed_jobs_today() {
            $limit = $this->input->get('limit') ?? 20;
            $page = $this->input->get('page') ?? 1;
            $job_code = $this->input->get('job_code') ?? '';
            $job_name = $this->input->get('job_name') ?? '';
        
            $offset = ($page - 1) * $limit;
        
            $jobs = $this->Client_model->get_today_completed_jobs($limit, $offset, $job_code, $job_name);
            $total = $this->Client_model->count_today_completed_jobs($job_code, $job_name);

            foreach ($jobs as &$job) {
                $job->job_name = generate_job_title(
                    $job->client_name,
                    $job->assignment_type,
                    $job->year_end,
                    $job->created_at
                );
            }
        
            echo json_encode([
                'jobs' => $jobs,
                'total' => $total
            ]);
        }

        public function fetch_paginated_jobs() {
            $limit = $this->input->get('limit') ?? 20;
            $page = $this->input->get('page') ?? 1;
            $offset = ($page - 1) * $limit;
           
            $search_code = $this->input->get('search0') ?? '';
            $search_name = $this->input->get('search1') ?? '';
            $status_label = $this->input->get('status');

            $status_map = [
                'live' => 1,
                'hold' => 2,
                'draft' => 3,
                'completed' => 4
            ];
    
            $status = isset($status_map[$status_label]) ? $status_map[$status_label] : '5';

            $filters = [
                'search_code' => $search_code,
                'search_name' => $search_name,
                'status' => $status
            ];

            $total = 0;
            $jobs = $this->Client_model->extra_get_filtered_jobs($limit, $offset, $filters, $total);
            
            foreach ($jobs as &$job) {
                $job['job_name'] = generate_job_title(
                    $job['client_name'],
                    $job['assignment_type'],
                    $job['year_end'],
                    $job['created_at']
                );
                $status_details = get_job_status_details($job['status']);
                $job['status_name'] = $status_details['status']; // Store the status
                $job['sub_status'] = $status_details['sub_status']; // Store the sub-status
                $job['badge_color'] = $status_details['badge_color']; // Store the badge color        
            }
          
            echo json_encode([
                'jobs' => $jobs,
                'total' => $total,
                'limit' => $limit,
                'page' => $page
            ]);
        }


        public function jobCommentForm333()
        {
            $comments = $this->input->post('kcomments'); // Array of comments
            $job_code = $this->input->post('kjobcode');
            if ($comments) {
                    $this->db->insert('job_query', [
                        'comments' => $comments,
                        'jobcode' => $job_code
                    ]);
            }
                $this->upload_attachments($job_code); 
                // foreach ($attachments as $attach) {
                //     $this->db->insert('job_attachments', [
                //         'job_code' => $job_code,
                //         'file_path' => $attach['file_path'],
                //         'attach_from' => "Query"
                //     ]);
                // }
                // <div id="toast" class="toast-msg">Form submitted successfully!</div>
            $this->load->view('Client_portal/ClientsJobsList',$data);
            // Return response
            // echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
        }

        public function jobCommentForm()
        {
            $comments = $this->input->post('kcomments'); // Array of comments
            $job_code = $this->input->post('kjobcode');
            
            if ($comments) {
                // Insert the comment into the database
                $this->db->insert('job_query', [
                    'comments' => $comments,
                    'jobcode' => $job_code
                ]);
                
                // Set a flash message for success
                $this->session->set_flashdata('success_message', 'Form submitted successfully!');
            }

            // Upload attachments
            $this->upload_attachments($job_code);

            // Load the view
            $this->load->view('Client_portal/ClientsJobsList', $data);
        }


        

        public function ClientsJobsList()
        {
            $this->load->view('Client_portal/ClientsJobsList',$data);
        }

        public function get_job_details()
        {
            $jobcode = $this->input->get('jobcode');

            // Basic validation
            if (empty($jobcode)) {
                echo json_encode(['status' => 'error', 'message' => 'Jobcode missing']);
                return;
            }

            // joblist table -> single record
            $job = $this->db->where('jobcode', $jobcode)->get('joblist')->row_array();

            // job_checklist table -> multiple records
            $checklist = $this->db->where('jobcode', $jobcode)->get('job_checklist')->result_array();

            // job_attachments table -> multiple records
            $attachments = $this->db->where('job_code', $jobcode)->get('job_attachments')->result_array();

            // Fetch all checklists using the helper function
            $checklists = getAllChecklists();

            $filteredChecklists = array_filter($checklists, function($checklist) use ($job) {
                return $checklist['assignment_type'] == $job['assignment_type'];
            });
         
            // Final output
            $response = [
                'job' => $job,
                'checklist' => $checklist,
                'checklists' => $filteredChecklists,
                'attachments' => $attachments
            ];
            echo json_encode($response);
        }

      
        

    }