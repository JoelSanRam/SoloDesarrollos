<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_modelo extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_modelo','me');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function modelo()
    {
        $this->load->view('Admin/modelo/V_modelo');
    }
    public function tabla()
    {
        $vdata["modelo"] = $this->me->obtenerModelos();
        $this->load->view('Admin/modelo/tabla', $vdata);
    }
    
    public function guardarModelo()
    {
        $vdata["tipo"] = $this->me->obtenerTipos();
        $this->load->view('Admin/modelo/crear_modelo', $vdata);
    }

    public function insertarModelo(){
        /*****  NOTA *****/
            /* Obtenemos la información para posteriormente insertarla en la base de datos */
        $data['Modelo']     = $_POST['Modelo'];
        $data['Id_tipo']     = $_POST['Id_tipo'];
        $data['Activo']     = 1;

        
        if (!isset($_POST['key'])){
            echo $this->me->insert($data);
        }else{
            $key = base64_decode($_POST['key']);
            echo $this->me->update($key, $data);
        }
        
    }

    public function eliminarModelo(){
        if(isset($_POST['key'])){
            $data['activo'] = 0;
            $key = base64_decode($_POST['key']);
            echo $this->me->update($key, $data);
        }else{
            echo 0;
        }
    }

    public function modificarModelo(){
        $key = base64_decode($_POST['key']);
        $data['modelo'] = $this->me->find($key);
        $data["tipo"] = $this->me->obtenerTipos();
        $data['key'] = $_POST['key'];
        $this->load->view('Admin/modelo/crear_modelo', $data);
    }
}
