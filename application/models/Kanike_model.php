<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kanike_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_kanike()
    {
        return $this->db->get('kanike');
    }
    public function kanike_c($kanike_image, $kanike, $kanike_desc)
    {
        if (empty($kanike_desc)) {
            $kanike_desc = "";
        }
        $data = array(
            'name' => $kanike,
            'description' => $kanike_desc,
            'image' => $kanike_image,
            'status' => '1'
        );
        if ($this->db->insert('kanike', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Kanike Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function kanike_update($kanike_image, $kanike_id, $kanike, $kanike_desc)
    {
        if (empty($kanike_desc)) {
            $kanike_desc = "";
        }
        $update_at = date("Y/m/d H:i:s");
        if ($kanike_image == "1") {
            $data = array(
                'name' => $kanike,
                'description' => $kanike_desc,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'name' => $kanike,
                'description' => $kanike_desc,
                'image' => $kanike_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $kanike_id);
        if ($this->db->update('kanike', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Kanike details has been Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function kanike_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('kanike', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Kanike Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function kanike_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('kanike')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Kanike Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
