<?php

use phpDocumentor\Reflection\DocBlock\Description;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function razorpay_insert()
    {
        $razorpay_value = array();

        $razorpay['testmode'] = $this->input->post('test_mode');
        $razorpay['test_key_id'] = $this->input->post('test_key_id');
        $razorpay['test_key_secret'] = $this->input->post('test_key_secret');
        $razorpay['live_key_id'] = $this->input->post('live_key_id');
        $razorpay['live_key_secret'] = $this->input->post('live_key_secret');
        $razorpay['theme_color'] = $this->input->post('theme_color');

        array_push($razorpay_value, $razorpay);

        $data['value']    =   json_encode($razorpay_value);
        $this->db->where('key', 'razorpay');
        $this->db->update('settings', $data);
    }
    //logo insert
    public function logo_insert()
    {
        if (isset($_FILES['logo']) && $_FILES['logo']['name'] != "") {
            $path = $_FILES['logo']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'png|svg|jpg';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "logo";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = true;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $logo = $complete_path;
                    $data['value']    =   $logo;
                    $this->db->where('key', 'logo');
                    $this->db->update('settings', $data);
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'No Logo Present');
        }
    }

    // favicon Insert
    public function favicon_insert()
    {
        if (isset($_FILES['favicon']) && $_FILES['favicon']['name'] != "") {
            $path = $_FILES['favicon']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'png|svg|jpg';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "favicon";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = true;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $favicon = $complete_path;
                    $data['value']    =   $favicon;
                    $this->db->where('key', 'favicon');
                    $this->db->update('settings', $data);
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'No favicon Present');
        }
    }
    public function mail_settings_insert()
    {
        $data['value']    =  $this->input->post('protocol');
        $this->db->where('key', 'protocol');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('smtp_host');
        $this->db->where('key', 'smtp_host');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('smtp_port');
        $this->db->where('key', 'smtp_port');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('smtp_user');
        $this->db->where('key', 'smtp_user');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('smtp_pass');
        $this->db->where('key', 'smtp_pass');
        $this->db->update('settings', $data);
    }

    public function system_settings_insert()
    {
        $data['value']    =  $this->input->post('system_name');
        $this->db->where('key', 'system_name');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('system_title');
        $this->db->where('key', 'system_title');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('system_email');
        $this->db->where('key', 'system_email');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('address');
        $this->db->where('key', 'address');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('phone');
        $this->db->where('key', 'phone');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('slogan');
        $this->db->where('key', 'slogan');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('author');
        $this->db->where('key', 'author');
        $this->db->update('settings', $data);
    }

    public function website_settings_insert()
    {
        $data['value']    =  $this->input->post('website_description');
        $this->db->where('key', 'website_description');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('website_keywords');
        $this->db->where('key', 'website_keywords');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('terms_and_condition');
        $this->db->where('key', 'terms_and_condition');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('privacy_policy');
        $this->db->where('key', 'privacy_policy');
        $this->db->update('settings', $data);
    }

    public function social_media_settings_insert()
    {
        $data['value']    =  $this->input->post('facebook');
        $this->db->where('key', 'facebook');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('twitter');
        $this->db->where('key', 'twitter');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('instagram');
        $this->db->where('key', 'instagram');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('linkdin');
        $this->db->where('key', 'linkdin');
        $this->db->update('settings', $data);

        $data['value']    =  $this->input->post('youtube');
        $this->db->where('key', 'youtube');
        $this->db->update('settings', $data);
    }

    //banner managment
    public function get_banner()
    {
        return $this->db->get('banner_management');
    }
    public function banner_c()
    {
        if (isset($_FILES['banner_image']) && $_FILES['banner_image']['name'] != "") {
            $path = $_FILES['banner_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "banner_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1280;
                $config2['height']       = 720;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $banner_image = $complete_path;
                    $title = $this->input->post('title');
                    $link = $this->input->post('link');
                    $description = $this->input->post('desc');
                    $data    = array(
                        'title' => $title,
                        'image' => $banner_image,
                        'link' => $link,
                        'description' => $description,
                        'status' => '1'
                    );
                    if ($this->db->insert('banner_management', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Banner Image Details has been Inserted Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'No Banner Image is Present');
        }
    }
    public function  banner_u()
    {
        if (isset($_FILES['banner_image']) && $_FILES['banner_image']['name'] != "") {
            $path = $_FILES['banner_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "banner_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1280;
                $config2['height']       = 720;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $banner_image = $complete_path;
                    $update_at = date("Y/m/d H:i:s");
                    $id = $this->input->post('id');
                    $title = $this->input->post('title');
                    $link = $this->input->post('link');
                    $description = $this->input->post('desc');
                    $data    = array(
                        'title' => $title,
                        'image' => $banner_image,
                        'link' => $link,
                        'description' => $description,
                        'updated_at' => $update_at,
                    );
                    $this->db->where('id', $id);
                    if ($this->db->update('banner_management', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Banner Image Details has been Updated Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $update_at = date("Y/m/d H:i:s");
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $description = $this->input->post('desc');
            $data    = array(
                'title' => $title,
                'link' => $link,
                'description' => $description,
                'updated_at' => $update_at,
            );
            $this->db->where('id', $id);
            if ($this->db->update('banner_management', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Banner Image Details has been Updated Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
    public function banner_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('banner_management', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Banner Image Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function banner_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('banner_management')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Banner Image Details have been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    //end of banner managment


    //Popup managment
    public function get_popup()
    {
        return $this->db->get('popup_management');
    }
    public function popup_c()
    {
        if (isset($_FILES['popup_image']) && $_FILES['popup_image']['name'] != "") {
            $path = $_FILES['popup_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "popup_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1280;
                $config2['height']       = 720;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $popup_image = $complete_path;
                    $title = $this->input->post('title');
                    $link = $this->input->post('link');
                    $description = $this->input->post('desc');
                    $data    = array(
                        'title' => $title,
                        'image' => $popup_image,
                        'link' => $link,
                        'description' => $description,
                        'status' => '1'
                    );
                    if ($this->db->insert('popup_management', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Popup Image Details has been Inserted Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('failed', 'No popup Image is Present');
        }
    }
    public function  popup_u()
    {
        if (isset($_FILES['popup_image']) && $_FILES['popup_image']['name'] != "") {
            $path = $_FILES['popup_image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $filename = time() . date("Ymd") . "." . $ext;
            $config['upload_path'] = './uploads/front_end_images';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);
            $img = "popup_image";
            if (!$this->upload->do_upload($img)) {
                $this->session->set_flashdata('failed', 'Uploaded File Format Not Supported');
            } else {
                $image_data = $this->upload->data();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] =  $image_data['full_path'];
                $config2['maintain_ratio'] = true;
                $config2['create_thumb'] = false;
                $config2['width']         = 1280;
                $config2['height']       = 720;
                $this->load->library('image_lib', $config2);
                $this->image_lib->initialize($config2);
                if ($this->image_lib->resize()) {
                    $complete_path = "uploads/front_end_images/" . $filename;
                    $popup_image = $complete_path;
                    $update_at = date("Y/m/d H:i:s");
                    $title = $this->input->post('title');
                    $link = $this->input->post('link');
                    $description = $this->input->post('desc');
                    $data    = array(
                        'title' => $title,
                        'image' => $popup_image,
                        'link' => $link,
                        'description' => $description,
                        'updated_at' => $update_at,
                    );

                    if ($this->db->update('popup_management', $data)) {
                        $this->session->set_flashdata('message', 'Congratualtion!! Popup Image Details has been Updated Successfully');
                    } else {
                        $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                    }
                }
            }
        } else {
            $update_at = date("Y/m/d H:i:s");
            $title = $this->input->post('title');
            $link = $this->input->post('link');
            $description = $this->input->post('desc');
            $data    = array(
                'title' => $title,
                'link' => $link,
                'description' => $description,
                'updated_at' => $update_at,
            );
            if ($this->db->update('popup_management', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Popup Image Details has been Updated Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
    public function popup_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('popup_management', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Popup Image Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function popup_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('popup_management')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Popup Image Details have been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    //end of Popup managment
}
