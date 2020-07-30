<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_desarrolladora extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        //$this->load->library('Class_seguridad');
        $this->load->model('Admin/M_desarrolladora','md');
        //$this->load->helper('form');
        $this->load->database();
        //$this->load->library('form_validation');
    }
    public function desarrolladora()
    {
        $this->load->view('Admin/desarrolladora/V_desarrolladora');
    }
    public function tabla()
    {
        $vdata["desarrolladora"] = $this->md->findall();
        $this->load->view('Admin/desarrolladora/tabla', $vdata);
    }
    
    public function guardarDesarrolladora()
    {
        //$vdata["empresa"] = $this->me->findall();
        $this->load->view('Admin/desarrolladora/crear_desarrolladora');
    }

    public function insertarDesarrolladora(){
        /*****  NOTA *****/
        /* Es importante que el input file se llame 'userfile' para que la libreria upload funcione */

        /* De esta forma obtenemos la extensión de la imagen para no perderlo */
        $img = explode('.' , $_FILES['userfile']['name']);
        $format = end($img);

        /* Obtenemos la información para posteriormente insertarla en la base de datos */
        $data['nombre']     = $_POST['nombre'];
        $data['correo']     = $_POST['email'];
        $data['telefono']   = $_POST['telefono'];
        $data['activo']     = 1;

        /* Es importante especificar los datos de formatos permitidos, así como renombrar el logo para no generar sobreescritura de datos */
        $config['upload_path']          = './recursos/logos/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_name']            = $data['nombre'].'-'.date('YmdHis').'.'.$format;
        
        /* Asignamos el nuevo nombre al campo del logo para guardar en la base de datos */
        $data['logo']       = $config['file_name'];

        $this->load->library('upload', $config);
        /* Si la imagen presenta un error al momento de subirla al servidor, debemos mostrar un mensaje de error */
        if(!$this->upload->do_upload()){
           echo 0;
        /* Si no hubo problemas al subir la imagen, procedemos a insertar los datos en la base de datos */
        }else{
            if (!isset($_POST['key'])){
                echo $this->md->insert($data);
            }else{
                echo $this->md->update($_POST['key'], $data);
            }
        }
    }

    public function eliminarDesarrolladora(){
        if(isset($_POST['key'])){
            $data['activo'] = 0;
            echo $this->md->update($_POST['key'], $data);
        }else{
            echo 0;
        }
    }

    public function modificarDesarrolladora($key){
        $data['desarrolladora'] = $this->md->find($key);
        $data['key'] = $key;
        $this->load->view('Admin/desarrolladora/crear_desarrolladora', $data);
    }
}
