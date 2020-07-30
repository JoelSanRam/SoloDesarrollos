<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('M_login','ml');
        $this->load->database();
    }

    public function index()
    {
        $_SESSION['usuarioV'] = null;
        $this->load->view('login2');
    }

    public function search(){     
        $data['exito'] = $this->ml->mostrar_usuario($_POST['correo'],$_POST['password']);
        if($data['exito']>0){
            $_SESSION['usuarioV'] = 'Valido';
        }
        else{
            $_SESSION['usuarioV'] = 'No Valido';
        }
         echo json_encode($data);
    }

    function cerrar_sesion() {
		unset($_SESSION['usuarioV']);
	}
}
