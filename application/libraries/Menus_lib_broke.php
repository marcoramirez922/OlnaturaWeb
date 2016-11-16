<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_lib {

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
	public function iniArmado($dataMenus,$datanmcontroller){
		$data["menuDesple"]= "";
		$data["menuDesple"].= '<div class="menu_bar">';
		$data["menuDesple"].= '		<a href="JavaScript:;" class="bt-menu"><span class="icon-list2"></span>Menu</a>';
		$data["menuDesple"].= '</div>';
		$data["menuDesple"].= '<nav>';
		$data["menuDesple"].= '		<ul>';
			if($dataMenus != "err"){
				$arrResp= $this->orderMenus($dataMenus);
				foreach($arrResp[0] as $menu){ 
					$data["menuDesple"].= $this->arrMenus($menu,$arrResp,$datanmcontroller,$menu["link"]."/content/");
				}
			}else{
				$data["menuDesple"].= '<li><a href="JavaScript:;">Sin menús</a></li>';
			}
		$data["menuDesple"].= '		</ul>';
		$data["menuDesple"].= '</nav>';
		
		return $data["menuDesple"];
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
			$respReturn.='<li class="submenu">';
              $respReturn.='<a href="'.base_url().'index.php/'.$linkBase.$arrEntrada["link"].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$arrEntrada["menu"].' <span class="caret"></span></a>
              <ul class="children">';
			  
			  	foreach($arrHijo[$arrEntrada["menu_id"]] as $mnHijo){
              		$respReturn.= $this->arrMenus($mnHijo,$arrHijo,$mnActivo,$mnPadre);
				}
              $respReturn.='</ul>
            </li>';
		}
		else{
			$respReturn.='<li class="'.$active.'"><a href="'.base_url()."index.php/".$linkBase.$arrEntrada["link"].'">'.$arrEntrada["menu"].'</a></li>';
		}
		return $respReturn;
	}
}
