<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class parampara_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_parampara()
    {
        return $this->db->get('parampara');
    }
    public function parampara_c($parampara_image, $parampara_name, $parampara_desc)
    {
        $data = array(
            'name' => $parampara_name,
            'description' => $parampara_desc,
            'image' => $parampara_image,
            'status' => "1"
        );
        if ($this->db->insert('parampara', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Shri\'s Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function parampara_update($parampara_image, $parampara_id, $parampara_name, $parampara_desc)
    {
        if (empty($parampara_desc)) {
            $parampara_desc = "";
        }
        $update_at = date("Y/m/d H:i:s");
        if ($parampara_image == "1") {
            $data = array(
                'name' => $parampara_name,
                'description' => $parampara_desc,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'name' => $parampara_name,
                'description' => $parampara_desc,
                'image' => $parampara_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $parampara_id);
        if ($this->db->update('parampara', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Shri\'s Details has been Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function parampara_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('parampara', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Shir\'s Details Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function parampara_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('parampara')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Shir\'s Details has been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
