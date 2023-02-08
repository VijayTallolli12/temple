<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function about_us()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "aboutus";
        $page_data['page_title'] = "About Us";
        $this->load->view("frontend/index", $page_data);
    }

    public function history()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['history'] = $this->home_model->get_history();
        $page_data['page_name'] = "history";
        $page_data['page_title'] = "History";
        $this->load->view("frontend/index", $page_data);
    }

    public function activities()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['activities'] = $this->home_model->get_activities();
        $page_data['page_name'] = "activities";
        $page_data['page_title'] = "Activities";
        $this->load->view("frontend/index", $page_data);
    }

    public function daily_worship()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['daily_worship'] = $this->home_model->get_daily_worship();
        $page_data['page_name'] = "daily_worship";
        $page_data['page_title'] = "Daily Worshiped Deities";
        $this->load->view("frontend/index", $page_data);
    }
    public function branches()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['branches'] = $this->home_model->get_branches();
        $page_data['page_name'] = "branches";
        $page_data['page_title'] = "Our Branches";
        $this->load->view("frontend/index", $page_data);
    }
    public function education()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['institutes'] = $this->home_model->get_education();
        $page_data['page_name'] = "education";
        $page_data['page_title'] = "Our Education Institutes";
        $this->load->view("frontend/index", $page_data);
    }
}
