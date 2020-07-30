<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_desarrollo extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('Admin/M_desarrollo','model');
        $this->load->database();
    }
    public function index()
    {
        $this->load->view('Admin/desarrollo/V_desarrollo');
    }

    public function edit(){
        if (isset($_POST['key'])){
            $key                                    = base64_decode($_POST['key']);
            $_SESSION['amenidades']                 = $this->obtainAmenidades($key);
            $_SESSION['caracteristicas']            = $this->obtainCaracteristicas($key);
            $_SESSION['td']                         = $this->obtainTD($key);
            $_SESSION['tp']                         = $this->obtainTP($key);
            $data['desarrollo']                     = $this->model->find($key);
            $data["estado"]                         = $this->model->findEstado();
            $data['municipio']                      = $this->model->findParent('municipio', $data['desarrollo']->colonia_id);
            $this->load->view('Admin/desarrollo/crear_desarrollo', $data);
        }else{
            header('location:'. base_url().'desarrollo');
        }
    }

    public function dropzone()
    {
        $vdata['key'] = isset($_POST['key']) ? $_POST['key'] : 1;
        $this->load->view('Admin/desarrollo/dropzone', $vdata);
    }

    public function tablaGaleria()
    {
        $key = isset($_POST['key']) ? base64_decode($_POST['key']) : null;
        $vdata["galeria"] = $this->model->obtenerGaleria($key);
        $this->load->view('Admin/desarrollo/tabla-galeria', $vdata);
    }

    public function upload(){
        $url = getcwd().'/recursos/galeria/';
        $key = $_POST['key'];
        //$fichero_subido = $url . basename($_FILES['file']['name']);
        $name = explode('.', $_FILES['file']['name']);
        $extension = strtolower(end($name));
        $date = date('YmdHms');
        $hash = bin2hex(random_bytes(16).$date);
        $name = $hash.'.'.$extension;
        $fichero_subido = $url . $name;
        
        //$fichero_subido = $url . $_POST['key'].'.'.$extension;
        if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg'){
            if (move_uploaded_file($_FILES['file']['tmp_name'], $fichero_subido)) {
                $data['imagen'] = $name;
                $data['desarrollo_id'] = base64_decode($key);
                $data['activo'] = 1;
                if($this->model->insertImg($data)){
                    echo 1;
                }else{
                    unlink($fichero_subido);
                    header('Error: A problem occurred during file upload!', true, 500);
                }
            } else {
                header('Error: A problem occurred during file upload!', true, 500);
            }
        }
        else{
            echo json_encode(array('error' => $_FILES['file']['name'] ));
        }
    }
    
    public function eliminarGaleria(){
        if(isset($_POST['key'])){
            $key = base64_decode($_POST['key']);
            $url = getcwd().'/recursos/galeria/';
            $img = $this->model->findPicture($key);
            if(unlink($url.$img->imagen)){
                echo $this->model->delete_galeria($key);
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }

    private function obtainAmenidades($key){
        $tabla = 'amenidades';
        $data = $this->model->get_rows($key, $tabla);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->model->findAmenidad($r->amenidades_id);
        }
        return $vdata;
    }

    private function obtainCaracteristicas($key){
        $tabla = 'caracteristicas';
        $data = $this->model->get_rows($key, $tabla);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->model->findCaracteristica($r->caracteristicas_id);
        }
        return $vdata;
    }

    private function obtainTP($key){
        $tabla = 'producto';
        $data = $this->model->get_tipo($key, $tabla);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->model->findTDs($r->tipo_producto_id);
        }
        return $vdata;
    }

    private function obtainTD($key){
        $tabla = 'desarrollo';
        $data = $this->model->get_tipo($key, $tabla);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->model->findTDs($r->tipo_id);
        }
        return $vdata;
    }

    public function tabla(){
        $vdata["desarrollo"] = $this->model->findall();
        $this->load->view('Admin/desarrollo/tabla', $vdata);
    }

    public function nuevoDesarrollo()
    {
        $_SESSION['amenidades']         = array();
        $_SESSION['caracteristicas']    = array();
        $_SESSION['td']                 = array();
        $_SESSION['tp']                 = array();
        $vdata["estado"]                = $this->model->findEstado();
        $this->load->view('Admin/desarrollo/crear_desarrollo', $vdata);
    }

    public function loadMunicipio(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $key = base64_decode($_POST['key']);
            $data = $this->model->findMunicipio($key);
            $option = '<option value="">Seleccionar municipio</option>';
            $selected = (isset($_POST['selected'])) ? $_POST['selected'] : '';
            foreach($data as $row){
                $option .= '<option value="'.base64_encode($row->id).'"';
                if (base64_encode($row->id) == $selected) $option .= "selected";
                $option .= '>'.$row->municipio.'</option>';
            }
            $option.= "<script>$('#municipio').trigger('change');</script>";
            echo $option;
        }
    }

    public function loadColonia(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $key = base64_decode($_POST['key']);
            $data = $this->model->findColonia($key);
            $option = '<option value="">Seleccionar colonia</option>';
            $selected = (isset($_POST['selected'])) ? $_POST['selected'] : '';
            foreach($data as $row){
                $option .= '<option value="'.base64_encode($row->id).'"';
                if (base64_encode($row->id) == $selected) $option .= "selected";
                $option .= '>'.$row->colonia.'</option>';
            }
            echo $option;
        }
    }

    public function dataEntry(){
        if (!isset($_POST['key'])){
            $data['nombre']                 = trim($_POST['nombre']);
            $data['unidades']               = trim($_POST['unidades']);
            $data['privado']                = trim($_POST['privado']);
            $data['direccion']              = trim($_POST['direccion']);
            $data['descripcion']            = trim($_POST['descripcion']);
            $data['colonia_id']             = trim(base64_decode($_POST['colonia']));
            $data['latitud']                = trim($_POST['latitud']);
            $data['longitud']               = trim($_POST['longitud']);
            $data['video']                      = $_POST['video'];
            $data['recorrido']                  = $_POST['recorrido'];
            $result['desarrollo']           = $this->model->insert($data);
            if(!empty($result['desarrollo'])){
                $result['amenidades']       = $this->insert_amenidades($result['desarrollo']);
                $result['caracteristicas']  = $this->insert_caracteristicas($result['desarrollo']);
                $result['td']               = $this->insert_td($result['desarrollo']);
                $result['tp']               = $this->insert_tp($result['desarrollo']);
                echo json_encode($result);
            }
        }else{
            $data['nombre']                 = trim($_POST['nombre']);
            $data['unidades']               = trim($_POST['unidades']);
            $data['privado']                = trim($_POST['privado']);
            $data['direccion']              = trim($_POST['direccion']);
            $data['descripcion']            = trim($_POST['descripcion']);
            $data['colonia_id']             = trim(base64_decode($_POST['colonia']));
            $data['latitud']                = trim($_POST['latitud']);
            $data['longitud']               = trim($_POST['longitud']);
            $data['video']                      = $_POST['video'];
            $data['recorrido']                  = $_POST['recorrido'];
            $key                            = trim(base64_decode($_POST['key']));
            $response                       = $this->model->update($key, $data);
            if ($response){
                $result['amenidades']       = $this->insert_amenidades($key);
                $result['caracteristicas']  = $this->insert_caracteristicas($key);
                $result['td']               = $this->insert_td($key);
                $result['tp']               = $this->insert_tp($key);
                echo json_encode($result);
            }
        }
    }

    private function insert_amenidades($key){
        $tabla = 'amenidades_desarrollo';
        $this->model->delete_rows($key, $tabla);
        $data = $_SESSION['amenidades'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['desarrollo_id'] = $key;
                $vdata['amenidades_id'] = $r->id;
                if(empty($this->model->existsAmenidad($vdata))){
                    $response = $this->model->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }
    
    private function insert_td($key){
        $tabla = 'pivot_tipo_desarrollo';
        $this->model->delete_rows($key, $tabla);
        $data = $_SESSION['td'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['desarrollo_id'] = $key;
                $vdata['tipo_id']       = $r->id;
                if(empty($this->model->existsTD($vdata))){
                    $response = $this->model->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }

    private function insert_tp($key){
        $tabla = 'pivot_tipo_producto';
        $this->model->delete_rows($key, $tabla);
        $data = $_SESSION['tp'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['desarrollo_id'] = $key;
                $vdata['tipo_producto_id'] = $r->id;
                if(empty($this->model->existsTP($vdata))){
                    $response = $this->model->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }
    
    private function insert_caracteristicas($key){
        $tabla = 'caracteristicas_desarrollo';
        $this->model->delete_rows($key, $tabla);
        $data = $_SESSION['caracteristicas'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['desarrollo_id'] = $key;
                $vdata['caracteristicas_id'] = $r->id;
                if(empty($this->model->existsCaracteristica($vdata))){
                    $response = $this->model->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }

    public function delete(){
        if (isset($_POST['key'])){
            $data['activo']         = 0;
            $key                    = trim(base64_decode($_POST['key']));
            echo $this->model->update($key, $data);
        }else{
            echo 0;
        }
    }

    public function findAmenidades(){
        $tmp = $this->model->findAmenidades();
        $check = '';
        $data = $_SESSION['amenidades'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="amenidades[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->nombre.'<label></div>';    
        }
        echo $check;
    }

    public function findCaracteristicas(){
        $tmp = $this->model->findCaracteristicas();
        $check = '';
        $data = $_SESSION['caracteristicas'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="caracteristicas[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->caracteristica.'<label></div>';    
        }
        echo $check;
    }

    public function findTP(){
        $tmp = $this->model->findTP();
        $check = '';
        $data = $_SESSION['tp'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="tp[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked />';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->tipo.'<label></div>';    
        }
        echo $check;
    }

    public function findTD(){
        $tmp = $this->model->findTD();
        $check = '';
        $data = $_SESSION['td'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="td[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->tipo.'<label></div>';    
        }
        echo $check;
    }
    
    public function procesar(){
        $data = array();
        if (isset($_POST['amenidades'])){
            if (!empty($_SESSION['amenidades'])){
                $data = $_SESSION['amenidades'];
            }
            foreach ($_POST['amenidades'] as $row){
                $r = $this->model->findAmenidad(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['amenidades'] = $data;
            echo json_encode($data);
        }
        if (isset($_POST['caracteristicas'])){
            if (!empty($_SESSION['caracteristicas'])){
                $data = $_SESSION['caracteristicas'];
            }
            foreach ($_POST['caracteristicas'] as $row){
                $r = $this->model->findCaracteristica(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['caracteristicas'] = $data;
            echo json_encode($data);
        }
        if (isset($_POST['td'])){
            if (!empty($_SESSION['td'])){
                $data = $_SESSION['td'];
            }
            foreach ($_POST['td'] as $row){
                $r = $this->model->findTDs(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['td'] = $data;
            echo json_encode($data);
        }
        if (isset($_POST['tp'])){
            if (!empty($_SESSION['tp'])){
                $data = $_SESSION['tp'];
            }
            foreach ($_POST['tp'] as $row){
                $r = $this->model->findTPs(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['tp'] = $data;
            echo json_encode($data);
        }
    }

    public function tbam(){
        $this->load->view('Admin/desarrollo/tabla-amenidades');
    }
    public function tbca(){
        $this->load->view('Admin/desarrollo/tabla-caracteristicas');
    }
    public function tbtp(){
        $this->load->view('Admin/desarrollo/tabla-tp');
    }
    public function tbtd(){
        $this->load->view('Admin/desarrollo/tabla-td');
    }

    public function unset_element(){
        if (isset($_POST['key'])){
            if ($_POST['type'] == 'am'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['amenidades'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['amenidades'] = $vdata;
            }
            if ($_POST['type'] == 'ca'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['caracteristicas'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['caracteristicas'] = $vdata;
            }
            if ($_POST['type'] == 'tp'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['tp'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['tp'] = $vdata;
            }
            if ($_POST['type'] == 'td'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['td'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['td'] = $vdata;
            }
        }
    }

}
