<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloques_lib{

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
		$this->CI =& get_instance();
	}
		
	public function iniArmadoPlano($idRelacion,$SeccionTipo){
		#die("Dentro Plano");
		$data["dataDesple"]= "";
		
		$this->CI->load->model('Bloques_mod');
				$data["dataDesple"].= '<div class="row">';
				$data["dataDesple"].= '	<div class="container">';
				$data["dataDesple"].= '		<div class="inEspacios" id="seccionID_'.$idRelacion.'" style="margin:0px 80px;">';
				
		$listSecciones= $this->CI->Bloques_mod->getBloques($idRelacion);
		foreach($listSecciones as $listSeccione){
			if($listSeccione->link != ''){
				if(strpos($listSeccione->link,"http://")){
					$elLink= $listSeccione->link;
				}
				else{
					$elLink= base_url().$listSeccione->link;
				}
			}
			else{
				$elLink= "JavaScript:;";
			}
					$data["dataDesple"].=		'<div class="col-md-3 col-sm-3 col-xs-12">';
						$data["dataDesple"].=		'<a href="'.$elLink.'"><div align="center"><img src="'.base_url().'admin/assets/images/slides/'.$listSeccione->imagen.'" /></div>';
							$data["dataDesple"].=		'<div align="center"><h2>'.$listSeccione->titulo.'</h2></div>';
							$data["dataDesple"].=		'<p>'.$listSeccione->texto.'</p>';
						$data["dataDesple"].=		'</a>';
					$data["dataDesple"].=		'</div>';
		}
				$data["dataDesple"].= '		</div>';
				$data["dataDesple"].= '	</div>';
				$data["dataDesple"].= '</div>';
		
		switch(count($listSecciones)){
			case 1:
				$marginProm_767= "1";
				$marginProm_768= "38";
				$marginProm_992= "38";
			break;
			case 2:
				$marginProm_767= "1";
				$marginProm_768= "12";
				$marginProm_992= "12";
			break;
			case 3:
				$marginProm_767= "1";
				$marginProm_768= "2";
				$marginProm_992= "4";
			break;
			case 4:
				$marginProm_767= "1";
				$marginProm_768= "0";
				$marginProm_992= "0";
			break;
		}
				$data["arrStyle"]= '
					<style>@media (max-width: 767px) {
						#seccionID_'.$idRelacion.' img{ width: 75%; padding-bottom: 10px; }
						#seccionID_'.$idRelacion.' div{ margin:10px '.$marginProm_767.'%; }
						#seccionID_'.$idRelacion.' p{ padding:0px 10px; }
					}
					@media (min-width: 768px) {
						#seccionID_'.$idRelacion.' img{ width: 55%; padding-bottom: 10px; }
						#seccionID_'.$idRelacion.' div{ margin:0px '.$marginProm_768.'%; }
						#seccionID_'.$idRelacion.' p{ padding:0px 20px; }
					}
					@media (min-width: 1285px) {
						#seccionID_'.$idRelacion.' img{ width: 45%; padding-bottom: 10px; }
						#seccionID_'.$idRelacion.' div{ margin:0px '.$marginProm_992.'%; }
						#seccionID_'.$idRelacion.' p{ padding:0px 35px; }
					}
					</style>
				';
		
		return $data["dataDesple"].$data["arrStyle"];
	}
		
	public function iniArmadoSlide($idRelacion,$SeccionTipo){
		#die("Dentro Slide");
		$data["dataDesple"]= "";
		
		$this->CI->load->model('Bloques_mod');
				$data["dataDesple"].= '<div class="row">';
				$data["dataDesple"].= '		<div class="container">';
				$data["dataDesple"].= '			<div class="inEspacios" id="seccionID_'.$idRelacion.'" style="margin:0px 10px;">';
				
		$listSecciones= $this->CI->Bloques_mod->getBloques($idRelacion);
		#print_r($listSecciones);
		foreach($listSecciones as $listSeccione){
			if($listSeccione->link != ''){
				$pos= strpos($listSeccione->link,"http://");
				if($pos !== false){
					$respIn= $listSeccione->link;
				}
				else{
					$respIn= base_url().$listSeccione->link;
				}
			}else{
				$respIn= "JavaScript:;";
			}
					$data["dataDesple"].= '<div class="col-md-3 col-sm-3 col-xs-12 outerDiv"  style="margin-bottom:20px;">';
					$data["dataDesple"].= '		<div class="divExterior" onclick="ira(\''.$respIn.'\');" style="background-image:url('.base_url().'admin/assets/images/slides/'.$listSeccione->imagen.')">';
					$data["dataDesple"].= '			<div style="opacity: 1;" class="divInterior">';
					$data["dataDesple"].= '				<h2>'.$listSeccione->titulo.'</h2>';
					$data["dataDesple"].= '				<div class="txtContenedor">'.$listSeccione->texto;
					if($listSeccione->link != ''){
						$data["dataDesple"].= '			<p class="fdw-port"><a href="'.base_url().$listSeccione->link.'">Ver más ...</a></p>';
					}
					$data["dataDesple"].= '				</div>';
					$data["dataDesple"].= '			</div>';
					$data["dataDesple"].= '		</div>';
					$data["dataDesple"].= '</div>';
		}
				$data["dataDesple"].= '			</div>';
				$data["dataDesple"].= '		</div>';
				$data["dataDesple"].= '</div><p>&nbsp;</p>';
		
		switch(count($listSecciones)){
			case 1:
				$marginProm_767= "0";
				$marginProm_768= "38";
				$marginProm_992= "38";
			break;
			case 2:
				$marginProm_767= "0";
				$marginProm_768= "12";
				$marginProm_992= "12";
			break;
			case 3:
				$marginProm_767= "0";
				$marginProm_768= "27";
				$marginProm_992= "4";
			break;
			case 4:
				$marginProm_767= "0";
				$marginProm_768= "0";
				$marginProm_992= "0";
			break;
			
			default:
				$marginProm_767= "0";
				$marginProm_768= "0";
				$marginProm_992= "0";
			break;
		}
				$data["arrStyle"]= '
					<style>@media (max-width: 767px) {
						#seccionID_'.$idRelacion.' div.outerDiv{ margin:10px '.$marginProm_767.'%; }
					}
					@media (min-width: 768px) {
						#seccionID_'.$idRelacion.' div.outerDiv{ margin:0px '.$marginProm_768.'%; }
					}
					@media (min-width: 992px) {
						#seccionID_'.$idRelacion.' div.outerDiv{ margin:0px '.$marginProm_992.'%; padding:5px; }
					}
					</style>
				';
		
		return $data["dataDesple"].$data["arrStyle"];
	}
}
