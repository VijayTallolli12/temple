<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Check_title extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function blog_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('blogs');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function blog_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('blogs');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function category_title()
    {
        $title = $this->input->post('title');
        $this->db->where('category', $title);
        $query = $this->db->get('category');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function category_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('category', $title);
        $query = $this->db->get('category');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function e_seva_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('seva_list');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function e_seva_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('seva_list');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function kanike_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('kanike');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function kanike_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('kanike');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function daily_seva_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('daily_seva');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function daily_seva_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('daily_seva');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function parampara_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('parampara');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function parampara_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('parampara');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function dw_deitie_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('dw_deities');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function dw_deitie_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('dw_deities');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function branche_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('branches');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function branche_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('branches');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function ei_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('educational_institutes');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function ei_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('educational_institutes');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function activity_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('activity');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function activity_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('activity');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function history_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('history');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function history_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('history');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function banner_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('banner_management');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function banner_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('banner_management');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function popup_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('popup_management');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function popup_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('popup_management');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function upcoming_event_title()
    {
        $title = $this->input->post('title');
        $this->db->where('title', $title);
        $query = $this->db->get('upcoming_events');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function upcoming_event_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('title', $title);
        $query = $this->db->get('upcoming_events');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function testimonial_title()
    {
        $title = $this->input->post('title');
        $this->db->where('name', $title);
        $query = $this->db->get('testimonial');
        $num = $query->num_rows();
        if ($num > 0) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }

    public function testimonial_u_title()
    {
        $title = $this->input->post('title');
        $id = $this->input->post('id');
        $this->db->where('name', $title);
        $query = $this->db->get('testimonial');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $data = 1;
            echo json_encode($data);
        } else {
            $data = 0;
            echo json_encode($data);
        }
    }
}
