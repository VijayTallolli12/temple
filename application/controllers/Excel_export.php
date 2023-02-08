<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel_export extends CI_Controller
{


    function download_seva_details_excel()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $diff = strtotime($end_date) - strtotime($start_date);
        $difference = abs(round($diff / 86400));

        $this->db->where("transaction_id !=", "");
        $this->db->where('seva_date >=', $start_date);
        $this->db->where('seva_date <=', $end_date);
        $query = $this->db->get('seva_list_payment')->result_array();

        if ($difference <= '365') {

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Seva Payment Details.xlsx"');
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'S.No');
            $sheet->setCellValue('B1', 'Seva Name');
            $sheet->setCellValue('C1', 'Seva Date');
            $sheet->setCellValue('D1', 'Name');
            $sheet->setCellValue('E1', 'Rashi');
            $sheet->setCellValue('F1', 'Nakashatra');
            $sheet->setCellValue('G1', 'Gothra');
            $sheet->setCellValue('H1', 'Email');
            $sheet->setCellValue('I1', 'Phone Number');
            $sheet->setCellValue('J1', 'Address');
            $sheet->setCellValue('K1', 'City');
            $sheet->setCellValue('L1', 'State');
            $sheet->setCellValue('M1', 'Country');
            $sheet->setCellValue('N1', 'Pin Code');
            $sheet->setCellValue('O1', 'Amount');
            $sheet->setCellValue('P1', 'Transaction Id');
            $sheet->setCellValue('Q1', 'Order Id');
            $sheet->setCellValue('R1', 'Date');

            $sn = 2;
            $i = 1;
            foreach ($query as  $details) {
                $seva = json_decode($details['seva_name']);
                $seva_name = implode(', ', $seva);
                $sheet->setCellValue('A' . $sn, $i);
                $sheet->setCellValue('B' . $sn, $seva_name);
                $sheet->setCellValue('C' . $sn, $details['seva_date']);
                $sheet->setCellValue('D' . $sn, $details['name']);
                $sheet->setCellValue('E' . $sn, $details['rashi']);
                $sheet->setCellValue('F' . $sn, $details['nakashatra']);
                $sheet->setCellValue('G' . $sn, $details['gothra']);
                $sheet->setCellValue('H' . $sn, $details['email']);
                $sheet->setCellValue('I' . $sn, $details['phone_no']);
                $sheet->setCellValue('J' . $sn, $details['address']);
                $sheet->setCellValue('K' . $sn, $details['city']);
                $sheet->setCellValue('L' . $sn, $details['state']);
                $sheet->setCellValue('M' . $sn, $details['country']);
                $sheet->setCellValue('N' . $sn, $details['pin_code']);
                $sheet->setCellValue('O' . $sn, $details['amount']);
                $sheet->setCellValue('P' . $sn, $details['transaction_id']);
                $sheet->setCellValue('Q' . $sn, $details['order_id']);
                $sheet->setCellValue('R' . $sn, $details['created_at']);
                $sn++;
                $i++;
            }
            $writer = new Xlsx($spreadsheet);
            ob_get_clean();
            $writer->save("php://output");
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Maximum No.of Days Allowed is 365 Days & You Have Crossed It');
            redirect(site_url('admin/report_gen_excel'), 'refresh');
        }
    }

    function download_kanike_details_excel()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $this->db->where("transaction_id !=", "");
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $query = $this->db->get('kanike_payment')->result_array();

        $diff = strtotime($end_date) - strtotime($start_date);
        $difference = abs(round($diff / 86400));

        if ($difference <= '365') {

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Kanike Payment Details.xlsx"');
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'S.No');
            $sheet->setCellValue('B1', 'Kanike Name');
            $sheet->setCellValue('C1', 'Name');
            $sheet->setCellValue('D1', 'Email');
            $sheet->setCellValue('E1', 'Phone Number');
            $sheet->setCellValue('F1', 'Address');
            $sheet->setCellValue('G1', 'Message');
            $sheet->setCellValue('H1', 'Amount');
            $sheet->setCellValue('I1', 'Transaction Id');
            $sheet->setCellValue('J1', 'Order Id');
            $sheet->setCellValue('K1', 'Date');

            $sn = 2;
            $i = 1;
            foreach ($query as  $details) {
                $this->db->where('id', $details['kanike_id']);
                $kanike_details = $this->db->get("kanike")->row_array();

                $sheet->setCellValue('A' . $sn, $i);
                $sheet->setCellValue('B' . $sn, $kanike_details['name']);
                $sheet->setCellValue('C' . $sn, $details['name']);
                $sheet->setCellValue('D' . $sn, $details['email']);
                $sheet->setCellValue('E' . $sn, $details['phone_no']);
                $sheet->setCellValue('F' . $sn, $details['address']);
                $sheet->setCellValue('G' . $sn, $details['message']);
                $sheet->setCellValue('H' . $sn, $details['amount']);
                $sheet->setCellValue('I' . $sn, $details['transaction_id']);
                $sheet->setCellValue('J' . $sn, $details['order_id']);
                $sheet->setCellValue('K' . $sn, $details['created_at']);
                $sn++;
                $i++;
            }


            $writer = new Xlsx($spreadsheet);
            ob_get_clean();
            $writer->save("php://output");
        } else {
            $this->session->set_flashdata('failed', 'Oh-Snap!! Maximum No.of Days Allowed is 365 Days & You Have Crossed It');
            redirect(site_url('admin/report_gen_excel'), 'refresh');
        }
    }
}
