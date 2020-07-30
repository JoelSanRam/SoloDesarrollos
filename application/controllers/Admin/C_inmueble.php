<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

class C_inmueble extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_inmueble','md');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function inmueble()
    {
        if (isset($_SESSION['servicios'])){
            unset($_SESSION['servicios']);
        }
        if (isset($_SESSION['formas'])){
            unset($_SESSION['formas']);
        }
        $this->load->view('Admin/inmueble/V_inmueble');
    }
    public function tabla()
    {
        $vdata["inmueble"] = $this->md->findall();
        $this->load->view('Admin/inmueble/tabla', $vdata);
    }

    /* BEGIN SERVICES */

    public function tablaServicios()
    {
        $this->load->view('Admin/inmueble/tabla-servicios');
    }
    
    /* BEGIN METHODS */

    public function tablaFormas()
    {
        $this->load->view('Admin/inmueble/tabla-metodos');        
    }

    private function obtain_methods($key, $table){
        $data = $this->md->get_rows($key, $table);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->md->findMethod($r->forma_pago_id);
        }
        //print_r($vdata);
        return $vdata;
    }

    public function addOferta(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $oferta = $_POST['oferta'];
            $data = $_SESSION['oferta'];
            if (!empty($data) && !in_array($oferta, $data)){
                $oferta = (object) ['id' => 0, 'cantidad' => $oferta];
                $found = false;
                foreach($data as $r){
                    if ($r->cantidad == $oferta->cantidad){
                        $found = true;
                        break;
                    }
                }
                if ($found == false){
                    $data[] = $oferta;
                    $_SESSION['oferta'] = $data;
                    echo 1;
                }
            }else{
                if (empty($data)){
                    $oferta = (object) ['id' => 0, 'cantidad' => $oferta];
                    $data[] = $oferta;
                    $_SESSION['oferta'] = $data;
                    echo 1;
                }
            }
        }else{
            http_response_code(404);
        }
    }

    public function tabla_oferta(){
        $this->load->view('Admin/inmueble/tabla-oferta');
    }

    private function obtain_services($key, $table){
        $data = $this->md->get_rows($key, $table);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->md->findServicio($r->servicio_id);
        }
        return $vdata;
    }
    

    private function obtain_financiamiento($key, $table){
        $data = $this->md->get_rows($key, $table);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->md->findFinanciamiento($r->financiamiento_id);
        }
        return $vdata;
    }

    private function obtain_equipamiento($key, $table){
        $data = $this->md->get_rows($key, $table);
        $vdata = array();
        foreach ($data as $r){
            $vdata[] = $this->md->findEquipamiento($r->equipamiento_id);
        }
        return $vdata;
    }
    

    /* END METHODS */

    public function procesar(){
        $data = array();
        if (isset($_POST['servicio'])){
            if (!empty($_SESSION['servicios'])){
                $data = $_SESSION['servicios'];
            }
            foreach ($_POST['servicio'] as $row){
                $r = $this->md->findServicio(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['servicios'] = $data;
            echo json_encode($data);
        }
        if (isset($_POST['metodo'])){
            if (!empty($_SESSION['formas'])){
                $data = $_SESSION['formas'];
            }
            foreach ($_POST['metodo'] as $row){
                $r = $this->md->findMethod(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['formas'] = $data;
            echo json_encode($data);
        }
        if (isset($_POST['financiamiento'])){
            if (!empty($_SESSION['financiamiento'])){
                $data = $_SESSION['financiamiento'];
            }
            foreach ($_POST['financiamiento'] as $row){
                $r = $this->md->findFinanciamiento(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['financiamiento'] = $data;
            echo json_encode($data);
        }
        if (isset($_POST['equipamiento'])){
            if (!empty($_SESSION['equipamiento'])){
                $data = $_SESSION['equipamiento'];
            }
            foreach ($_POST['equipamiento'] as $row){
                $r = $this->md->findEquipamiento(base64_decode($row));
                if (!in_array($r, $data))
                $data[] = $r;
            }
            $_SESSION['equipamiento'] = $data;
            echo json_encode($data);
        }
    }

    public function findServicios(){
        $tmp = $this->md->findServicios();
        $check = '';
        $data = $_SESSION['servicios'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="servicio[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->servicio.'<label></div>';    
        }
        echo $check;
    }

    public function findEquipamientos(){
        $tmp = $this->md->findEquipamientos();
        $check = '';
        $data = $_SESSION['equipamiento'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="equipamiento[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->equipamiento.'<label></div>';    
        }
        echo $check;
    }

    public function findFinanciamientos(){
        $tmp = $this->md->findFinanciamientos();
        $check = '';
        $data = $_SESSION['financiamiento'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="financiamiento[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->financiamiento.'<label></div>';    
        }
        echo $check;
    }
    
    public function tabla_financiamiento(){
        $this->load->view('Admin/inmueble/tabla-financiamiento');   
    }
    public function tabla_equipamiento(){
        $this->load->view('Admin/inmueble/tabla-equipamiento');   
    }

    public function findMethods(){
        $tmp = $this->md->findMethods();
        $check = '';
        $data = $_SESSION['formas'];
        foreach($tmp as $row){
            $check .= '<div class="form-check"><input type="checkbox" class="form-check-input" name="metodo[]" value="'.base64_encode($row->id).'"';
            if (in_array($row, $data)) $check .= 'checked';
            $check .= ' /><label class="form-check-label" for="'.base64_encode($row->id).'">'.$row->forma.'<label></div>';    
        }
        echo $check;
    }

    public function unset_element(){
        if (isset($_POST['key'])){
            if ($_POST['type'] == 'mp'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['formas'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['formas'] = $vdata;
            }
            if ($_POST['type'] == 'srv'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['servicios'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['servicios'] = $vdata;
            }
            if ($_POST['type'] == 'eq'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['equipamiento'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['equipamiento'] = $vdata;
            }
            if ($_POST['type'] == 'fin'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['financiamiento'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->id != $key){
                        $vdata[] = $row;
                    }
                }
                echo 1;
                $_SESSION['financiamiento'] = $vdata;
            }
            if ($_POST['type'] == 'sale'){
                $key = base64_decode($_POST['key']);
                $data = $_SESSION['oferta'];
                $vdata = array();
                foreach($data as $row){
                    if ($row->cantidad != $key){
                        $vdata[] = $row;
                    }
                }
                /* $data = $_SESSION['oferta'];
                $clave = array_search($key, $data);
                unset($data[$clave]); */
                echo 1;
                $_SESSION['oferta'] = $vdata;
            }
        }
    }

    public function guardarInmueble()
    {
        $vdata["tipo"]          = $this->md->getTipo();
        $vdata["asesor"]        = $this->md->getAsesor();
        $vdata['desarrollo']    = $this->md->getDesarrollo();
        $vdata['producto']      = $this->md->findTP();
        $_SESSION['servicios']  = array();
        $_SESSION['formas']     = array();
        $_SESSION['equipamiento']  = array();
        $_SESSION['financiamiento']     = array();
        $_SESSION['oferta']     = array();
        //carrito
        //$vdata["forma"]         = $this->md->getForma();
        //$vdata["servicio"]      = $this->md->getServicio();
        $this->load->view('Admin/inmueble/crear_inmueble', $vdata);
    }
    public function dropzone()
    {
        $vdata['key'] = isset($_POST['key']) ? $_POST['key'] : 1;
        $this->load->view('Admin/inmueble/dropzone', $vdata);
    }

    public function insertar(){
        
        $data['titulo']                     = $_POST['titulo'];
        $data['comision']                   = $_POST['comision'];
        $data['enganche']                   = $_POST['enganche'];
        $data['ubicacion']                  = $_POST['ubicacion'];
        $data['modelo']                     = $_POST['modelo'];
        $data['construccion']               = $_POST['construccion'];
        $data['superficie']                 = $_POST['superficie'];
        $data['frente']                     = $_POST['frente'];
        
        $data['fondo']                      = $_POST['fondo'];
        $data['cuota']                      = $_POST['cuota'];
        $data['recamaras']                  = $_POST['recamaras'];
        $data['banos']                      = $_POST['banos'];
        $data['estacionamiento']            = $_POST['estacionamiento'];
        $data['fecha_entrega']              = date( "Y-m-d", strtotime( $_POST['fecha_entrega'] ) );

        $data['creacion']                   = date('Y-m-d H:i:s');
        $data['activo']                     = 1;
        $data['Id_asesor']                  = $_POST['Id_asesor'];
        $data['tipoprecio_id']              = $_POST['tipoprecio_id'];
        $data['desarrollo_id']              = $_POST['desarrollo_id']; //$_POST['desarrolloid'];
        
        $data['tipo_producto_id']           = $_POST['tipo_producto_id'];//$_POST['desarrollo_id'];
        $data['venta']                      = $_POST['venta'];
        $data['video']                      = $_POST['video'];
        $data['recorrido']                  = $_POST['recorrido'];

        if (!isset($_POST['key'])){
            $data['id']     = $_POST['id'];
            $key            = $data['id'];
            if (empty($this->md->find($key))){
                $exito = $this->md->insert($data);
                if ($exito){
                    $services = $this->insert_services($key);
                    $methods  = $this->insert_methods($key);
                    $financiamiento = $this->insert_financiamiento($key);
                    $equipamiento = $this->insert_equipamiento($key);
                    $oferta  = $this->insert_sales($key);
                    $result     = array('inmueble' => $exito, 'servicios' => $services, 'methods' => $methods, 'equipamiento' => $equipamiento, 'financiamiento' => $financiamiento,'oferta'=>$oferta);
                }else{
                    $result = array('inmueble' => $exito);
                }
            }else{
                $exito = 0;
                $result = array('inmueble' => $exito);
            }
            header('Content-Type: application/json');
            echo json_encode($result);
        }else{
            //echo $_POST['key'];
            $key        = base64_decode($_POST['key']);
            $exito      = $this->md->update($key, $data);
            $services   = $this->insert_services($key);
            $methods    = $this->insert_methods($key);
            $financiamiento = $this->insert_financiamiento($key);
            $equipamiento = $this->insert_equipamiento($key);
            $oferta  = $this->insert_sales($key);
            $result     = array('inmueble' => $exito, 'servicios' => $services, 'methods' => $methods, 'equipamiento' => $equipamiento, 'financiamiento' => $financiamiento,'oferta'=>$oferta);
            header('Content-Type: application/json');
            echo json_encode($result);
        }
    }

    private function insert_sales($key){
        $tabla = 'oferta';
        $data = $_SESSION['oferta'];
        $this->md->delete_rows($key, $tabla);
        $result = array();
        foreach($data as $r){
            $vdata['inmueble_id'] = $key;
            $vdata['cantidad'] = $r->cantidad;
            $response = $this->md->insert_row($vdata, $tabla);
            if($response > 0){
                $result[] = $r->cantidad;
            }
        }
        return $result;
    }

    private function insert_services($key){
        $tabla = 'servicio_inmueble';
        $this->md->delete_rows($key, $tabla);
        $data = $_SESSION['servicios'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['inmueble_id'] = $key;
                $vdata['servicio_id'] = $r->id;
                if(empty($this->md->existsService($vdata))){
                    $response = $this->md->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }

    private function insert_financiamiento($key){
        $tabla = 'financiamiento_inmueble';
        $this->md->delete_rows($key, $tabla);
        $data = $_SESSION['financiamiento'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['inmueble_id'] = $key;
                $vdata['financiamiento_id'] = $r->id;
                if(empty($this->md->existsFinanciamiento($vdata))){
                    $response = $this->md->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }

    private function insert_equipamiento($key){
        $tabla = 'equipamiento_inmueble';
        $this->md->delete_rows($key, $tabla);
        $data = $_SESSION['equipamiento'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['inmueble_id'] = $key;
                $vdata['equipamiento_id'] = $r->id;
                if(empty($this->md->existsEquipamiento($vdata))){
                    $response = $this->md->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
    }

    private function insert_methods($key){
        $tabla = 'forma_inmueble';
        $this->md->delete_rows($key, $tabla);
        $data = $_SESSION['formas'];
        $result = array();
        if (!empty($data)){
            foreach($data as $r){
                $vdata['inmueble_id'] = $key;
                $vdata['forma_pago_id'] = $r->id;
                if(empty($this->md->existsMethod($vdata))){
                    $response = $this->md->insert_row($vdata, $tabla);
                    if ($response > 0){
                        $result[] = $r;
                    }
                }
            }
        }
        return $result;
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
                $data['foto'] = $name;
                $data['inmueble_id'] = base64_decode($key);
                $data['activo'] = 1;
                if($this->md->insertImg($data)){
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

    public function tablaGaleria()
    {
        $key = isset($_POST['key']) ? base64_decode($_POST['key']) : null;
        $vdata["galeria"] = $this->md->obtenerGaleria($key);
        $this->load->view('Admin/inmueble/tabla-galeria', $vdata);
    }

    public function eliminarGaleria(){
        if(isset($_POST['key'])){
            $key = base64_decode($_POST['key']);
            $url = getcwd().'/recursos/galeria/';
            $img = $this->md->findPicture($key);
            if(unlink($url.$img->foto)){
                echo $this->md->delete($key);
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }

    public function eliminarInmueble(){
        if(isset($_POST['key'])){
            $key = base64_decode($_POST['key']);
            $data['activo'] = 0;
            echo $this->md->update($key, $data);
        }else{
            echo 0;
        }
    }

    public function modificarInmueble(){
        if (isset($_POST['key'])){
            $key                    = base64_decode($_POST['key']);
            $vdata['inmueble']       = $this->md->find($key);
            $vdata["tipo"]          = $this->md->getTipo();
            $vdata["asesor"]        = $this->md->getAsesor();
            $vdata['desarrollo']    = $this->md->getDesarrollo();
            $vdata['producto']      = $this->md->findTP();
            $_SESSION['equipamiento']  = $this->obtain_equipamiento($key, 'equipamiento');
            $_SESSION['financiamiento']     = $this->obtain_financiamiento($key, 'financiamiento');;
            $_SESSION['formas'] = $this->obtain_methods($key, 'forma');
            $_SESSION['servicios'] = $this->obtain_services($key, 'servicio');
            $_SESSION['oferta'] = $this->md->findSales();
            //carrito
            $this->load->view('Admin/inmueble/crear_inmueble', $vdata);
        }else{
            header('location:'. base_url().'inmueble');
        }
    }

    public function obtenerTipos(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $key = base64_decode($_POST['key']);
            //$key = 19;
            $data = $this->md->obtenerTipos($key);
            //print_r($data);
        }else{
            http_response_code(404);
        }
    }
}