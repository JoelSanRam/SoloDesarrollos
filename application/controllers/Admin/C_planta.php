<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_planta extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_planta','model');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['key'] = $_POST['key'];
            $this->load->view('Admin/planta/vista', $data);
        }else{
            http_response_code(404);
        }
    }
    public function tabla()
    {
        $key = base64_decode($_POST['key']);
        $vdata["planta"] = $this->model->findall($key);
        //$vdata["planta"] = array();
        $this->load->view('Admin/planta/tabla', $vdata);
    }

    public function detalles(){
        $check = '';
        if (isset($_POST['key'])){
            $key = base64_decode($_POST['key']);
            $data = $this->model->find_active($key);
            //print_r($data);
            $tmp = $this->model->findDetalles();
            foreach($tmp as $row){
                $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="detalle[]" value="'.base64_encode($row->id).'"';
                if (in_array($row, $data)) $check .= 'checked';
                $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->detalle.'<label></div>';    
            }
        }else{
            $data = $this->model->findDetalles();
            foreach($data as $row){
                $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="detalle[]" value="'.base64_encode($row->id).'"/><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->detalle.'<label></div>';    
            }
        }
        echo $check;
    }
    
    public function dataEntry()
    {
        $data['nombre'] = $_POST['nombre'];
        $data['inmueble_id'] = base64_decode($_POST['inmueble_id']);
        if (!isset($_POST['key'])){
            $exito = $this->model->insert($data);
            if($exito > 0){
                $detalles = $this->insert_details($exito, $_POST['detalle']);
                echo json_encode(array('resultado' => $exito, 'detalles' => $detalles));
            }
        }else{
            $key = base64_decode($_POST['key']);
            $exito = $this->model->update($key, $data);
            if($exito > 0){
                $detalles = $this->insert_details($key, $_POST['detalle']);
                echo json_encode(array('resultado' => $exito, 'detalles' => $detalles));
            } 
        }
    }

    private function insert_details($key, $details){
        $result = array();
        $this->model->delete_details($key);
        foreach($details as $r){
            $data['planta_id'] = $key;
            $data['detalles_id'] = base64_decode($r);
            $result[] = $this->model->insert_details($data);
        }
        return $result;
    }

    public function deleteRecord(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $key = base64_decode($_POST['key']);
            $this->model->delete_details($key);
            echo $this->model->delete($key);
        }else{
            http_response_code(404);
        }
        
    }
}
