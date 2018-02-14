<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$data['login_failed'] = FALSE;

		$this->load_layout('login', $data);
	}

	public function loginAction()
	{
		$userData = $this->login_model->get_user_data($this->input->post('usuario'));
		$password = $userData ? $userData[0]->password : '';
		$tipo = $userData ? $userData[0]->tipo_usuario : '';

		if (password_verify($this->input->post('password'), $password))
		{
			$this->session->logged_in = TRUE;
			$this->session->tipo_usuario = $tipo;
			redirect('home','refresh');
		}else{
			$data['login_failed'] = TRUE;

			redirect('login?error=1','refresh');
		}
	}

	function load_layout($template, $data = '')
	{
		$this->load->view('layout/header');
		$this->load->view($template, $data);
		$this->load->view('layout/footer');
	}
}
