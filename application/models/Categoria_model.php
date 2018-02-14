<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function crearCategoria($data)
	{
		$this->db->insert('categoria', array('nombre' => $data['nombre'], 'descripcion' => $data['descripcion'], 'fecha_creacion' => $data['fecha_creacion']));
	}

	function obtenerCategorias()
	{
		$query = $this->db->get('categoria');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			return false;
		}
	}
}