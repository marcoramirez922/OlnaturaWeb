<?Php
class Rastreo_mod extends CI_Model {
			
	public function __construct(){
			parent::__construct();
	}
	
	public function setAcceso($fechaHoy){
		$this -> db -> from("rastreo_accesos AS ra");
		$this -> db -> where("ra.fecha",$fechaHoy);
		$query = $this->db->get();
		if($query->num_rows() > 0 ){
			$resp= $query->result();
			$data = array(
				"contador"  => $resp[0]->contador + 1
			);
			$this->db->where('fecha' , $fechaHoy);
			$resp= $this->db->update('rastreo_accesos', $data);
        }
		else{
			$data = array(
				"fecha" => $fechaHoy,
				"contador"  => 1
			);
			$resp= $this->db->insert('rastreo_accesos', $data);
		}
	}
}