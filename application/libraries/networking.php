<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Networking {
		public function getLAN() {
			echo $_SERVER['REMOTE_ADDR'];
		}
		public function getWAN($addr = null) {
			$rtn = '';
			if(!(getSetting('ip'))) {
				$tmpopen = fopen($this->config->base_url() .'/application/config/config.ini.php', 'a');
				$curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_HEADER => 0,
				    CURLOPT_URL => 'http://ipecho.net/plain'
				));
				$run = curl_exec($curl);
				if($run) {
					$data = 'ip = ' . $run;
					fwrite($tmpopen, $data);
				}
				fclose($tmpopen);
				
			}
			else {
				$rtn = getSetting('ip');		
			}
			/*else if(getSetting('ip') == 'dynamic') {
				$curl = curl_init();
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_HEADER => 0,
				    CURLOPT_URL => 'http://ipecho.net/plain'
				));
				$run = curl_exec($curl);
				if($run) {
					$fp = fopen('wan_ip', 'w');
					fwrite($fp, $run);
				} else {
					$fp = fopen('wan_ip', 'w');
					fwrite($fp, 'Error');
				}
				fclose($fp);
				getWAN();
			}*/
			return $rtn;
		}
	public function ping($dstIP) {
		$rtn = "<pre>";
		$output = shell_exec('ping -c 3 '.$dstIP);
		$rtn .= $output;
		$rtn .= "</pre>";
		return $rtn;
	}
	public function arping($dstIP) {
		$rtn = "<pre>";
		$output = shell_exec('arping -c 3 '.$dstIP);
		$rtn .= $output;
		$rtn .= "</pre>";
		return $rtn;
	}
	public function getRoutes() {
		$rtn = "<pre>".shell_exec('/sbin/route -n')."</pre>";
		return $rtn;
	}
	public function getARP() {
		$rtn = "<pre>".shell_exec('/usr/sbin/arp -a')."</pre>";
		return $rtn;
	}
}
?>