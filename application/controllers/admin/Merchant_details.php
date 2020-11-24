<?php

class Merchant_details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('adminId') == '') {
            redirect('adminLogin');
        }

        date_default_timezone_set("Asia/Kolkata");
    }

    function getCity()
    {
        $category_id = $this->input->post('state_id');
        $clean = $this->security->xss_clean($category_id);
        $get_city = getRowById('cities', 'city_state', $clean);
        foreach ($get_city as $c) {
            ?>
            <option value="<?php echo $c['city_name']; ?>"><?php echo $c['city_name']; ?></option>
            <?php
        }
    }

    function getDate()
    {
        $id = $this->input->post('id');
        $clean = $this->security->xss_clean($id);
        $get = getRowById('tbl_subscription', 'subscription_id', $clean);
        echo date('d-m-Y', strtotime("+ " . $get[0]['days'] . "days"));
    }

    public function merchant_status($status, $id)
    {
        $decryptId = encryptId($id);
        if ($status == 1) {
            $data = array('shop_status' => '0');
            updateRowById('tbl_vendor_registration', 'vendor_registration_id', $decryptId, $data);
            redirect('allMerchants');
        } else {
            $data = array('shop_status' => '1');
            updateRowById('tbl_vendor_registration', 'vendor_registration_id', $decryptId, $data);
            redirect('allMerchants');
        }
    }

    public function all_merchants()
    {
        $get['merchants'] = getAllRowsWithOrder('tbl_vendor_registration', 'vendor_registration_id', 'DESC');
        $this->load->view('admin/merchants_all', $get);
    }

    public function merchant_order_history()
    {
        $id = $this->input->get('vendor_registration_id');
        $decrypt_id = encryptId($id);
        $orders['orders'] = $this->Item_details_data->merchant_order_history($decrypt_id);
        $this->load->view('admin/merchant_order_history', $orders);
    }

    public function merchant_payment_details()
    {
        $id = $this->input->get('vendor_registration_id');
        $decrypt_id = encryptId($id);
        $payment['details'] = $this->Item_details_data->merchant_payment_data($decrypt_id);
        $this->load->view('admin/merchant_payment_details', $payment);
    }

    public function pay_amount()
    {
        $id = $this->input->get('vendor_registration_id');
        $shop_name = $this->input->get('shop_name');
        $post['user_id'] = encryptId($id);
        $post['transition_id'] = 'TXN' . rand(10000000, 100000000);
        $post['pay_amount'] = $this->input->post('amount');
        $post['create_date'] = date('d-m-Y h:i:s');
        $insert = insertRow('tbl_payment_details', $post);
        header("location:merchantPaymentD?vendor_registration_id=$id&shop_name=$shop_name");
    }


    public function get_message_for_merchant()
    {
        $get_id = $this->input->post('vendor_registration_id');
        $data = getMessages('tbl_messages_merchant', 'vendor_registration_id', $get_id, 'sender_id', '2');
        foreach ($data as $msg) {
            if ($msg['sender_id'] == '2') {
                ?>
                <div class="container">
                    <p><?= $msg['message'] ?><span class="time-right">
                            <?= date('d/M/Y', strtotime($msg['create_date'])) ?><br>
                            <?= date('h:i A', strtotime($msg['create_date'])) ?>
                        </span>
                    </p>
                </div>
                <?php
            } else {
                ?>
                <div class="container darker">
                    <p><?= $msg['message'] ?><span class="time-right">
                          <?= date('d/M/Y', strtotime($msg['create_date'])) ?><br>
                            <?= date('h:i A', strtotime($msg['create_date'])) ?>
                        </span>
                    </p>
                </div>
                <?php
            }
        }
    }

    public function merchant_complains()
    {
        $complains['complains'] = $this->Item_details_data->merchant_complains();
        $this->load->view('admin/merchant_complains', $complains);
    }

    public function admin_reply_merchant()
    {
        $this->load->view('admin/merchant_complain_reply');
    }

    public function send_msg()
    {
        $post = $this->input->post();
        $post['create_date'] = date('d-m-y h:i:s');
        insertRow('tbl_messages_merchant', $post);
    }

    public function complain_status()
    {
        $vendor_registration_id = $this->input->get('vendor_registration_id');
        $status = $this->input->get('status');
        if ($status == '1') {
            $data = array('complain_status' => '0');
            updateRowById('tbl_merchant_complain', 'vendor_registration_id', $vendor_registration_id, $data);
        } else {
            $data = array('complain_status' => '1');
            updateRowById('tbl_merchant_complain', 'vendor_registration_id', $vendor_registration_id, $data);
        }
        header("location:merchantComplain");
    }
}