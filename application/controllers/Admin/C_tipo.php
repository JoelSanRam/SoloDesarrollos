<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tipo extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_tipo','me');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function tipo()
    {
        $this->load->view('Admin/tipo_inmueble/V_tipo');
    }
    public function tabla()
    {
        $vdata["tipo"] = $this->me->obtenerTipos();
        $this->load->view('Admin/tipo_inmueble/tabla', $vdata);
    }
    
    public function guardarTipo()
    {
        $vdata["desarrolladora"] = $this->me->obtenerDesarrolladoras();
        $this->load->view('Admin/tipo_inmueble/crear_tipo', $vdata);
    }

    public function insertarTipo(){
        /*****  NOTA *****/
            /* Obtenemos la información para posteriormente insertarla en la base de datos */
        $data['Tipo']     = $_POST['Tipo'];
        $data['Id_desarrolladora']     = $_POST['Id_desarrolladora'];
        $data['Activo']     = 1;

        
        if (!isset($_POST['key'])){
            echo $this->me->insert($data);
        }else{
            $key = base64_decode($_POST['key']);
            echo $this->me->update($key, $data);
        }
        
    }

    public function eliminarTipo(){
        if(isset($_POST['key'])){
            $data['activo'] = 0;
            $key = base64_decode($_POST['key']);
            echo $this->me->update($key, $data);
        }else{
            echo 0;
        }
    }

    public function modificarTipo(){
        $key = base64_decode($_POST['key']);
        $data['tipo'] = $this->me->find($key);
        $data["desarrolladora"] = $this->me->obtenerDesarrolladoras();
        $data['key'] = $_POST['key'];
        $this->load->view('Admin/tipo_inmueble/crear_tipo', $data);
    }
}
