<?php

class EmployeeDetails extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        if ($this->session->userdata('adminId') == '') {
            redirect('adminLogin');
        }
    }

    public function designation()
    {
        $this->load->view('admin/designation_all');
    }

    public function designation_add()
    {
        $id = $this->input->get('d_id');
        $decrypt_id = decryptId($id);
        $get = getRowById('tbl_designation', 'designation_id', $decrypt_id);

        $data['designation'] = set_value('designation') == false ? @$get[0]['designation'] : set_value('designation');
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('designation', 'designation', 'required');
            $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
            if ($this->form_validation->run()) {
                $date = date('d-m-Y h:i:s');
                if (isset($id)) {
                    $post = $this->input->post();
                    $post['update_date'] = $date;
                    $update = updateRowById('tbl_designation', 'designation_id', $decrypt_id, $post);
                    if ($update == 1) {
                        $this->session->set_flashdata('errors', 'Designation Update Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Designation Not Update. Please Try Again');
                    }
                } else {
                    $post = $this->input->post();
                    $post['create_date'] = $date;
                    $insert = insertRow('tbl_designation', $post);
                    if ($insert) {
                        $this->session->set_flashdata('errors', 'Designation Add Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Designation Not Add Successfully');
                    }
                }
                header('location:designation');
            } else {
                $this->load->view('admin/designation_add', $data);
            }
        } else {
            $this->load->view('admin/designation_add', $data);
        }
    }

    public function designation_delete($key)
    {
        $delete = deleteRowById('tbl_designation', 'designation_id', decryptId($key));
        if ($delete == 1) {
            $this->session->set_flashdata('errors', 'Designation Delete Successfully');
        } else {
            $this->session->set_flashdata('errors', 'Designation Not Delete');
        }
        redirect('designation');
    }

    function calculateExpiry($reg_date)
    {
        $next_year = strtotime('+1 year', $reg_date);
        $feb_days = ((($next_year % 4) == 0) && ((($next_year % 100) != 0) || (($next_year % 400) == 0))) ? 29 : 28;
        return strtotime($feb_days . ' February ' . $next_year);
    }

    public function employee_all()
    {
        $this->load->view('admin/employee_all');
    }


    public function addEmployee()
    {
        $id = $this->input->get('employeeId');
        $decryptId = decryptId($id);
        $getEmp = getRowById('tbl_employee', 'employee_id', $decryptId);
        $data['name'] = set_value('name') == false ? @$getEmp[0]['name'] : set_value('name');
        $data['email'] = set_value('email') == false ? @$getEmp[0]['email'] : set_value('email');
        $data['phone'] = set_value('phone') == false ? @$getEmp[0]['phone'] : set_value('phone');
        $data['password'] = set_value('password') == false ? @$getEmp[0]['password'] : set_value('password');
        $data['gender'] = set_value('gender') == false ? @$getEmp[0]['gender'] : set_value('gender');
        $data['address'] = set_value('address') == false ? @$getEmp[0]['address'] : set_value('address');
        $data['area'] = set_value('area') == false ? @$getEmp[0]['area'] : set_value('area');
        $data['pincode'] = set_value('pincode') == false ? @$getEmp[0]['pincode'] : set_value('pincode');
        $data['state'] = set_value('state') == false ? @$getEmp[0]['state'] : set_value('state');
        $data['city'] = set_value('city') == false ? @$getEmp[0]['city'] : set_value('city');
        $data['user_type'] = set_value('user_type') == false ? @$getEmp[0]['user_type'] : set_value('user_type');
        $data['aadhaar_no'] = set_value('aadhaar_no') == false ? @$getEmp[0]['aadhaar_no'] : set_value('aadhaar_no');
        $data['pan_no'] = set_value('pan_no') == false ? @$getEmp[0]['pan_no'] : set_value('pan_no');
        $data['holder_name'] = set_value('holder_name') == false ? @$getEmp[0]['holder_name'] : set_value('holder_name');
        $data['account_no'] = set_value('account_no') == false ? @$getEmp[0]['account_no'] : set_value('account_no');
        $data['IFSC_code'] = set_value('IFSC_code') == false ? @$getEmp[0]['IFSC_code'] : set_value('IFSC_code');
        $data['branch_name'] = set_value('branch_name') == false ? @$getEmp[0]['branch_name'] : set_value('branch_name');
        $data['salary'] = set_value('salary') == false ? @$getEmp[0]['salary'] : set_value('salary');
        if (!$id) {
            $data['title'] = 'Add Employee';
        } else {
            $data['title'] = 'Edit Employee Details';
        }
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_error_delimiters('<sapn style="color: red;"></sapn>');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/employee_add', $data);
            } else {
                $post = $this->input->post();
                $post['phone'] = (int)$this->input->post('phone');
                $post['password'] = encryptId($this->input->post('password'));
                $post['address'] = str_replace("'", "/", $this->input->post('address'));
                $date = date('d-m-Y h:i:s');
                $salary1 = str_replace('₹', '', $this->input->post('salary'));
                $salary2 = str_replace(',', '', $salary1);
                $post['salary'] = $salary2;
                if (isset($id)) {
                    $post['update_date'] = $date;
                    $update = updateRowById('tbl_employee', 'employee_id', $decryptId, $post);
                    if ($update) {
                        $this->session->set_flashdata('errors', 'Employee Data update Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Employee Data Not update Successfully');
                    }
                } else {
                    $post['create_date'] = $date;
                    $insert = insertRow('tbl_employee', $post);
                    if ($insert) {
                        $this->session->set_flashdata('errors', 'Employee Add Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Employee Add Successfully');
                    }
                }
                header('location:allEmployee');
            }
        } else {
            $this->load->view('admin/employee_add', $data);
        }
    }

    public function deleteEmp($key)
    {
        $delete = deleteRowById('tbl_employee', 'employee_id', decryptId($key));
        if ($delete == 1) {
            $this->session->set_flashdata('errors', 'Employee Delete Successfully');
        } else {
            $this->session->set_flashdata('errors', 'Employee Not Delete. please try Again');
        }
        redirect('allEmployee');
    }

    public function changeStatus($key, $status)
    {
        if ($status == '1') {
            $data = array('employee_status' => '0');
            $change = updateRowById('tbl_employee', 'employee_id', decryptId($key), $data);
            $this->session->set_flashdata('errors', 'Employee Deactive');
        } else if ($status == '0') {
            $data = array('employee_status' => '1');
            $change = updateRowById('tbl_employee', 'employee_id', decryptId($key), $data);
            $this->session->set_flashdata('errors', 'Employee Active');
        }
        redirect('allEmployee');
    }

    public function paymentDetails()
    {
        $id = $this->input->get('empId');
        $decryptId = decryptId($id);
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/student_fee_details');
            } else {
                $post['amount'] = $this->input->post('amount');
                $post['remark'] = $this->input->post('remark');
                $post['user_id'] = $decryptId;
                $post['create_date'] = setDateTime();
                $post['user_type'] = '1';
                $insert = insertRow('tbl_payment_details', $post);
                if ($insert) {
                    header("location:paymentDetails?empId=$id");
                } else {
                    header("location:paymentDetails?empId=$id");
                }
            }
        } else {
            $this->load->view('admin/employee_payment');
        }
    }

    //   student details

    public function StudentAll()
    {
        $this->load->view('admin/Student_all');
    }

    public function studentAdd()
    {
        $studentId = $this->input->get('studentId');
        $queryId = $this->input->get('queryId');
        if ($this->input->get('queryId')) {
            $decryptQId = decryptId($queryId);
            $getStudent = getRowById('tbl_query', 'query_id', $decryptQId);
        } else {
            $decryptId = decryptId($studentId);
            $getStudent = getRowById('tbl_student', 'id', $decryptId);
        }
        $data['name'] = set_value('name') == false ? @$getStudent[0]['name'] : set_value('name');
        $data['email'] = set_value('email') == false ? @$getStudent[0]['email'] : set_value('email');
        $data['phone'] = set_value('phone') == false ? @$getStudent[0]['phone'] : set_value('phone');
        $data['password'] = set_value('password') == false ? @$getStudent[0]['password'] : set_value('password');
        $data['gender'] = set_value('gender') == false ? @$getStudent[0]['gender'] : set_value('gender');
        $data['address'] = set_value('address') == false ? @$getStudent[0]['address'] : set_value('address');
        $data['area'] = set_value('area') == false ? @$getStudent[0]['area'] : set_value('area');
        $data['pincode'] = set_value('pincode') == false ? @$getStudent[0]['pincode'] : set_value('pincode');
        $data['state'] = set_value('state') == false ? @$getStudent[0]['state'] : set_value('state');
        $data['city'] = set_value('city') == false ? @$getStudent[0]['city'] : set_value('city');
        $data['dob'] = set_value('dob') == false ? @$getStudent[0]['dob'] : set_value('dob');

        $data['studentId'] = set_value('studentId') == false ? @$getStudent[0]['studentId'] : set_value('studentId');
        $data['course_name'] = set_value('course_name') == false ? @$getStudent[0]['course_name'] : set_value('course_name');
        $data['course_price'] = set_value('course_price') == false ? @$getStudent[0]['course_price'] : set_value('course_price');
        $data['discount'] = set_value('discount') == false ? @$getStudent[0]['discount'] : set_value('discount');
        $data['time'] = set_value('time') == false ? @$getStudent[0]['time'] : set_value('time');

        if (!$studentId) {
            $data['title'] = 'Add Student';
        } else {
            $data['title'] = 'Edit Student Details';
        }
        if (count($_POST) > 0) {
            $date = date('Y-d-m h:i:s');
            if (isset($studentId)) {
                $this->form_validation->set_rules('name', 'name', 'trim|required');
                $this->form_validation->set_rules('phone', 'phone', 'trim');
                $this->form_validation->set_rules('email', 'email', 'trim');
                $this->form_validation->set_rules('studentId', 'student id', 'trim');
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $this->form_validation->set_error_delimiters('<sapn style="color: red;"></sapn>');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/student_add', $data);
                } else {
                    $post = $this->input->post();
                    $post['update_date'] = $date;
                    $post['phone'] = (int)$this->input->post('phone');
                    $post['password'] = encryptId($this->input->post('password'));
                    $post['address'] = str_replace("'", "/", $this->input->post('address'));
                    $update = updateRowById('tbl_student', 'id', $decryptId, $post);
                    if ($update) {
                        $this->session->set_flashdata('errors', 'Employee Data update Successfully');
                        header('location:StudentAll');
                    } else {
                        $this->load->view('admin/student_add', $data);
                    }
                }
            } else {
                $this->form_validation->set_rules('name', 'name', 'trim|required');
                $this->form_validation->set_rules('phone', 'phone', 'trim|is_unique[tbl_student.phone]', array('is_unique' => 'Phone No already Used. User Another Phone No'));
                $this->form_validation->set_rules('email', 'email', 'trim|is_unique[tbl_student.email]');
                $this->form_validation->set_rules('studentId', 'student id', 'trim|is_unique[tbl_student.studentId]', array('is_unique' => 'Student Id already used. Please Refresh The Page '));
                $this->form_validation->set_rules('password', 'password', 'trim|required');
                $this->form_validation->set_error_delimiters('<sapn style="color: red;"></sapn>');
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/student_add', $data);
                } else {
                    $post = $this->input->post();
                    $post['password'] = encryptId($this->input->post('password'));
                    $post['phone'] = (int)$this->input->post('phone');
                    $post['address'] = str_replace("'", "/", $this->input->post('address'));
                    $post['create_date'] = $date;
                    $insert = insertRow('tbl_student', $post);
                    if ($insert) {
                        if (isset($queryId)) {
                            $delete = deleteRowById('tbl_query', 'query_id', $decryptQId);
                        }
                        $this->session->set_flashdata('errors', 'Student Add Successfully');
                        header('location:StudentAll');
                    } else {
                        $this->load->view('admin/student_add', $data);
                    }
                }
            }
        } else {
            $this->load->view('admin/student_add', $data);
        }
    }

    public function feeDetails()
    {
        $id = $this->input->get('studentId');
        $decryptId = decryptId($id);
        $get['feeDetails'] = paymentDetails('tbl_payment_details', 'user_id', $decryptId, 'user_type', '2', 'payment_id', 'desc');
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/student_fee_details', $get);
            } else {
                $post['amount'] = $this->input->post('amount');
                $post['remark'] = $this->input->post('remark');
                $post['user_id'] = $decryptId;
                $post['create_date'] = setDate();
                $post['user_type'] = '2';
                $insert = insertRow('tbl_payment_details', $post);
                if ($insert) {
                    header("location:feeDetails?studentId=$id");
                } else {
                    header("location:feeDetails?studentId=$id");
                }
            }
        } else {
            $this->load->view('admin/student_fee_details', $get);
        }
    }
}