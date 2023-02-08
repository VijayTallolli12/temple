<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class daily_seva_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_daily_seva()
    {
        return $this->db->get('daily_seva');
    }
    public function daily_seva_c($temple_image, $temple_name, $seva_timings)
    {
        $data = array(
            'title' => $temple_name,
            'image' => $temple_image,
            'timings' => $seva_timings,
            'status' => '1'
        );
        if ($this->db->insert('daily_seva', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Daily Seva Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function daily_seva_update($daily_seva_image, $daily_seva_id, $temple_name, $daily_seva_timing)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($daily_seva_image == "1") {
            $data = array(
                'title' => $temple_name,
                'timings' => $daily_seva_timing,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'title' => $temple_name,
                'timings' => $daily_seva_timing,
                'image' => $daily_seva_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $daily_seva_id);
        if ($this->db->update('daily_seva', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Daily Seva Details has been Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function daily_seva_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('daily_seva', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Daily Seva Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function daily_seva_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('daily_seva')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Daily Seva Details Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
