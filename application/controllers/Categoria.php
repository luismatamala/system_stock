<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('categoria_model');
	}
	public function index()
	{
		$data['categorias'] = $this->categoria_model->obtenerCategorias();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('categoria/index', $data);
		$this->load->view('layout/footer');
	}

	public function registrar()
	{
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'descripcion' => $this->input->post('descripcion'),
			'fecha_creacion' => date("Y-m-d H:i:s")
		);

		$this->categoria_model->crearCategoria($data);
		$data['categorias'] = $this->categoria_model->obtenerCategorias();

		$previous = $_SERVER['HTTP_REFERER'];
		redirect($previous);
	}

	public function eliminar($id)
	{
		//realizar en el modelo :O
		$this->db->delete('categoria', array('id' => $id));

		$data['categorias'] = $this->categoria_model->obtenerCategorias();
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('categoria/index', $data);
		$this->load->view('layout/footer');
	}
}
?>

