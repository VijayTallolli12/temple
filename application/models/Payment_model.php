<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class payment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function kanike_payment_insert($customer_data, $razorpayOrder)
    {
        $data = array(
            'kanike_id' => $customer_data['kanike_id'],
            'name' => $customer_data['name'],
            'email' => $customer_data['email'],
            'phone_no' => $customer_data['phone_no'],
            'address' => $customer_data['address'],
            'message' => $customer_data['message'],
            'transaction_id' => '',
            'order_id' => $razorpayOrder['id'],
            'amount' => $customer_data['amount']
        );
        if ($this->db->insert('kanike_payment', $data)) {
            return 0;
        } else {
            return 1;
        }
    }

    public function seva_payment_insert($customer_data, $razorpayOrder)
    {
        $data = array(
            'seva_date' => $customer_data['seva_date'],
            'name' => $customer_data['name'],
            'email' => $customer_data['email'],
            'phone_no' => $customer_data['phone_no'],
            'rashi' => $customer_data['rashi'],
            'nakashatra' => $customer_data['nakashatra'],
            'gothra' => $customer_data['gothra'],
            'address' => $customer_data['address'],
            'city' => $customer_data['city'],
            'state' => $customer_data['state'],
            'country' => $customer_data['country'],
            'pin_code' => $customer_data['pin_code'],
            'amount' => $customer_data['amount'],
            'order_id' => $razorpayOrder['id'],
            'transaction_id' => '',
        );
        $data['seva_name'] = json_encode($customer_data['seva_name']);
        if ($this->db->insert('seva_list_payment', $data)) {
            return 0;
        } else {
            return 1;
        }
    }

    public function get_seva_payment()
    {
        $this->db->order_by("id", 'desc');
        return $this->db->get('seva_list_payment');
    }

    public function get_kanike_payment()
    {
        $this->db->order_by("id", 'desc');
        return $this->db->get('kanike_payment');
    }
}
