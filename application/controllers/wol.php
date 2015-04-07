<?php 

class WOL extends CI_Controller { 

	public function index()
	{	
		$this->load->database();
		$this->load->library('networking');

		$this->load->view('header');

		$query = "SELECT * FROM hosts";

		$result = $this->db->query($query);
		$data = array();
		if($result->num_rows() > 0 ) {
			foreach($result->result() as $row)
			{
				$data['hostname'][] = $row->hostname;
				$data['ip'][] = $row->ip;
				$data['mac'][] = $row->mac;
			}
		}
		$this->load->view('wol',$data);
	}
	public function add($hostname, $ip, $mac = '00:00:00:00:00:00')
	{
		$this->load->database();
		$query = "INSERT INTO network (hostname, ip, mac) VALUES (".$this->db->escape($hostname).",".$this->db->escape($ip).",".$this->db->escape($mac).")";

		$this->db->query($query);

		$this->index();
	}
	public function wakeup($mac = null)
	{
		if(isset($_POST['wol_list']))
		{
			foreach($_POST['wol_list'] as $macaddr)
			{
				$rtn = "<pre>";
				$output = shell_exec('wakeonlan '.$macaddr);
				$rtn .= $output;
				$rtn .= "</pre>";
			}
		} else {
		 	$rtn = "<pre>";
			$output = shell_exec('wakeonlan '.$mac);
			$rtn .= $output;
			$rtn .= "</pre>";
		}

		return $rtn;
	}
}
?>