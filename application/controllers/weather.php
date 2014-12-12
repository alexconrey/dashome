<?php 
class Weather extends CI_Controller { 
	public function index()
	{
		$this->load->view('weather');
	}
}
?>