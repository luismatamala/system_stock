<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function crearUsuario($data)
	{
		$this->db->insert('usuario', array('nombre' => $data['nombre'], 'apellido' => $data['apellido'], 'nombre_usuario' => $data['nombre_usuario'], 'password' => $data['password'], 'tipo_usuario' => $data['tipo_usuario'], 'fecha_creacion' => $data['fecha_creacion']));
	}

	function obtenerUsuarios()
	{
		$query = $this->db->get('usuario');

		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			return false;
		}
	}
}