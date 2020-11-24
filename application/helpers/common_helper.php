<?php
function insertRow($table, $post)
{
    $ci =& get_instance();
    $clean = $ci->security->xss_clean($post);
    return $ci->db->insert($table, $clean);
}

function getAllRow($table)
{
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->get();
    return $get->result_array();
}

function getAllRowsWithOrder($table, $column, $order)
{
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->order_by($column, $order)
        ->get();
    return $get->result_array();
}

function getRowById($table, $column, $id)
{
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->where($column, $id)
        ->get();
    return $get->result_array();
}

function getRowByIdInOrder($table, $column, $id, $order, $type)
{
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->where($column, $id)
        ->order_by($order, $type)
        ->get();
    return $get->result_array();
}

function updateRowById($table, $column, $id, $data)
{
    $ci =& get_instance();
    $clean = $ci->security->xss_clean($data);
    $query = $ci->db->where($column, $id)
        ->update($table, $clean);
    return $ci->db->affected_rows();
}

function encryptId($id)
{
    $ci =& get_instance();
    return $ci->encrypt->encode($id);
}

function decryptId($key)
{
    $ci =& get_instance();
    return $ci->encrypt->decode($key);
}


function deleteRowById($table, $column, $id)
{
    $ci =& get_instance();
    $delete = $ci->db->where($column, $id)
        ->delete($table);
    return $ci->db->affected_rows();
}
function getNumRows($table, $column, $id, $where)
{
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->where($column, $id)
        ->where($where)
        ->get();
    return $get->num_rows();
}

function setDate()
{
    return date('d-m-Y');
}

function setDateTime()
{
    return date('d-m-Y h:i:s');
}

function paymentDetails($table, $column, $id, $userType, $userTypeId, $order, $type)
{
    $where = "($column = $id AND $userType= $userTypeId)";
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->where($where)
        ->order_by($order, $type)
        ->get();
    return $get->result_array();
}

function getRowsByMoreIdWithOrder($table, $where, $order, $type)
{
    $ci =& get_instance();
    $get = $ci->db->select()
        ->from($table)
        ->where($where)
        ->order_by($order, $type)
        ->get();
    return $get->result_array();
}


function getStudentByBatch($teacherId, $batchId, $order, $type)
{
    $ci =& get_instance();
    $where = "(tbl_student_classes.teacher_id=$teacherId AND tbl_student_classes.batch_id=$batchId)";
    $get = $ci->db->select()
        ->from('tbl_student')
        ->join('tbl_student_classes', 'tbl_student_classes.student_id=tbl_student.id')
        ->where($where)
        ->order_by($order, $type)
        ->get();
    if ($get->num_rows() > 0) {
        return $get->result_array();
    } else {
        return false;
    }
}

function sessionId($id)
{
    $ci =& get_instance();
    return $ci->session->userdata($id);
}

function lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}

function imageUpload($imageName, $path)
{
    $ci =& get_instance();
    $config['file_name'] = date("d-m-i-s") . str_replace("'", '-', $_FILES[$imageName]['name']);
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['upload_path'] = $path;
    $target_path = $path;
    $config['remove_spaces'] = true;
    $config['overwrite'] = false;
    $ci->load->library('upload', $config);
    $ci->upload->initialize($config);
    if ($ci->upload->do_upload($imageName)) {
        $data = array('upload_data' => $ci->upload->data());
        $path = $data['upload_data']['full_path'];
        $picture = $data['upload_data']['file_name'];
        $configi['image_library'] = 'gd2';
        $config['quality'] = '100%';
        $config['create_thumb'] = FALSE;
        $configi['source_image'] = $path;
        $configi['new_image'] = $target_path;
        $configi['maintain_ratio'] = TRUE;
        $configi['width'] = 380;
        $configi['height'] = 260;
        $ci->load->library('image_lib');
        $ci->image_lib->initialize($configi);
        $ci->image_lib->resize();
        return $picture;
    } else {
        return false;
    }
}
