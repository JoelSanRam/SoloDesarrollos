<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

defined('BASEPATH') or exit('No direct script access allowed');

class C_contenido extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->model('Usuario/M_contenido', 'mc');
        $this->load->model('Usuario/M_busqueda', 'mb');
        $this->load->database();
    }

    public function contenido($key, $idDesarrollo, $modelo)
    {
        $data['contenidoIn'] = $this->mc->datosGaleria($key);
        $data['contentIn'] = $this->mc->datosGaleria2($key, $idDesarrollo, $modelo);
        $data['serviceIn'] = $this->mc->datosServicioInmueble($key);
        $data['AmenidadesIn'] = $this->mc->datosAmenidadesDesarrollo($key);
        //Planta
        $data['plantaIn'] = $this->mc->datosPlantaDosInmueble($key);
        //End Planta
        $data['contenidoForIn'] = $this->mc->datosFormaInmueble($key);
        $data['contenidoEquiIn'] = $this->mc->datosEquipamoentoInmueble($key);
        $data['consulta'] = $this->mb->mostrarFoto();
        //Imagenes
        $data['showFotos'] = $this->mc->mostrarGaleria($key);
        $data['carusel'] = $this->mc->showCarrusel($key);
        $data['carusel2'] = $this->mc->showCarrusel2($key);
        $data['consultaOthers'] = $this->mb->mostrarFotoOthers($key);
        //End Imagenes
        $data['key'] = $key;
        $_SESSION['usuarioV'] = null;
        //print_r($data['contenidoIn']);
        //print_r($data['contentIn']);
        //print_r($data['plantaIn']);
        $this->load->view('Front/contenido_inmueble', $data);
    }

    public function envioCorreo()
    {

        if (isset($_POST['name']) && isset($_POST['numTel']) && isset($_POST['correoElec']) && isset($_POST['sms']) && isset($_POST['claveInmueble']) && isset($_POST['correoAsesor'])) {

            $data = array();

            $data['Nombre'] = $this->input->post('name');
            $data['Telefono'] = $this->input->post('numTel');
            $data['Correo'] = $this->input->post('correoElec');
            $data['Estatus'] = 'Por contactar';
            $data['Mensaje'] = $this->input->post('sms');
            $data['inmueble_id'] = $this->input->post('claveInmueble');
            $data['Activo'] = 1;

            $claveInmueble  = $this->input->post('tituloInmueble');
            $tituloInmueble  = $this->input->post('tituloInmueble');
            $correoAsesor  = $this->input->post('correoAsesor');
            $nombreAsesor  = $this->input->post('nombreAsesor');
            $correoUsuario  = $this->input->post('correoElec');
            $nombreUsuario  = $this->input->post('name');
            $smsUsuario  = $this->input->post('sms');
            $numTelUsuario  = $this->input->post('numTel');

            $mensaje = array(
                $numTelUsuario,
                $smsUsuario
            );

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'kg9229794@gmail.com';                     // SMTP username
                $mail->Password   = '$A$ha1997';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom($correoUsuario, $nombreUsuario);
                $mail->addAddress($correoAsesor, $nombreAsesor);     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $tituloInmueble;
                $mail->Body    = $smsUsuario;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $envioCorreo = $mail->send();

                if ($envioCorreo == true) {
                    $resultado = $this->mc->sendCorreo($data);
                    echo $resultado;
                }
            } catch (Exception $e) {
                echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
            }
        } else {
            //Mensaje en caso de que no reciba el POST
            echo "Falla algo";
        }
    }
}
