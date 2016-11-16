<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

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
		$this->load->model('Mailing_mod');
		
		$this->load->library('Menus_lib');
		$this->load->library('Secciones_lib');
		$this->load->library('Slides_lib');
		$this->load->library('Bloques_lib');
		$this->load->library('Textos_lib');
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
	
	public function index($content=""){
		$this->Rastreo();
		$data["titulo"]= "Bienvenido";
		$data["nmcontroller"]= $data["arrStyle"]= "contacto";
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
		
		$info["Concentrador"].= '<form id="formcontacto" method="post" action="'.base_url().'index.php/contacto/send">
		<style>
		@media (max-width: 767px) { .form-group{ margin-top:30px; } }
		@media (min-width: 768px) { .form-group{ margin-top:30px; } }
		@media (min-width: 1285px){ .form-group{ margin-top:0px;  } }
		</style>
									<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-12">&nbsp;</div>
									<div class="col-md-6 col-sm-6 col-xs-12">';
		if($content != 'ok'){
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">U. de Negocio *</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<select class="form-control has-feedback-left" id="txtNegocio" name="txtNegocio" placeholder="Unidad de Negocio" required="required">
												<option value="Maquila">Maquila</option>
												<option value="Olnatura" selected="selected">Olnatura</option>
												<option value="Nutrilinea">Nutrilínea</option>
												<option value="Medicamentos">Medicamentos</option>
												<option value="Just For You">Just For You</option>
												<option value="Bolsa de trabajo">Bolsa de trabajo</option>
												<option value="Otro">Otro</option>
											</select>
											<span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">Nombre *</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtNombre" name="txtNombre" placeholder="Nombre" required="required">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
		
		$info["Concentrador"].= '		<div class="form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo *</label>
										<div class="col-md-7 col-sm-7 col-xs-12" style="margin-bottom:10px">
										  <div id="gender" class="btn-group" data-toggle="buttons">
											<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
											  <input type="radio" name="selSexo" required="required" value="1"> &nbsp; Hombre &nbsp;
											</label>
											<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
											  <input type="radio" name="selSexo" required="required" value="0"> &nbsp; Mujer &nbsp;
											</label>
										  </div>
										</div>
									  </div>';
		
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtEdad">Edad *</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<select class="form-control has-feedback-left" id="selEdad" name="selEdad" required="required">
												<option value="18 años - 22 años">18 años - 22 años</option>
												<option value="23 años - 27 años">23 años - 27 años</option>
												<option value="28 años - 32 años">28 años - 32 años</option>
												<option value="32 años - 35 años">32 años - 35 años</option>
												<option value="+36 años">+36 años</option>
											</select>
											<span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
										
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">E-Mail *</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtEmail" name="txtEmail" placeholder="E-Mail" required="required">
											<span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
		
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">Teléfono</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtTelefono" name="txtTelefono" placeholder="(000)000-0000" maxlength="15" required="required">
											<span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
										
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">Ciudad</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtCiudad" name="txtCiudad" placeholder="Ciudad">
											<span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">Asunto *</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtAsunto" name="txtAsunto" placeholder="Asunto" required="required">
											<span class="fa fa-bookmark-o form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
		$info["Concentrador"].= '		<div class="form-group">
										  <label class="control-label col-md-3 col-sm-3 col-xs-3" for="txtTitulo">Mensaje</label>
										  <div class="col-md-7 col-sm-7 col-xs-7 form-group has-feedback">
											<textarea rows="7" type="text" class="form-control has-feedback-left" id="txtMensaje" name="txtMensaje" placeholder="Mensaje"></textarea>
											<span class="fa fa-comments-o form-control-feedback left" aria-hidden="true"></span>
										  </div>
										</div>';
										
		$info["Concentrador"].= '		<div class="col-md-10 col-sm-10 col-xs-12" align="right">';
		$info["Concentrador"].= '			<input type="submit" class="btn btn-primary" name="btnEnviar" value="Enviar">';
		$info["Concentrador"].= '		</div>';
		}
		else{
		$info["Concentrador"].= '		<div class="col-md-10 col-sm-10 col-xs-12" align="center">';
		$info["Concentrador"].= '			<p>&nbsp;</p><p>&nbsp;</p><p>Gracias por tus comentarios,</p> <p>nos pondremos en contacto contigo a la brevedad</p>.';
		$info["Concentrador"].= '		</div>';
		}
		$info["Concentrador"].= '	</div>';
		
		$info["Concentrador"].= '	<div class="col-md-4 col-sm-4 col-xs-12">';
		$info["Concentrador"].= '		<img src="'.base_url().'assets/img/capsulas.jpg" width="65%" />';
		$info["Concentrador"].= '	</div></div>';
		
		
		$info["Concentrador"].= '	<div class="row"><p>&nbsp;</p></div>
									<div class="row">
									<div class="col-md-1 col-sm-1 col-xs-12"><p>&nbsp;</p></div>
									<div class="col-md-7 col-sm-7 col-xs-12">';
									
		$info["Concentrador"].= '	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.3608789200493!2d-99.17000768464325!3d18.91541406191478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce750acd10ec8d%3A0xeda665103c203114!2sOlnatura%2C+S.A.+De+C.V.!5e0!3m2!1ses!2smx!4v1475099792897" width="100%" height="290" frameborder="0" style="border:0" allowfullscreen></iframe>';

		$info["Concentrador"].= '	</div>';
		
		$info["Concentrador"].= '	<div class="col-md-4 col-sm-4 col-xs-12">';
		$info["Concentrador"].= '		<strong>CORPORATIVO</strong><br />';
		$info["Concentrador"].= '		<p>Calle 40 Sur y 9 Este, CIVAC, Jiutepec,';
		$info["Concentrador"].= '		<br />Morelos, México. C.P. 62500.';
		$info["Concentrador"].= '		<br />enrique.cuellar@olnatura.com';
		$info["Concentrador"].= '		<br />+52 (777) 172 3036';
		
		$info["Concentrador"].= '		<br /><br /><strong>DESARROLLO</strong><br />';
		$info["Concentrador"].= '		<p>Calle 9 Este Lote 19, CIVAC, Jiutepec,';
		$info["Concentrador"].= '		<br />Morelos, México. C.P. 62500.';
		$info["Concentrador"].= '		<br />vparra@olnatura.com';
		$info["Concentrador"].= '		<br />+52 (777) 172 3036 y (777) 320 1993';
		
		$info["Concentrador"].= '	</div>
									</div>
									<div class="row"><p>&nbsp;</p></div>
									';
		
		$info["Concentrador"].= '</form>';
		/******** Footer Menus de Categoria -> Inicia ********/
		$foot["catFooter"]= $this->Menus_mod->getMenus("dentro");
		/******** Footer Menus de Categoria -> Termina ********/
		 
		$this->load->view('templates/header',$data);
		$this->load->view('desplegados',$info);
		$this->load->view('templates/footer',$foot);
	}
	
	public function send(){
		#print_r($_POST); exit;
		$data= array(
			"unidad_negocio" => strip_tags($_POST["txtNegocio"]),
			"nombre" => strip_tags($_POST["txtNombre"]),
			"sexo" => strip_tags($_POST["selSexo"]),
			"edad" => strip_tags($_POST["selEdad"]),
			"email" => strip_tags($_POST["txtEmail"]),
			"telefono" => strip_tags($_POST["txtTelefono"]),
			"ciudad" => strip_tags($_POST["txtCiudad"]),
			"asunto" => strip_tags($_POST["txtAsunto"]),
			"mensaje" => strip_tags($_POST["txtMensaje"]),
			"fecha_created" => date("Y-m-d H:i:s")
		);
		$this->Mailing_mod->setContacto($data);
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		$this->email->from('contacto@olnatura.com', 'Laboratorios Olnatura (Web)');
		
		switch($_POST["txtNegocio"]){
			case "Maquila":
				$this->email->to('enrique.cuellar@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
			case "Olnatura":
				$this->email->to('calmeida@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
			case "Nutrilinea":
				$this->email->to('rmartinez@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
			case "Medicamentos":
				$this->email->to('vparra@olnatura.com, enrique.cuellar@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
			case "Just For You":
				$this->email->to('enrique.quellar@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
			case "Bolsa de trabajo":
				$this->email->to('recursos@olnatura.com, oscar.millan@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
			case "Otro":
				$this->email->to('enrique.quellar@olnatura.com');
				$this->email->bcc('webmaster@olnatura.com, marco.ramirez@olnatura.com');
			break;
		}
		$this->email->subject($_POST["txtAsunto"].' :: Olnatura Web');
		$this->email->message('<table width="100%" border="0" cellspacing="0" cellpadding="10"><thead><tr><td height="45" colspan="2">Unidad de Negocio: '.$_POST["txtNegocio"].'</td></tr></thead><tbody><tr><td height="45">Nombre: '.$_POST["txtNombre"].'</td><td>E-Mail: '.$_POST["txtEmail"].'</td></tr><tr><td height="45">Ciudad: '.$_POST["txtCiudad"].'</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td height="45" colspan="2">Asunto: '.$_POST["txtAsunto"].'</td></tr><tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2">Mensaje: '.$_POST["txtMensaje"].'</td></tr></tbody></table>');
		
		$this->email->send();
		redirect(base_url()."index.php/contacto/index/ok");
	}
}
