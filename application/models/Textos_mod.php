<?Php
class Textos_mod extends CI_Model {
	public function __construct(){
			parent::__construct();
	}
	
	public function getTextos($idRelacion){
		#$this -> db -> select("ps.apartado_slide_id, ps.imagen");
		$this -> db -> from("apartado_textos AS ps");
		$this -> db -> join("rel_seccion_apartado AS rsa","rsa.relacion_id=ps.relacion_id","inner");
		$this -> db -> where("rsa.relacion_id",$idRelacion);
		$query = $this->db->get();
		
        if($query->num_rows() > 0 ){
			return $query->result();
        }
	}
}
