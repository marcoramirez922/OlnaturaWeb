<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slides_lib {

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
		
	public function iniArmado($idRelacion,$SeccionTipo){
		$data["dataDesple"]= "";
		$pasoPar= $respJquery= "";
		#echo $idRelacion.",".$SeccionTipo;
		
		$this->CI->load->model('Slides_mod');
		$listSecciones= $this->CI->Slides_mod->getSlides($idRelacion);
		#print_r($listSecciones)."<---";
		if(count($listSecciones) != 0){
			if(count($listSecciones) == 1){
				if($listSecciones[0]->link != ''){
					$elLink= base_url().$listSecciones[0]->link;
				}
				else{
					$elLink= "JavaScript:;";
				}
				
				$data["dataDesple"].= '<a href="'.$elLink.'"><img src="'.base_url().'admin/assets/images/slides/'.$listSecciones[0]->imagen.'" width="100%"></a>';
			}
			else{
				foreach($listSecciones as $listSeccion){
					if($listSeccion->link != ''){
						$elLink= base_url().$listSeccion->link;
					}
					else{
						$elLink= "JavaScript:;";
					}
					
					if($pasoPar != $idRelacion){
						if($SeccionTipo != 1){
							$data["dataDesple"].= '<div class="inEspacios" id="seccionID_'.$idRelacion.'">';
						}
						$data["dataDesple"].= '<ul id="slide_'.$idRelacion.'">';
						$pasoPar= $idRelacion;
					}
					$data["dataDesple"].= '
					<li>
						<a href="'.$elLink.'">
							<img src="'.base_url().'admin/assets/images/slides/'.$listSeccion->imagen.'">
						</a>
					</li>';
					if($pasoPar != $idRelacion){
						$data["dataDesple"].= '   </ul>';
						if($SeccionTipo != 1){
							$data["dataDesple"].= '</div>';
						}
					}
					#echo $data["dataDesple"]; exit;
				}
				$data["dataDesple"].= '   </ul>';
				if($SeccionTipo != 1){
							$data["dataDesple"].= '</div>';
						}
				$data["dataDesple"].= '<!-- #slide_'.$idRelacion.' -->';
			}
		}
		else{
			$data["dataDesple"]= "";
		}
		return $data["dataDesple"];
	}
		
	public function orderMenus($arrMenus){
		#print_r($arrMenus); echo "<br />--------------------------------------<br />";
		
		foreach($arrMenus as $arrMenu){
				#$menuArmado[$arrMenu->padre][$arrMenu->menu_id]["menu_id"]=$arrMenu->menu_id;
				$menuArmado[$arrMenu->padre][$arrMenu->menu_id]["menu_id"]=$arrMenu->menu_id;
				$menuArmado[$arrMenu->padre][$arrMenu->menu_id]["link"]=$arrMenu->link;
				$menuArmado[$arrMenu->padre][$arrMenu->menu_id]["padre"]=$arrMenu->padre;
				$menuArmado[$arrMenu->padre][$arrMenu->menu_id]["menu"]=$arrMenu->menu;
		}
		#print_r($menuArmado);
		return $menuArmado;
	}
	
	public function arrMenus($arrEntrada,$arrHijo,$mnActivo,$mnPadre){ // arrMenus(Busca padres con Ceros,Busca interiores,poner el link)
		$respReturn="";
		$active="";
		if($mnPadre == "/content/"){
			$mnPadre= "inicio/content/";
		}
		if($arrEntrada["padre"] == 0){
			$linkBase= "";
		}
		else{
			$linkBase= $mnPadre;
		}
		if($arrEntrada["link"] == $mnActivo) $active="active";
		if(isset($arrHijo[$arrEntrada["menu_id"]]) && is_array($arrHijo[$arrEntrada["menu_id"]])){
			$respReturn.='<li class="dropdown '.$active.'">';
              $respReturn.='<a href="'.base_url().$linkBase.$arrEntrada["link"].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$arrEntrada["menu"].' <span class="caret"></span></a>
              <ul class="dropdown-menu">';
			  
			  	foreach($arrHijo[$arrEntrada["menu_id"]] as $mnHijo){
              		$respReturn.= $this->arrMenus($mnHijo,$arrHijo,$mnActivo,$mnPadre);
				}
              $respReturn.='</ul>
            </li>';
		}
		else{
			$respReturn.='<li class="'.$active.'"><a href="'.base_url().$linkBase.$arrEntrada["link"].'">'.$arrEntrada["menu"].'</a></li>';
		}
		return $respReturn;
	}
}
