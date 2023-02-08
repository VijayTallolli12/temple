<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'views/razorpay/Razorpay.php';

use Razorpay\Api\Api;

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //$this->load->model("order_model");
    }
    public function kanike_payment($param)
    {
        $page_data['base'] = site_url();
        $page_data['featuredImage'] = get_settings("logo");
        $page_data['styles_to_load'] = array("custom1.css");
        $page_data['kanike_id'] = $param;
        $page_data['page_name'] = "kanike_payment";
        $page_data['page_title'] = "Kanike Payment";
        $this->load->view("frontend/index", $page_data);
    }

    public function razorpay_checkout()
    {

        $razorpay_settings = $this->db->get_where('settings', array('key' => 'razorpay'))->row()->value;
        $razorpay = json_decode($razorpay_settings);
        if ($razorpay[0]->testmode == 'on') {
            $api_key = $razorpay[0]->test_key_id;
            $api_secret = $razorpay[0]->test_key_secret;
        } else {
            $api_key = $razorpay[0]->live_key_id;
            $api_secret = $razorpay[0]->live_key_secret;
        }
        $api = new Api($api_key, $api_secret);

        if ($this->input->post('payment_name') == "kanike") {
            $amount = $this->input->post('amount');
            $orderData = [
                'receipt' => 'rcptid_11',
                'amount' => $amount * 100,
                // 39900 rupees in paise
                'currency' => 'INR'
            ];
            // $customer_data = [
            //     'name' => $this->input->post('name'),
            //     'email' => $this->input->post('email'),
            //     'phone_no' => $this->input->post('phone_no'),
            //     'address' => $this->input->post('address'),
            //     'kanike_id' => $this->input->post('kanike'),
            //     'message' => $this->input->post('message'),
            //     'amount' => $amount
            // ];          
            $seva_name[] = ["seva_name" => $this->input->post('kanike'), "amount" => $amount];
            $customer_data = [
                'seva_date' => $this->input->post('seva_date'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'rashi' => "",
                'nakashatra' => "",
                'gothra' => "",
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'pin_code' => $this->input->post('pincode'),
                'seva_name' => $seva_name,
                'amount' => $amount,
                'trans_id' => '',
                'payment_status' => "Pending"
            ];
            $razorpayOrder = $api->order->create($orderData);
            //$result = $this->payment_model->kanike_payment_insert($customer_data, $razorpayOrder);
            $customer_data['seva_type'] = $this->input->post("seva_type");
            $result = $this->order_model->order_insert($customer_data, $razorpayOrder);
            $title = "Kanike Payment";
        }

        if ($this->input->post('payment_name') == "e_seva") {
            $amount = $this->cart->total();
            foreach ($this->cart->contents() as $items) {
                $name1 = str_replace('-', '(', $items['name']);
                $final_name = str_replace('_', ')', $name1);
                $seva_name[] = ["seva_name" => $final_name, "amount" => $items['price']];
            }
            $orderData = [
                'receipt' => 'rcptid_11',
                'amount' => $amount * 100,
                // 39900 rupees in paise
                'currency' => 'INR'
            ];
            $customer_data = [
                'seva_date' => $this->input->post('seva_date'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone_no' => $this->input->post('phone_no'),
                'rashi' => $this->input->post('rashi'),
                'nakashatra' => $this->input->post('nakashatra'),
                'gothra' => $this->input->post('gothra'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'pin_code' => $this->input->post('pincode'),
                'seva_name' => $seva_name,
                'amount' => $amount,
                'trans_id' => '',
                'payment_status' => "Pending"
            ];
            $razorpayOrder = $api->order->create($orderData);
            //$result = $this->payment_model->seva_payment_insert($customer_data, $razorpayOrder);
            $customer_data['seva_type'] = $this->input->post("seva_type");
            $result = $this->order_model->order_insert($customer_data, $razorpayOrder);
            $title = "E-Seva Payment";
        }
        if ($result == 0) {
            $page_data['base'] = site_url();
            $page_data['featuredImage'] = get_settings("logo");
            $page_data['page_name'] = "razorpay_checkout";
            $page_data['page_title'] = $title;
            $page_data['razorpayOrder'] = $razorpayOrder;
            $page_data['customer_data'] = $customer_data;
            $this->load->view("frontend/index", $page_data);
        } else {
            $page_data['base'] = site_url();
            $page_data['featuredImage'] = get_settings("logo");
            $page_data['page_name'] = "payment_failed";
            $page_data['page_title'] = "Payment Failed";
            $this->load->view("frontend/index", $page_data);
        }
    }

    public function razorpay_payment_status()
    {
        $razorpay_payment_id = $this->input->post('razorpay_payment_id');
        $razorpay_order_id = $this->input->post('razorpay_order_id');
        $razorpay_signature = $this->input->post('razorpay_signature');

        $razorpay_settings = $this->db->get_where('settings', array('key' => 'razorpay'))->row()->value;
        $razorpay = json_decode($razorpay_settings);

        $secret = $razorpay[0]->test_key_secret;

        // Order Table
        $this->db->where('order_id', $razorpay_order_id);
        $query = $this->db->get('orders');

        //kanike Payment Details
        // $this->db->where('order_id', $razorpay_order_id);
        // $query = $this->db->get('kanike_payment');

        //Seva Payment Details
        // $this->db->where('order_id', $razorpay_order_id);
        // $query2 = $this->db->get('seva_list_payment');

        // $num = $query->num_rows();
        // $num2 = $query2->num_rows();
        $res = $query->num_rows();
        if ($res > 0) {
            $data = $razorpay_order_id . "|" . $razorpay_payment_id;
            $generated_signature = hash_hmac("sha256", $data, $secret);
            if ($generated_signature == $razorpay_signature) {
                $data = array('trans_id' => $razorpay_payment_id, "payment_status" => "Paid");
                $this->db->where('order_id', $razorpay_order_id);
                $this->db->update('orders', $data);
                $this->email_model->send_kanike_payment_verification_email($razorpay_order_id);
                $page_data['base'] = site_url();
                $page_data['featuredImage'] = get_settings("logo");
                $page_data['page_name'] = "payment_success";
                $page_data['page_title'] = "Payment Success";
                $page_data['transaction_id'] = $razorpay_payment_id;
                $this->load->view("frontend/index", $page_data);
            } else {
                $page_data['base'] = site_url();
                $page_data['featuredImage'] = get_settings("logo");
                $page_data['page_name'] = "payment_failed";
                $page_data['page_title'] = "Payment Failed";
                $this->load->view("frontend/index", $page_data);
            }
        } else {
            $page_data['base'] = site_url();
            $page_data['featuredImage'] = get_settings("logo");
            $page_data['page_name'] = "payment_failed";
            $page_data['page_title'] = "Payment Failed";
            $this->load->view("frontend/index", $page_data);
        }

        // if ($num > 0) {
        //     $data = $razorpay_order_id . "|" . $razorpay_payment_id;
        //     $generated_signature = hash_hmac("sha256", $data, $secret);
        //     if ($generated_signature == $razorpay_signature) {
        //         $this->db->where('order_id', $razorpay_order_id);
        //         $this->db->update('kanike_payment', array('transaction_id' => $razorpay_payment_id));
        //         $this->email_model->send_kanike_payment_verification_email($razorpay_order_id);
        //         $page_data['base'] = site_url();
        //         $page_data['featuredImage'] = get_settings("logo");
        //         $page_data['page_name'] = "payment_success";
        //         $page_data['page_title'] = "Payment Success";
        //         $page_data['transaction_id'] = $razorpay_payment_id;
        //         $this->load->view("frontend/index", $page_data);
        //     } else {
        //         $page_data['base'] = site_url();
        //         $page_data['featuredImage'] = get_settings("logo");
        //         $page_data['page_name'] = "payment_failed";
        //         $page_data['page_title'] = "Payment Failed";
        //         $this->load->view("frontend/index", $page_data);
        //     }
        // } elseif ($num2 > 0) {
        //     $data = $razorpay_order_id . "|" . $razorpay_payment_id;
        //     $generated_signature = hash_hmac("sha256", $data, $secret);
        //     if ($generated_signature == $razorpay_signature) {
        //         $this->db->where('order_id', $razorpay_order_id);
        //         $this->db->update('seva_list_payment', array('transaction_id' => $razorpay_payment_id));
        //         $this->email_model->send_e_seva_payment_verification_email($razorpay_order_id);
        //         $page_data['base'] = site_url();
        //         $page_data['featuredImage'] = get_settings("logo");
        //         $page_data['page_name'] = "payment_success";
        //         $page_data['page_title'] = "Payment Success";
        //         $page_data['transaction_id'] = $razorpay_payment_id;
        //         $this->load->view("frontend/index", $page_data);
        //     } else {
        //         $page_data['base'] = site_url();
        //         $page_data['featuredImage'] = get_settings("logo");
        //         $page_data['page_name'] = "payment_failed";
        //         $page_data['page_title'] = "Payment Failed";
        //         $this->load->view("frontend/index", $page_data);
        //     }
        // } else {
        //     $page_data['base'] = site_url();
        //     $page_data['featuredImage'] = get_settings("logo");
        //     $page_data['page_name'] = "payment_failed";
        //     $page_data['page_title'] = "Payment Failed";
        //     $this->load->view("frontend/index", $page_data);
        // }
    }

    public function insert_into_cart()
    {
        // $list[] = "";
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $name1 = str_replace('(', '-', $name);
        $final_name = str_replace(')', '_', $name1);
        $data = array(
            'id' => $id,
            'qty' => 1,
            'price' => $price,
            'name' => $final_name,
        );
        if ($this->cart->insert($data)) {

            foreach ($this->cart->contents() as $items) {

                $name1 = str_replace('-', '(', $items['name']);
                $final_name = str_replace('_', ')', $name1);

                $list[] = '<li><a href="#" class="sigma_cart-product-wrapper"><div class="sigma_cart-product-body"><h6>' . $final_name . '</h6><div class="sigma_product-price justify-content-start"><span>Amount: <i class="far fa-rupee-sign" style="font-size: 13px;"></i>' . (int) $items['price'] . '</span></div></div></a></li>';
            }
            $total = $this->cart->total_items();
            $total_amount = $this->cart->total();

            $c = $this->cart->contents();
            $last = end($c);
            $rowid = $last["rowid"];

            $op = array("status" => true, "data" => $list, "total" => $total, "amount" => $total_amount, "rowid" => $rowid);
        } else {
            $op = array("status" => false, "data" => "", "message" => "Sorry Couldnt Add Seva Try Again Later");
        }
        echo json_encode($op);
    }

    public function remove_cart($param)
    {
        if ($this->cart->remove($param)) {
            redirect(site_url('seva/e_seva'), 'refresh');
        }
    }

    public function remove_cart_seva($param)
    {
        if ($this->cart->remove($param)) {
            redirect(site_url('seva/e_seva'), 'refresh');
        }
    }
}