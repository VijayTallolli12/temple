<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class institutes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_institutes()
    {
        return $this->db->get('educational_institutes');
    }
    public function institutes_c($institutes_image, $institutes_name, $institutes_desc, $institutes_url)
    {
        $data = array(
            'name' => $institutes_name,
            'description' => $institutes_desc,
            'image' => $institutes_image,
            'link' => $institutes_url,
            'status' => "1"
        );
        if ($this->db->insert('educational_institutes', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Institutes Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function institutes_update($institutes_image, $institutes_id, $institutes_name, $institutes_desc, $institutes_link)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($institutes_image == "1") {
            $data = array(
                'name' => $institutes_name,
                'description' => $institutes_desc,
                'link' => $institutes_link,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'name' => $institutes_name,
                'description' => $institutes_desc,
                'image' => $institutes_image,
                'link' => $institutes_link,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $institutes_id);
        if ($this->db->update('educational_institutes', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Institutes Details has been Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function institutes_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('educational_institutes', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Institutes Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function institutes_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('educational_institutes')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Institutes Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
