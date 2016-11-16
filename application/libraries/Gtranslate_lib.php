<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gtranslate_lib {

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
				
				$data["dataDesple"].= '		<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="background:#EEE; padding:10px 15px;">';
				$data["dataDesple"].= '			<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: \'es\', includedLanguages: \'ar,ca,cy,de,el,en,es,fr,it,ja,ko,no,pt,ru,th,tr,zh-CN,zh-TW\', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, gaTrack: true, gaId: \'UA-79245357-1\'}, \'google_translate_element\');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>';
				$data["dataDesple"].= '		</div>';
				
				$data["dataDesple"].= '	</div>';
				$data["dataDesple"].= '</div>';

		return $data["dataDesple"];
	}
}
