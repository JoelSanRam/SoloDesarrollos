<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_financiamiento extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_financiamiento','mt');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function formaPago()
    {
        $this->load->view('Admin/financiamiento/V_financiamiento');
    }
    public function tabla()
    {
        $vdata["formaPago"] = $this->mt->findall();
        $this->load->view('Admin/financiamiento/tabla', $vdata);
    }
    
    public function guardarformaPago()
    {
        //$vdata["formaPago"] = $this->me->findall();
        $this->load->view('Admin/financiamiento/crea_formaPago');
    }

    public function insertarFormaPago()
    {
        
        //echo "POST";
        $data["financiamiento"] = $this->input->post("formaPago");
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
        $data["financiamiento"] =  $this->input->post("formaPago1");
        //var_dump($data);
        $aux = $this->mt->update($iIdForma, $data);
        echo $aux;
        
    }

    public function borrar_forma($iIforma = null){
        echo $this->mt->delete($iIforma);        
    }
}
