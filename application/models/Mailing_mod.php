<?Php
class Mailing_mod extends CI_Model {
			
	public function __construct(){
			parent::__construct();
	}
	
	public function setContacto($data){
		$resp= $this->db->insert('mailing', $data);
		if($resp){
			$respu= "ok";			
		}else{
			$respu= "err";
		}
		return $respu;
	}
}