<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->home();
    }
    public function home()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['banners'] = $this->home_model->get_banners();
        $page_data['page_name'] = "home";
        $page_data['page_title'] = "Home";
        $this->load->view("frontend/index", $page_data);
    }

    public function terms_and_condition()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "terms_and_condition";
        $page_data['page_title'] = "Terms and Condition";
        $this->load->view("frontend/index", $page_data);
    }

    public function privacy_policy()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "privacy_policy";
        $page_data['page_title'] = "Privacy Policy";
        $this->load->view("frontend/index", $page_data);
    }

    public function payment_verification()
    {
        $this->load->view("email/pdf_generate");
    }

    //user login and Signup
    public function login()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "login";
        $page_data['page_title'] = "Login";
        $this->load->view("frontend/index", $page_data);
    }

    public function verify_login()
    {
        $email = $this->input->post('login-email');
        $password = sha1($this->input->post('login-pass'));

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('email_verified', '1');
        $this->db->where('user_role', 'user');
        $data = $this->db->get('users');
        if ($data->num_rows() > 0) {
            $details = $data->row();
            $this->session->set_userdata('user_id', $details->id);
            $this->session->set_userdata('user_role', $details->user_role);
            $this->session->set_userdata('name', $details->first_name . ' ' . $details->last_name);
            $this->session->set_userdata('Shiroor_devotee', '1');
            $this->session->set_flashdata('message', 'Welcome To Shiroor Math');
            redirect(site_url('home'), 'refresh');
        } else {
            $this->session->set_flashdata('failed', 'Credentials Are Wrong !! Please check and login once Again');
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function sign_up()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "signup";
        $page_data['page_title'] = "SignUp";
        $this->load->view("frontend/index", $page_data);
    }

    public function resgister_user()
    {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $phone_no = $this->input->post('phone_no');
        $email = $this->input->post('signup-email');
        $password = sha1($this->input->post('signup-pass'));
        $this->db->where('email', $email);
        $data1 = $this->db->get('users');
        if ($data1->num_rows() > 0) {
            $this->session->set_flashdata('failed', 'Email Is Already Present Please Login with the Same');
            redirect(site_url('home/login'), 'refresh');
        } else {
            $data = array(
                'user_role' => 'user',
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone_no' => $phone_no,
                'email' => $email,
                'password' => $password,
                'email_verified' => '0'
            );
            if ($this->db->insert('users', $data)) {
                $name = $first_name . ' ' . $last_name;
                $this->email_model->send_Verification_mail($email, $name);
                $this->session->set_flashdata('message', 'You Have Been Registerd !Please Verify Your Email .We Have Sent to You a Verification Mail');
                redirect(site_url('home/login'), 'refresh');
            } else {
                $this->session->set_flashdata('failed', 'ohh Snap!! Something Went Wrong Try Again Later');
            }
        }
    }

    public function verify_email($param1)
    {
        $this->db->where('id', $param1);
        $data1 = $this->db->get('users');
        if ($data1->num_rows() > 0) {
            $data = array(
                'email_verified' => '1'
            );
            $this->db->where('id', $param1);
            if ($this->db->update('users', $data)) {
                $this->session->set_flashdata('message', 'Your Mail Hass Been Verified !!Please Login To Continue ');
                redirect(site_url('home/login'), 'refresh');
            } else {
                $this->session->set_flashdata('failed', 'ohh Snap!! Something Went Wrong Try Again Later');
            }
        } else {
            $this->session->set_flashdata('failed', 'This Email is not Correct Please Check Again');
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(site_url('home'), 'refresh');
    }

    public function reset_pass()
    {
        $email = $this->input->post("email");
        $user = "user";
        $this->db->where("email", $email);
        $this->db->where("user_role", $user);
        $output = $this->db->get("users");
        if ($output->num_rows() > 0) {
            $details = $output->row();
            $name = $details->first_name . ' ' . $details->last_name;

            $bytes = openssl_random_pseudo_bytes(4);
            $pass = bin2hex($bytes);
            $pass2 = sha1($pass);

            $data = array('password' => $pass2);
            $this->db->where("email", $email);
            if ($output = $this->db->update("users", $data)) {
                $this->email_model->send_reset_password($email, $pass, $name);
                $this->session->set_flashdata('message', 'Success!! Your Password is changed Please Check Your Registerd Email For Your New Password');
                redirect(site_url('home/login'), 'refresh');
            } else {
                $this->session->set_flashdata('failed', 'Oh snapp !! Something Went Wrong Please Try Again Or Contact Admin');
                redirect(site_url('home/forgot'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('failed', 'No Such Email is Present !! Please check and enter once Again');
            redirect(site_url('home/login'), 'refresh');
        }
    }

    public function change_pass()
    {
        if ($this->session->userdata("Shiroor_devotee")) {
            $page_data['base'] = site_url();
            $page_data['featuredImage'] = get_settings("logo");
            $page_data['page_name'] = "change_password";
            $page_data['page_title'] = "Change Password";
            $this->load->view("frontend/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function change_password()
    {
        $old_password = $this->input->post("old_password");
        $new_password = $this->input->post("new_password");
        $id = $this->session->userdata('user_id');
        $this->db->where('id', $id);
        $this->db->where('password', sha1($old_password));
        $output = $this->db->get("users");
        if ($output->num_rows() > 0) {
            $data = array('password' => sha1($new_password));
            $this->db->where('id', $id);
            if ($output = $this->db->update("users", $data)) {
                $this->session->set_flashdata('message', 'Success!! Your Password is changed Please Login once again');
                $this->logout();
            } else {
                $this->session->set_flashdata('failed', 'Oh snapp !! Something Went Wrong Please Try Again Or Contact Admin');
                redirect(site_url('home'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('failed', 'Oh snapp !! Please Enter Correct Old Password');
            redirect(site_url('home/change_pass'), 'refresh');
        }
    }


    // user dashboard
    public function my_account()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "myaccount";
        $page_data['page_title'] = "My Account";
        $this->load->view("frontend/index", $page_data);
    }

    public function my_info()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['script_to_load'] = array("city_api.js", "dropboot.js");
        $page_data['user_data'] = $this->home_model->get_user_detail();
        $page_data['page_name'] = "user_info";
        $page_data['page_title'] = "My Info";
        if ($this->session->userdata("Shiroor_devotee")) {
            $this->load->view("frontend/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function update_myinfo()
    {
        $res = $this->home_model->update_my_info();
        if ($res == 1) {
            redirect(site_url('home/logout'), 'refresh');
        } else {
            redirect(site_url('home/my_info'), 'refresh');
        }
    }

    public function insert_my_family_members()
    {
        $this->home_model->insert_family_members();
        redirect(site_url('home/my_info'), 'refresh');
    }

    public function update_my_family_members()
    {
        $this->home_model->update_family_members();
        redirect(site_url('home/my_info'), 'refresh');
    }

    public function delete_family_members($param1)
    {
        $this->home_model->delete_family_members($param1);
        redirect(site_url('home/my_info'), 'refresh');
    }

    public function my_seva_kanike()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['user_data'] = $this->home_model->get_user_detail();
        $page_data['page_name'] = "my_seva_kanike";
        $page_data['page_title'] = "My Seva & Kanike";
        if ($this->session->userdata("Shiroor_devotee")) {
            $this->load->view("frontend/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function fetch_user_data()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        if ($this->input->post('user') == "self") {
            $result = $this->db->get('users')->row_array();
        } elseif ($this->input->post('user') == "family") {
            $result = $this->db->get('user_family_members')->row_array();
        }
        echo json_encode($result);
    }
}
