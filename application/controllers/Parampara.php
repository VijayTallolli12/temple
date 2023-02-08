<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parampara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function parampara()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['parampara'] = $this->home_model->get_parampara();
        $page_data['page_name'] = "parampara";
        $page_data['page_title'] = "Parampara";
        $this->load->view("frontend/index", $page_data);
    }
    public function sparampara($param)
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['sparampara'] = $param;
        $page_data['parampara'] = $this->home_model->get_parampara();
        $page_data['page_name'] = "sparampara";
        $page_data['page_title'] = "Parampara";
        $this->load->view("frontend/index", $page_data);
    }
}
