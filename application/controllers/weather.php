<?php 
class Weather extends CI_Controller { 
	public function index()
	{
		$data['title'] = "Weather Conditions";
		$this->load->library('networking');
		$this->load->view('header', $data);
		$this->load->view('weather/main');
	}
}
?>