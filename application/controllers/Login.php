<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_data');
    }

    public function userResister()
    {
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('name', 'User Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_user_registration.email]');
            $this->form_validation->set_rules('phone', 'Phone No.', 'is_unique[tbl_user_registration.phone]');
            $this->form_validation->set_rules('password', 'Password.', 'required');
            $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                $post['create_date'] = date('d-m-Y h:i:s');
                $save = insertRow('tbl_user_registration', $post);
                if ($save) {
                    $this->session->set_flashdata('register_success', 'Thank you for Registration.');
                    $this->load->view('user/registration');
                } else {
                    $this->session->set_flashdata('register_error', 'Something Went Wrong.PLease Try Again');
                    $this->load->view('user/registration');
                };
            } else {
                $this->load->view('user/registration');
            }
        } else {
            $this->load->view('user/registration');
        }
    }

    public function userLogin()
    {
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('phone', 'Email/phone no', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
            if ($this->form_validation->run()) {
                $f_email = '';
                $f_phone = '';
                $email = $this->input->post('phone');
                $password = $this->input->post('password');
                $get = $this->Login_data->userLogin($email);
                foreach ($get as $item) {
                    $id = $item['user_registration_id'];
                    $name = $item['name'];
                    $f_email = $item['email'];
                    $f_phone = $item['phone'];
                    $f_password = $item['password'];
                    $status = $item['user_status'];
                }

                if ($email != $f_email AND $email != $f_phone) {
                    $this->session->set_flashdata('login_error', 'Enter a valid Email or Phone no.');
                    $this->load->view('user/login');
                } else if ($password != $f_password) {
                    $this->session->set_flashdata('login_error', 'Enter a valid Password.');
                    $this->load->view('user/login');
                } else if ($status == 0) {
                    $this->session->set_flashdata('login_error', 'Your have been blocked. Please contact Admin.');
                    $this->load->view('user/login');
                } else if ($password == $f_password AND $status == 1) {
                    $this->session->set_userdata('userId', $id);
                    $this->session->set_userdata('name', $name);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('login_error', 'something went wrong.');
                }
            } else {
                $this->load->view('user/login');
            }
        } else {
            $this->load->view('user/login');
        }
    }

    public function vendorResister()
    {
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('name', 'User Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_vendor_registration.email]');
            $this->form_validation->set_rules('phone', 'Phone No.', 'is_unique[tbl_vendor_registration.phone]');
            $this->form_validation->set_rules('password', 'Password.', 'required');
            $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
            if ($this->form_validation->run() == true) {
                $post = $this->input->post();
                $post['create_date'] = date('d-m-Y h:i:s');
                $save = insertRow('tbl_vendor_registration', $post);

                if ($save) {
                    $this->session->set_flashdata('register_success', 'Thank you for Registration.');
                } else {
                    $this->session->set_flashdata('register_error', 'Something Went Wrong.PLease Try Again');
                }
                $this->load->view('vendor/registration');
            } else {
                $this->load->view('vendor/registration');
            }
        } else {
            $this->load->view('vendor/registration');
        }
    }

    public function vendorLogin()
    {
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('phone', 'Email/phone no', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
            if ($this->form_validation->run()) {
                $f_email = '';
                $f_phone = '';
                $email = $this->input->post('phone');
                $password = $this->input->post('password');
                $get = $this->Login_data->vendorLogin($email);
                foreach ($get as $item) {
                    $id = $item['vendor_registration_id'];
                    $f_email = $item['email'];
                    $f_phone = $item['phone'];
                    $f_password = $item['password'];
                    $shop_status = $item['shop_status'];
                }
                if ($email != $f_email AND $email != $f_phone) {
                    $this->session->set_flashdata('login_error', 'Enter a valid Email or Phone no.');
                } else if ($password != $f_password) {
                    $this->session->set_flashdata('login_error', 'Enter a valid Password.');
                } else if ($shop_status == 0) {
                    $this->session->set_flashdata('login_error', 'Your have been blocked. Please contact Admin.');
                } else if ($password == $f_password) {
                    $this->session->set_userdata('vendorId', $id);
                    header('location:vDashboard');
                } else {
                    $this->session->set_flashdata('login_error', 'something went wrong.');
                }
                $this->load->view('vendor/login');
            } else {
                $this->load->view('vendor/login');
            }
        } else {
            $this->load->view('vendor/login');
        }
    }

    public function adminLogin()
    {
        if ($this->input->post('phone') == '') {
            $this->load->view('admin/login');
        } else {
            $this->form_validation->set_rules('phone', 'Email/phone no', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
            if ($this->form_validation->run()) {
                $f_email = '';
                $f_phone = '';
                $email = $this->input->post('phone');
                $password = $this->input->post('password');
                $get = $this->Login_data->adminLogin($email);
                foreach ($get as $item) {
                    $id = $item->registration_id;
                    $f_email = $item->email;
                    $f_phone = $item->phone;
                    $f_password = $item->password;
                }
                if ($email != $f_email AND $email != $f_phone) {
                    $this->session->set_flashdata('login_error', 'Enter a valid Email or Phone no.');
                    $this->load->view('admin/login');
                } else if ($password != $f_password) {
                    $this->session->set_flashdata('login_error', 'Enter a valid Password.');
                    $this->load->view('admin/login');
                } else if ($password == $f_password) {
                    $this->session->set_userdata('adminId', $id);
                    redirect('aDashboard');
                } else {
                    echo "something went wrong";
                }
            } else {
                $this->load->view('admin/login');
            }
        }
    }

    public function getCity()
    {
        $data = $this->input->post('state_id');
        $get = getRowById('cities', 'city_state', $data);
        foreach ($get as $city) {
            ?>
            <option <?= $city['city_name'] ?>><?= $city['city_name'] ?></option>
            <?php
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('vendorId');
        header('location:vendorLogin');
    }

    public function userLogout()
    {
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('name');
        header('location:home');
    }

    public function city()
    {
//        $get = getAllRowsWithOrder('states', 'state_name', 'ASC');
//        $get = getAllRowsWithOrder('cities', 'city_name', 'ASC');
        $get = getRowsByMoreIdWithOrder('cities', "state_id = '38'", 'city_name', 'ASC');
        echo json_encode($get);

    }
}
