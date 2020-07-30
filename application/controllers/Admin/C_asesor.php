<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_asesor extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_asesor','ma');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function tipo()
    {
        $this->load->view('Admin/asesores/V_tipo');
    }
    public function tabla()
    {
        $vdata["tipo"] = $this->ma->obtenerTipos();
        $this->load->view('Admin/asesores/tabla', $vdata);
    }
    
    public function guardarTipo()
    {
        $vdata["desarrolladora"] = $this->ma->obtenerDesarrolladoras();
        $vdata["usuario"] = $this->ma->obtenerUsuarios();
        $this->load->view('Admin/asesores/crear_tipo', $vdata);
    }

    public function insertarAsesor(){
        /*****  NOTA *****/
            /* Obtenemos la información para posteriormante insertarla en la base de datos */
        $data['Id_asesor'] = $_POST['id'];
        $data['Nombre'] = $_POST['Nombre'];
        $data['Contrasenia'] = $_POST['Contrasenia'];
        $data['Apellido'] = $_POST['Apellido'];
        $data['Telefono'] = $_POST['Telefono'];
        $data['Correo'] = $_POST['Correo'];
        $data['Id_empresa'] = $_POST['Empresa'];
        $data['Id_usuario'] = $_POST['Usuario'];
        $data['Activo'] = 1;
        echo $this->ma->insert($data);
    }

    public function borrar_forma($iIforma = null){
        echo $this->ma->delete($iIforma);        
    }

    public function modificarTipo(){
        $key = base64_decode($_POST['key']);
        $data['tipo'] = $this->ma->find($key);
        $data["desarrolladora"] = $this->ma->obtenerDesarrolladoras();
        $data['key'] = $_POST['key'];
        $this->load->view('Admin/asesores/crear_tipo', $data);
    }
}
