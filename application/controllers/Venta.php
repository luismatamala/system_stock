<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

		public function index()
		{
			$this->load->view('layout/header');
			$this->load->view('layout/navbar');
			$this->load->view('venta/index');
			$this->load->view('layout/footer');
		}
}
