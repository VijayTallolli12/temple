<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dw_deities_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_dw_deities()
    {
        return $this->db->get('dw_deities');
    }
    public function dw_deities_c($deitie_image, $deitie_name, $deitie_desc)
    {
        $data = array(
            'name' => $deitie_name,
            'description' => $deitie_desc,
            'image' => $deitie_image,
            'status' => "1"
        );
        if ($this->db->insert('dw_deities', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Deitie Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function dw_deitie_update($dw_deitie_image, $dw_deitie_id, $dw_deitie_name, $dw_deitie_desc)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($dw_deitie_image == "1") {
            $data = array(
                'name' => $dw_deitie_name,
                'description' => $dw_deitie_desc,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'name' => $dw_deitie_name,
                'description' => $dw_deitie_desc,
                'image' => $dw_deitie_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $dw_deitie_id);
        if ($this->db->update('dw_deities', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Deities Details has been updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function dw_deities_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('dw_deities', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Deitie Details Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function dw_deities_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('dw_deities')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Deitie Details has been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
