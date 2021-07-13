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
            // . "JOIN `list_student_status` lss ON lss.`student_status_id` = ls.`student_status_id` "
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

    public function get_student_related_age($category_id)
    {
        $sql = "SELECT * "
            . "FROM `list_student` ls "
            . "JOIN `list_category` lc ON lc.`category_id` = ls.`category_id` "
            // . "JOIN `list_student_status` lss ON lss.`student_status_id` = ls.`student_status_id` "
            . "WHERE lc.`is_active` = 1 AND ls.`category_id` = ?";
        $query = $this->db->query($sql, [$category_id]);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function add_student($input)
    {
        $response = create_response();
        $check_file = $this->prepare_temp_image("student_photo", FALSE);
        if ($check_file->valid) {
            $this->db->trans_begin();
            $values = [
                "student_name" => $input->student_name,
                "student_gender" => $input->student_gender,
                "student_age" => $input->student_age,
                "category_id" => $input->category_id,
                "student_education" => $input->student_education,
                "student_class" => $input->student_class,
                "student_address" => $input->student_address,
                "student_note" => $input->student_note,
                "father_profesion" => $input->father_profesion,
                "mother_profesion" => $input->mother_profesion,
            ];
            $query = $this->db->insert("list_student", $values);
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

        return $response;
    }

    public function update_student($input)
    {
        $response = create_response();
        $check_file = $this->prepare_temp_image("student_photo", FALSE);
        if ($check_file->valid) {
            $this->db->trans_begin();
            $values = [
                "student_name" => $input->student_name,
                "student_gender" => $input->student_gender,
                "student_age" => $input->student_age,
                "category_id" => $input->category_id,
                "student_education" => $input->student_education,
                "student_class" => $input->student_class,
                "student_address" => $input->student_address,
                "student_note" => $input->student_note,
                "father_profesion" => $input->father_profesion,
                "mother_profesion" => $input->mother_profesion,
            ];

            $query = $this->db->update("list_student", $values, ["student_id" => $input->student_id]);
            // var_dump($this->db->last_query());
            if ($query) {
                if ($check_file->uploaded) {
                    $file_name = "STUDENT_" . $input->student_id . "_" . time();
                    $photo_path = base_url() . "uploads/" . $file_name . "." . $check_file->extension;
                    $this->prepare_final_image("./uploads/", $file_name, TRUE);
                    if ($this->upload->do_upload('student_photo')) {
                        $upload_success = TRUE;
                        $sql = "UPDATE `list_student` SET `file_path` = ? WHERE `student_id` = ?";
                        $query = $this->db->query($sql, [$photo_path, $input->student_id]);
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
                $this->remove_achievement_item($input->student_id);
                if (isset($input->achievement_name) && is_array($input->achievement_name)) {
                    $value_sql = "";
                    $delimeter = "";
                    for ($i = 0; $i < count($input->achievement_name); $i++) {
                        $value_sql .= $delimeter . "(" . $this->db->escape($input->achievement_name[$i]);
                        $value_sql .= ", " . $this->db->escape($input->level_id[$i]);
                        $value_sql .= ", " . $input->student_id;
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
                $response->message = "Sukses mengupdate siswa";
                $this->db->trans_commit();
            } else {
                $this->db->trans_rollback();
            }
        } else {
            $response->message = "Input invalid";
        }
        return $response;
    }

    public function remove_achievement_item($student_id)
    {
        $sql = "DELETE FROM `list_achievement` WHERE `student_id` = ?";
        $query = $this->db->query($sql, [$student_id]);
        if (!$query) {
            log_message("ERROR", "Gagal delete item");
        }
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

    public function discontinue_student($student_id)
    {
        $response = create_response();
        $delete_image = $this->delete_old_file("list_student", "student_id", $student_id, "./uploads", "file_path");

        if ($delete_image->success) {
            $delete_student = $this->db->delete("list_student", ["student_id" => $student_id]);

            if ($delete_student) {
                $response->message = "Success deleted student!";
            } else {
                $response->message = "Query error!";
            }
        } else {
            $response->message = $delete_image->message;
        }
        // $sql = "UPDATE `list_student` SET `student_status_id` = 2 WHERE `student_id` = ?";
        // $query = $this->db->query($sql, [$student_id]);
        // if ($query) {
        //     $response->success = TRUE;
        //     $response->message = "Sukses menghapus data siswa";
        // } else {
        //     $response->message = "Gagal menghapus data siswa";
        // }
        return $response;
    }

    public function get_student_detail($student_id)
    {
        $response = create_response();
        $sql = "SELECT * "
            . "FROM `list_student` ls "
            // . "JOIN `list_student_status` lss ON lss.`student_status_id` = ls.`student_status_id` "
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
