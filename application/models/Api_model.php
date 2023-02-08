<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_banners()
    {
        $this->db->where("status", "1");
        $res = $this->db->get("banner_management");
        if ($res->num_rows() > 0) {
            return json_encode($res->result_array());
        } else {
            return json_encode([]);
        }
    }
}