<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CR_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Student_model", "student_model");
        $protect_login = $this->Auth->protect_login();
        if ($protect_login->success === FALSE) {
            $this->session->set_flashdata("pesan", "<script>sweet('error', 'Gagal!', '$protect_login->message')</script>");
            redirect("login");
            exit;
        }
    }

    public function view_student_management($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $data = [
            "title" => "Student Management",
            "content" => "student/view_student_management",
            "student_list" => $this->student_model->get_student_list(),
            "breadcrumb" => $this->draw_breadcrumb("Siswa Management", base_url("student_management"), TRUE),
        ];
        $this->load->view("layout/wrapper", $data);
    }

    public function view_student_add($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $data = [
            "title" => "Tambah Siswa",
            "content" => "student/cms_student_add",
            "category_list" => $this->student_model->get_category_list(),
            "level_list" => $this->student_model->get_level_list(),
            "breadcrumb" => $this->draw_breadcrumb("Tambah Siswa", base_url("view_student_add")),
        ];
        $this->load->view("layout/wrapper", $data);
    }

    public function process_student_add($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $input = (object) $this->input->post();
        $check = $this->student_model->add_student($input);
        if ($check->success == TRUE) {
            $this->flash_message($check->message, "success");
            redirect("student_detail");
        } else {
            $data["bounced"] = $input;
            $this->flash_message($check->message, "error");
            redirect("view_student_add");
        }
    }

    public function view_student_detail($data = FALSE)
    {
        $this->htaccess("WHITE_LIST", ["System Administrator|100|1"], FALSE);
        $id = $this->input->get("id");
        $check = $this->student_model->get_student_detail($id);
        if ($check->found == TRUE) {
            $data["title"] = "Student Management";
            $data["student_info"] = $check->data;
            $data["achievement_list"] = $this->student_model->get_student_achievement_list($id);
            $data["breadcrumb"] = $this->draw_breadcrumb("Info Siswa", base_url("student_detail"));
            $data["content"] = "student/cms_student_detail";
            $this->load->view("layout/wrapper", $data);
        } else {
            $this->flash_message($check->message, "error");
            // redirect("student_management");
        }
    }
}
