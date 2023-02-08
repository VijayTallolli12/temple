<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class rooms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_rooms()
    {
        return $this->db->get('rooms');
    }
    public function rooms_c($room_image, $room_type, $room_name, $room_desc, $room_price)
    {
        $data = array(
            'type_of_room' => $room_type,
            'room_name' => $room_name,
            'description' => $room_desc,
            'price' => $room_price,
            'image' => $room_image,
            'status' => '1'
        );
        if ($this->db->insert('rooms', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Room Details Added Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function rooms_update($room_image, $room_id, $room_type, $room_name, $room_desc, $room_price)
    {
        $update_at = date("Y/m/d H:i:s");
        if ($room_image == "1") {
            $data = array(
                'type_of_room' => $room_type,
                'room_name' => $room_name,
                'description' => $room_desc,
                'price' => $room_price,
                'updated_at' => $update_at
            );
        } else {
            $data = array(
                'type_of_room' => $room_type,
                'room_name' => $room_name,
                'description' => $room_desc,
                'price' => $room_price,
                'image' => $room_image,
                'updated_at' => $update_at
            );
        }
        $this->db->where('id', $room_id);
        if ($this->db->update('rooms', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Room Details has been Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function rooms_status()
    {
        if ($this->input->post('status') == "1") {
            $data['status'] = "0";
        } else {
            $data['status'] = "1";
        }
        $data['updated_at'] = date("Y/m/d H:i:s");
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->update('rooms', $data)) {
            $this->session->set_flashdata('message', 'Congratualtion!! Room Status Updated Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }
    public function rooms_delete()
    {
        $this->db->where('id', $this->input->post('id'));
        if ($this->db->delete('rooms')) {
            $this->session->set_flashdata('message', 'Congratualtion!! Room Details have been Deleted Successfully');
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Please Try Again after sometime');
        }
    }

    public function rooms_enq()
    {
        return $this->db->get('contact_us');
    }
}
