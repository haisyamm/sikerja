<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	function __construct()
	{
		parent:: __construct();
		$this->load->model('dashboard_model','model');

		if($this->input->cookie('localhost') == NULL)
		{
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'tittle' 		 		=> 'Dashboard',
			'js'	 		 		=> '',
			'data_employee'  		=> $this->model->get_karyawan(),
			'data_employee_last'	=> $this->model->get_employee_last(),
			'data_users'			=> $this->model->get_users(),
			'data_attendance'		=> $this->model->get_attendance(),
			'data_attendance_last' 	=> $this->model->get_attendance_last(),
			'data_menu'				=> $this->model->get_user_menus(),
			'data_menu_active'		=> $this->model->get_user_menus_active()
		];

		$this->template->load('default', 'page/dashboard/index', $data);
	}

}