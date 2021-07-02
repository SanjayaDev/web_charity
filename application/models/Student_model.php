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
        $sql = "SELECT * FROM `list_student` WHERE 1";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_category_list()
    {
        $sql = "SELECT * FROM `list_category` WHERE 1";
        $query = $this->db->query($sql);
        if ($query) {
            return $query->result();
        } else {
            return FALSE;
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
}
