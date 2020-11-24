<?php

class Home_details extends CI_Model
{
    public function addedStudent($teacherId, $batchId)
    {
        $where = "(tbl_student_classes.teacher_id=$teacherId AND tbl_student_classes.batch_id=$batchId)";
        $get = $this->db->select()
            ->from('tbl_student')
            ->join('tbl_student_classes', 'tbl_student_classes.student_id=tbl_student.id')
            ->where($where)
            ->order_by('tbl_student.name', 'ASC')
            ->get();
        return $get->result_array();
    }

    public function checkAttendanceDate($teacherId, $batchId)
    {
        $where = "(teacher_id = $teacherId AND batch_id = $batchId)";
        $get = $this->db->select()
            ->from('tbl_attendance_student')
            ->where($where)
            ->get();
        return $get->result_array();
    }

    public function getAttendance($batchId, $teacherId)
    {
        $where = "(tbl_student_classes.batch_id = $batchId AND tbl_student_classes.teacher_id = $teacherId)";
        $get = $this->db->select()
            ->from('tbl_student_classes')
            ->join('tbl_student', 'tbl_student.id=tbl_student_classes.student_id')
            ->where($where)
            ->order_by('tbl_student.name', 'ASC')
            ->get();
        return $get->result_array();
    }
}