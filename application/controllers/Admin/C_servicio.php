<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_servicio extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_servicio','ms');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function formaPago()
    {
        $this->load->view('Admin/servicio/V_servicio');
    }
    public function tabla()
    {
        $vdata["formaPago"] = $this->ms->findall();
        $this->load->view('Admin/servicio/tabla', $vdata);
    }
    
    public function guardarformaPago()
    {
        //$vdata["formaPago"] = $this->me->findall();
        $this->load->view('Admin/formapago/crea_formaPago');
    }

    public function insertarFormaPago()
    {
        
        //echo "POST";
        $data["servicio"] = $this->input->post("formaPago");
        $data["activo"] = 1;

        $exito = $this->ms->insert($data);
        if($exito>0){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function ActualizarForma(){
        $iIdForma = $this->input->post('Idforma');
        $data["servicio"] =  $this->input->post("formaPago1");
        //var_dump($data);
        $aux = $this->ms->update($iIdForma, $data);
        echo $aux;
        
    }

    public function borrar_forma($iIforma = null){
        echo $this->ms->delete($iIforma);        
    }
}
