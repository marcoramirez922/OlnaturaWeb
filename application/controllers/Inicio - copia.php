<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
		$this->load->library('Secciones_lib');
		$this->load->library('Slides_lib');
		$this->load->library('Bloques_lib');
		$this->load->library('Textos_lib');
		
		#$data["catFooter"]= $this->Menus_mod->aqui();
	}
	
	public function index($content=""){
		$data["titulo"]= "Bienvenido";
		$data["nmcontroller"]= $data["arrStyle"]= "";
		$info["Concentrador"]="";
		$arrSlideShort=array();
		
		$data["Menus"]= $this->Menus_mod->getMenus();
		$data["MenusPropiedad"]= $this->Menus_mod->getMenusPropiedades($data["nmcontroller"]);
		//print_r();
		/***** Menus Navegación ->  Inicia *****/
		$data["menuDesple"]= $this->menus_lib->iniArmado($data["Menus"], $data["nmcontroller"]);
		/***** Menus Navegación ->  Termina *****/
		
		/***** Listado Secciones ->  Inicia *****/
		$data["listSecciones"]= $this->secciones_lib->iniSecciones($data["nmcontroller"]);
		$cnt=0;
		#print_r($data["listSecciones"]); exit;
		foreach($data["listSecciones"] as $seccIndi){
			$data["seccIndi"]["seccion_id"]		[$cnt]= $seccIndi->seccion_id;
			$data["seccIndi"]["imagen"]			[$cnt]= $seccIndi->imagen;
			$data["seccIndi"]["cat_seccion_tipo_id"]	[$cnt]= $seccIndi->cat_seccion_tipo_id;
			$data["seccIndi"]["relacion_id"]	[$cnt++]= $seccIndi->relacion_id;
		}
		#print_r($data["seccIndi"]["cat_seccion_tipo_id"]); exit;
		$data["loadLibrary"]= array_unique($data["seccIndi"]["cat_seccion_tipo_id"]);
		sort($data["loadLibrary"]);
		/***** Listado Secciones ->  Termina *****/
		#print_r($data["loadLibrary"]); exit;
		/***** Informacion Secciones ->  Inicia *****/
		foreach($data["seccIndi"]["relacion_id"] as $key => $relacID){
			#echo $data["seccIndi"]["cat_seccion_tipo_id"][$key]."<br />";
			
			///->Slide Full
			if($data["seccIndi"]["cat_seccion_tipo_id"][$key] == 1){
				$info["arrjQuery"]= '#slide_'.$relacID;
				$info["Concentrador"].= $this->slides_lib->iniArmado($relacID,$data["seccIndi"]["cat_seccion_tipo_id"][$key]);
			}
			
			///->Slide Corto
			if($data["seccIndi"]["cat_seccion_tipo_id"][$key] == 2){
				$data["arrStyle"].= '#seccionID_'.$relacID.' div.sy-slides-crop{	background:url(../admin/assets/images/slides/'.$data["seccIndi"]["imagen"][$key].');background-size:cover; }';
				$info["Concentrador"].= $this->slides_lib->iniArmado($relacID,$data["seccIndi"]["cat_seccion_tipo_id"][$key]);
				$info["arrSlideShort"][]= '#slide_'.$relacID;
			}
			
			///->Bloque plano
			if($data["seccIndi"]["cat_seccion_tipo_id"][$key] == 3){
				$info["Concentrador"].= $this->bloques_lib->iniArmadoPlano($relacID,$data["seccIndi"]["cat_seccion_tipo_id"][$key]);
			}
			
			///->Bloque C/Slide
			if($data["seccIndi"]["cat_seccion_tipo_id"][$key] == 4){
				#die("Dentro 4");
				$info["Concentrador"].= $this->bloques_lib->iniArmadoSlide($relacID,$data["seccIndi"]["cat_seccion_tipo_id"][$key]);
			}
			
			///->Texto
			if($data["seccIndi"]["cat_seccion_tipo_id"][$key] == 5){
				$info["Concentrador"].= $this->textos_lib->iniArmado($relacID,$data["seccIndi"]["cat_seccion_tipo_id"][$key]);
			}
		}
		/***** Informacion Secciones ->  Termina *****/
		
		$this->load->view('templates/header',$data);
		$this->load->view('inicio',$info);
		$this->load->view('templates/footer');
	}
	
	public function content($content=""){
		$data["titulo"]= "Bienvenido";
		$data["nmcontroller"]= $data["arrStyle"]= "";
		$info["Concentrador"]="";
		$arrSlideShort=array();
		
		$data["Menus"]= $this->Menus_mod->getMenus();
		$data["MenusPropiedad"]= $this->Menus_mod->getMenusPropiedades($data["nmcontroller"]);
		//print_r();
		/***** Menus Navegación ->  Inicia *****/
		$data["menuDesple"]= $this->menus_lib->iniArmado($data["Menus"], $data["nmcontroller"]);
		/***** Menus Navegación ->  Termina *****/
		
		/***** Listado Secciones ->  Inicia *****/
		$data["listSecciones"]= $this->secciones_lib->iniSecciones($data["nmcontroller"]);
		$cnt=0;
		#print_r($data["listSecciones"]); exit;
		foreach($data["listSecciones"] as $seccIndi){
			$data["seccIndi"]["seccion_id"]		[$cnt]= $seccIndi->seccion_id;
			$data["seccIndi"]["imagen"]			[$cnt]= $seccIndi->imagen;
			$data["seccIndi"]["cat_seccion_tipo_id"]	[$cnt]= $seccIndi->cat_seccion_tipo_id;
			$data["seccIndi"]["relacion_id"]	[$cnt++]= $seccIndi->relacion_id;
		}
		#print_r($data["seccIndi"]["cat_seccion_tipo_id"]); exit;
		$data["loadLibrary"]= array_unique($data["seccIndi"]["cat_seccion_tipo_id"]);
		sort($data["loadLibrary"]);
		/***** Listado Secciones ->  Termina *****/
		#print_r($data["loadLibrary"]); exit;
		/***** Informacion Secciones ->  Inicia *****/
		foreach($data["seccIndi"]["relacion_id"] as $key => $relacID){
			#echo $data["seccIndi"]["cat_seccion_tipo_id"][$key]."<br />";
			
			///->Slide Full
			if($data["seccIndi"]["cat_seccion_tipo_id"][$key] == 1){
				$info["arrjQuery"]= '#slide_'.$relacID;
				$info["Concentrador"].= $this->slides_lib->iniArmado($relacID,$data["seccIndi"]["cat_seccion_tipo_id"][$key]);
			}
		}
		/***** Informacion Secciones ->  Termina *****/
		
		$info["contenidoHtml"]= $this->Menus_mod->getMenuInt($content);
		
		$this->load->view('templates/header',$data);
		$this->load->view('inicio',$info);
		$this->load->view('templates/footer');
	}
}
