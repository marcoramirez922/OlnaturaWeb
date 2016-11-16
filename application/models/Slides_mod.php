<?Php
class Slides_mod extends CI_Model {
	public function __construct(){
			parent::__construct();
	}
	
	public function getSlides($idRelacion){
		/*
		SELECT 
			sc.*
		FROM secciones AS sc
		INNER JOIN menus AS mn ON mn.menu_id=sc.menu_id
		WHERE 
			mn.link=''
			AND sc.activo=1
		ORDER BY orden
		*/
		
		$this -> db -> select("ps.apartado_slide_id, ps.imagen, ps.link");
		$this -> db -> from("apartado_slides AS ps");
		$this -> db -> join("rel_seccion_apartado AS rsa","rsa.relacion_id=ps.relacion_id","inner");
		$this -> db -> where("rsa.relacion_id",$idRelacion);
		$this -> db -> where("ps.activo","1");
		$this -> db -> order_by("ps.orden");
		$query = $this->db->get();
		
        if($query->num_rows() > 0 ){
			return $query->result();
        }
	}
}
