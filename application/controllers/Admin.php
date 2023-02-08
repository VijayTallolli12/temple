<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->dashboard();
        } else {
            $this->login();
        }
    }
    public function login()
    {
        $page_data['styles_to_load'] = array("pages/auth.css");
        $page_data['page_name'] = "login";
        $page_data['page_title'] = "Login";
        $this->load->view("backend/admin/index", $page_data);
    }
    public function verify_login()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $status_array = array('admin', 'super admin');

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where_in("user_role", $status_array);
        $this->db->where('email_verified', '1');
        $data = $this->db->get('users');
        if ($data->num_rows() > 0) {
            $details = $data->row();
            $this->session->set_userdata('user_id', $details->id);
            $this->session->set_userdata('user_role', $details->user_role);
            $this->session->set_userdata('name', $details->first_name . ' ' . $details->last_name);
            $this->session->set_userdata('Shiroor_Admin', '1');
            $this->session->set_flashdata('message', 'Welcome To Shiroor Math Dashboard');
            redirect(site_url('admin/dashboard'), 'refresh');
        } else {
            $this->session->set_flashdata('failed', 'Credentials Are Wrong !! Please check and login once Again');
            redirect(site_url('admin/login'), 'refresh');
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(site_url('admin/login'), 'refresh');
    }
    public function forgot()
    {
        $page_data['styles_to_load'] = array("pages/auth.css");
        $page_data['page_name'] = "forgot_password";
        $page_data['page_title'] = "Forgot Password";
        $this->load->view("backend/admin/index", $page_data);
    }
    public function reset_password()
    {
        $status_array = array('admin', 'super admin');
        $email = $this->input->post("email");
        $this->db->where_in("user_role", $status_array);
        $this->db->where("email", $email);
        $output = $this->db->get("users");
        if ($output->num_rows() > 0) {
            $details = $output->row();
            $name = $details->first_name . ' ' . $details->last_name;
            $id = $details->id;
            $this->email_model->send_reset_password_admin($email, $name, $id);
            $this->session->set_flashdata('message', 'Success!! Your Password change Link is Genrated Please Check Your Registerd Email For Link');
            redirect(site_url('admin/login'), 'refresh');
        } else {
            $this->session->set_flashdata('failed', 'No Such Email is Present !! Please check and enter once Again');
            redirect(site_url('admin/forgot'), 'refresh');
        }
    }
    public function Change_password_email($id)
    {
        $page_data['page_name'] = "change_password_email";
        $page_data['page_title'] = "Change Password";
        $page_data['id'] = $id;
        $this->load->view("backend/admin/index", $page_data);
    }

    public function reset_pass_email()
    {
        $new_password = $this->input->post("password");
        $id = $this->input->post("id");
        $this->db->where('id', $id);
        $output = $this->db->get("users");
        if ($output->num_rows() > 0) {
            $data = array('password' => sha1($new_password));
            $this->db->where('id', $id);
            if ($output = $this->db->update("users", $data)) {
                $this->session->set_flashdata('message', 'Success!! Your Password is changed Please Login once again');
                $this->logout();
            } else {
                $this->session->set_flashdata('failed', 'Oh snapp !! Something Went Wrong Please Try Again Or Contact Admin');
                redirect(site_url('admin/login'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('failed', 'Oh snapp !! Something Went Wrong Please Try Again Or Contact Admin');
            redirect(site_url('admin/login'), 'refresh');
        }
    }

    public function change_password()
    {
        $page_data['page_name'] = "reset_password";
        $page_data['page_title'] = "Reset Password";
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function reset_to_new_password()
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
                redirect(site_url('admin/dashboard'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('failed', 'Oh snapp !! Please Enter Correct Old Password');
            redirect(site_url('admin/change_password'), 'refresh');
        }
    }

    //Admin Dashboard
    public function dashboard()
    {
        $page_data['script_to_load'] = array('pages/dashboard.js');
        $page_data['page_name'] = "dashboard";
        $page_data['page_title'] = "Dashboard";
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }
    // E-Seva functions
    public function e_seva($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "e_seva_a";
            $page_data['page_title'] = "E_Seva Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->seva_model->e_seva_c();
            redirect(site_url('admin/e_seva'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "e_seva_e";
            $page_data['page_title'] = "E_Seva Form";
            $page_data['e_seva_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->seva_model->e_seva_update();
            redirect(site_url('admin/e_seva'), 'refresh');
        } elseif ($param1 == "status") {
            $this->seva_model->e_seva_status();
            redirect(site_url('admin/e_seva'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->seva_model->e_seva_delete();
            redirect(site_url('admin/e_seva'), 'refresh');
        } else {
            $page_data['page_name'] = "e_seva";
            $page_data['page_title'] = "E_Seva";
            $page_data['e_seva'] = $this->seva_model->get_e_seva();;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // Kanike function
    public function kanike($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "kanike_a";
            $page_data['page_title'] = "Kanike Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if (isset($_FILES['kanike_image']) && $_FILES['kanike_image']['name'] != "") {
                $path = $_FILES['kanike_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "kanike_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $complete_path = "uploads/images/" . $filename;
                    $kanike_image = $complete_path;
                    $kanike = $this->input->post('kanike');
                    $kanike_desc = $this->input->post('kanike_desc');
                    $this->kanike_model->kanike_c($kanike_image, $kanike, $kanike_desc);
                }
            } else {
                $this->session->set_flashdata('failed', 'No Image Present');
            }
            redirect(site_url('admin/kanike'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "kanike_e";
            $page_data['page_title'] = "Kanike Form";
            $page_data['kanike_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['kanike_image']) && $_FILES['kanike_image']['name'] != "") {
                $path = $_FILES['kanike_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "kanike_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $complete_path = "uploads/images/" . $filename;
                    $kanike_image = $complete_path;
                    $kanike_id = $this->input->post('id');
                    $kanike = $this->input->post('kanike');
                    $kanike_desc = $this->input->post('kanike_desc');
                    $this->kanike_model->kanike_update($kanike_image, $kanike_id, $kanike, $kanike_desc);
                }
            } else {
                $kanike_image = "1";
                $kanike_id = $this->input->post('id');
                $kanike = $this->input->post('kanike');
                $kanike_desc = $this->input->post('kanike_desc');
                $this->kanike_model->kanike_update($kanike_image, $kanike_id, $kanike, $kanike_desc);
            }
            redirect(site_url('admin/kanike'), 'refresh');
        } elseif ($param1 == "status") {
            $this->kanike_model->kanike_status();
            redirect(site_url('admin/kanike'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->kanike_model->kanike_delete();
            redirect(site_url('admin/kanike'), 'refresh');
        } else {
            $page_data['page_name'] = "kanike";
            $page_data['page_title'] = "Kanike";
            $page_data['kanike'] = $this->kanike_model->get_kanike();;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // Paramapara Function
    public function parampara($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "parampara_a";
            $page_data['page_title'] = "Parampara Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if (isset($_FILES['parampara_image']) && $_FILES['parampara_image']['name'] != "") {
                $path = $_FILES['parampara_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "parampara_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $parampara_image = $complete_path;
                        $parampara_name = $this->input->post('parampara_name');
                        $parampara_desc = $this->input->post('parampara_desc');
                        $this->parampara_model->parampara_c($parampara_image, $parampara_name, $parampara_desc);
                    }
                }
            } else {
                $parampara_image = "";
                $parampara_name = $this->input->post('parampara_name');
                $parampara_desc = $this->input->post('parampara_desc');
                $this->parampara_model->parampara_c($parampara_image, $parampara_name, $parampara_desc);
            }
            redirect(site_url('admin/parampara'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "parampara_e";
            $page_data['page_title'] = "parampara Form";
            $page_data['parampara_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['parampara_image']) && $_FILES['parampara_image']['name'] != "") {
                $path = $_FILES['parampara_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "parampara_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $parampara_image = $complete_path;
                        $parampara_id = $this->input->post('id');
                        $parampara_name = $this->input->post('name');
                        $parampara_desc = $this->input->post('parampara_desc');
                        $this->parampara_model->parampara_update($parampara_image, $parampara_id, $parampara_name, $parampara_desc);
                    }
                }
            } else {
                $parampara_image = "1";
                $parampara_id = $this->input->post('id');
                $parampara_name = $this->input->post('name');
                $parampara_desc = $this->input->post('parampara_desc');
                $this->parampara_model->parampara_update($parampara_image, $parampara_id, $parampara_name, $parampara_desc);
            }
            redirect(site_url('admin/parampara'), 'refresh');
        } elseif ($param1 == "status") {
            $this->parampara_model->parampara_status();
            redirect(site_url('admin/parampara'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->parampara_model->parampara_delete();
            redirect(site_url('admin/parampara'), 'refresh');
        } else {
            $page_data['page_name'] = "parampara";
            $page_data['page_title'] = "Parampara";
            $page_data['parampara'] = $this->parampara_model->get_parampara();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // Daily Seva Function
    public function daily_seva($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "daily_seva_a";
            $page_data['page_title'] = "Daily Seva Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if (isset($_FILES['temple_image']) && $_FILES['temple_image']['name'] != "") {
                $path = $_FILES['temple_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "temple_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $temple_image = $complete_path;
                        $temple_name = $this->input->post('temple_name');
                        $seva_timings = $this->input->post('seva_timings');
                        $this->daily_seva_model->daily_seva_c($temple_image, $temple_name, $seva_timings);
                    }
                }
            } else {
                $temple_image = "";
                $temple_name = $this->input->post('temple_name');
                $seva_timings = $this->input->post('seva_timings');
                $this->daily_seva_model->daily_seva_c($temple_image, $temple_name, $seva_timings);
            }
            redirect(site_url('admin/daily_seva'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "daily_seva_e";
            $page_data['page_title'] = "Daily Seva Form";
            $page_data['daily_seva_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['daily_seva_image']) && $_FILES['daily_seva_image']['name'] != "") {
                $path = $_FILES['daily_seva_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "daily_seva_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $daily_seva_image = $complete_path;
                        $daily_seva_id = $this->input->post('id');
                        $temple_name = $this->input->post('temple_name');
                        $daily_seva_timing = $this->input->post('daily_seva_timings');
                        $this->daily_seva_model->daily_seva_update($daily_seva_image, $daily_seva_id, $temple_name, $daily_seva_timing);
                    }
                }
            } else {
                $daily_seva_image = "1";
                $daily_seva_id = $this->input->post('id');
                $temple_name = $this->input->post('temple_name');
                $daily_seva_timing = $this->input->post('daily_seva_timings');
                $this->daily_seva_model->daily_seva_update($daily_seva_image, $daily_seva_id, $temple_name, $daily_seva_timing);
            }
            redirect(site_url('admin/daily_seva'), 'refresh');
        } elseif ($param1 == "status") {
            $this->daily_seva_model->daily_seva_status();
            redirect(site_url('admin/daily_seva'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->daily_seva_model->daily_seva_delete();
            redirect(site_url('admin/daily_seva'), 'refresh');
        } else {
            $page_data['page_name'] = "daily_seva";
            $page_data['page_title'] = "Daily Seva";
            $page_data['daily_seva'] = $this->daily_seva_model->get_daily_seva();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // Daily Worshiped Deities Details
    public function dw_deities($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "dw_deities_a";
            $page_data['page_title'] = "Daily Worshiped Deities Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if ($this->input->post('deitie_desc') != "") {
                if (isset($_FILES['deitie_image']) && $_FILES['deitie_image']['name'] != "") {
                    $path = $_FILES['deitie_image']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = time() . date("Ymd") . "." . $ext;
                    $config['upload_path'] = './uploads/images';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                    $img = "deitie_image";
                    if (!$this->upload->do_upload($img)) {
                        $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                    } else {
                        $image_data = $this->upload->data();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] =  $image_data['full_path'];
                        $config2['maintain_ratio'] = true;
                        $config2['create_thumb'] = false;
                        $config2['width']         = 1398;
                        $config2['height']       = 1198;
                        $this->load->library('image_lib', $config2);
                        $this->image_lib->initialize($config2);
                        if ($this->image_lib->resize()) {
                            $complete_path = "uploads/images/" . $filename;
                            $deitie_image = $complete_path;
                            $deitie_name = $this->input->post('deitie_name');
                            $deitie_desc = $this->input->post('deitie_desc');
                            $this->dw_deities_model->dw_deities_c($deitie_image, $deitie_name, $deitie_desc);
                        }
                    }
                } else {
                    $this->session->set_flashdata('failed', 'No Image Present Please Upload Image');
                }
            } else {
                $this->session->set_flashdata('failed', 'Deitie Description is Empty -Please Fill up Description');
                redirect(site_url('admin/dw_deities/add'), 'refresh');
            }
            redirect(site_url('admin/dw_deities'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "dw_deities_e";
            $page_data['page_title'] = "Daily Worshiped Deities Form";
            $page_data['dw_deities_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['dw_deitie_image']) && $_FILES['dw_deitie_image']['name'] != "") {
                $path = $_FILES['dw_deitie_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "dw_deitie_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $dw_deitie_image = $complete_path;
                        $dw_deitie_id = $this->input->post('id');
                        $dw_deitie_name = $this->input->post('dw_deitie_name');
                        $dw_deitie_desc = $this->input->post('dw_deitie_desc');
                        $this->dw_deities_model->dw_deitie_update($dw_deitie_image, $dw_deitie_id, $dw_deitie_name, $dw_deitie_desc);
                    }
                }
            } else {
                $dw_deitie_image = "1";
                $dw_deitie_id = $this->input->post('id');
                $dw_deitie_name = $this->input->post('dw_deitie_name');
                $dw_deitie_desc = $this->input->post('dw_deitie_desc');
                $this->dw_deities_model->dw_deitie_update($dw_deitie_image, $dw_deitie_id, $dw_deitie_name, $dw_deitie_desc);
            }
            redirect(site_url('admin/dw_deities'), 'refresh');
        } elseif ($param1 == "status") {
            $this->dw_deities_model->dw_deities_status();
            redirect(site_url('admin/dw_deities'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->dw_deities_model->dw_deities_delete();
            redirect(site_url('admin/dw_deities'), 'refresh');
        } else {
            $page_data['page_name'] = "dw_deities";
            $page_data['page_title'] = "Daily Worshiped Deities";
            $page_data['dw_deities'] = $this->dw_deities_model->get_dw_deities();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Branches Details
    public function branches($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "branches_a";
            $page_data['page_title'] = "Branches Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if ($this->input->post('branch_desc') != "") {
                if (isset($_FILES['branch_image']) && $_FILES['branch_image']['name'] != "") {
                    $path = $_FILES['branch_image']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = time() . date("Ymd") . "." . $ext;
                    $config['upload_path'] = './uploads/images';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                    $img = "branch_image";
                    if (!$this->upload->do_upload($img)) {
                        $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                    } else {
                        $image_data = $this->upload->data();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] =  $image_data['full_path'];
                        $config2['maintain_ratio'] = true;
                        $config2['create_thumb'] = false;
                        $config2['width']         = 1398;
                        $config2['height']       = 1198;
                        $this->load->library('image_lib', $config2);
                        $this->image_lib->initialize($config2);
                        if ($this->image_lib->resize()) {
                            $complete_path = "uploads/images/" . $filename;
                            $branch_image = $complete_path;
                            $branch_name = $this->input->post('branch_name');
                            $branch_desc = $this->input->post('branch_desc');
                            $branch_url = $this->input->post('branch_url');
                            $this->branches_model->branch_c($branch_image, $branch_name, $branch_desc, $branch_url);
                        }
                    }
                } else {
                    $branch_image = "";
                    $branch_name = $this->input->post('branch_name');
                    $branch_desc = $this->input->post('branch_desc');
                    $branch_url = $this->input->post('branch_url');
                    $this->branches_model->branch_c($branch_image, $branch_name, $branch_desc, $branch_url);
                }
            } else {
                $this->session->set_flashdata('failed', 'Branch Description is Empty -Please Fill up Description');
                redirect(site_url('admin/branches/add'), 'refresh');
            }
            redirect(site_url('admin/branches'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "branches_e";
            $page_data['page_title'] = "Branch Form";
            $page_data['branch_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['branch_image']) && $_FILES['branch_image']['name'] != "") {
                $path = $_FILES['branch_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "branch_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $branch_image = $complete_path;
                        $branch_id = $this->input->post('id');
                        $branch_name = $this->input->post('branch_name');
                        $branch_desc = $this->input->post('branch_desc');
                        $branch_link = $this->input->post('branch_url');
                        $this->branches_model->branches_update($branch_image, $branch_id, $branch_name, $branch_desc, $branch_link);
                    }
                }
            } else {
                $branch_image = "1";
                $branch_id = $this->input->post('id');
                $branch_name = $this->input->post('branch_name');
                $branch_desc = $this->input->post('branch_desc');
                $branch_link = $this->input->post('branch_url');
                $this->branches_model->branches_update($branch_image, $branch_id, $branch_name, $branch_desc, $branch_link);
            }
            redirect(site_url('admin/branches'), 'refresh');
        } elseif ($param1 == "status") {
            $this->branches_model->branches_status();
            redirect(site_url('admin/Branches'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->branches_model->branches_delete();
            redirect(site_url('admin/Branches'), 'refresh');
        } else {
            $page_data['page_name'] = "branches";
            $page_data['page_title'] = "Branches";
            $page_data['branches'] = $this->branches_model->get_branches();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Educational Institutes
    public function institutes($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "institutes_a";
            $page_data['page_title'] = "Institutes Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if ($this->input->post('institutes_desc') != "") {
                if (isset($_FILES['institutes_image']) && $_FILES['institutes_image']['name'] != "") {
                    $path = $_FILES['institutes_image']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = time() . date("Ymd") . "." . $ext;
                    $config['upload_path'] = './uploads/images';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                    $img = "institutes_image";
                    if (!$this->upload->do_upload($img)) {
                        $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                    } else {
                        $image_data = $this->upload->data();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] =  $image_data['full_path'];
                        $config2['maintain_ratio'] = true;
                        $config2['create_thumb'] = false;
                        $config2['width']         = 1398;
                        $config2['height']       = 1198;
                        $this->load->library('image_lib', $config2);
                        $this->image_lib->initialize($config2);
                        if ($this->image_lib->resize()) {
                            $complete_path = "uploads/images/" . $filename;
                            $institutes_image = $complete_path;
                            $institutes_name = $this->input->post('institutes_name');
                            $institutes_desc = $this->input->post('institutes_desc');
                            $institutes_url = $this->input->post('institutes_url');
                            $this->institutes_model->institutes_c($institutes_image, $institutes_name, $institutes_desc, $institutes_url);
                        }
                    }
                } else {
                    $institutes_image = "";
                    $institutes_name = $this->input->post('institutes_name');
                    $institutes_desc = $this->input->post('institutes_desc');
                    $institutes_url = $this->input->post('institutes_url');
                    $this->institutes_model->institutes_c($institutes_image, $institutes_name, $institutes_desc, $institutes_url);
                }
            } else {
                $this->session->set_flashdata('failed', 'Institutes Description is Empty -Please Fill up Description');
                redirect(site_url('admin/institutes/add'), 'refresh');
            }
            redirect(site_url('admin/institutes'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "institutes_e";
            $page_data['page_title'] = "Institutes Form";
            $page_data['institutes_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['institutes_image']) && $_FILES['institutes_image']['name'] != "") {
                $path = $_FILES['institutes_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "institutes_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $institutes_image = $complete_path;
                        $institutes_id = $this->input->post('id');
                        $institutes_name = $this->input->post('institutes_name');
                        $institutes_desc = $this->input->post('institutes_desc');
                        $institutes_link = $this->input->post('institutes_url');
                        $this->institutes_model->institutes_update($institutes_image, $institutes_id, $institutes_name, $institutes_desc, $institutes_link);
                    }
                }
            } else {
                $institutes_image = "1";
                $institutes_id = $this->input->post('id');
                $institutes_name = $this->input->post('institutes_name');
                $institutes_desc = $this->input->post('institutes_desc');
                $institutes_link = $this->input->post('institutes_url');
                $this->institutes_model->institutes_update($institutes_image, $institutes_id, $institutes_name, $institutes_desc, $institutes_link);
            }
            redirect(site_url('admin/institutes'), 'refresh');
        } elseif ($param1 == "status") {
            $this->institutes_model->institutes_status();
            redirect(site_url('admin/institutes'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->institutes_model->institutes_delete();
            redirect(site_url('admin/institutes'), 'refresh');
        } else {
            $page_data['page_name'] = "institutes";
            $page_data['page_title'] = "Educational Institutes";
            $page_data['institutes'] = $this->institutes_model->get_institutes();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Activities
    public function activities($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "activities_a";
            $page_data['page_title'] = "Activities Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if ($this->input->post('activities_desc') != "") {
                if (isset($_FILES['activities_image']) && $_FILES['activities_image']['name'] != "") {
                    $path = $_FILES['activities_image']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = time() . date("Ymd") . "." . $ext;
                    $config['upload_path'] = './uploads/images';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                    $img = "activities_image";
                    if (!$this->upload->do_upload($img)) {
                        $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                    } else {
                        $image_data = $this->upload->data();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] =  $image_data['full_path'];
                        $config2['maintain_ratio'] = true;
                        $config2['create_thumb'] = false;
                        $config2['width']         = 1398;
                        $config2['height']       = 1198;
                        $this->load->library('image_lib', $config2);
                        $this->image_lib->initialize($config2);
                        if ($this->image_lib->resize()) {
                            $complete_path = "uploads/images/" . $filename;
                            $activities_image = $complete_path;
                            $activities_name = $this->input->post('activities_name');
                            $activities_desc = $this->input->post('activities_desc');
                            $this->activities_model->activities_c($activities_image, $activities_name, $activities_desc);
                        }
                    }
                } else {
                    $activities_image = "";
                    $activities_name = $this->input->post('activities_name');
                    $activities_desc = $this->input->post('activities_desc');
                    $this->activities_model->activities_c($activities_image, $activities_name, $activities_desc);
                }
            } else {
                $this->session->set_flashdata('failed', 'Deitie Description is Empty -Please Fill up Description');
                redirect(site_url('admin/activities/add'), 'refresh');
            }
            redirect(site_url('admin/activities'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "activities_e";
            $page_data['page_title'] = "Activities Form";
            $page_data['activities_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['activities_image']) && $_FILES['activities_image']['name'] != "") {
                $path = $_FILES['activities_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "activities_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $activities_image = $complete_path;
                        $activities_id = $this->input->post('id');
                        $activities_name = $this->input->post('activities_name');
                        $activities_desc = $this->input->post('activities_desc');
                        $this->activities_model->activities_update($activities_image, $activities_id, $activities_name, $activities_desc);
                    }
                }
            } else {
                $activities_image = "1";
                $activities_id = $this->input->post('id');
                $activities_name = $this->input->post('activities_name');
                $activities_desc = $this->input->post('activities_desc');
                $this->activities_model->activities_update($activities_image, $activities_id, $activities_name, $activities_desc);
            }
            redirect(site_url('admin/activities'), 'refresh');
        } elseif ($param1 == "status") {
            $this->activities_model->activities_status();
            redirect(site_url('admin/activities'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->activities_model->activities_delete();
            redirect(site_url('admin/activities'), 'refresh');
        } else {
            $page_data['page_name'] = "activities";
            $page_data['page_title'] = "Activities";
            $page_data['activities'] = $this->activities_model->get_activities();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // history
    public function history($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "history_a";
            $page_data['page_title'] = "History Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if ($this->input->post('history_desc') != "") {
                if (isset($_FILES['history_image']) && $_FILES['history_image']['name'] != "") {
                    $path = $_FILES['history_image']['name'];
                    $ext = pathinfo($path, PATHINFO_EXTENSION);
                    $filename = time() . date("Ymd") . "." . $ext;
                    $config['upload_path'] = './uploads/images';
                    $config['allowed_types'] = 'jpg|png|jpeg|gif';
                    $config['file_name'] = $filename;
                    $this->load->library('upload', $config);
                    $img = "history_image";
                    if (!$this->upload->do_upload($img)) {
                        $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                    } else {
                        $image_data = $this->upload->data();
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] =  $image_data['full_path'];
                        $config2['maintain_ratio'] = true;
                        $config2['create_thumb'] = false;
                        $config2['width']         = 1398;
                        $config2['height']       = 1198;
                        $this->load->library('image_lib', $config2);
                        $this->image_lib->initialize($config2);
                        if ($this->image_lib->resize()) {
                            $complete_path = "uploads/images/" . $filename;
                            $history_image = $complete_path;
                            $history_name = $this->input->post('history_name');
                            $history_desc = $this->input->post('history_desc');
                            $this->history_model->history_c($history_image, $history_name, $history_desc);
                        }
                    }
                } else {
                    $history_image = "";
                    $history_name = $this->input->post('history_name');
                    $history_desc = $this->input->post('history_desc');
                    $this->history_model->history_c($history_image, $history_name, $history_desc);
                }
            } else {
                $this->session->set_flashdata('failed', 'History Description is Empty -Please Fill up Description');
                redirect(site_url('admin/history/add'), 'refresh');
            }
            redirect(site_url('admin/history'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "history_e";
            $page_data['page_title'] = "History Form";
            $page_data['history_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['history_image']) && $_FILES['history_image']['name'] != "") {
                $path = $_FILES['history_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "history_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $history_image = $complete_path;
                        $history_id = $this->input->post('id');
                        $history_name = $this->input->post('history_name');
                        $history_desc = $this->input->post('history_desc');
                        $this->history_model->history_update($history_image, $history_id, $history_name, $history_desc);
                    }
                }
            } else {
                $history_image = "1";
                $history_id = $this->input->post('id');
                $history_name = $this->input->post('history_name');
                $history_desc = $this->input->post('history_desc');
                $this->history_model->history_update($history_image, $history_id, $history_name, $history_desc);
            }
            redirect(site_url('admin/history'), 'refresh');
        } elseif ($param1 == "status") {
            $this->history_model->history_status();
            redirect(site_url('admin/history'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->history_model->history_delete();
            redirect(site_url('admin/history'), 'refresh');
        } else {
            $page_data['page_name'] = "history";
            $page_data['page_title'] = "History";
            $page_data['history'] = $this->history_model->get_history();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //blogs
    public function blogs($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "blogs_a";
            $page_data['page_title'] = "Blog Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->blogs_model->blogs_c();
            redirect(site_url('admin/blogs'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "blogs_e";
            $page_data['page_title'] = "Blogs Form";
            $page_data['blogs_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->blogs_model->blogs_update();
            redirect(site_url('admin/blogs'), 'refresh');
        } elseif ($param1 == "status") {
            $this->blogs_model->blogs_status();
            redirect(site_url('admin/blogs'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->blogs_model->blogs_delete();
            redirect(site_url('admin/blogs'), 'refresh');
        } elseif ($param1 == "edit_images") {
            $page_data['page_name'] = "images_e";
            $page_data['page_title'] = "Images Form";
            $page_data['blogs_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "delete_images") {
            $id = $this->input->post('b_id');
            $this->blogs_model->delete_images();
            redirect(site_url('admin/blogs/edit_images/' . $id . ''), 'refresh');
        } elseif ($param1 == "images_insert") {
            $id = $this->input->post('b_id');
            $this->blogs_model->images_insert();
            redirect(site_url('admin/blogs/edit_images/' . $id . ''), 'refresh');
        } else {
            $page_data['page_name'] = "blogs";
            $page_data['page_title'] = "Blogs";
            $page_data['blogs'] = $this->blogs_model->get_blogs();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //category
    public function category($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "category_a";
            $page_data['page_title'] = "Category Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->category_model->category_c();
            redirect(site_url('admin/category'), 'refresh');
        } elseif ($param1 == "edit_category") {
            $page_data['page_name'] = "category_e";
            $page_data['page_title'] = "Category Edit Form";
            $page_data['category_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "category_u") {
            $this->category_model->category_u();
            redirect(site_url('admin/category'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->category_model->category_delete();
            redirect(site_url('admin/category'), 'refresh');
        } else {
            $page_data['page_name'] = "category";
            $page_data['page_title'] = "Category";
            $page_data['category'] = $this->category_model->get_category();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Susbscribers
    public function subscribers($param1 = "", $param2 = "")
    {
        if ($param1 == "insret") {
            $this->subscribers_model->subscriber_insert();
            redirect(site_url(''), 'refresh');
        } else {
            $page_data['page_name'] = "subscribers";
            $page_data['page_title'] = "Subscribers";
            $page_data['subscribers'] = $this->subscribers_model->get_subscribers();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //gallery
    public function gallery($param1 = "", $param2 = "")
    {
        if ($param1 == "insert") {
            $this->gallery_model->gallery_insert();
            redirect(site_url('admin/gallery'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->gallery_model->gallery_delete();
            redirect(site_url('admin/gallery'), 'refresh');
        } else {
            $page_data['page_name'] = "gallery";
            $page_data['page_title'] = "Gallery";
            $page_data['gallery'] = $this->gallery_model->get_gallery();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // room Function
    public function rooms($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "rooms_a";
            $page_data['page_title'] = "Room Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            if (isset($_FILES['room_image']) && $_FILES['room_image']['name'] != "") {
                $path = $_FILES['room_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "room_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $room_image = $complete_path;
                        $room_type = $this->input->post('room_type');
                        $room_name = $this->input->post('room_name');
                        $room_desc = $this->input->post('room_desc');
                        $room_price = $this->input->post('room_price');
                        $this->rooms_model->rooms_c($room_image, $room_type, $room_name, $room_desc, $room_price);
                    }
                }
            } else {
                $room_image = "";
                $room_type = $this->input->post('room_type');
                $room_name = $this->input->post('room_name');
                $room_desc = $this->input->post('room_desc');
                $room_price = $this->input->post('room_price');
                $this->rooms_model->rooms_c($room_image, $room_type, $room_name, $room_desc, $room_price);
            }
            redirect(site_url('admin/rooms'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "rooms_e";
            $page_data['page_title'] = "Room Form";
            $page_data['room_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            if (isset($_FILES['room_image']) && $_FILES['room_image']['name'] != "") {
                $path = $_FILES['room_image']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = time() . date("Ymd") . "." . $ext;
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $img = "room_image";
                if (!$this->upload->do_upload($img)) {
                    $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
                } else {
                    $image_data = $this->upload->data();
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] =  $image_data['full_path'];
                    $config2['maintain_ratio'] = true;
                    $config2['create_thumb'] = false;
                    $config2['width']         = 1398;
                    $config2['height']       = 1198;
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    if ($this->image_lib->resize()) {
                        $complete_path = "uploads/images/" . $filename;
                        $room_image = $complete_path;
                        $room_id = $this->input->post('id');
                        $room_type = $this->input->post('room_type');
                        $room_name = $this->input->post('room_name');
                        $room_desc = $this->input->post('room_desc');
                        $room_price = $this->input->post('room_price');
                        $this->rooms_model->rooms_update($room_image, $room_id, $room_type, $room_name, $room_desc, $room_price);
                    }
                }
            } else {
                $room_image = "1";
                $room_id = $this->input->post('id');
                $room_type = $this->input->post('room_type');
                $room_name = $this->input->post('room_name');
                $room_desc = $this->input->post('room_desc');
                $room_price = $this->input->post('room_price');
                $this->rooms_model->rooms_update($room_image, $room_id, $room_type, $room_name, $room_desc, $room_price);
            }
            redirect(site_url('admin/rooms'), 'refresh');
        } elseif ($param1 == "status") {
            $this->rooms_model->rooms_status();
            redirect(site_url('admin/rooms'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->rooms_model->rooms_delete();
            redirect(site_url('admin/rooms'), 'refresh');
        } else {
            $page_data['page_name'] = "rooms";
            $page_data['page_title'] = "Rooms";
            $page_data['rooms'] = $this->rooms_model->get_rooms();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Rooms Enquiry
    public function rooms_enq($param1 = "", $param2 = "")
    {
        $page_data['page_name'] = "rooms_enq";
        $page_data['page_title'] = "Room Enquiry";
        $page_data['rooms_enq'] = $this->rooms_model->rooms_enq();
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    //Enquiry
    public function enquiry($param1 = "", $param2 = "")
    {
        $page_data['page_name'] = "enquiry";
        $page_data['page_title'] = "Enquiry";
        $page_data['enquiry'] = $this->rooms_model->rooms_enq();
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    //settings
    public function settings($param1 = "", $param2 = "")
    {
        if ($param1 == "view_razorpay") {
            $page_data['page_name'] = "razorpay";
            $page_data['page_title'] = "Razorpay";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "razorpay_u") {
            $this->settings_model->razorpay_insert();
            redirect(site_url('admin/settings/view_razorpay'), 'refresh');
        } elseif ($param1 == "view_fe_images") {
            $page_data['page_name'] = "front_end_images";
            $page_data['page_title'] = "Front End Images";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "logo_u") {
            $this->settings_model->logo_insert();
            redirect(site_url('admin/settings/view_fe_images'), 'refresh');
        } elseif ($param1 == "favicon_u") {
            $this->settings_model->favicon_insert();
            redirect(site_url('admin/settings/view_fe_images'), 'refresh');
        } elseif ($param1 == "view_mail") {
            $page_data['page_name'] = "mail_settings";
            $page_data['page_title'] = "Mail Settings";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "mail_u") {
            $this->settings_model->mail_settings_insert();
            redirect(site_url('admin/settings/view_mail'), 'refresh');
        } elseif ($param1 == "view_system") {
            $page_data['page_name'] = "system_settings";
            $page_data['page_title'] = "System Settings";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "system_u") {
            $this->settings_model->system_settings_insert();
            redirect(site_url('admin/settings/view_system'), 'refresh');
        } elseif ($param1 == "view_website") {
            $page_data['page_name'] = "website_settings";
            $page_data['page_title'] = "Website Settings";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "website_u") {
            $this->settings_model->website_settings_insert();
            redirect(site_url('admin/settings/view_website'), 'refresh');
        } elseif ($param1 == "view_social_media") {
            $page_data['page_name'] = "view_social_media";
            $page_data['page_title'] = "Socail Media Settings";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "social_media_u") {
            $this->settings_model->social_media_settings_insert();
            redirect(site_url('admin/settings/view_social_media'), 'refresh');
        }
    }

    //banner_mangment
    public function banner_m($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "banner_a";
            $page_data['page_title'] = "Banner Add";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->settings_model->banner_c();
            redirect(site_url('admin/banner_m'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "banner_e";
            $page_data['page_title'] = "Banner Form";
            $page_data['banner_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->settings_model->banner_u();
            redirect(site_url('admin/banner_m'), 'refresh');
        } elseif ($param1 == "status") {
            $this->settings_model->banner_status();
            redirect(site_url('admin/banner_m'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->settings_model->banner_delete();
            redirect(site_url('admin/banner_m'), 'refresh');
        } else {
            $page_data['page_name'] = "banner_mangment";
            $page_data['page_title'] = "Banner";
            $page_data['banner'] = $this->settings_model->get_banner();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //popup_mangment
    public function popup_m($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "popup_a";
            $page_data['page_title'] = "Popup Add";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->settings_model->popup_c();
            redirect(site_url('admin/popup_m'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "popup_e";
            $page_data['page_title'] = "Popup Form";
            $page_data['popup'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->settings_model->popup_u();
            redirect(site_url('admin/popup_m'), 'refresh');
        } elseif ($param1 == "status") {
            $this->settings_model->popup_status();
            redirect(site_url('admin/popup_m'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->settings_model->popup_delete();
            redirect(site_url('admin/popup_m'), 'refresh');
        } else {
            $page_data['page_name'] = "popup_management";
            $page_data['page_title'] = "Popup";
            $page_data['popup'] = $this->settings_model->get_popup();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Testmonials
    public function testimonials($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "testimonials_a";
            $page_data['page_title'] = "Testimonials Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->testimonials_model->testimonials_c();
            redirect(site_url('admin/testimonials'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "testimonials_e";
            $page_data['page_title'] = "Testimonials Form";
            $page_data['testimonials_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->testimonials_model->testimonials_u();
            redirect(site_url('admin/testimonials'), 'refresh');
        } elseif ($param1 == "status") {
            $this->testimonials_model->testimonials_status();
            redirect(site_url('admin/testimonials'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->testimonials_model->testimonials_delete();
            redirect(site_url('admin/testimonials'), 'refresh');
        } else {
            $page_data['page_name'] = "testimonials";
            $page_data['page_title'] = "Testimonials";
            $page_data['testimonials'] = $this->testimonials_model->get_testimonials();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Upcoming Events
    public function upcoming_events($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "upcoming_events_a";
            $page_data['page_title'] = "Upcoming Events Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->upcoming_events_model->upcoming_events_c();
            redirect(site_url('admin/upcoming_events'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "upcoming_events_e";
            $page_data['page_title'] = "Upcoming Events Form";
            $page_data['upcoming_events_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->upcoming_events_model->upcoming_events_u();
            redirect(site_url('admin/upcoming_events'), 'refresh');
        } elseif ($param1 == "status") {
            $this->upcoming_events_model->upcoming_events_status();
            redirect(site_url('admin/upcoming_events'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->upcoming_events_model->upcoming_events_delete();
            redirect(site_url('admin/upcoming_events'), 'refresh');
        } else {
            $page_data['page_name'] = "upcoming_events";
            $page_data['page_title'] = "Upcoming Events";
            $page_data['upcoming_events'] = $this->upcoming_events_model->get_upcoming_events();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    // Youtube Videos
    public function videos($param1 = "", $param2 = "")
    {
        if ($param1 == "add") {
            $page_data['page_name'] = "videos_a";
            $page_data['page_title'] = "Videos Form";
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "create") {
            $this->gallery_model->videos_c();
            redirect(site_url('admin/videos'), 'refresh');
        } elseif ($param1 == "edit") {
            $page_data['page_name'] = "videos_e";
            $page_data['page_title'] = "Videos Form";
            $page_data['videos_id'] = $param2;
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        } elseif ($param1 == "update") {
            $this->gallery_model->videos_update();
            redirect(site_url('admin/videos'), 'refresh');
        } elseif ($param1 == "status") {
            $this->gallery_model->videos_status();
            redirect(site_url('admin/videos'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->gallery_model->videos_delete();
            redirect(site_url('admin/videos'), 'refresh');
        } else {
            $page_data['page_name'] = "videos";
            $page_data['page_title'] = "Videos";
            $page_data['videos'] = $this->gallery_model->get_videos();
            if ($this->session->userdata("Shiroor_Admin")) {
                $this->load->view("backend/admin/index", $page_data);
            } else {
                $this->login();
            }
        }
    }

    //Seva Payment Details
    public function e_seva_payment()
    {
        $page_data['page_name'] = "seva_payment";
        $page_data['page_title'] = "E-Seva Payment Details";
        $page_data['payment_details'] = $this->payment_model->get_seva_payment();
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function kanike_payment()
    {
        $page_data['page_name'] = "kanike_payment";
        $page_data['page_title'] = "Kanike Payment Details";
        $page_data['payment_details'] = $this->payment_model->get_kanike_payment();
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function download_seva_invoice($order_id)
    {
        $this->db->where("transaction_id !=", "");
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('seva_list_payment')->row_array();

        $pdf_data['data'] = $query;
        $pdf_data['seva_type'] = 'e_seva';

        $html = $this->load->view('email/pdf_generate_details', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function download_kanike_invoice($order_id)
    {
        $this->db->where("transaction_id !=", "");
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('kanike_payment')->row_array();

        $pdf_data['data'] = $query;
        $pdf_data['seva_type'] = 'kanike';

        $html = $this->load->view('email/pdf_generate_details', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();

        $mpdf->SetHTMLHeader('<div class="row">
            <div class="col-xs-12" style="background-color: #fcba03;border-radius: 0.25em;margin: 0 0 1em;padding: 0.2em 0;">
                <p style="text-align:center;color:white;font:bold 100% sans-serif;letter-spacing:0.5em ; text-transform:uppercase;font-size:20px;">Payment Details</p>
            </div>
        </div>');
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLFooter('<div class="row">
            <div class="col-xs-12" style="background-color: #fcba03;border-radius: 0.25em;margin: 0 0 1em;padding: 0.2em 0;">
                <p style="text-align:center;color:white;font:bold 100% sans-serif;letter-spacing:0.5em ; text-transform:uppercase;font-size:10px;">Powerd By AmpWork</p>
            </div>
        </div>');
        $mpdf->Output();
    }

    public function download_today_seva()
    {
        $date = date('Y-m-d');
        $this->db->where("transaction_id !=", "");
        $this->db->where('seva_date', $date);
        $query = $this->db->get('seva_list_payment')->result_array();

        $pdf_data['data'] = $query;
        $pdf_data['seva_date'] = $date;

        $html = $this->load->view('email/pdf_generate_seva_details', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLHeader('<div class="row">
            <div class="col-xs-12" style="background-color: #fcba03;border-radius: 0.25em;margin: 0 0 1em;padding: 0.2em 0;">
                <p style="text-align:center;color:white;font:bold 100% sans-serif;letter-spacing:0.5em ; text-transform:uppercase;font-size:20px;">Payment Details</p>
            </div>
        </div>');
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLFooter('<div class="row">
            <div class="col-xs-12" style="background-color: #fcba03;border-radius: 0.25em;margin: 0 0 1em;padding: 0.2em 0;">
                <p style="text-align:center;color:white;font:bold 100% sans-serif;letter-spacing:0.5em ; text-transform:uppercase;font-size:10px;">Powerd By AmpWork</p>
            </div>
        </div>');
        $mpdf->Output("Shiroor Mutt", \Mpdf\Output\Destination::INLINE);
    }

    public function download_tommorow_seva()
    {
        $date = date('Y-m-d', strtotime("+1 day"));
        $this->db->where("transaction_id !=", "");
        $this->db->where('seva_date', $date);
        $query = $this->db->get('seva_list_payment')->result_array();

        $pdf_data['data'] = $query;
        $pdf_data['seva_date'] = $date;

        $html = $this->load->view('email/pdf_generate_seva_details', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function download_seva_between_dates()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $this->db->where("transaction_id !=", "");
        $this->db->where('seva_date >=', $start_date);
        $this->db->where('seva_date <=', $end_date);
        $query = $this->db->get('seva_list_payment')->result_array();

        $pdf_data['data'] = $query;
        $pdf_data['seva_start_date'] = $start_date;
        $pdf_data['seva_end_date'] = $end_date;

        $html = $this->load->view('email/pdf_generate_seva_details', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLHeader('<div class="row">
            <div class="col-xs-12" style="background-color: #fcba03;border-radius: 0.25em;margin: 0 0 1em;padding: 0.2em 0;">
                <p style="text-align:center;color:white;font:bold 100% sans-serif;letter-spacing:0.5em ; text-transform:uppercase;font-size:20px;">Payment Details</p>
            </div>
        </div>');
        $mpdf->WriteHTML($html);
        $mpdf->SetHTMLFooter('<div class="row">
            <div class="col-xs-12" style="background-color: #fcba03;border-radius: 0.25em;margin: 0 0 1em;padding: 0.2em 0;">
                <p style="text-align:center;color:white;font:bold 100% sans-serif;letter-spacing:0.5em ; text-transform:uppercase;font-size:10px;">Powerd By AmpWork</p>
            </div>
        </div>');
        $mpdf->Output();
    }

    public function reply_message($param1, $param2)
    {
        $page_data['page_name'] = "reply_msg";
        $page_data['page_title'] = "Reply To Enquiry";
        $page_data['reply_id'] = $param1;
        $page_data['page_id'] = $param2;
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    public function send_message()
    {
        $page_id = $this->input->post('page_id');
        $id = $this->input->post('id');
        $message = $this->input->post('reply_msg');
        $data = array(
            'response' => $message
        );
        $this->db->where('id', $id);
        $this->db->update('contact_us', $data);

        $this->email_model->send_reply_message();
        if ($page_id == "enquiry") {
            $this->enquiry();
        } else {
            $this->rooms_enq();
        }
    }

    // excel report genration
    public function report_gen_excel()
    {
        $page_data['page_name'] = "report_gen_excel";
        $page_data['page_title'] = "Report Genration";
        if ($this->session->userdata("Shiroor_Admin")) {
            $this->load->view("backend/admin/index", $page_data);
        } else {
            $this->login();
        }
    }

    
}
