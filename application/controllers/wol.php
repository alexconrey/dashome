<?php 

class WOL extends CI_Controller { 

	public function index()
	{	
		$this->load->database();
		$query = "SELECT * FROM network";

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
}
?>