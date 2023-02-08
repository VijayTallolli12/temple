<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class blogs_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_blogs()
    {
        return $this->db->get('blogs');
    }
    public function blogs_c()
    {
        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
            $path = $_FILES['featured_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "featured_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1398;
                $config2['height']       = 1198;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/images/" . $filename;
                    $featured_image = $complete_path;
                    $blog_title = $this->input->post('blog_title');
                    $blog_date = $this->input->post('blog_date');
                    $blog_place = $this->input->post('blog_place');
                    $blog_desc = $this->input->post('blog_desc');
                    $blogs_category = $this->input->post('blogs_category');
                    $title = $this->input->post('blog_title');
                    // $seotitle = preg_replace("/[^a-zA-Z0-9\s]/", "", $title);
                    $seotitle = trim($title);
                    $seotitle = preg_replace("/\s+/", " ", $seotitle);
                    $seotitle = str_replace(" ", "-", $seotitle);
                    $seotitle = strtolower($seotitle);
                    $data = array(
                        'title' => $blog_title,
                        'featured_image' => $featured_image,
                        'date' => $blog_date,
                        'place' => $blog_place,
                        'description' => $blog_desc,
                        'category' => $blogs_category,
                        'seo_title' => $seotitle,
                        'status' => '1'
                    );
                    if ($this->db->insert('blogs', $data)) {
                        $insert_id = $this->db->insert_id();
                        if (!empty($_FILES['blogs_images']['name']) && count(array_filter($_FILES['blogs_images']['name'])) > 0) {
                            $filesCount = count($_FILES['blogs_images']['name']);
                            for ($i = 0; $i < $filesCount; $i++) {
                                // unset($filename);
                                $_FILES['blogs_images_1']['name']     = $_FILES['blogs_images']['name'][$i];
                                $_FILES['blogs_images_1']['type']     = $_FILES['blogs_images']['type'][$i];
                                $_FILES['blogs_images_1']['tmp_name'] = $_FILES['blogs_images']['tmp_name'][$i];
                                $_FILES['blogs_images_1']['error']     = $_FILES['blogs_images']['error'][$i];
                                $_FILES['blogs_images_1']['size']     = $_FILES['blogs_images']['size'][$i];

                                $path = $_FILES['blogs_images_1']['name'];
                                $ext = pathinfo($path, PATHINFO_EXTENSION);
                                $filename = uniqid() . time() . date("Ymd") . "." . $ext;

                                $config['upload_path'] = './uploads/blogs_images';
                                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                                $config['file_name'] = $filename;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $img = "blogs_images_1";
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
                                        $complete_path = "uploads/blogs_images/" . $filename;
                                        $image = $complete_path;
                                        $data1 = array(
                                            'blog_id' => $insert_id,
                                            'image' => $image
                                        );
                                        if ($this->db->insert('blogs_image', $data1)) {
                                            $this->session->set_flashdata('message', 'Congratualtion!! Blogs Details Added Successfully');
                                        } else {
                                            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                                        }
                                    }
                                } else {
                                    $errors = $this->upload->display_errors();
                                    $this->session->set_flashdata('failed', '' . $errors . '');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    public function blogs_update()
    {
        if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
            $path = $_FILES['featured_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "featured_image";
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
                    $complete_path = "uploads/images/" . $filename;
                    $featured_image = $complete_path;
                    $blog_id = $this->input->post('id');
                    $blog_title = $this->input->post('blog_title');
                    $blog_date = $this->input->post('blog_date');
                    $blog_place = $this->input->post('blog_place');
                    $blog_desc = $this->input->post('blog_desc');
                    $blogs_category = $this->input->post('blogs_category');
                    $title = $this->input->post('blog_title');
                    //seo title
                    $seotitle = trim($title);
                    $seotitle = preg_replace("/\s+/", " ", $seotitle);
                    $seotitle = str_replace(" ", "-", $seotitle);
                    $seotitle = strtolower($seotitle);
                    $update_at = date("Y/m/d H:i:s");
                    $data = array(
                        'title' => $blog_title,
                        'featured_image' => $featured_image,
                        'date' => $blog_date,
                        'place' => $blog_place,
                        'description' => $blog_desc,
                        'category' => $blogs_category,
                        'seo_title' => $seotitle,
                        'updated_at' => $update_at
                    );
                    $this->db->where('id', $blog_id);
                    if ($this->db->update('blogs', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Blogs Details Updated Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $blog_id = $this->input->post('id');
            $blog_title = $this->input->post('blog_title');
            $blog_date = $this->input->post('blog_date');
            $blog_place = $this->input->post('blog_place');
            $blog_desc = $this->input->post('blog_desc');
            $blogs_category = $this->input->post('blogs_category');
            $title = $this->input->post('blog_title');
            //seo title
            $seotitle = trim($title);
            $seotitle = preg_replace("/\s+/", " ", $seotitle);
            $seotitle = str_replace(" ", "-", $seotitle);
            $seotitle = strtolower($seotitle);
            $update_at = date("Y/m/d H:i:s");
            $data = array(
                'title' => $blog_title,
                'date' => $blog_date,
                'place' => $blog_place,
                'description' => $blog_desc,
                'category' => $blogs_category,
                'seo_title' => $seotitle,
                'updated_at' => $update_at
            );
            $this->db->where('id', $blog_id);
            if ($this->db->update('blogs', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Blogs Updated Added Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
    public function blogs_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('blogs', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Blog Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function blogs_delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        if ($this->db->delete('blogs')) {
            $this->db->where('blog_id', $id);
            $this->db->delete('blogs_image');
            $this->session->set_flashdata('message', 'Congratualtion!! Blog Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    // deletes images
    public function delete_images()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        if ($this->db->delete('blogs_image')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Blog Image Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function images_insert()
    {
        $insert_id = $this->input->post('b_id');
        if (!empty($_FILES['blogs_images']['name']) && count(array_filter($_FILES['blogs_images']['name'])) > 0) {
            $filesCount = count($_FILES['blogs_images']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                // unset($filename);
                $_FILES['blogs_images_1']['name']     = $_FILES['blogs_images']['name'][$i];
                $_FILES['blogs_images_1']['type']     = $_FILES['blogs_images']['type'][$i];
                $_FILES['blogs_images_1']['tmp_name'] = $_FILES['blogs_images']['tmp_name'][$i];
                $_FILES['blogs_images_1']['error']     = $_FILES['blogs_images']['error'][$i];
                $_FILES['blogs_images_1']['size']     = $_FILES['blogs_images']['size'][$i];

                $path = $_FILES['blogs_images_1']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $filename = uniqid() . time() . date("Ymd") . "." . $ext;

                $config['upload_path'] = './uploads/blogs_images';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['file_name'] = $filename;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $img = "blogs_images_1";
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
                        $complete_path = "uploads/blogs_images/" . $filename;
                        $image = $complete_path;
                        $data1 = array(
                            'blog_id' => $insert_id,
                            'image' => $image
                        );
                        if ($this->db->insert('blogs_image', $data1)) {
                            $this->session->set_flashdata('message', 'Congratualtion!! Blog Images Added Successfully');
                        } else {
                            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                        }
                    }
                } else {
                    $errors = $this->upload->display_errors();
                    $this->session->set_flashdata('failed', '' . $errors . '');
                }
            }
        }
    }

    public function get_all_events()
    {
        $this->db->where("status", "1");
        $this->db->order_by("date", 'desc');
        $res = $this->db->get("blogs");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_event($id)
    {
        $this->db->where("id", $id);
        $res = $this->db->get("blogs");
        if ($res->num_rows() > 0) {
            return $res->row_array();
        } else {
            return [];
        }
    }

    public function get_event_byCategory($category)
    {
        $this->db->where("category", $category);
        $this->db->where("status", "1");
        $res = $this->db->get("blogs");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    public function get_event_byarchive($month, $year)
    {
        $this->db->where("MONTH(date)", $month);
        $this->db->where("YEAR(date)", $year);
        $this->db->where("status", 1);
        $res = $this->db->get("blogs");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return [];
        }
    }

    //onscroll load data fetching of events
    public function event_onscroll_load()
    {
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');
        $this->db->where("status", "1");
        $this->db->order_by("date", 'desc');
        $this->db->limit($limit, $start);
        $res = $this->db->get("blogs");
        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return "empty";
        }
    }
}
