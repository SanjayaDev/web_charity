<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Student_model", "student_model");
		$this->load->model("Category_model", "category_model");
	}

	public function index()
	{
		$data["student_list"] = $this->student_model->get_student_list();
		$data["category_list"] = $this->student_model->get_category_list();
		$data["config"] = $this->category_model->get_config()->data;
		$this->load->view('home', $data);
	}

	public function student_detail($data = FALSE)
	{
		$id = $this->input->get("id");
		$data["student_info"] = $student = $this->student_model->get_student_detail($id)->data;
		$data["achievement_list"] = $this->student_model->get_student_achievement_list($id);
		$data["related_list"] = $this->student_model->get_student_related_age($student->category_id);
		$data["config"] = $this->category_model->get_config()->data;
		$this->load->view("profile_detail", $data);
	}

	public function view_404_page()
	{
		$this->load->view("v_404");
	}
}
