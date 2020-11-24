<?php

class User_details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('adminId') == '') {
            redirect('adminLogin');
        }
//        $this->load->model('admin/Item_details_data');
        date_default_timezone_set("Asia/Kolkata");
    }

    public function all_users()
    {
        $get['users'] = getAllRowsWithOrder('tbl_user_registration', 'user_registration_id', 'DESC');
        $this->load->view('admin/user_all', $get);
    }

    public function user_status($status, $id)
    {
        $decryptId = decryptId($id);
        if ($status == 1) {
            $data = array('user_status' => '0');
            updateRowById('tbl_user_registration', 'user_id', $decryptId, $data);
            redirect('allUsers');
        } else {
            $data = array('user_status' => '1');
            updateRowById('tbl_user_registration', 'user_id', $decryptId, $data);
            redirect('allUsers');
        }
    }

    public function user_order_history()
    {
        $id = $this->input->get('user_id');
        $decrypt_id = decryptId($id);
        $orders['orders'] = $this->Item_details_data->user_order_history($decrypt_id);
        $this->load->view('admin/user_order_history', $orders);
    }

    public function user_complains()
    {
        $complains['complains'] = $this->Item_details_data->user_complains();
        $this->load->view('admin/user_complains', $complains);
    }

    public function admin_reply_user()
    {
        $this->load->view('admin/user_complain_reply');
    }

    public function get_message_for_user()
    {
        $get_id = $this->input->post('user_id');
        $data = getMessages('tbl_messages_user', 'user_id', $get_id, 'sender_id', '1');
        foreach ($data as $msg) {
            if ($msg['sender_id'] == '1') {
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

    public function send_msg()
    {
        $post = $this->input->post();
        $post['create_date'] = date('d-m-y h:i:s');
        insertRow('tbl_messages_user', $post);
    }

    public function complain_status()
    {
        $order_id = $this->input->get('order_id');
        $status = $this->input->get('status');
        if ($status == '1') {
            $data = array('complain_status' => '0');
            updateRowById('tbl_user_complain', 'order_id', $order_id, $data);
        } else {
            $data = array('complain_status' => '1');
            updateRowById('tbl_user_complain', 'order_id', $order_id, $data);
        }
        header("location:userComplains");
    }

}
