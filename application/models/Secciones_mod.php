<?Php
class Secciones_mod extends CI_Model {
	public function __construct(){
			parent::__construct();
	}
	
	public function getSecciones($padre){
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
		$this -> db -> select("sc.seccion_id, sc.imagen, sc.cat_seccion_tipo_id, rsa.relacion_id");
		$this -> db -> from("secciones AS sc");
		$this -> db -> join("rel_seccion_apartado AS rsa","rsa.seccion_id=sc.seccion_id",'inner');
		$this -> db -> join("menus AS mn","mn.menu_id=sc.menu_id",'inner');
		$this -> db -> where("mn.link",$padre);
		$this -> db -> where("sc.activo","1");
		$this -> db -> order_by("sc.orden");
		$query = $this->db->get();
		
        if($query->num_rows() > 0 ){
			return $query->result();
        }
	}
}
