<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class facebook_lib {

	/** ---> Maira de cuentas por cobrar, que le enviaste un correo y que tenia dudas...
	 *
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
		
				$data["dataDesple"].= '<div class="row">';
				$data["dataDesple"].= '	<div class="container" id="seccionID_'.$idRelacion.'">';
				
				$data["dataDesple"].= '		<div class="col-md-6 col-sm-6 col-xs-12" align="center">';
				$data["dataDesple"].= '			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FOlnatura.Laboratorios%2F&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=554871494707320" width="400" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="1" allowTransparency="true"></iframe>';
				$data["dataDesple"].= '		</div>';
				$data["dataDesple"].= '		<div class="col-md-3 col-sm-3 col-xs-12" align="center">';
				$data["dataDesple"].= '			<a class="twitter-timeline" data-width="500" data-height="500" href="https://twitter.com/OlnaturaLab">Tweets by OlnaturaLab</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
				$data["dataDesple"].= '		</div>';
				
				$data["dataDesple"].= '	</div>';
				$data["dataDesple"].= '</div>';

		return $data["dataDesple"];
	}
}
