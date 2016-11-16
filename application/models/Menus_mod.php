<?Php
class Menus_mod extends CI_Model {
	public function __construct(){
			parent::__construct();
	}
	
	public function getMenus($menuPadres=0){
		$this -> db -> from('menus AS mn');
		$this -> db -> where('mn.activo',1);
		$this -> db -> where('mn.invisible',0);
		
		#echo "--->".$menuPadres."<---";
		if($menuPadres != "no"){
			$this -> db -> where('padre',0);
		}
		$this -> db -> order_by('mn.padre , mn.orden');
		
		$query = $this -> db -> get();

		if($query -> num_rows() != 0){
			return $query->result();
		}
		else{
			return "err";
		}
	}
	
	public function getMenusPropiedades($menu){
		$this -> db -> select('mp.*');
		$this -> db -> from('menus_propiedades AS mp');
		$this -> db -> join('menus AS mn','mn.menu_id=mp.menu_id','inner');
		$this -> db -> where('mn.link', $menu);
		$this -> db -> order_by('mn.padre, mn.orden');

		$query = $this -> db -> get();
		if($query -> num_rows() != 0){
			return $query->result();
		}
		else{
			return "err";
		}
	}
	
	public function getMenuInt($content){
		$this -> db -> from('menus AS mn');
		$this -> db -> where('mn.link', $content);
		
		$query = $this -> db -> get();
		if($query -> num_rows() != 0){
			return $query->result();
		}
		else{
			return "err";
		}
	}
}
