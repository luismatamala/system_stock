<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
	}

	public function index()
	{
		$data['usuarios'] = $this->usuario_model->obtenerUsuarios();

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('usuario/index', $data);
		$this->load->view('layout/footer');
	}

	public function registrar()
	{
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'nombre_usuario' => $this->input->post('nombre_usuario'),
			'password' => $this->input->post('password'),
			'tipo_usuario' => $this->input->post('tipo_usuario'),
			'fecha_creacion' => date("Y-m-d H:i:s")
		);

		$this->usuario_model->crearUsuario($data);
		$data['usuarios'] = $this->usuario_model->obtenerUsuarios();

		$previous = $_SERVER['HTTP_REFERER'];
		redirect($previous);

		//$this->load->view('layout/header');
		//$this->load->view('layout/navbar');
		//$this->load->view('usuario/index', $data);
		//$this->load->view('layout/footer');
	}

	public function eliminar($id)
	{
		//realizar en el modelo :O
		$this->db->delete('usuario', array('id' => $id));

		$data['usuarios'] = $this->usuario_model->obtenerUsuarios();

		$previous = $_SERVER['HTTP_REFERER'];
		redirect($previous);

		//$this->load->view('layout/header');
		//$this->load->view('layout/navbar');
		//$this->load->view('usuario/index', $data);
		//$this->load->view('layout/footer');
	}
}
