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
        $check = $this->category_model->add_category($input);
        if ($check->success == TRUE) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>$check->message</div>");
            redirect("category_manegement");
        } else {
            $data["bounced"] = $input;
            $this->session->set_flashdata("message", "<script>sweet('success', 'Sukses!', '$check->message')</script>");
            redirect("view_category_add");
        }
    }

    public function process_category_delete($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $id = $this->input->get("id");
        $check = $this->category_model->delete_category($id);
        if ($check->success == TRUE) {
            $this->flash_message($check->message, "success");
        } else {
            $this->flash_message($check->message, "danger");
        }
        redirect("category_management");
    }

    public function view_category_edit($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $id = $this->input->get("id");
        $check = $this->category_model->get_category_detail($id);
        if ($check->found == TRUE) {
            $data["category_info"] = $check->data;
            $data["title"] = "Category Management";
            $data["content"] = "category/cms_category_edit";
            $data["breadcrumb"] = $this->draw_breadcrumb("Edit Kategori Umur", base_url("view_student_edit"));
        } else {
            $this->flash_message($check->message, "danger");
            redirect("category_management");
        }
        $this->load->view("layout/wrapper", $data);
    }

    public function process_category_edit($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $input = (object) $this->input->post();
        $check = $this->category_model->edit_category($input);
        if ($check->success == TRUE) {
            $this->flash_message($check->message, "success");
            redirect("category_management");
        } else {
            $data["bounced"] = $input;
            $this->flash_message($check->message, "danger");
            redirect("view_category_edit");
        }
    }

    public function view_about_edit($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $check = $this->category_model->get_config();
        $data["config"] = $check->data;
        $data["title"] = "About Management";
        $data["content"] = "category/cms_about_edit";
        $data["breadcrumb"] = $this->draw_breadcrumb("Edit Tentang", base_url("view_about_edit"));
        $this->load->view("layout/wrapper", $data);
    }

    public function process_about_edit($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $input = (object) $this->input->post();
        $check = $this->category_model->update_config($input);
        if ($check->success == TRUE) {
            $this->flash_message($check->message, "success");
        } else {
            $data["bounced"] = $input;
            $this->flash_message($check->message, "danger");
        }
        redirect("view_about_edit");
    }
}
