<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class activities_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_activities()
    {
        return $this->db->get('activity');
    }
    public function activities_c($activities_image, $activities_name, $activities_desc)
    {
        $data = array(
            'title' => $activities_name,
            'description' => $activities_desc,
            'image' => $activities_image,
            'status' => "1"
        );
        if ($this->db->insert('activity', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Activities Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function activities_update($activities_image, $activities_id, $activities_name, $activities_desc)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($activities_image == "1") {
            $data = array(
                'title' => $activities_name,
                'description' => $activities_desc,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'title' => $activities_name,
                'description' => $activities_desc,
                'image' => $activities_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $activities_id);
        if ($this->db->update('activity', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Activities Details has been updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function activities_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('activity', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Activities Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function activities_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('activity')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Activities Details has been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
