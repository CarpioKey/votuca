<?php
class Mesa_model extends CI_Model {


  public function insertar($usuarios,$idVotacion)
  {
    $sinProblemas = true;
    echo var_dump($usuarios);
    for($i = 0; $i < sizeof($usuarios);$i++)
    {
      $datos = array(
        'Id_Usuario' => $usuarios[$i],
        'Id_Votacion' => $idVotacion
      );
      $noGuardado = $this->db->insert('mesa_electoral',$datos);
      if($noGuardado){$sinProblemas = false;}
    }
    if($sinProblemas){return true;}
    else{return false;}
  }
  
	//Devuelve el listado de votaciones de las que se encarga un miembro de la mesa electoral.
	public function getVotaciones($id) {
		$consulta = $this->db->get_where('mesa_electoral', array('Id_Usuario' => $id));
		return $consulta->result();
	}
	
	//Establece a true la decisión de abrir la urna de un usuario concreto para una votación concreta.
	public function abreUrna($usuario, $votacion) {
		$this->db->where('Id_Usuario', $usuario);
		$this->db->where('Id_Votacion', $votacion);
		$this->db->update('mesa_electoral', array('seAbre' => 1));
	}
	
	//Devuelve el número de decisiones de apertura para una votación concreta.
	public function getNApertura($votacion) {
		$consulta = $this->db->get_where('mesa_electoral', array('Id_Votacion' => $votacion, 'seAbre' => 1));
		return $consulta->num_rows();
	}
	
	//Comprueba si existe algún recuento para la votación.
	public function checkVotos($idVotacion) {
		$consulta = $this->db->get_where('votacion_voto', array('Id_Votacion' => $idVotacion));
		$rows = $consulta->result();
		$consulta2 = $this->db->get_where('recuento', array('Id_Votacion_Voto' => $rows[0]->Id));
		return ($consulta2->num_rows()>=1);
	}
	
	//Devuelve las opciones de voto de una votacion.
	public function getOptions($idVotacion) {
		$consulta = $this->db->get_where('votacion_voto', array('Id_Votacion' => $idVotacion));
		$result = array('Id' => array(), 'Nombre' => array());
		foreach($consulta->result() as $row) {
			array_push($result, $row()->Id_Voto);
		}
		return $result;
	}
}


?>
