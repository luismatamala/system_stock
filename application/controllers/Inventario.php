<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('inventario_model');
		$this->load->model('categoria_model');
	}

	public function index()
	{
		$data['productos'] = $this->inventario_model->obtenerProductos();
		$data['categorias'] = $this->categoria_model->obtenerCategorias();

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('inventario/index', $data);
		$this->load->view('layout/footer');
	}

	public function registrar()
	{
		$data = array(
			'codigo' => $this->input->post('codigo'),
			'nombre' => $this->input->post('nombre'),
			'precio' => $this->input->post('precio'),
			'stock' => $this->input->post('stock'),
			'fecha_creacion' => date("Y-m-d H:i:s"),
			'id_categoria' => $this->input->post('id_categoria')
		);

		$this->inventario_model->crearProducto($data);

		$previous = $_SERVER['HTTP_REFERER'];
		redirect($previous);
	}

	public function eliminar($id)
	{
		//realizar en el modelo :P
		$this->db->delete('producto', array('id' => $id));


		$previous = $_SERVER['HTTP_REFERER'];
		redirect($previous);
	}

	public function getproducto($id)
	{
		echo json_encode($this->inventario_model->getProducto($id));
	}
}
?>

