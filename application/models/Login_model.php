<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user_data($usuario)
	{
		$query = $this->db->get_where('usuario', array('nombre_usuario' => $usuario));

		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
	}
}