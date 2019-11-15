<?php
	class Voto_model extends CI_Model {
		public function __construct ()
		{
			parent::__construct ();
			$this->load->database();
			/*
			$mysqli = mysqli_connect("localhost", "root", "", "votuca"); 
			if($mysqli == false) { 
			    die("ERROR: Could not connect. ".mysqli_connect_error()); 
			}
			*/
		}

		// Lista los datos de las votaciones
		public function _listar ($id_user)
		{
			$sql = "select votacion.Titulo, votacion.Descripcion, voto.Nombre, votacion.FechaInicio, votacion.FechaFinal
						from votacion, usuario_votacion, voto
						where votacion.Id = usuario_votacion.Id_Votacion 
							AND usuario_votacion.Id_Usuario = ".$id_user."
							AND usuario_votacion.Id_Voto = voto.Id ;";
							
			//$sql = "select Titulo, Descripcion, FechaInicio, FechaFinal from votacion;";
			$query = $this -> db -> query($sql);
			if ( $query->num_rows() == 0 )
			{
				echo "No rows matched. "; 
			} else {
				return $query->result();
			}
		}

		public function _userId($Nombre) {
			//print_r($Nombre);
			$consulta = $this->db->get_where('usuario', array('NombreUsuario' => $Nombre));
			//print_r($consulta->row()->Id);
			return $consulta->row()->Id;
		}

		// Realizar votacion
		public function _votar ( $id_usuario, $id_votacion, $voto )
		{
			$sql = "select Id from voto where Nombre = '".$voto."'";
			$query = $this -> db -> query($sql);
			$id_voto = mysql_fetch_array($query) or die(mysqli_error());

			$sql = "insert into 'usuario_votacion' (Id_Usuario, Id_Votacion, Id_voto) values ('".$id_usuario."','".$id_votacion."','".$id_voto['Id']."');";
			$query = $this -> db -> query($sql);
			if($query) {  
			    echo "Voto insertado correctamente."; 
			} else { 
			    echo "ERROR: Could not able to execute $sql. "; 
			} 
		}

		// Indica si un usuario ya ha votado
		public function _haVotado ( $id_usuario, $id_votacion )
		{
			$sql = "select id_voto from usuario_votacion where Id_Usuario = '".$id_usuario."' and Id_Votacion = '".$id_votacion."';";
			$query = $this -> db -> query($sql);
			if( $query->num_rows() == 0 ) {  
			    return false;
			} else { 
			    return true;
			} 
		}

		// Rectificar votacion
		public function _rectificarVoto ( $id_usuario, $id_votacion, $voto )
		{
			$sql = "select Id from voto where Nombre = '".$voto."'";
			$query = $this -> db -> query($sql);
			$id_voto = mysql_fetch_array($query) or die(mysqli_error());

			$sql = "update usuario_votacion set Id_voto = '".$id_voto."', where Id_Usuario = '".$id_usuario."' and Id_Votacion = '".$id_votacion."';";
			$query = $this -> db -> query($sql);
			if($query) {  
			    echo "Voto rectificado correctamente."; 
			} else { 
			    echo "ERROR: Could not able to execute $sql. "; 
			} 


		}

	}
?>