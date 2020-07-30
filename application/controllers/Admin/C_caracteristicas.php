<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_caracteristicas extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_caracteristicas','mt');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function formaPago()
    {
        $this->load->view('Admin/caracteristica/V_caracteristica');
    }
    public function tabla()
    {
        $vdata["formaPago"] = $this->mt->findall();
        $this->load->view('Admin/caracteristica/tabla', $vdata);
    }
    
    public function guardarformaPago()
    {
        //$vdata["formaPago"] = $this->me->findall();
        $this->load->view('Admin/caracteristica/crea_formaPago');
    }

    public function insertarFormaPago()
    {
        
        //echo "POST";
        $data["caracteristica"] = $this->input->post("formaPago");
        $data["Activo"] = 1;

        $exito = $this->mt->insert($data);
        if($exito>0){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function ActualizarForma(){
        $iIdForma = $this->input->post('Idforma');
        $data["caracteristica"] =  $this->input->post("formaPago1");
        //var_dump($data);
        $aux = $this->mt->update($iIdForma, $data);
        echo $aux;
        
    }

    public function borrar_forma($iIforma = null){
        echo $this->mt->delete($iIforma);        
    }
}
