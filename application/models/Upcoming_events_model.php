<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class upcoming_events_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_upcoming_events()
    {
        return $this->db->get('upcoming_events');
    }
    public function upcoming_events_c()
    {
        if (isset($_FILES['upcoming_events_image']) && $_FILES['upcoming_events_image']['name'] != "") {
            $path = $_FILES['upcoming_events_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/upcoming_events';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "upcoming_events_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1280;
                $config2['height']       = 1042;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/upcoming_events/" . $filename;
                    $upcoming_events_image = $complete_path;
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $date = $this->input->post('date');
                    $place = $this->input->post('place');
                    //seo title
                    $seotitle = trim($title);
                    $seotitle = preg_replace("/\s+/", " ", $seotitle);
                    $seotitle = str_replace(" ", "-", $seotitle);
                    $seotitle = strtolower($seotitle);
                    $data    = array(
                        'title' => $title,
                        'image' => $upcoming_events_image,
                        'description' => $description,
                        'date' => $date,
                        'place' => $place,
                        'seo_title' => $seotitle,
                        'status' => '1'
                    );
                    if ($this->db->insert('upcoming_events', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Upocming Events Details has been Inserted Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'No Upcoming Events Image is Present');
        }
    }
    public function  upcoming_events_u()
    {
        if (isset($_FILES['upcoming_events_image']) && $_FILES['upcoming_events_image']['name'] != "") {
            $path = $_FILES['upcoming_events_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/upcoming_events';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "upcoming_events_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1280;
                $config2['height']       = 1042;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/upcoming_events/" . $filename;
                    $upcoming_events_image = $complete_path;
                    $update_at = date("Y/m/d H:i:s");
                    $id = $this->input->post('id');
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');
                    $date = $this->input->post('date');
                    $place = $this->input->post('place');
                    //seo title
                    $seotitle = trim($title);
                    $seotitle = preg_replace("/\s+/", " ", $seotitle);
                    $seotitle = str_replace(" ", "-", $seotitle);
                    $seotitle = strtolower($seotitle);
                    $data    = array(
                        'title' => $title,
                        'image' => $upcoming_events_image,
                        'description' => $description,
                        'date' => $date,
                        'place' => $place,
                        'seo_title' => $seotitle,
                        'updated_at' => $update_at
                    );
                    $this->db->where('id', $id);
                    if ($this->db->update('upcoming_events', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Upcoming Events Details has been Updated Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $update_at = date("Y/m/d H:i:s");
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $date = $this->input->post('date');
            $place = $this->input->post('place');
            //seo title
            $seotitle = trim($title);
            $seotitle = preg_replace("/\s+/", " ", $seotitle);
            $seotitle = str_replace(" ", "-", $seotitle);
            $seotitle = strtolower($seotitle);
            $data    = array(
                'title' => $title,
                'description' => $description,
                'date' => $date,
                'place' => $place,
                'seo_title' => $seotitle,
                'updated_at' => $update_at
            );
            $this->db->where('id', $id);
            if ($this->db->update('upcoming_events', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Upcoming Events Details has been Updated Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
    public function upcoming_events_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('upcoming_events', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Upcoming Events Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function upcoming_events_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('upcoming_events')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Upcoming Events Details have been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }


    //Upcoming Events
    public function get_upcoming_event($id)
    {
        $this->db->where("id", $id);
        $res = $this->db->get("upcoming_events");
        if ($res->num_rows() > 0) {
            return $res->row_array();
        } else {
            return [];
        }
    }

    //onscroll load data fetching of events
    public function upcoming_event_onscroll_load()
    {
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');
        $this->db->where("status", "1");
        $this->db->order_by("date", 'desc');
        $this->db->limit($limit, $start);
        $res = $this->db->get("upcoming_events");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return "empty";
        }
    }
}
