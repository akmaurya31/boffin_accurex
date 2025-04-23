<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('loggedValue')){
            session_destroy();
            $this->session->set_flashdata('error','Login Error. Please Login again.');
            redirect('Login');
        }else{
            $this->load->model('User_model');
            $this->load->model('Role_model');
            $this->load->model('Permission_model');
            $this->load->library('form_validation');
        }
    }

    public function create() {
        $data['roles']          = $this->Role_model->get_all_roles();
        $data['permissions']    = $this->Permission_model->get_all_permissions();
        $data['page']           = 'Users/Create';
        $this->load->view('index', $data);
    }

    public function store() {
        $name               = $this->input->post('name');
        $blood_group        = $this->input->post('blood_group');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $confirm_password   = $this->input->post('confirm_password');
        $address_line_1     = $this->input->post('address_line_1');
        $address_line_2     = $this->input->post('address_line_2');
        $state              = $this->input->post('state');
        $city               = $this->input->post('city');
        $pincode            = $this->input->post('pincode');
        $country            = $this->input->post('country');
        $gender             = $this->input->post('gender');
        $status             = $this->input->post('status');
        $role               = $this->input->post('role');

        // Form Validation
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Repeat Password', 'required|matches[password]');
        $this->form_validation->set_rules('address_line_1', 'Address Line 1', 'required');
        $this->form_validation->set_rules('address_line_2', 'Address Line 2', 'trim');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('pincode', 'Postal Code', 'required|numeric|min_length[4]|max_length[10]');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, return to form with errors
            $data['roles']          = $this->Role_model->get_all_roles();
            $data['permissions']    = $this->Permission_model->get_all_permissions();
            $data['page']           = 'Users/Create';
            $this->load->view('index', $data);
        } else {

            // Validation passed, proceed with form data
            $userArray = [
                'full_name'              => $this->input->post('name'),
                'blood_group'       => $this->input->post('blood_group'),
                'email'             => $this->input->post('email'),
                'address_line_1'    => $this->input->post('address_line_1'),
                'address_line_2'    => $this->input->post('address_line_2'),
                'state'             => $this->input->post('state'),
                'city'              => $this->input->post('city'),
                'pincode'           => $this->input->post('pincode'),
                'country'           => $this->input->post('country'),
                'status'            => $this->input->post('status'),
                'role_ID'           => $this->input->post('role')
            ];

            // Insert into DB users,auth and key
            $saveUser  = $this->user_lib->saveUserData('users',$userArray);
            $authArray = [
                'username' => $this->input->post('email'),
                'password' => sha1($this->input->post('password')),
                'status'   => $this->input->post('status'),
                'user_ID'  => $saveUser
            ];

            $saveAuth = $this->user_lib->saveUserData('auth',$authArray);

            $keyArray = [
                'user_ID'   => $saveUser,
                'pass_key'  => $this->input->post('password')
            ];
            $saveKey  = $this->user_lib->saveUserData('users_key_db',$keyArray);

            redirect('user/list');
        }



        // $userId = $this->User_model->insert_user($post);

        // if (!empty($post['permissions'])) {
        //     $this->User_model->assign_user_permissions($userId, $post['permissions']);
        // }

        // redirect('user/list');
    }
}
