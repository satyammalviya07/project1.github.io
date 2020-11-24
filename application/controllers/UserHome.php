<?php

class UserHome extends CI_Controller
{
    public function index()
    {
        $this->load->view('user/index');
    }

    public function viewSingleProduct($machineId)
    {

        $getProduct = getRowById('tbl_machines', 'machine_id', decryptId($machineId));
        $this->load->view('user/single_product', array('details' => $getProduct));
    }

    public function checkoutPage()
    {
        if ($this->session->userdata('userId') == '') {
            $this->session->set_flashdata('checkLogin', 'Please Login First');
            $this->load->view('user/checkout');
        } else {

            if (count($_POST) > 0) {

                $post = $this->input->post();
                $post['create_date'] = setDate();
                $post['user_id'] = sessionId('userId');
                $post['order_id'] = 'ORD' . rand(100000, 999);
                $insert = insertRow('tbl_book_product', $post);

                if ($insert) {
                    header('location:home');
                } else {
                    $this->load->view('user/checkout');
                }
            } else {

                $this->load->view('user/checkout');
            }

        }

    }

    public function orderHistory()
    {
        if ($this->session->userdata('userId') == '') {
            $this->session->set_flashdata('checkLogin', 'Please Login First');
            $this->load->view('user/order_history');
        } else {
            $this->load->view('user/order_history');
        }
    }

    public function all_machine()
    {
        $this->load->view('user/all_machine');
    }

    public function about_us()
    {
        $this->load->view('user/about_us');
    }
}