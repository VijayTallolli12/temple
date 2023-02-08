<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class history_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_history()
    {
        return $this->db->get('history');
    }
    public function history_c($history_image, $history_name, $history_desc)
    {
        $data = array(
            'title' => $history_name,
            'description' => $history_desc,
            'image' => $history_image,
            'status' => "1"
        );
        if ($this->db->insert('history', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! History Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function history_update($history_image, $history_id, $history_name, $history_desc)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($history_image == "1") {
            $data = array(
                'title' => $history_name,
                'description' => $history_desc,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'title' => $history_name,
                'description' => $history_desc,
                'image' => $history_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $history_id);
        if ($this->db->update('history', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! History Details has been updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function history_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('history', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! History Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function history_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('history')) {
            $this->session->set_flashdata('message', 'Congratualtion!! History Details has been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
