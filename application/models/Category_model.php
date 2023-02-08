<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class category_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    public function get_category()
    {
        return $this->db->get('category');
    }

    public function category_c()
    {
        $category_name = $this->input->post('category');
        $this->db->where('category', $category_name);
        $query = $this->db->get('category');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Category already Present');
        } else {
            $data = array(
                'category' => $this->input->post('category'),
                'parent' => $this->input->post('parent_category')
            );
            if ($this->db->insert('category', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Category Added Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }


    public function category_u()
    {
        $category_name = $this->input->post('category');
        $id = $this->input->post('id');
        $this->db->where('category', $category_name);
        $query = $this->db->get('category');
        $query2 = $query->row_array();
        $num = $query->num_rows();
        if ($num > 0 && $id != $query2['id']) {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Category already Present');
        } else {

            $data = array(
                'category' => $this->input->post('category'),
                'parent' => $this->input->post('parent_category')
            );
            $this->db->where('id', $id);
            if ($this->db->update('category', $data)) {
                $this->session->set_flashdata('message', 'Congratualtion!! Category Updated Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }

    public function category_delete()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $parent = $this->db->get('category')->row_array();
        if ($parent['parent'] == "") {
            $this->db->where('parent', $id);
            if ($this->db->delete('category')) {
                $this->db->where('id', $id);
                if ($this->db->delete('category')) {
                    $this->session->set_flashdata('message', 'Congratualtion!! Parent And Category Deleted Successfully');
                } else {
                    $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
                }
            }
        } else {
            $this->db->where('id', $id);
            if ($this->db->delete('category')) {
                $this->session->set_flashdata('message', 'Congratualtion!! Category Deleted Successfully');
            } else {
                $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
            }
        }
    }
}
