<?php

class Network extends CI_Controller {

		public function index()
		{
			$data['IP'] = $_SERVER['REMOTE_ADDR'];
			$data['title'] = "Network Overview";
 			$this->load->database();

			$this->load->library('javascript');
			$this->load->library('networking');
			$this->load->view('header', $data);
			$this->load->view('network/main', $data);
		}
		public function ping($dstIP = null)
		{
			$data['title'] = "Network Overview";
			$this->load->library('networking');
			if(isset($dstIP)) {
				$cmd['output'] = $this->networking->ping($dstIP);
				$data['IP'] = $dstIP;
				$this->load->view('header',$data);
				$this->load->view('network/ping', $cmd);
			}
			else
			{
				echo "we need an IP to ping yo";
			}

		}
		public function arping($dstMAC)
		{
			$data['title'] = "Network Overview";
			$this->load->library('networking');
			if(isset($dstMAC)) {
				$cmd['output'] = $this->networking->arping($dstMAC);
				$data['IP'] = $dstMAC;
				$this->load->view('header', $data);
				$this->load->view('network/ping', $cmd);
			}
			else
			{
				echo "we need an IP to ping yo";
			}
		}
		public function routing()
		{
			$data['title'] = "Network Overview";
			$this->load->library('networking');
			$cmd['output'] = $this->networking->getRoutes();
			$this->load->view('header', $data);
			$this->load->view('network/routing', $cmd);
		}
		public function arp()
		{
			$data['title'] = "Network Overview";
			$this->load->library('networking');
			$cmd['output'] = $this->networking->getARP();
			$this->load->view('header', $data);
			$this->load->view('network/routing', $cmd);
		}
}
?>