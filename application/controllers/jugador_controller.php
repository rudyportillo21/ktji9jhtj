<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jugador_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('jugador_model');
	}

	public function index()
	{
		$data = array('title'=>'partido||jugadores');
		$this->load->view('template/header',$data);
		$this->load->view('jugador_view');
		$this->load->view('template/footer');
	}

	public function get_jugador(){
		$respuesta = $this->jugador_model->get_jugador();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->jugador_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_posicion(){
		$respuesta = $this->jugador_model->get_posicion();
		echo json_encode($respuesta);
	}
	public function get_pais(){
		$respuesta = $this->jugador_model->get_pais();
		echo json_encode($respuesta);
	}

	public function get_equipo(){
		$respuesta = $this->jugador_model->get_equipo();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['nombre'] = $this->input->post('nombre');
		$datos['edad'] = $this->input->post('edad');
		$datos['posicion'] = $this->input->post('posicion');
		$datos['pais'] = $this->input->post('pais');
		$datos['equipo'] = $this->input->post('equipo');
		$respuesta = $this->jugador_model->set_jugador($datos);
		echo json_encode($respuesta);
	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->jugador_model->get_datos($id);
		echo json_encode($respuesta);
	}


	public function actualizar(){
		$datos['nombre'] = $this->input->post('nombre');
		$datos['edad'] = $this->input->post('edad');
		$datos['posicion'] = $this->input->post('posicion');
		$datos['pais'] = $this->input->post('pais');
		$datos['equipo'] = $this->input->post('equipo');
		$datos['id_jugador'] = $this->input->post('id_jugador');
		$respuesta = $this->jugador_model->actualizar($datos);
		echo json_encode($respuesta);
	}
}
