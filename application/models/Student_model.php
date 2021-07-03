<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CR_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_student_list()
    {
        $sql = "SELECT * "
            . "FROM `list_student` ls "
            . "JOIN `list_category` lc ON lc.`category_id` = ls.`category_id` "
            . "JOIN `list_student_status` lss ON lss.`student_status_id` = ls.`student_status_id` "
            . "WHERE lc.`is_active` = 1";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_category_list()
    {
        $sql = "SELECT * FROM `list_category` WHERE `is_active` = 1";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function add_student($input)
    {
        $response = create_response();
        $duplicate = $this->check_duplicate("list_student", "student_name", $input->student_name);
        if ($duplicate == FALSE) {
            $check_file = $this->prepare_temp_image("student_photo", FALSE);
            if ($check_file->valid) {
                $birthdate = explode("-", $input->student_dob);
                $student_age = (date("md", date("U", mktime(0, 0, 0, $birthdate[1], $birthdate[2], $birthdate[0]))) > date("md") ? ((date("Y") - $birthdate[0]) - 1) : (date("Y") - $birthdate[0]));
                $this->db->trans_begin();
                $sql = "INSERT INTO `list_student` "
                    . "(`student_name`, `student_dob`, `student_trustee`, `student_address`, `category_id`, `student_school`, `note`, `student_age`, `student_status_id`) VALUES "
                    . "(?, ?, ?, ?, ?, ?, ?, ?, 1)";
                $query = $this->db->query($sql, [$input->student_name, $input->student_dob, $input->student_trustee, $input->student_address, $input->category_id, $input->student_school, $input->student_note, $student_age]);
                if ($query) {
                    $response->student_id = $this->db->insert_id();
                    if ($check_file->uploaded) {
                        $file_name = "STUDENT_" . $response->student_id . "_" . time();
                        $photo_path = base_url() . "uploads/" . $file_name . "." . $check_file->extension;
                        $this->prepare_final_image("./uploads/", $file_name, TRUE);
                        if ($this->upload->do_upload('student_photo')) {
                            $upload_success = TRUE;
                            $sql = "UPDATE `list_student` SET `file_path` = ? WHERE `student_id` = ?";
                            $query = $this->db->query($sql, [$photo_path, $response->student_id]);
                        } else {
                            $upload_success = FALSE;
                        }
                    } else {
                        $upload_success = true;
                    }
                    if ($upload_success == TRUE) {
                        $response->message = "Upload photo success";
                    } else {
                        $response->message = "Upload photo failed";
                    }
                    if (isset($input->achievement_name) && is_array($input->achievement_name)) {
                        $value_sql = "";
                        $delimeter = "";
                        for ($i = 0; $i < count($input->achievement_name); $i++) {
                            $value_sql .= $delimeter . "(" . $this->db->escape($input->achievement_name[$i]);
                            $value_sql .= ", " . $this->db->escape($input->level_id[$i]);
                            $value_sql .= ", " . $response->student_id;
                            $value_sql .= ", " . $this->db->escape($input->description[$i]);
                            $value_sql .= ")";
                            $delimeter = ", ";
                        }
                        if ($value_sql != "") {
                            $sql = "INSERT INTO `list_achievement` "
                                . "(`achievement_name`, `level_id`, `student_id`, `description`) VALUES "
                                . $value_sql;
                            $query = $this->db->query($sql);
                            if (!$query) {
                                $response->message = "Gagal input achievement";
                            }
                        }
                    }
                } else {
                    $response->message = "Query failed";
                }
                if ($this->db->trans_status() == TRUE) {
                    $response->success = TRUE;
                    $response->message = "Sukses menambahkan siswa";
                    $this->db->trans_commit();
                } else {
                    $this->db->trans_rollback();
                }
            } else {
                $response->message = "Input file invalid";
            }
        } else {
            $response->message = "Siswa sudah terdaftar di database";
        }
        return $response;
    }

    public function get_level_list()
    {
        $sql = "SELECT * FROM `list_level` WHERE 1";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_student_detail($student_id)
    {
        $response = create_response();
        $sql = "SELECT * "
            . "FROM `list_student` ls "
            . "JOIN `list_student_status` lss ON lss.`student_status_id` = ls.`student_status_id` "
            . "JOIN `list_category` lc ON lc.`category_id` = ls.`category_id` "
            . "WHERE ls.`student_id` = ?";
        $query = $this->db->query($sql, [$student_id]);
        if ($query) {
            $response->success = TRUE;
            if ($query->num_rows() > 0) {
                $response->found = TRUE;
                $response->data = $query->row();
            } else {
                $response->message = "Data tidak ditemukan";
            }
        } else {
            $response->message = "Query gagal";
        }
        return $response;
    }

    public function get_student_achievement_list($student_id)
    {
        $sql = "SELECT * "
            . "FROM `list_achievement` la "
            . "JOIN `list_level` ll ON ll.`level_id` = la.`level_id` "
            . "WHERE la.`student_id` = ?";
        $query = $this->db->query($sql, [$student_id]);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
}
