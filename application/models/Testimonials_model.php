<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class testimonials_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_testimonials()
    {
        return $this->db->get('testimonial');
    }
    public function testimonials_c()
    {
        if (isset($_FILES['testimonials_image']) && $_FILES['testimonials_image']['name'] != "") {
            $path = $_FILES['testimonials_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "testimonials_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 852;
                $config2['height']       = 480;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $testimonials_image = $complete_path;
                    $name = $this->input->post('name');
                    $occupation = $this->input->post('occupation');
                    $short_message = $this->input->post('short_message');
                    $data    = array(
                        'name' => $name,
                        'occupation' => $occupation,
                        'image' => $testimonials_image,
                        'short_message' => $short_message,
                        'status' => '1'
                    );
                    if ($this->db->insert('testimonial', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Testimonials Details has been Inserted Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'No Testimonials Image is Present');
        }
    }
    public function  testimonials_u()
    {
        if (isset($_FILES['testimonials_image']) && $_FILES['testimonials_image']['name'] != "") {
            $path = $_FILES['testimonials_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "testimonials_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 852;
                $config2['height']       = 480;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $testimonials_image = $complete_path;
                    $update_at = date("Y/m/d H:i:s");
                    $id = $this->input->post('id');
                    $name = $this->input->post('name');
                    $occupation = $this->input->post('occupation');
                    $short_message = $this->input->post('short_message');
                    $data    = array(
                        'name' => $name,
                        'occupation' => $occupation,
                        'image' => $testimonials_image,
                        'short_message' => $short_message,
                        'updated_at' => $update_at
                    );
                    $this->db->where('id', $id);
                    if ($this->db->update('testimonial', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Testimonials Details has been Updated Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $update_at = date("Y/m/d H:i:s");
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $occupation = $this->input->post('occupation');
            $short_message = $this->input->post('short_message');
            $data    = array(
                'name' => $name,
                'occupation' => $occupation,
                'short_message' => $short_message,
                'updated_at' => $update_at
            );
            $this->db->where('id', $id);
            if ($this->db->update('testimonial', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Testimonials Details has been Updated Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
    public function testimonials_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('testimonial', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Testimonials Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function testimonials_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('testimonial')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Testimonials Details have been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
