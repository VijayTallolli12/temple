<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->output->set_status_header('404');
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "404";
        $page_data['page_title'] = "Page Not Found";
        $this->load->view("frontend/index", $page_data);
    }
}
