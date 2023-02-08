<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "contactus";
        $page_data['page_title'] = "Contact Us";
        $this->load->view("frontend/index", $page_data);
    }

    public function contact_us_insert()
    {
        $this->home_model->insert_contactus();
    }
    public function get_room_details()
    {
        $data = $this->db->get_where("rooms", array("status" => "1"))->result_array();
        echo json_encode($data);
    }
}
