<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CR_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Student_model", "student_model");
        $this->load->model("Category_model", "category_model");
        $protect_login = $this->Auth->protect_login();
        if ($protect_login->success === FALSE) {
            $this->session->set_flashdata("pesan", "<script>sweet('error', 'Gagal!', '$protect_login->message')</script>");
            redirect("login");
            exit;
        }
    }

    public function view_category_management($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $data = [
            "title" => "Category Management",
            "content" => "category/cms_category_management",
            "category_list" => $this->student_model->get_category_list(),
            "breadcrumb" => $this->draw_breadcrumb("Kategori Umur Management", base_url("category_management"), TRUE),
        ];
        $this->load->view("layout/wrapper", $data);
    }

    public function view_category_add($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $data = [
            "title" => "Category Management",
            "content" => "category/cms_category_add",
            "breadcrumb" => $this->draw_breadcrumb("Tambah Kategori Umur", base_url("view_category_add")),
        ];
        $this->load->view("layout/wrapper", $data);
    }

    public function process_category_add($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $input = (object) $this->input->post();
        var_dump($input);
    }
}
