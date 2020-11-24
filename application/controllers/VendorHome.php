<?php

class vendorHome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('vendorId') == '') {
            header('location:vendorLogin');
        }
    }

    public function vDashboard()
    {
        $this->load->view('vendor/index');
    }

    public function profile()
    {
        $vendorId = sessionId('vendorId');
        $getVendorData = getRowById('tbl_vendor_registration', 'vendor_registration_id', $vendorId);
        $data['name'] = set_value('name') == false ? @$getVendorData[0]['name'] : set_value('name');
        $data['email'] = set_value('email') == false ? @$getVendorData[0]['email'] : set_value('email');
        $data['phone'] = set_value('phone') == false ? @$getVendorData[0]['phone'] : set_value('phone');
        $data['gender'] = set_value('gender') == false ? @$getVendorData[0]['gender'] : set_value('gender');
        $data['address'] = set_value('address') == false ? @$getVendorData[0]['address'] : set_value('address');
        $data['area'] = set_value('area') == false ? @$getVendorData[0]['area'] : set_value('area');
        $data['pincode'] = set_value('pincode') == false ? @$getVendorData[0]['pincode'] : set_value('pincode');
        $data['state'] = set_value('state') == false ? @$getVendorData[0]['state'] : set_value('state');
        $data['city'] = set_value('city') == false ? @$getVendorData[0]['city'] : set_value('city');
        $data['shop_name'] = set_value('shop_name') == false ? @$getVendorData[0]['shop_name'] : set_value('shop_name');

        if (count($_POST) > 0) {
            $date = date('Y-d-m h:i:s');
            if (isset($vendorId)) {
                $post = $this->input->post();
                $post['update_date'] = $date;
                $post['address'] = str_replace("'", "/", $this->input->post('address'));
                $update = updateRowById('tbl_vendor_registration', 'vendor_registration_id', $vendorId, $post);
                if ($update) {
                    $this->session->set_flashdata('errors', 'Profile update Successfully');
                    header('location:vProfile');
                } else {
                    $this->load->view('vendor/profile', $data);
                }
            }
        } else {
            $this->load->view('vendor/profile', $data);
        }
    }

    public function changePassword()
    {
        if (count($_POST) > 0) {
            $studentId = getRowById('tbl_vendor_registration', 'vendor_registration_id', sessionId('vendorId'));
            $old_password = $this->input->post('old_password');
            $cof_password['password'] = $this->input->post('cof_password');
            if ($studentId[0]['password'] != $old_password) {
                $this->session->set_flashdata('errors', 'old password not match');
                $this->session->set_flashdata('class', 'alert-danger');
            } else {
                $update = updateRowById('tbl_vendor_registration', 'vendor_registration_id', sessionId('vendorId'), $cof_password);
                if ($update) {
                    $this->session->set_flashdata('errors', 'Password Update Successfully');
                    $this->session->set_flashdata('class', 'alert-success');
                } else {
                    $this->session->set_flashdata('errors', 'Password Not Update');
                    $this->session->set_flashdata('class', 'alert-warning');
                }
            }
            $this->load->view('vendor/change_password');
        } else {
            $this->load->view('vendor/change_password');
        }
    }

    public function getMachine()
    {
        $data = $this->input->post('state_id');
        $get = getRowById('tbl_sub_category', 'category_id', $data);
        foreach ($get as $city) {
            ?>
            <option value="<?= $city['sub_category_id'] ?>"><?= ucwords($city['sub_category_name']) ?></option>
            <?php
        }
    }

    public function allMachine()
    {
        $getData['allMachine'] = getRowById('tbl_machines', 'vendor_id', sessionId('vendorId'));
        $this->load->view('vendor/allMachine', $getData);
    }

    public function addMachine()
    {
        $machineId = $this->input->get('machineId');
        $id = decryptId($machineId);
        $get = getRowById('tbl_machines', 'machine_id', $id);
        $data['sub_category_id'] = set_value('sub_category_id') == false ? @$get[0]['sub_category_id'] : set_value('sub_category_id');
        $data['type_id'] = set_value('type_id') == false ? @$get[0]['type_id'] : set_value('type_id');
        $data['description'] = set_value('description') == false ? @$get[0]['description'] : set_value('description');
        $data['image_path'] = set_value('image_path') == false ? @$get[0]['image_path'] : set_value('image_path');
        $data['price'] = set_value('price') == false ? @$get[0]['price'] : set_value('price');
        $data['area'] = set_value('area') == false ? @$get[0]['area'] : set_value('area');
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('type_id', 'name', 'required');
            $this->form_validation->set_rules('sub_category_id', 'price', 'required');
            $this->form_validation->set_rules('area', 'area', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('vendor/add_machine', $data);
            } else {
                // extract($this->input->post())
                $post = $this->input->post();
                if (isset($machineId)) {

                    $post['update_date'] = setDate();

                    $updateRow = updateRowById('tbl_machines', 'machine_id', $id, $post);
                    if ($updateRow == 1) {
                        $this->session->set_flashdata('errors', 'Category Update Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Category Not Add');
                    }
                } else {
                    $post['create_date'] = setDate();
                    $post['vendor_id'] = sessionId('vendorId');


                    $insert = insertRow('tbl_machines', $post);
                    if ($insert == 1) {
                        $this->session->set_flashdata('errors', 'Machine Add successfully');

                    } else {
                        $this->session->set_flashdata('errors', 'Machine Not Add. please try again');
                    }
                }
                header('Location:vAllMachine');
            }
        } else {
            $this->load->view('vendor/add_machine', $data);
        }
    }

    public function vBookHistory()
    {
        $this->load->view('vendor/book_history');
    }

    public function acceptStatus()
    {
        $bookProdId = $this->input->get('b');
        $status = $this->input->get('s');
        if ($status == '1') {
            $post['status'] = '1';
        } else if ($status == '2') {
            $post['status'] = '2';
        } else if ($status == '3') {
            $post['status'] = '3';
        } else if ($status == '4') {
            $post['status'] = '4';
        }
        $update = updateRowById('tbl_book_product', 'book_product_id', $bookProdId, $post);
        header('location:vBookHistory');
    }
}