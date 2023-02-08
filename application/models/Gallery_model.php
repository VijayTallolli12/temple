<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class gallery_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    //Gallery
    public function get_gallery()
    {
        return $this->db->get('gallery_images');
    }
    public function gallery_insert()
    {
        if (!empty($_FILES['gallery_images']['name']) && count(array_filter($_FILES['gallery_images']['name'])) > 0) {
            $filesCount = count($_FILES['gallery_images']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                // unset($filename);
                $_FILES['gallery_images_i']['name']     = $_FILES['gallery_images']['name'][$i];
                $_FILES['gallery_images_i']['type']     = $_FILES['gallery_images']['type'][$i];
                $_FILES['gallery_images_i']['tmp_name'] = $_FILES['gallery_images']['tmp_name'][$i];
                $_FILES['gallery_images_i']['error']     = $_FILES['gallery_images']['error'][$i];
                $_FILES['gallery_images_i']['size']     = $_FILES['gallery_images']['size'][$i];

                $path = $_FILES['gallery_images_i']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = uniqid() . time() . date("Ymd") . "." . $ext;

                $config['upload_path'] = './uploads/gallery_images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $img = "gallery_images_i";
                if ($this->upload->do_upload($img)) {
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
                        $complete_path = "uploads/gallery_images/" . $filename;
                        $image = $complete_path;
                        $data1 = array(
                            'title' => $this->input->post('gallery_title'),
                            'photo' => $image
                        );
                        if ($this->db->insert('gallery_images', $data1)) {
                            $this->session->set_flashdata('message', 'Congratualtion!! Images Added Successfully');
                        } else {
                            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                        }
                    } else {
                        $errors = $this->image_lib->display_errors();
                        $this->session->set_flashdata('failed', '' . $errors . '');
                    }
                } else {
                    $errors = $this->upload->display_errors();
                    $this->session->set_flashdata('failed', '' . $errors . '');
                }
            }
        }
    }
    public function gallery_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('gallery_images')) {
            $this->session->set_flashdata('message', 'Congratualtion!!  Image has been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }

    //videos
    public function get_videos()
    {
        return $this->db->get('videos');
    }
    public function videos_c()
    {
        $data['title'] = $this->input->post('title');
        $data['link'] = $this->input->post('link');
        $data['status'] = '1';
        if ($this->db->insert('videos', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Videos Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function videos_update()
    {

        $data['title'] = $this->input->post('title');
        $data['link'] = $this->input->post('link');
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('videos', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Videos Details Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function videos_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('videos', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Videos Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function videos_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('videos')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Videos Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
