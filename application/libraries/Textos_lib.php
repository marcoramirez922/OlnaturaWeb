<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class textos_lib {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>0
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		$this->CI =& get_instance();
	}
		
	public function iniArmado($idRelacion,$SeccionTipo){
		$data["dataDesple"]= "";
		
		$this->CI->load->model('Textos_mod');
		$listSecciones= $this->CI->Textos_mod->getTextos($idRelacion);
				$data["dataDesple"].= '<div class="row">';
				$data["dataDesple"].= '	<div class="container">';
				$data["dataDesple"].= '		<div class="inEspacios" id="seccionID_'.$idRelacion.'">';
				$data["dataDesple"].= 			$listSecciones[0]->texto;
				$data["dataDesple"].= '		</div>';
				$data["dataDesple"].= '	</div>';
				$data["dataDesple"].= '</div>';

		return $data["dataDesple"];
	}
}
