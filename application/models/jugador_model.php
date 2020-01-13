<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jugador_model extends CI_Model {
	public function get_jugador(){
		$this->db->select('j.id_jugador,j.nombre_jugador,j.edad,p.nombre_posicion,pa.nombre_pais,e.nombre_equipo');
		$this->db->from('jugador j');
		$this->db->join('posiciones p','p.id_posicion=j.id_posicion');
		$this->db->join('pais pa','pa.id_pais=j.id_pais');
		$this->db->join('equipo e','e.id_equipo=j.id_equipo');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_jugador',$id);
		$this->db->delete('jugador');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function get_posicion(){
		$exe= $this->db->get('posiciones');
		return $exe->result();
	}

	public function get_pais(){
		$exe= $this->db->get('pais');
		return $exe->result();
	}
	public function get_equipo(){
		$exe= $this->db->get('equipo');
		return $exe->result();
	}

	public function set_jugador($datos){
		$this->db->set('nombre_jugador',$datos['nombre']);
		$this->db->set('edad',$datos['edad']);
		$this->db->set('id_posicion',$datos['posicion']);
		$this->db->set('id_pais',$datos['pais']);
		$this->db->set('id_equipo',$datos['equipo']);
		$this->db->insert('jugador');

		if($this->db->affected_rows()>0){
			return 'add';
		}else{
			return false;
		}
	}

	public function get_datos($id){
		$this->db->where('id_jugador',$id);
		$exe = $this->db->get('jugador');
		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre_jugador',$datos['nombre']);
		$this->db->set('edad',$datos['edad']);
		$this->db->set('id_posicion',$datos['posicion']);
		$this->db->set('id_pais',$datos['pais']);
		$this->db->set('id_equipo',$datos['equipo']);
		$this->db->where('id_jugador',$datos['id_jugador']);
		$this->db->update('jugador');

		if($this->db->affected_rows()>0){
			return 'edi';
		}else{
			return 'falso';
		}
	}

}
