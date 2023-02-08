<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class branches_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_branches()
    {
        return $this->db->get('branches');
    }
    public function branch_c($branch_image, $branch_name, $branch_desc, $branch_url)
    {
        $data = array(
            'name' => $branch_name,
            'description' => $branch_desc,
            'image' => $branch_image,
            'link' => $branch_url,
            'status' => "1"
        );
        if ($this->db->insert('branches', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Branch Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function branches_update($branch_image, $branch_id, $branch_name, $branch_desc, $branch_link)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($branch_image == "1") {
            $data = array(
                'name' => $branch_name,
                'description' => $branch_desc,
                'link' => $branch_link,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'name' => $branch_name,
                'description' => $branch_desc,
                'image' => $branch_image,
                'link' => $branch_link,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $branch_id);
        if ($this->db->update('branches', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Branch Details has been Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function branches_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('branches', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Branch Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function branches_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('branches')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Branch Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
