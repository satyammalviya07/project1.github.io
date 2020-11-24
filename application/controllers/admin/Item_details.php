<?php

class Item_details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        if ($this->session->userdata('adminId') == '') {
            redirect('adminLogin');
        }
    }

    public function allCategory()
    {
        $data['category'] = getAllRow('tbl_category');
        $this->load->view('admin/all_category', $data);

    }

    public function addCategory()
    {
        $id = $this->input->get('id');
        $decrypt_id = decryptId($this->input->get('id'));
        $get = getRowById('tbl_category', 'category_id', $decrypt_id);
        $data['category_name'] = set_value('category_name') == false ? @$get[0]['category_name'] : set_value('category_name');
        if (isset($id)) {
            $data['title'] = 'Edit Category';
        } else {
            $data['title'] = 'Add Category';
        }
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('category_name', 'category', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/add_category', $data);
            } else {
                $category_name = $this->input->post('category_name');
                $date = date('d-m-Y h:i:s');
                if (isset($id)) {
                    $data = array(
                        'category_name' => strtolower(str_replace("'", "/", $category_name)),
                        'update_date' => $date
                    );

                    $updateRow = updateRowById('tbl_category', 'category_id', $decrypt_id, $data);

                    if ($updateRow == 1) {
                        $this->session->set_flashdata('errors', 'Category Update Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Category Not Add');
                    }
                } else {

                    $post = array(
                        'category_name' => strtolower(str_replace("'", "/", $category_name)),
                        'create_date' => $date
                    );

                    $insert = insertRow('tbl_category', $post);

                    if ($insert == 1) {
                        $this->session->set_flashdata('errors', 'Category Add Successfully');

                    } else {
                        $this->session->set_flashdata('errors', 'Category Not Add');
                    }
                }
                header('Location:allCategory');
            }
        }
        $this->load->view('admin/add_category', $data);
    }

    //   sub category
    public function sub_category()
    {
        $data['sub_category'] = getAllRowsWithOrder('tbl_sub_category', 'sub_category_name', 'ASC');
        $this->load->view('admin/sub_category_all', $data);
    }

    public function sub_category_add()
    {
        $id = $this->input->get('id');
        $decrypt_id = decryptId($this->input->get('id'));
        $get = getRowById('tbl_sub_category', 'sub_category_id', $decrypt_id);

        $data['sub_category_name'] = set_value('sub_category_name') == false ? @$get[0]['sub_category_name'] : set_value('sub_category_name');
        $data['category_id'] = set_value('category_id') == false ? @$get[0]['category_id'] : set_value('category_id');
        $data['sub_category_image'] = set_value('category_image2') == false ? @$get[0]['sub_category_image'] : set_value('category_image2');
        $data['overview'] = set_value('overview') == false ? @$get[0]['overview'] : set_value('overview');
        $data['description'] = set_value('description') == false ? @$get[0]['description'] : set_value('description');
        if (count($_POST) > 0) {
            $this->form_validation->set_rules('sub_category_name', 'sub category name', 'required');
            $this->form_validation->set_rules('category_id', 'category', 'required');
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('admin/sub_category_add', $data);
            } else {
                $sub_category_name = $this->input->post('sub_category_name');
                $s_category_id = $this->input->post('category_id');
                $category_image2 = $this->input->post('category_image2');
                $overview = $this->input->post('overview');
                $description = $this->input->post('description');
                $date = date('d-m-Y h:i:s');
                if (isset($id)) {
                    if (empty($_FILES['category_image']['name'])) {
                        $data = array(
                            'sub_category_name' => strtolower(str_replace("'", "/", $sub_category_name)),
                            'category_id' => $s_category_id,
                            'sub_category_image' => $category_image2,
                            'description' => $description,
                            'overview' => $overview,
                            'update_date' => $date
                        );
                    } else {
                        $picture = imageUpload('category_image', 'upload/machineImage/');

                        $data = array(
                            'sub_category_name' => strtolower(str_replace("'", "/", $sub_category_name)),
                            'category_id' => $s_category_id,
                            'sub_category_image' => $picture,
                            'description' => $description,
                            'overview' => $overview,
                            'update_date' => $date
                        );
                    }

                    $updateRow = updateRowById('tbl_sub_category', 'sub_category_id', $decrypt_id, $data);

                    if ($updateRow == 1) {
                        $this->session->set_flashdata('errors', 'Machine Details Update Successfully');
                    } else {
                        $this->session->set_flashdata('errors', 'Machine Details Not Add');
                    }
                } else {
                    $picture = imageUpload('category_image', 'upload/machineImage/');
                    $post = array(
                        'sub_category_name' => strtolower(str_replace("'", "/", $sub_category_name)),
                        'category_id' => $s_category_id,
                        'sub_category_image' => $picture,
                        'description' => $description,
                        'overview' => $overview,
                        'create_date' => $date
                    );

                    $insert = insertRow('tbl_sub_category', $post);
                    if ($insert == 1) {
                        $this->session->set_flashdata('errors', 'Machine Add Successfully');

                    } else {
                        $this->session->set_flashdata('errors', 'machine Not Add');
                    }
                }
                header('Location:subCategory');
            }
        } else {
            $this->load->view('admin/sub_category_add', $data);
        }
    }


    function get_sub_category()
    {
        $category_id = $this->input->post('category_id');
        $clean = $this->security->xss_clean($category_id);
        $get_sub_cate = getRowById('tbl_sub_category', 'category_id', $clean);
        foreach ($get_sub_cate as $c) {
            ?>
            <option value="<?php echo $c['sub_category_id']; ?>"><?php echo $c['sub_category_name']; ?></option>
            <?php
        }
    }
}
