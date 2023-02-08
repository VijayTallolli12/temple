<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['page_name'] = "gallery";
        $page_data['page_title'] = "Gallery";
        $this->load->view("frontend/index", $page_data);
    }

    public function photos()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['styles_to_load'] = array("lightgallery.min.css", "lg-fullscreen.min.css");
        $page_data['script_to_load'] = array("gallery.js", "lightgallery.min.js", "lg-fullscreen.min.js", "lg-thumbnail.min.js");
        $page_data['photos'] = $this->home_model->get_photos();
        $page_data['page_name'] = "photos";
        $page_data['page_title'] = "Photos";
        $this->load->view("frontend/index", $page_data);
    }

    public function videos()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['yt_videos'] = $this->home_model->get_yt_videos();
        $page_data['page_name'] = "videos";
        $page_data['page_title'] = "Videos";
        $this->load->view("frontend/index", $page_data);
    }

    public function fetch_images()
    {
        $list = "";
        $title = $this->input->post('title');
        $res = $this->db->get_where("gallery_images", array("title" => $title));
        if ($res->num_rows() > 0) {
            $data = $res->result_array();
            foreach ($data as $key => $value) {
                $list .= "<a href='" . site_url($value['photo']) . "' data-sub-html='" . $value['title'] . "'><img id='image" . $key . "' src='" . site_url($value['photo']) . "'></a>";
            }
            $op = array("status" => true, "data" => $list);
        } else {
            $op = array("status" => false, "data" => "", "message" => "No Record  Found");
        }
        echo json_encode($op);
    }
}
