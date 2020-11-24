<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('adminId') == '') {
            redirect('adminLogin');
        }
    }

    public function getMachine()
    {
        $data = $this->input->post('state_id');
        $get = getRowById('tbl_sub_category', 'category_id', $data);
        foreach ($get as $city) {
            ?>
            <option <?= $city['sub_category_name'] ?>><?= ucwords($city['sub_category_name']) ?></option>
            <?php
        }
    }

    public function index()
    {
        $this->load->view('admin/dashboard');
    }

    public function subscription()
    {
        $id = $this->input->get('sId');
        $sId = decrypt($id);
        $getPlans = getRowById('tbl_subscription', 'subscription_id', $sId);
        $data['subscription_name'] = set_value('subscription_name') == false ? @$getPlans[0]['subscription_name'] : set_value('subscription_name');
        $data['days'] = set_value('days') == false ? @$getPlans[0]['days'] : set_value('days');
        $data['price'] = set_value('price') == false ? @$getPlans[0]['price'] : set_value('price');
        if (isset($id)) {
            $data['title'] = 'Plan Edit';
        } else {
            $data['title'] = 'plan Add';
        }
        if (count($_POST) > 0) {
            extract($this->input->post());
            $post['subscription_name'] = $subscription_name;
            $post['days'] = $days;
            $post['price'] = $price;
            if (isset($id)) {
                $update = updateRowById('tbl_subscription', 'subscription_id', $sId, $post);
                if ($update) {
                    $this->session->set_flashdata('errors', 'Plan Update Successfully');
                } else {
                    $this->session->set_flashdata('errors', 'Plan Not Update. please try again');
                }
            } else {
                $post['create_date'] = setDate();
                $insert = insertRow('tbl_subscription', $post);
                if ($insert) {
                    $this->session->set_flashdata('errors', 'Plan Add Successfully');
                } else {
                    $this->session->set_flashdata('errors', 'Plan Not Add');
                }
            }
            header('location:subscription');
        } else {
            $this->load->view('admin/subscription', $data);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
