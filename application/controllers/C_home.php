<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('Usuario/M_busqueda', 'mb');
        $this->load->model('M_login', 'ml');
        $this->load->database();
    }

    public function index()
    {
        $data['consulta'] = $this->mb->ShowPrecio();
        $_SESSION['usuarioV'] = null;
        //print_r($data['consulta']);
        $this->load->view('home_solodesarrollos', $data);
    }

    public function search()
    {
        $Ubicacion = $_POST['buscarUbi'];
        $tipoIn = $_POST['tipoIn'];

        //$Ubicacion = $tipoIn = null;
        if (isset($Ubicacion) && !empty($Ubicacion) && isset($tipoIn) && !empty($tipoIn)) {

            /* $Ubicacion = $_POST['buscarUbi'];
                $tipoIn = $_POST['tipoIn']; */

            $data['Bubuicacion'] = $this->mb->buscarInmueble($Ubicacion, $tipoIn);
            $data['Ubicacion'] = $this->mb->buscarInmueble2($Ubicacion, $tipoIn);
            //print_r($data['Ubicacion']);
            $this->load->view('Front/busqueda_avanzada', $data);
        } elseif (!isset($Ubicacion) && !isset($tipoIn)) {
            echo "No se reciben los POST";
            print_r($Ubicacion);
            print_r($tipoIn);
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function SegundaBusqueda()
    {
        $Ubicacion = $_POST['Colonia'];

        //$Ubicacion = $tipoIn = null;
        if (isset($Ubicacion) && !empty($Ubicacion)) {

            /* $Ubicacion = $_POST['buscarUbi'];
                $tipoIn = $_POST['tipoIn']; */

            $data['Bubuicacion'] = $this->mb->buscarInmueble3($Ubicacion);
            $data['Ubicacion'] = $this->mb->buscarInmueble2($Ubicacion);
            //print_r($data['Ubicacion']);
            $this->load->view('Front/busqueda_avanzada', $data);
        } elseif (!isset($Ubicacion) && !isset($tipoIn)) {
            echo "No se reciben los POST";
            print_r($Ubicacion);
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function iniciar_sesion()
    {
        if (isset($_POST['loginUsername']) && isset($_POST['loginPassword']) && !empty($_POST['loginUsername']) && !empty($_POST['loginPassword'])) {
            $where['correo'] = $this->input->post('loginUsername');
            $where['Contrasenia'] = $this->input->post('loginPassword');
            $ms = new M_login();
            $qu = $ms->consulta_existe_usuario($where);
            //echo $_SESSION['consulta'];

            if ($qu != false) {
                if ($qu->num_rows() > 0) {
                    $du = $qu->row();

                    $_SESSION[PREFIJO . '_idusuario'] = $du->Id_usuario;
                    $_SESSION[PREFIJO . '_idasesor'] = $du->Id_asesor;
                    $_SESSION[PREFIJO . '_nombre'] = $du->Nombre . ' ' . $du->Apellido;

                    echo 'correcto';
                } else echo 'Datos incorrectos';
            } else echo  'Error de conexión';
        } else echo 'Acceso denegado';
    }

    function cerrar_sesion()
    {
        unset($_SESSION[PREFIJO . '_idusuario']);
        unset($_SESSION[PREFIJO . '_idasesor']);
        unset($_SESSION[PREFIJO . '_nombre']);
    }

    public function Admin()
    {
        $this->load->view('Admin/empresa/Master');
    }

    public function filtros_busqueda()
    {
        $busqueda = $_POST['cadena'];

        if (isset($busqueda) && !empty($busqueda)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzado($busqueda);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($busqueda)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busqueda_FormaPago()
    {
        $busqueda = $_POST['cadena'];

        if (isset($busqueda) && !empty($busqueda)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoFormaPago($busqueda);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($busqueda)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busqueda_OtherFormaPago()
    {
        $data['Bubuicacion'] = $this->mb->FiltroAvanzadoOtherFormaPago();
        //print_r($data['Bubuicacion']);
        $this->load->view('Front/tabla', $data);
    }

    public function filtros_busqueda_plus()
    {
        $busqueda = $_POST['cadena'];

        if (isset($busqueda) && !empty($busqueda)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoPlus($busqueda);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($busqueda)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaEstacionamiento()
    {
        $busqueda = $_POST['cadena'];

        if (isset($busqueda) && !empty($busqueda)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoEstacionamiento($busqueda);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($busqueda)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busqueda_Estacionamiento_plus()
    {
        $busqueda = $_POST['cadena'];

        if (isset($busqueda) && !empty($busqueda)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoEstacionamientoPlus($busqueda);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($busqueda)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaPesos()
    {
        //$busqueda=$_POST['cadena'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $pesos = $_POST['pesos'];

        if (isset($desde) && !empty($desde) && isset($hasta) && !empty($hasta) && isset($pesos) && !empty($pesos)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoPeso($desde, $hasta, $pesos);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($tipoIn)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaDolar()
    {
        //$busqueda=$_POST['cadena'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];
        $dolares = $_POST['dolares'];

        if (isset($desde) && !empty($desde) && isset($hasta) && !empty($hasta) && isset($dolares) && !empty($dolares)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoDolar($desde, $hasta, $dolares);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($busqueda) && !isset($tipoIn)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busqueda_Construccion()
    {
        //$busqueda=$_POST['cadena'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];

        if (isset($desde) && !empty($desde) && isset($hasta) && !empty($hasta)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoConstruccion($desde, $hasta);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($desde) && !isset($hasta)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busqueda_Superficie()
    {
        //$busqueda=$_POST['cadena'];
        $desde = $_POST['desde'];
        $hasta = $_POST['hasta'];

        if (isset($desde) && !empty($desde) && isset($hasta) && !empty($hasta)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoSuperficie($desde, $hasta);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($desde) && !isset($hasta)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaCaracteristicas1()
    {
        //$busqueda=$_POST['cadena'];
        $AguaPotable = $_POST['AguaPotable'];
        /* $cuartoServicio = $_POST['cuartoServicio'];
        $alberca = $_POST['alberca'];
        $seguridad = $_POST['seguridad']; */

        if (isset($AguaPotable) && !empty($AguaPotable)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoCaracteristicas($AguaPotable);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($AguaPotable)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaCaracteristicas2()
    {
        //$busqueda=$_POST['cadena'];
        //$AguaPotable = $_POST['AguaPotable'];
        $cuartoServicio = $_POST['cuartoServicio'];
        /* $alberca = $_POST['alberca'];
        $seguridad = $_POST['seguridad']; */

        if (isset($cuartoServicio) && !empty($cuartoServicio)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoCaracteristicas2($cuartoServicio);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($cuartoServicio) && !isset($cuartoServicio)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaCaracteristicas3()
    {
        $alberca = $_POST['alberca'];

        if (isset($alberca) && !empty($alberca)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoCaracteristicas3($alberca);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($alberca) && !isset($alberca)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }

    public function filtros_busquedaCaracteristicas4()
    {
        $seguridad = $_POST['seguridad'];

        if (isset($seguridad) && !empty($seguridad)) {
            $data['Bubuicacion'] = $this->mb->FiltroAvanzadoCaracteristicas4($seguridad);
            //print_r($data['Bubuicacion']);
            $this->load->view('Front/tabla', $data);
        } elseif (!isset($seguridad) && !isset($seguridad)) {
            echo "No se reciben los POST";
        } else {
            echo "Error al realizar la busqueda";
        }
    }
}
