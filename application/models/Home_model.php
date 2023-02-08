<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_banners()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("banner_management");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_history()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("history");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_activities()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("activity");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_daily_worship()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("dw_deities");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_branches()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("branches");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_education()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("educational_institutes");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_parampara()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("parampara");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_e_seva()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("seva_list");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_kanike()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("kanike");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_daily_seva()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("daily_seva");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_rooms()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("rooms");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_photos()
    {
        $this->db->group_by("title");
        $res = $this->db->get("gallery_images");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }
    public function get_yt_videos()
    {
        $this->db->where("status", 1);
        $res = $this->db->get("videos");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function insert_contactus()
    {
        $subject = $this->input->post('subject');
        if ($subject == "room") {
            $data = array(
                'name' => $this->input->post('name'),
                'email_id' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'subject' => $subject,
                'Room_details' => $this->input->post('room_details'),
                'date' => $this->input->post('date'),
                'members' => $this->input->post('members'),
                'message' => $this->input->post('message')
            );
            if ($this->db->insert('contact_us', $data)) {
                $data = 1;
                echo json_encode($data);
            } else {
                $data = 0;
                echo json_encode($data);
            }
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email_id' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'subject' => $subject,
                'message' => $this->input->post('message')
            );
            if ($this->db->insert('contact_us', $data)) {
                $data = 1;
                echo json_encode($data);
            } else {
                $data = 0;
                echo json_encode($data);
            }
        }
    }

    // user details
    public function get_user_detail()
    {
        $user_id = $this->session->userdata("user_id");
        $this->db->where('id', $user_id);
        $this->db->where('user_role', 'user');
        $data = $this->db->get('users');
        if ($data->num_rows() > 0) {
            return $data->row_array();
        } else {
            return $data = [];
        }
    }

    public function update_my_info()
    {
        $user_id = $this->session->userdata("user_id");
        $this->db->where('id', $user_id);
        $this->db->where('email', $this->input->post('email'));
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'rashi' => $this->input->post('rashi'),
                'nakshtra' => $this->input->post('nakshtra'),
                'gothra' => $this->input->post('gothra'),
                'address' => $this->input->post('address'),
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'city' => $this->input->post('city'),
                'pincode' => $this->input->post('pincode'),
                'updated_at' => date("Y/m/d H:i:s"),
            );
            $this->db->where('id', $user_id);
            if ($this->db->update('users', $data)) {
                $this->session->set_flashdata('message', 'Your Details Has Been Updated');
            } else {
                $this->session->set_flashdata('failed', 'Ohh Snap!! Something Went Wrong Please Try Again Later');
            }
        } else {
            $this->db->where('email', $this->input->post('email'));
            $check_mail = $this->db->get('users');
            if ($check_mail->num_rows() > 0) {
                $this->session->set_flashdata('failed', 'This Email is Already Present');
            } else {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'phone_no' => $this->input->post('phone_no'),
                    'gender' => $this->input->post('gender'),
                    'dob' => $this->input->post('dob'),
                    'rashi' => $this->input->post('rashi'),
                    'nakshtra' => $this->input->post('nakshtra'),
                    'gothra' => $this->input->post('gothra'),
                    'address' => $this->input->post('address'),
                    'country' => $this->input->post('country'),
                    'state' => $this->input->post('state'),
                    'city' => $this->input->post('city'),
                    'pincode' => $this->input->post('pincode'),
                    'updated_at' => date("Y/m/d H:i:s"),
                    'email_verified' => 0
                );
                $this->db->where('id', $user_id);
                if ($this->db->update('users', $data)) {
                    $name = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
                    $email = $this->input->post('email');
                    $this->email_model->send_Verification_mail($email, $name);
                    $this->session->set_flashdata('message', 'Your Details Has Been Updated !Please Verify Your Email .We Have Sent to You a Verification Mail');
                    return (1);
                } else {
                    $this->session->set_flashdata('failed', 'Ohh Snap!! Something Went Wrong Please Try Again Later');
                }
            }
        }
    }

    public function insert_family_members()
    {
        $data = array(
            'user_id' => $this->session->userdata("user_id"),
            'relation' => $this->input->post('relationship'),
            'first_name' => $this->input->post('fm_name'),
            'last_name' => $this->input->post('fm_last_name'),
            'phone_no' => $this->input->post('fm_phone_no'),
            'dob' => $this->input->post('fm_dob'),
            'rashi' => $this->input->post('fm_rashi'),
            'nakshtra' => $this->input->post('fm_nakashatra'),
            'gothra' => $this->input->post('fm_gothra'),
        );
        if ($this->db->insert('user_family_members', $data)) {
            $this->session->set_flashdata('message', 'Your Family Details Has Been Inserted');
        } else {
            $this->session->set_flashdata('failed', 'Ohh Snap!! Something Went Wrong Please Try Again Later');
        }
    }

    public function update_family_members()
    {
        $data = array(
            'user_id' => $this->session->userdata("user_id"),
            'relation' => $this->input->post('relationship'),
            'first_name' => $this->input->post('fm_name'),
            'last_name' => $this->input->post('fm_last_name'),
            'phone_no' => $this->input->post('fm_phone_no'),
            'dob' => $this->input->post('fm_dob'),
            'rashi' => $this->input->post('fm_rashi'),
            'nakshtra' => $this->input->post('fm_nakashatra'),
            'gothra' => $this->input->post('fm_gothra'),
            'updated_at' => date("Y/m/d H:i:s"),
        );
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('user_family_members', $data)) {
            $this->session->set_flashdata('message', 'Your Family Details Has Been Updated');
        } else {
            $this->session->set_flashdata('failed', 'Ohh Snap!! Something Went Wrong Please Try Again Later');
        }
    }

    public function delete_family_members($member_id)
    {
        $this->db->where('id', $member_id);
        if ($this->db->delete('user_family_members')) {
            $this->session->set_flashdata('message', 'Your Family Member Details Has Been Deleted');
        } else {
            $this->session->set_flashdata('failed', 'Ohh Snap!! Something Went Wrong Please Try Again Later');
        }
    }
}
