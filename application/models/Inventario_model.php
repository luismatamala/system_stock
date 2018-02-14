<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function crearProducto($data)
	{
		$this->db->insert('producto', array('codigo' => $data['codigo'], 'nombre' => $data['nombre'], 'precio' => $data['precio'], 'stock' => $data['stock'], 'fecha_creacion' => $data['fecha_creacion'], 'id_categoria' => $data['id_categoria']));
	}

	function obtenerProductos()
	{
		//$query = $this->db->get('producto');
		$this->db->select('producto.id, producto.codigo, producto.nombre as nombrep, producto.precio, producto.stock ,producto.fecha_creacion, categoria.nombre as nombrec');
		$this->db->from('producto');
		$this->db->join('categoria', 'producto.id_categoria = categoria.id');
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			return false;
		}
	}

	function getProducto($id)
	{
		//$query = $this->db->get('producto', array('id' => $id));
		$query = $this->db->get_where('producto', array('id' => $id));

		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
}