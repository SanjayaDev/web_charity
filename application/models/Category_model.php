<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CR_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_category($input)
    {
        $response = create_response();
        $duplicate = $this->check_duplicate("list_category", "category_name", $input->category_name);
        if ($duplicate == FALSE) {
            $sql = "INSERT INTO `list_category` (`category_name`) VALUES (?)";
            $query = $this->db->query($sql, [$input->category_name]);
            if ($query) {
                $response->success = TRUE;
                $response->message = "Berhasil menambahkan kategori umur";
            } else {
                $response->message = "Gagal menambahkan kategori umur";
            }
        } else {
            $response->message = "Kategori umur sudah pernah dibuat sebelumnya";
        }
        return $response;
    }

    public function edit_category($input)
    {
        $response = create_response();
        $duplicate = $this->check_other_duplicate("list_category", "category_name", $input->category_name, "category_id", $input->category_id);
        if ($duplicate == FALSE) {
            $sql = "UPDATE `list_category` SET `category_name` = ? WHERE `category_id` = ?";
            $query = $this->db->query($sql, [$input->category_name, $input->category_id]);
            if ($query) {
                $response->success = TRUE;
                $response->message = "Berhasil mengubah kategori umur";
            } else {
                $response->message = "Gagal mengubah kategori umur";
            }
        } else {
            $response->message = "Kategori umur sudah pernah dibuat sebelumnya";
        }
        return $response;
    }

    public function delete_category($category_id)
    {
        $response = create_response();
        $sql = "UPDATE `list_category` SET `is_active` = 0 WHERE `category_id` = ?";
        $query = $this->db->query($sql, [$category_id]);
        if ($query) {
            $response->success = TRUE;
            $response->message = "Berhasil menghapus category";
        } else {
            $response->message = "Gagal menghapus category";
        }
        return $response;
    }

    public function get_category_detail($category_id)
    {
        $response = create_response();
        $sql = "SELECT * FROM `list_category` WHERE `category_id` = ?";
        $query = $this->db->query($sql, [$category_id]);
        if ($query) {
            $response->success = true;
            if ($query->num_rows() > 0) {
                $response->found = true;
                $response->data = $query->row();
            } else {
                $response->message = "Data tidak ditemukan";
            }
        } else {
            $response->message = "Query gagal";
        }
        return $response;
    }
}
