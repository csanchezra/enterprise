<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('verifica_sesion_redirige')){
	function verifica_sesion_redirige($contexto) {
		if ($contexto->session->userdata('logged_in')) {
			return TRUE;

		}
		else {
			// code
				redirect("/", "refresh");

		}
	}
}

?>
