<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seva extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "seva";
        $page_data['page_title'] = "Seva";
        $this->load->view("frontend/index", $page_data);
    }

    public function e_seva()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['e_seva'] = $this->home_model->get_e_seva();
        $page_data['styles_to_load'] = array("custom1.css");
        $page_data['page_name'] = "e_seva";
        $page_data['page_title'] = "E Seva";
        $this->load->view("frontend/index", $page_data);
    }

    public function kanike()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['kanike'] = $this->home_model->get_kanike();
        $page_data['styles_to_load'] = array("custom1.css");
        $page_data['page_name'] = "kanike";
        $page_data['page_title'] = "Kanike";
        $this->load->view("frontend/index", $page_data);
    }

    public function rooms()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['rooms'] = $this->home_model->get_rooms();
        $page_data['page_name'] = "rooms";
        $page_data['page_title'] = "Rooms";
        $this->load->view("frontend/index", $page_data);
    }

    public function daily_seva()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['daily_seva'] = $this->home_model->get_daily_seva();
        $page_data['page_name'] = "daily_seva";
        $page_data['page_title'] = "Daily Seva";
        $this->load->view("frontend/index", $page_data);
    }

    public function e_seva_list()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['styles_to_load'] = array("custom1.css");
        $page_data['page_name'] = "e_seva_list";
        $page_data['page_title'] = "Seva List";
        $this->load->view("frontend/index", $page_data);
    }

    public function seva_payment()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['styles_to_load'] = array("custom1.css");
        $page_data['script_to_load'] = array("city_api.js");
        $page_data['page_name'] = "e_seva_payment";
        $page_data['page_title'] = "Seva Payment";
        $this->load->view("frontend/index", $page_data);
    }
}
