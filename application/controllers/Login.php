<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['error'] = $this->session->flashdata('error');
        session_destroy();
        $this->load->view('Login/index',$data);
    }

    public function logout()
    {
        $this->auth->logout();
        redirect('login');
    }

    public function check(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // checking user in database
        $check =$this->auth->login($username,$password);

        if($check){

            // Sent OTP For Two-way Factor Authentication
            $otp = $this->auth->generateOTP(6);

            // store otp in database to related user
            $updateArr  = array('otp' => $otp, 'otp_time' => strtotime('+30 minutes'));
            $updateAuth = $this->auth->update_row('auth',$updateArr,array('auth_ID'=>$check->auth_ID));

            if($updateAuth){
                // sent OTP To Email
                $data['otp']        = $otp;
                $data['username']   = $username;
                $data['subject']    = 'Login ';
                $subject            = 'Login OTP For '.$username;
                $message            = $this->load->view('components/login_otp',$data,true);
                $sentEmail          = $this->sentMailToClient($username,$subject,$message);
                if($sentEmail){
                    echo "success";
                }else{
                    echo "failed email";
                }

            }else{
                echo "Failed";
            }

        }else{
            echo "Failed login";
        }

    }

    public function otp(){
        $this->load->view('Login/otp');
    }

    public function resent_otp(){
        $user_id = $this->session->userdata('auth_ID');
        $otp = $this->auth->generateOTP(6);

        // store otp in database to related user
        $updateArr  = array('otp' => $otp, 'otp_time' => strtotime('+30 minutes'));
        $updateAuth = $this->auth->update_row('auth',$updateArr,array('auth_ID'=>$user_id));

        if($updateAuth){
            $data['otp'] = $otp;
            $data['username'] = $username;
            $data['subject']    = 'Login ';
            $subject = 'Login OTP For '.$username;
            $message = $this->load->view('components/login_otp',$data,true);
            $sentEmail = $this->sentMailToClient($username,$subject,$message);
            if($sentEmail){
                echo "success";
            }else{
                echo "failed";
            }
        }

        if($updateAuth){
            echo "success";
        }else{
            echo "Failed";
        }
    }

    public function verify_otp(){
        $otp     = $this->input->post('otp');
        $user_id = $this->session->userdata('auth_ID');

        // checking otp using respected user ID
        $verifyOTP = $this->auth->verifyOTP($user_id,$otp);

        if($verifyOTP){
            $this->session->set_userdata('loggedValue','success');
            redirect('Dashboard');
        }else{
            $data['error'] = 'Given OTP is expired Please Press Resent OTP to Generate New.';
            $this->load->view('Login/otp',$data);
        }
    }

    public function password_recovery(){
        $this->load->view('Login/password_recovery');
    }

    public function verify_email(){
        $email = $this->input->post('email');
        $user = $this->auth->getUserIDByEmail($email);

        if($user){
            // Sent OTP For Two-way Factor Authentication
            $otp = $this->auth->generateOTP(6);

            // store otp in database to related user
            $updateArr  = array('otp' => $otp, 'otp_time' => strtotime('+30 minutes'));
            $updateAuth = $this->auth->update_row('auth',$updateArr,array('auth_ID' => $user[0]->auth_ID));

            if($updateAuth){
                // sent OTP To Email
                $data['otp']        = $otp;
                $data['username']   = $email;
                $data['subject']    = 'Forget Password Recovery';
                $subject            = 'Forget Password Recovery';
                $message            = $this->load->view('components/login_otp',$data,true);
                $sentEmail          = $this->sentMailToClient($email,$subject,$message);

                $this->session->set_userdata([
                    'auth_ID'  => $user[0]->auth_ID,
                    'user_ID'  => $user[0]->user_ID,
                    'forget_password' => true,
                ]);
                redirect('Login/otp');
            }else{

                $data['error'] = "Failed to get user Info. Try Later.";
                $this->load->view('Login/password_recovery',$data);
            }

        }else{
            $data['error'] = "Enter Email does not exist. Please enter valid email id to continue.";
            $this->load->view('Login/password_recovery',$data);
        }
    }

    public function verify_otp_forget_password(){

        $otp     = $this->input->post('otp');
        $user_id = $this->session->userdata('auth_ID');

        // checking otp using respected user ID
        $verifyOTP = $this->auth->verifyOTP($user_id,$otp);

        if($verifyOTP){

            // Get user info
            $this->load->library('user_lib');
            $userInfo = $this->user_lib->getUserInfoByAuthID($user_id);

            $message ='
                <!DOCTYPE html>
                    <html>
                    <head>
                    <meta charset="UTF-8">
                    <title>Password Recovery</title>
                    </head>
                    <body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
                    <table width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border: 1px solid #ddd; border-radius: 8px;">
                        <tr>
                        <td>
                            <h2 style="color: #333;">Password Recovery - Your Account Details</h2>
                            <p>Dear <strong>[Client Name]</strong>,</p>
                            <p>We received a request to recover the password associated with your account.</p>
                            <p>Here are your login details:</p>
                            <table style="margin: 20px 0; background-color: #f4f4f4; padding: 15px; border-radius: 6px;">
                            <tr>
                                <td><strong>Username:</strong></td>
                                <td>'.$userInfo[0]->email.'</td>
                            </tr>
                            <tr>
                                <td><strong>Recovered Password:</strong></td>
                                <td><strong>'.$userInfo[0]->pass_key.'</strong></td>
                            </tr>
                            </table>
                            <p>For security reasons, we recommend changing your password immediately after logging in.</p>
                            <p>You can update your password by logging into your account and navigating to the <em>“Change Password”</em> section.</p>
                            <p>If you did not request this recovery, please contact our support team immediately.</p>
                            <p>Thank you,</p>
                            <p><strong>Accurex Accounting</strong><br>
                            <a href="mailto:contact@accurexaccounting.com">contact@accurexaccounting.com</a><br>
                            <a href="https://accurexaccounting.com/">https://accurexaccounting.com/</a></p>
                        </td>
                        </tr>
                    </table>
                </body>
            </html>';

            $subject = 'Forget Password Recovery';

            $sentEmail = $this->sentMailToClient($userInfo[0]->email,$subject,$message);

            $this->session->set_userdata('success','Password successfully sent to your register E-mail ID.');

            redirect('Login');
        }else{
            $data['error'] = 'Given OTP is expired or not matched. Please Press Resent OTP to Generate New.';
            $this->load->view('Login/otp',$data);
        }
    }

    public function sentMailToClient($to,$subject,$message){
        $this->load->library('email');
        $config = array(
            'protocol'      => 'smtp',
            'smtp_host'     => 'smtp.hostinger.com',
            'smtp_port'     => 465,
            'smtp_crypto'   => 'ssl',
            'smtp_timeout'  => 7,
            'smtp_user'     => 'bwt_testing@aa.boffinweb.com',
            'smtp_pass'     => '6#Q5JR#0!Dc',
            'charset'       => 'iso-8859-1',
            'mailtype'      => 'html',
            'wordwrap'      => TRUE,
            'newline'       => "\r\n",
            'validation'    => TRUE
        );

        $this->email->initialize($config);
        $this->email->from('bwt_testing@aa.boffinweb.com', 'Accurex Accounting');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            return false;
        }
    }


}