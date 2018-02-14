<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informe extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('informe/index');
		$this->load->view('layout/footer');
	}
}
