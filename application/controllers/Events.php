<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['script_to_load'] = array('onscroll_load.js');
        // $page_data['events_details'] = $this->blogs_model->get_all_events();
        $page_data['page_name'] = "events";
        $page_data['page_title'] = "Events";
        $this->load->view("frontend/index", $page_data);
    }

    public function event_details($param1 = "", $param2 = "")
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['event_detail'] = $this->blogs_model->get_event($param1);
        $page_data['facebook'] = "yes";
        $page_data['page_name'] = "event_detail";
        $page_data['page_title'] = $page_data['event_detail']['title'];
        $this->load->view("frontend/index", $page_data);
    }

    public function category($param1 = "")
    {
        $this->db->where("id", $param1);
        $category = $this->db->get('category')->row_array();

        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['by_category'] = $this->blogs_model->get_event_byCategory($param1);
        $page_data['page_name'] = "category";
        $page_data['page_title'] = $category['category'];
        $this->load->view("frontend/index", $page_data);
    }

    public function archieve($param1 = "", $param2 = "")
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['by_archive'] = $this->blogs_model->get_event_byarchive($param1, $param2);
        $page_data['page_name'] = "archieve";
        $page_data['page_title'] = "archieve -" . $param1 . "/" . $param2;
        $this->load->view("frontend/index", $page_data);
    }


    //Upcoming Events Details
    public function upcoming_event_details($param1 = "", $param2 = "")
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['upcoming_event_details'] = $this->upcoming_events_model->get_upcoming_event($param1);
        $page_data['facebook'] = "upcoming_event_details";
        $page_data['page_name'] = "upcoming_event";
        $page_data['page_title'] = $page_data['upcoming_event_details']['title'];
        $this->load->view("frontend/index", $page_data);
    }

    public function upcoming_event()
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['script_to_load'] = array('onscroll_load_UE.js');
        $page_data['page_name'] = "upcoming_events";
        $page_data['page_title'] = "Upcoming Event";
        $this->load->view("frontend/index", $page_data);
    }

    //onscroll load Events
    public function event_onscroll_load($param1 = "", $param2 = "")
    {
        $events_details = $this->blogs_model->event_onscroll_load();
        if ($events_details != "empty") {
            foreach ($events_details as $value) {
                $sampleDate = $value['date'];
                $convertDate = date("M d,Y", strtotime($sampleDate));
                $this->db->where("id", $value['category']);
                $category = $this->db->get('category')->row_array();
                $id = $value['id'];
                $seo_title = $value['seo_title'];
                $image = site_url($value['featured_image']);
                $link = site_url("events/$id/$seo_title");

                $data[] = '<div class="col-md-4">
            <article class="sigma_post">
            <div class="sigma_post-thumb events_image">
            <a href="' . $link . '">
            <img src="' . $image . '" alt="post">
            </a></div>
            <div class="sigma_post-body events_body card_adj_events">
            <div class="row sigma_post-meta">
            <div class="col-6 col-md-6 text-start">
            <i class="fas fa-feather"></i>
            <a href="#" class="sigma_post-category" style="color: black;">' . $category['category'] . '</a></div>
             <div class="col-6 col-md-6 text-end"><a href="#" class="sigma_post-date" style="color: black;"> <i class="far fa-calendar"></i> ' . $convertDate . ' </a></div></div>
            <h5 class="text-2"> <a href="' . $link . '">' . $value['title'] . '</a> </h5>
            </div></article></div>';
            }
            $op = array('data' => $data);
            echo json_encode($op);
        } else {
            $op = array('message' => "empty");
            echo json_encode($op);
        }
    }

    // Onscroll Loas Upcoming Events
    public function event_onscroll_load_UE($param1 = "", $param2 = "")
    {
        $events_details = $this->upcoming_events_model->upcoming_event_onscroll_load();

        if ($events_details != "empty") {
            foreach ($events_details as $value) {
                $sampleDate = $value['date'];
                $convertDate = date("M d,Y", strtotime($sampleDate));

                $id = $value['id'];
                $seo_title = $value['seo_title'];
                $image = site_url($value['image']);
                $link = site_url("upcoming_events/$id/$seo_title");

                $event_date = date("y-m-d", strtotime($sampleDate));
                $present_date = date('d-m-Y');
                $present_date = date("y-m-d", strtotime($present_date));
                if ($present_date < $event_date) {
                    $data[] = '<div class="col-md-4" >
                                <article class="sigma_post">
                                <div class="sigma_post-thumb events_image">
                                <a href="' . $link . '"><img src="' . $image . '" alt="post"></a></div>
                                <div class="sigma_post-body events_body card_adj_events">
                                <div class="row sigma_post-meta">
                                <div class="col-md-6 col-6 text-start">
                                <i class="far fa-map-marked-alt"></i>
                                <a href="javascript:void(0)" class="sigma_post-category" style="color: black;">' . $value['place'] . '</a></div><div class="col-md-6 col-6 text-end">
                                <a href="#" class="sigma_post-date" style="color: black;"> <i class="far fa-calendar"></i> ' .  $convertDate . ' </a></div></div>
                                <h5 class="text-2"> <a href="' . $link . '">' . $value['title'] . '</a> </h5>
                                </div></article></div>';
                } else {
                    $data[] = '<div class="col-md-4" style="opacity: 0.5;filter: grayscale(1);">
                                <article class="sigma_post">
                                <div class="sigma_post-thumb events_image">
                                <a href="' . $link . '"><img src="' . $image . '" alt="post"></a></div>
                                <div class="sigma_post-body events_body card_adj_events">
                                <div class="row sigma_post-meta">
                                <div class="col-md-6 col-6 text-start">
                                <i class="far fa-map-marked-alt"></i>
                                <a href="javascript:void(0)" class="sigma_post-category" style="color: black;">' . $value['place'] . '</a></div><div class="col-md-6 col-6 text-end">
                                <a href="#" class="sigma_post-date" style="color: black;"> <i class="far fa-calendar"></i> ' .  $convertDate . ' </a></div></div>
                                <h5 class="text-2"> <a href="' . $link . '">' . $value['title'] . '</a> </h5>
                                </div></article></div>';
                }
            }
            $op = array('data' => $data);
            echo json_encode($op);
        } else {
            $op = array('message' => "empty");
            echo json_encode($op);
        }
    }
}
