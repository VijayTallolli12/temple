<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class order_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function order_insert($customer_data, $razorpayOrder)
    {
        $data = array(
            'order_type'=>$customer_data['seva_type'],
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
            'trans_id' => '',
            'payment_status'=>"Pending"
        );        
        if ($this->db->insert('orders', $data)) {
            $seva_list = $customer_data['seva_name'];
            
            foreach ($seva_list as $key => $value) {
                $data = array(
                    "order_id"=>$razorpayOrder['id'],
                    "seva_name"=>$value['seva_name'],
                    "amount"=>$value['amount']
                );                
                $this->db->insert("order_detail", $data);
            }
            return 0;
        } else {
            return 1;
        }
    }
}