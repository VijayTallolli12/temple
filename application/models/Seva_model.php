<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class seva_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_e_seva()
    {
        return $this->db->get('seva_list');
    }
    public function e_seva_c()
    {
        $data['name'] = $this->input->post('e_seva');
        $data['price'] = $this->input->post('price');
        $data['status'] = '1';
        if ($this->db->insert('seva_list', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! E-Seva Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function e_seva_update()
    {

        $data['name'] = $this->input->post('e_seva');
        $data['price'] = $this->input->post('price');
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('seva_list', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! E-Seva Details Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function e_seva_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('seva_list', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! E-Seva Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function e_seva_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('seva_list')) {
            $this->session->set_flashdata('message', 'Congratualtion!! E-Seva Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
}
