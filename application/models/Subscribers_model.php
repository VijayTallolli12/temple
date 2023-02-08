<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class subscribers_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_subscribers()
    {
        return $this->db->get('subscribers');
    }
    public function subscriber_insert()
    {
        $email = $this->input->post('email');
        $this->db->where('email', $email);
        $query = $this->db->get('subscribers');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_flashdata('failed', 'Yor Are Already Subscribed To us');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'active' => '1'
            );
            if ($this->db->insert('subscribers', $data)) {
                $this->session->set_flashdata('message', 'Thank You!! You Are Subscribed Succsefully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
}
