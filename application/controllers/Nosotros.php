<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

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
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
	
		$this->load->model('Menus_mod');
		$this->load->library('Menus_lib');
	}
	
	private function Rastreo(){
		$this->load->model('Rastreo_mod');
		$fechaHoy= date("Y-m-d");
		#var_dump($this->session->userdata('rastreado'));
		if($this->session->userdata('rastreado') == null){
			$this->session->set_userdata('rastreado', $fechaHoy."___".rand(10,999999));
			
			$this->Rastreo_mod->setAcceso($fechaHoy);
			#echo "Nuevo rastreo";
		}
		else{
			list($fecha, $rand)= explode("___",$this->session->userdata('rastreado'));
			if($fecha != date("Y-m-d")){
				$this->session->set_userdata('rastreado', date("Y-m-d")."___".rand(10,999999));
				$this->Rastreo_mod->setAcceso($fechaHoy);
					#echo "Nuevo rastreo";
			}
			else{
				#No aumenta hasta el día siguiente
			}
		}
	}
	
	public function index(){
		$this->Rastreo();
		$data["titulo"]= "Nosotros";
		$data["nmcontroller"]= "nosotros";
		
		$data["Menus"]= $this->Menus_mod->getMenus();
		$data["MenusPropiedad"]= $this->Menus_mod->getMenusPropiedades($data["nmcontroller"]);
		
		$data["menuDesple"]= $this->menus_lib->iniArmado($data["Menus"], $data["nmcontroller"]);
		
		$this->load->view('templates/header',$data);
		$this->load->view('nosotros');
		$this->load->view('templates/footer');
	}
	
	public function content(){
		$data["titulo"]= "Nosotros";
		$data["nmcontroller"]= "nosotros";
		
		$data["Menus"]= $this->Menus_mod->getMenus();
		$data["MenusPropiedad"]= $this->Menus_mod->getMenusPropiedades($data["nmcontroller"]);
		
		$data["menuDesple"]= $this->menus_lib->iniArmado($data["Menus"], $data["nmcontroller"]);
		
		$this->load->view('templates/header',$data);
		$this->load->view('nosotros');
		$this->load->view('templates/footer');
	}
}
