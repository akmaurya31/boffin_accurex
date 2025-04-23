<?php

class Activities extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('loggedValue')){
            session_destroy();
            $this->session->set_flashdata('error','Login Error. Please Login again.');
            redirect('Login');
        }
    }

    public function index()
    {
        $data['page']   = "Notification";
        $user_ID        = $this->session->userdata('user_ID');
        $data['list']   = $this->user_lib->getAllNotificationDESC($user_ID);
        $this->load->view('index',$data);
    }

    public function read_notification($id) {
        $user_ID = $this->session->userdata('user_ID');

        // Get notification by ID (can return array or single object)
        $notification = $this->user_lib->getNotificationByNotificationID($id);

        // Ensure it's an array (in case you expand it to handle multiple notifications)
        if (is_array($notification)) {
            // Sort: unseen first, then latest first
            usort($notification, function ($a, $b) {
                if ($a->status == 'new' && $b->status != 'new') return 1;
                if ($a->status != 'seen' && $b->status == 'seen') return -1;
                return strtotime($b->created_on) - strtotime($a->created_on);
            });
        }

        // Update this notification as seen
        $this->user_lib->setAsSeen($id);

        // Load view
        $data['page'] = "Notification/Read";
        $data['notification'] = $notification;
        $this->load->view('index', $data);
    }

    public function create_notification(){
        $data['page']   = "Notification/Create";
        $user_ID        = $this->session->userdata('user_ID');
        $data['users']  = $this->user_lib->get_all_users();
        $this->load->view('index',$data);
    }

    public function send_notification(){
        $title   = $this->input->post('title');
        $desc    = $this->input->post('description');
        $user_ID = $this->session->userdata('user_ID');
        $receipent = $this->input->post('recipients');

        foreach($receipent as $receiver){
            // save data to database
            $array = [
                'title'   => $title,
                'description' => $desc,
                'forworded_user_ID' => $user_ID,
                'receipent_user_ID' => $receiver
            ];
            $save = $this->user_lib->saveUserData('notifications',$array);
        }
    }




}