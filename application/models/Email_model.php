<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class email_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function send_e_seva_payment_verification_email($razorpay_order_id)
    {
        //Seva Payment Details
        $this->db->where('order_id', $razorpay_order_id);
        $query = $this->db->get('seva_list_payment')->row_array();
        $pdf_data['data'] = $query;
        $pdf_data['seva_type'] = 'e_seva';

        $html = $this->load->view('email/pdf_generate', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $attachment = $mpdf->Output('', 'S');

        $email_template = $this->load->view('email/payment_verification', $pdf_data, TRUE);

        $filename = "E-seva Payment Details";
        $email_data['subject'] = 'Online E-Seva Payment Is Succsessfull';
        $email_data['from'] = get_settings('system_email');
        $email_data['to'] = $query['email'];
        $email_data['to_name'] = $query['name'];

        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from'], $attachment, $filename);
    }

    public function send_kanike_payment_verification_email($razorpay_order_id)
    {
        //Kanike Payment Details
        $this->db->where('order_id', $razorpay_order_id);
        $query = $this->db->get('kanike_payment')->row_array();
        $pdf_data['data'] = $query;
        $pdf_data['seva_type'] = 'kanike';

        $html = $this->load->view('email/pdf_generate', $pdf_data, TRUE);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $attachment = $mpdf->Output('', 'S');

        $email_template = $this->load->view('email/payment_verification', $pdf_data, TRUE);

        $filename = "Kanike Payment Details";
        $email_data['subject'] = 'Online Kanike Payment Is Succsessfull';
        $email_data['from'] = get_settings('system_email');
        $email_data['to'] = $query['email'];
        $email_data['to_name'] = $query['name'];

        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from'], $attachment, $filename);
    }

    public function send_reply_message()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $query = $this->db->get('contact_us')->row_array();
        $pdf_data['data'] = $query;
        $pdf_data['message'] = $this->input->post('reply_msg');

        $email_template = $this->load->view('email/replay_msg', $pdf_data, TRUE);

        $email_data['subject'] = 'Replying To Your Enqiry';
        $email_data['from'] = get_settings('system_email');
        $email_data['to'] = $query['email_id'];
        $email_data['to_name'] = $query['name'];

        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from']);
    }

    public function send_reset_password($email, $pass, $name)
    {
        $data['name'] = $name;
        $data['password'] = $pass;

        $email_template = $this->load->view('email/forgot_pass_email', $data, TRUE);

        $email_data['subject'] = 'Your Password Changed';
        $email_data['from'] = get_settings('system_email');
        $email_data['to'] = $email;
        $email_data['to_name'] = $name;

        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from']);
    }

    public function send_reset_password_admin($email, $name, $id)
    {
        $data['name'] = $name;
        $data['id'] = $id;

        $email_template = $this->load->view('email/forgot_pass_email_admin', $data, TRUE);

        $email_data['subject'] = 'Password Reset Link';
        $email_data['from'] = get_settings('system_email');
        $email_data['to'] = $email;
        $email_data['to_name'] = $name;

        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from']);
    }

    public function send_Verification_mail($email, $name)
    {
        $data['name'] = $name;
        $data['email'] = $email;

        $this->db->where('email', $email);
        $query = $this->db->get("users")->row_array();
        $data['id'] = $query['id'];

        $email_template = $this->load->view('email/verification_email', $data, TRUE);
        $email_data['subject'] = 'Please Verify Your Email';
        $email_data['from'] = get_settings('system_email');
        $email_data['to'] = $email;
        $email_data['to_name'] = $name;

        $this->send_smtp_mail($email_template, $email_data['subject'], $email_data['to'], $email_data['from']);
    }


    public function send_smtp_mail($msg = NULL, $sub = NULL, $to = NULL, $from = NULL, $attachment = NULL, $filename = NULL)
    {
        //Load email library

        try {
            $from = $this->db->get_where('settings', array('key' => 'system_email'))->row()->value;
            // SMTP & mail configuration
            $config = array(
                'protocol'  => get_settings('protocol'),
                'smtp_host' => get_settings('smtp_host'),
                'smtp_port' => get_settings('smtp_port'),
                'smtp_user' => get_settings('smtp_user'),
                'smtp_pass' => get_settings('smtp_pass'),
                // 'smtp_crypto' => 'tls',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );
            $this->email->set_header('MIME-Version', 1.0);
            $this->email->set_header('Content-type', 'text/html');
            $this->email->set_header('charset', 'UTF-8');

            $this->email->initialize($config);
            $this->email->set_mailtype("html");
            $this->email->set_newline("\r\n");

            $this->email->to($to);
            $this->email->from($from, get_settings('system_name'));
            $this->email->subject($sub);
            $this->email->message($msg);
            if (isset($attachment)) {
                $this->email->attach($attachment, 'attachment', $filename, 'application/pdf');
            }
            //Send email
            if ($this->email->send()) {
                $this->cart->destroy();
                return "Sent";
            }
            // echo $this->email->print_debugger();
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
