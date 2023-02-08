<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Api extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $this->load->database();
        //$this->load->model("Api_model","api");
        $this->load->model("Home_model", "home");
        $this->load->model("email_model", "emailModel");
    }

    function banners_get()
    {
        $banners = $this->home->get_banners();
        //$banners=$this->api->get_banners();
        echo json_encode($banners);
    }

    function history_get()
    {
        $history = $this->home->get_history();
        echo json_encode($history);
    }

    function activities_get()
    {
        $activities = $this->home->get_activities();
        echo json_encode($activities);
    }
    function dailyWorship_get()
    {
        $dailyWorship = $this->home->get_daily_worship();
        echo json_encode($dailyWorship);
    }
    function branches_get()
    {
        $branches = $this->home->get_branches();
        echo json_encode($branches);
    }
    function education_get()
    {
        $education = $this->home->get_education();
        echo json_encode($education);
    }

    function parampara_get()
    {
        $parampara = $this->home->get_parampara();
        echo json_encode($parampara);
    }

    function seva_get()
    {
        $seva = $this->home->get_e_seva();
        echo json_encode($seva);
    }
    function kanike_get()
    {
        $kanike = $this->home->get_kanike();
        echo json_encode($kanike);
    }

    function dailySeva_get()
    {
        $dailySeva = $this->home->get_daily_seva();
        echo json_encode($dailySeva);
    }
    function rooms_get()
    {
        $rooms = $this->home->get_rooms();
        echo json_encode($rooms);
    }

    function photos_get()
    {
        $photos = $this->home->get_photos();
        echo json_encode($photos);
    }

    function yideos_get()
    {
        $videos = $this->home->get_yt_videos();
        echo json_encode($videos);
    }

    function contactus_post()
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

    function userDetails_get()
    {
        $user_id = $this->input->get("user_id");
        $this->db->where('id', $user_id);
        $this->db->where('user_role', 'user');
        $data = $this->db->get('users');
        if ($data->num_rows() > 0) {
            return json_encode($data->row_array());
        } else {
            return $data = [];
        }
    }

    function userUpdate_post()
    {
        $user_id = $this->input->post("user_id");
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
                $message = ["message" => 'Your Details Has Been Updated', "errorcode" => "0"];

                return json_encode($message);

            } else {

            }
        } else {
            $this->db->where('email', $this->input->post('email'));
            $check_mail = $this->db->get('users');
            if ($check_mail->num_rows() > 0) {
                $message = ["message" => 'This Email is Already Present', "errorcode" => "1"];
                return json_encode($message);
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
                    $this->emailModel->send_Verification_mail($email, $name);
                    $message = ["message" => 'Your Details Has Been Updated !Please Verify Your Email .We Have Sent to You a Verification Mail', "errorcode" => "0"];
                    return json_encode($message);
                    //return (1);
                } else {
                    $message = ["message" => 'Ohh Snap!! Something Went Wrong Please Try Again Later', "errorcode" => "1"];
                    return json_encode($message);
                }
            }
        }
    }

    function addFamily_post()
    {
        $data = array(
            'user_id' => $this->input->post("user_id"),
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
            $message = ["message" => 'Your Family Details Has Been Inserted', "errorcode" => "0"];
            return json_encode($message);
        } else {
            $message = ["message" => 'Ohh Snap!! Something Went Wrong Please Try Again Later', "errorcode" => "1"];
            return json_encode($message);
        }
    }
}