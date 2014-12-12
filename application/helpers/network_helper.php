<?php
function getSetting($name, $section = null) {
	if(is_null($section)) {
		$ini_array = parse_ini_file("config.ini.php");
		return $ini_array[$name];
	}
	else {
		$ini_array = parse_ini_file("config.ini.php", true);
		return $ini_array[$section][$name];
	}
}
function getWAN($addr = null) {
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
?>