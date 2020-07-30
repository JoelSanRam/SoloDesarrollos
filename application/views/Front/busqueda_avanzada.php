<!doctype html>
<style>
    .bg6 {
        background-color: #ffffff;
        color: #232222;
        border: 1px solid transparent;
        letter-spacing: 0.9px
    }

    .etiqueta2 {
        position: relative;
        display: inline-block;
        background-color: #CBEDFF;
        color: #3b3b3b;
        font-size: 12px;
        line-height: 24px;
        padding: 0 11px 0 10px;
        border-radius: 17.5px;
        margin: 7px 3px 7px 0;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        box-sizing: border-box;
    }

    .iconClose {
        cursor: pointer;
    }

    .boton-personalizado {
        text-decoration: none;
        font-weight: 600;
        font-size: 20px;
        color: #000000;
        padding-top: 15px;
        padding-bottom: 15px;
        padding-left: 40px;
        padding-right: 40px;
        background-color: transparent;
        border-width: 3px;
        border-style: solid;
        border-color: #000000;
    }

    .btn-personalizado:hover {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .boton {
        /* width:45px;
        height:45px; */
        background-color: transparent;
        border-color: #17a2b8;
        margin: 5px;
        padding: 10px;
        border-width: 1px;
        border-style: solid;
        /* font-size:15px;
        line-height:32px; */
        text-transform: uppercase;
        float: left;
        border-radius: 35px;
        cursor: pointer;
    }

    .boton:hover {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .boton2 {
        width: 45px;
        height: 45px;
        background-color: transparent;
        border-color: #17a2b8;
        margin: 5px;
        padding: 10px;
        border-width: 1px;
        border-style: solid;
        /* font-size:15px;
        line-height:32px; */
        text-transform: uppercase;
        float: left;
        border-radius: 35px;
        cursor: pointer;
    }

    .boton2:hover {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .boton3 {
        /* width:45px;
        height:45px; */
        background-color: transparent;
        border-color: #17a2b8;
        margin: 5px;
        padding: 10px;
        border-width: 1px;
        border-style: solid;
        font-size: 10px;
        /* line-height:32px; */
        text-transform: uppercase;
        float: left;
        border-radius: 35px;
        cursor: pointer;
    }

    .boton3:hover {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
</style>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.bxslider.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800,900%7CSintony:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/lightbox.css" />
    <link rel="stylesheet" href="<?= base_url() ?>style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">
    <title>ModernHaus - Real Estate HTML5 Template</title>
</head>

<body>
    <!-- Header Start -->
        <header class="fifth-header scroll">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="open-btn navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
                    </button>

                    <a class="logo" href="<?= base_url() ?>C_home">
                        <img src="<?= base_url() ?>assets/images/LOGO_FINAL_BLANCO_FONDO_TRANSP.png" alt="Logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse nopad" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav text-uppercase font1">
                        <li>
                            <?php if (!isset($_SESSION[PREFIJO . '_idasesor'])) { ?>
                                <a href="#" style="left: 760px;" data-toggle="modal" data-target="#login">Iniciar sesion</a>
                            <?php } elseif (isset($_SESSION[PREFIJO . '_idasesor'])) { ?>
                                <a href="#" style="left: 760px;"><?= $_SESSION[PREFIJO . '_nombre'] ?></a>
                                <ul class="drop-menu menu-1" style="left: 675px;">
                                    <li><a href="#"><?= $_SESSION[PREFIJO . '_nombre'] ?></a></li>
                                    <li><a href="#" onclick="cerrarSesion();">Cerrar sesión</a></li>
                                </ul>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <!-- Heder End -->

    <!-- Property List Start-->
        <section class="property-list-sidebar-wrapper text-center index section-padding" style="top: 55px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-8 nopad" id="mostrar">
                        <?php include_once('tabla.php'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-4 side-bar">
                        <div class="daily-email bg6 text-left">
                            <h4>Elección Actual</h4>
                            <ul>
                                <li>
                                    <span id="spanX" class="etiqueta2"><?= $Ubicacion->tipo ?> <!-- <i id="iconoX" class="iconClose fa fa-close" aria-hidden="true"></i> --></span>
                                    <span id="spanX2" class="etiqueta2"><?= $Ubicacion->municipio ?> <!-- <i id="iconoX2" class="iconClose fa fa-close" aria-hidden="true"></i> --></span>
                                    <span id="spanX3" class="etiqueta2"><?= $Ubicacion->estado ?> <!-- <i id="iconoX3" class="iconClose fa fa-close" aria-hidden="true"></i> --></span>
                                </li>
                            </ul>
                        </div>
                        <div class="daily-email bg6 text-left">
                            <form action="<?= base_url() ?>C_home/SegundaBusqueda" method="POST">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" id="Colonia" name="Colonia" placeholder="Colonia">
                                        </div>
                                        <div class="col-md-3">
                                            <a href="" type="submit">
                                            <button class="bg1"><i class="fa fa-search"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div><br>
                            </form>
                            <button class="btn-1 bg1"><span>Ubicación</span></button>
                        </div>
                        <div class="popular-news text-left">
                            <h6 class="sidebar-title">Presupuesto &nbsp;<i class="fa fa-dollar"></i></h6>
                            <div class="class=news">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input class="radio-input" type="checkbox" name="pesos" id="pesos" value="MXN">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="pesos" style="padding-top: 17px;">Pesos</label>
                                        </div>
                                        <div class="col-md-1">
                                            <input class="radio-input" type="checkbox" name="dolares" id="dolares" value="USD">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="dolares" style="padding-top: 16px;">Dolares</label>
                                        </div>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="PreDesde" id="PreDesde" placeholder="Desde" /*onkeyup="buscar_ajax(this.value);"*/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="PreHasta" id="PreHasta" placeholder="Hasta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="popular-news text-left">
                            <h6 class="sidebar-title">Recámaras &nbsp;<i class="fa fa-bed" aria-hidden="true"></i></h6>
                            <div class="news">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_ajax(this.value);" value="1">1 Recámara</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_ajax(this.value);" value="2">2 Recámaras</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_ajax(this.value);" value="3">3 Recámaras</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_ajax_plus(this.value);" value="4">+4Recámaras</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popular-news text-left">
                            <h6 class="sidebar-title">Estacionamiento &nbsp;<i class="fa fa-car"></i></h6>
                            <div class="news">
                                <div class="container-fluid" style="padding-left: 0px;padding-right: 15px;">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-left: 27px;margin-top: 10px;padding-left: 0px;">
                                            <button class="boton2" onclick="buscar_ajaxEstacionamiento(this.value);" value="0">0</button>
                                            <button class="boton2" onclick="buscar_ajaxEstacionamiento(this.value);" value="1">1</button>
                                            <button class="boton2" onclick="buscar_ajaxEstacionamiento(this.value);" value="2">2</button>
                                            <button class="boton2" onclick="buscar_ajaxEstacionamiento(this.value);" value="3">3</button>
                                            <button class="boton2" onclick="buscar_ajax_Estacionamiento_plus(this.value);" value="4">+4</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popular-news text-left">
                            <h6 class="sidebar-title">Superficie</h6>
                            <div class="class=news">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input class="radio-input" type="radio" name="construccion" name="construccion" value="construccion">
                                        </div>
                                        <div class="col-md-3" style="padding-left: 2px;">
                                            <label for="pesos" style="padding-top: 17px;">Construcción</label>
                                        </div>
                                        <div class="col-md-4" style="top:5px;">
                                            <input type="text" name="ConstruccDesde" id="ConstruccDesde" placeholder="Desde">
                                        </div>
                                        <div class="col-md-4" style="top:5px;">
                                            <input type="text" name="ConstruccHasta" id="ConstruccHasta" placeholder="Hasta">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input class="radio-input" type="radio" name="superficie" value="superficie" name="superficie">
                                        </div>
                                        <div class="col-md-3" style="padding-left: 2px;">
                                            <label for="pesos" style="padding-top: 17px;">Terreno</label>
                                        </div>
                                        <div class="col-md-4" style="top:5px;">
                                            <input type="text" name="superficieDesde" id="superficieDesde" placeholder="Desde">
                                        </div>
                                        <div class="col-md-4" style="top:5px;">
                                            <input type="text" name="superficieHasta" id="superficieHasta" placeholder="Hasta">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popular-news text-left">
                            <h6 class="sidebar-title">Forma de pago &nbsp;<i class="fa fa-hand-holding-usd"></i></h6>
                            <div class="news">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="boton3" onclick="buscar_FormaPago(this.value);" value="Recurso Propio">Recurso propio</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="boton3" onclick="buscar_FormaPago(this.value);" value="Credito Bancario">Crédito Bancario</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_FormaPago(this.value);" value="INFONAVIT">Infonavit</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_FormaPago(this.value);" value="COFINAVIT">Cofinavit</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_FormaPago(this.value);" value="FOVISSTE">Fovisste</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="boton" onclick="buscar_OtherFormaPago();">Otros</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popular-news text-left">
                            <h6 class="sidebar-title">Características de la propiedad y servicios</h6>
                            <div class="news">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" class="checkmark" name="AguaPotable" id="AguaPotable" value="Agua Potable">
                                        </div>
                                        <div class="col-md-10" style="padding-top: 6px;padding-left: 0px;">
                                            <label for="">Agua Potable</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" class="checkmark" name="cuartoServicio" id="cuartoServicio" value="Cuarto Servicio">
                                        </div>
                                        <div class="col-md-10" style="padding-top: 6px;padding-left: 0px;">
                                            <label for="">Cuarto Servicio</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" class="checkmark" name="alberca" id="alberca" value="Alberca">
                                        </div>
                                        <div class="col-md-10" style="padding-top: 6px;padding-left: 0px;">
                                            <label for="">Alberca</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" class="checkmark" name="seguridad" id="seguridad" value="Seguridad">
                                        </div>
                                        <div class="col-md-10" style="padding-top: 6px;padding-left: 0px;">
                                            <label for="">Seguridad</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Property List End-->

    <!-- Subscribe Start -->
        <section class="subscribe-wrapper bg3 reveal index">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">

                    </div>
                </div>
            </div>
        </section>
    <!-- Subscribe End -->

    <!--Login Modal Start -->
        <section class="login-modal">
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="login" role="dialog">
                    <div class="modal-dialog modal-xs">
                        <form action="" onsubmit="ingresar(this,event);">
                            <div class="modal-content">
                                <a href="#" class="modal-close" data-dismiss="modal">
                                    <span></span>
                                    <span></span>
                                </a>
                                <div class="login-wrapper">
                                    <div class="modal-header">
                                        <h2 class="text-center text-uppercase">Welcome Back</h2>
                                        <div class="dis-title text-center">
                                            <p>Log in to your account to see the most homes and enjoy the full experience.</p>
                                        </div>
                                    </div>
                                    <div class="modal-body text-center">
                                        <input type="text" name="loginUsername" id="loginUsername" placeholder="Username">
                                        <input type="password" name="loginPassword" id="loginPassword" placeholder="Password">
                                        <button class="btn-1">
                                            <span>Log in</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <!--Login Modal End -->

    <!--Contact Modal Start -->
        <?php foreach ($Bubuicacion as $data) { ?>
            <div class="modal fade" id="contactModal<?= $data->inmueble_id ?>" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalLabel">Enviar consulta</h5>
                        <a href="#" class="modal-close" data-dismiss="modal">
                                    <span></span>
                                    <span></span>
                                </a>
                    </div>
                        <form onsubmit="enviar(this, event);">
                    <div class="modal-body">
                            <div class="search-porperties text-left">
                                <div class="search-box">
                                    <input type="hidden" name="claveInmueble" id="claveInmueble" value="<?= $data->inmueble_id ?>" >
                                    <input type="hidden" name="tituloInmueble" id="tituloInmueble" value="<?= $data->titulo ?>" >
                                    <input type="hidden" name="correoAsesor" id="correoAsesor" value="<?= $data->Correo ?>" >
                                    <input type="hidden" name="nombreAsesor" id="nombreAsesor" value="<?= $data->Nombre ?>" >
                                    <input type="text" name="name" id="name" placeholder="Nombre *">
                                    <input type="text" name="correoElec" id="correoElec" placeholder="Correo *">
                                    <input type="text" name="numTel" id="numTel" placeholder="No. teléfono *">
                                    <textarea name="sms" id="sms">Hola, me interesa este inmueble que vi y quiero que me contacten. Gracias.</textarea>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Contactar</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    <!--Contact Modal End -->

    <!-- Footer Start -->
        <footer>
            <div class="container">
                <p class="copyright text-center"><i class="fa fa-copyright"></i> Copyright ModernHaus. All Rights Reserved. - 2018</p>
            </div>
        </footer>
    <!-- Footer End -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8=" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.bxslider.min.js"></script>
    <script src="<?= base_url() ?>assets/js/ion.rangeSlider.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets/js/lightbox.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/waypoints.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
	<script src="<?= base_url() ?>assets/assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
</body>
<script>
    $(document).ready(function(){
    });

    $("#iconoX").click(function(event) {
        $("#iconoX").remove();
        $("#spanX").remove();
    });

    $("#iconoX2").click(function(event) {
        $("#iconoX2").remove();
        $("#spanX2").remove();
    });

    $("#iconoX3").click(function(event) {
        $("#iconoX3").remove();
        $("#spanX3").remove();
    });

    function ingresar(f, e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>C_home/iniciar_sesion",
            data: $(f).serialize(),
            success: function(resp) {
                if (resp == 'correcto') {
                    swal({
                        title: 'Éxito',
                        text: 'Éxito al ingresar',
                        button: false,
                        timer: 2500
                    });
                    location.reload();
                } else {
                    swal({
                        title: 'Falló',
                        text: 'Falló al ingresar',
                        button: false,
                        timer: 2500
                    });
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);
            }
        });
    }

    function cerrarSesion() {
        $.ajax({
            url: '<?= base_url() ?>C_home/cerrar_sesion',
            type: 'POST',
            async: true,
            success: function(htmlcode) {
                    location.reload();
            },
            error: function(XMLHttpRequest, errMsg, exception) {
                console.log(errMsg, "error");
            }
        });
    }

    function enviar(form, event){
            event.preventDefault();
            var formData = new FormData(form);
            $.ajax({
                url : '<?=base_url()?>Front/C_contenido/envioCorreo',
                data : formData,
                type : 'POST',
                async: false,
                success : function(data) {
                    if(data > 0){
                        swal({
                            icon: 'success',
                            title: 'Exito',
                            text: 'El mensaje ha sido enviado exitosamente',
                            button: false,
                            timer: 1500
                        })
                        $("#name").val(null);
                        $("#correoElec").val(null);
                        $("#numTel").val(null);
                    }else{
                        swal({
                            icon: 'error',
                            title: 'Algo ha salido mal',
                            text: 'La operación no pudo completarse',
                            button: false,
                            timer: 1500
                        })
                    }
                    console.log(data);
                },
                error : function(xhr, status) {
                    alert("error");
                },
                cache: false,
                contentType: false,
                processData: false
            });
    }

    function buscar_ajax(cadena){
		$.ajax({
            type: 'POST',
            url: '<?=base_url()?>C_home/filtros_busqueda',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
            }
	    });
	}

    function buscar_ajax_plus(cadena){
		$.ajax({
            type: 'POST',
            url: '<?=base_url()?>C_home/filtros_busqueda_plus',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
            }
	    });
	}

    function buscar_ajaxEstacionamiento(cadena){
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>C_home/filtros_busquedaEstacionamiento',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
            }
        });
    }

    function buscar_ajax_Estacionamiento_plus(cadena){
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>C_home/filtros_busqueda_Estacionamiento_plus',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
            }
        });
    }

    function buscar_FormaPago(cadena){
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>C_home/filtros_busqueda_FormaPago',
            data: 'cadena=' + cadena,
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
            }
        });
    }

    function buscar_OtherFormaPago(){
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>C_home/filtros_busqueda_OtherFormaPago',
            success: function(respuesta) {
                //Copiamos el resultado en #mostrar
                $('#mostrar').html(respuesta);
            }
        });
    }

    $( "#PreHasta" ).keyup(function() {
        //alert($( "#PreHasta" ).val());
        var desde = $( "#PreDesde" ).val();
        var hasta = $( "#PreHasta" ).val();
        var pesos = $('input:checkbox[name=pesos]:checked').val();
        var dolares = $('input:checkbox[name=dolares]:checked').val();

        if ($('input:checkbox[name=pesos]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busquedaPesos',
                data: {
                    desde: desde,
                    hasta: hasta,
                    pesos: pesos
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
	        });
        }
        if ($('input:checkbox[name=dolares]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busquedaDolar',
                data: {
                    desde: desde,
                    hasta: hasta,
                    dolares: dolares
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
	        });
        }
    });

    $( "#ConstruccHasta" ).keyup(function() {
        var desde = $( "#ConstruccDesde" ).val();
        var hasta = $( "#ConstruccHasta" ).val();
        var construccion = $('input:radio[name=construccion]:checked').val();
        //alert(construccion);    

        if ($('input:radio[name=construccion]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busqueda_Construccion',
                data: {
                    desde: desde,
                    hasta: hasta
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
            });
        }
    });

    $( "#superficieHasta" ).keyup(function() {
        var desde = $( "#superficieDesde" ).val();
        var hasta = $( "#superficieHasta" ).val();
        var superficie = $('input:radio[name=superficie]:checked').val();
        //alert(construccion);    

        if ($('input:radio[name=superficie]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busqueda_Superficie',
                data: {
                    desde: desde,
                    hasta: hasta
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
            });
        }
    });

    $("#AguaPotable").click(function () {	 		
        var AguaPotable = $('input:checkbox[name=AguaPotable]:checked').val();
        //alert($('input:checkbox[name=cuartoServicio]:checked').val());

        if ($('input:checkbox[name=AguaPotable]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busquedaCaracteristicas1',
                data: {
                    AguaPotable: AguaPotable
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
            });
        }
	});

    $("#cuartoServicio").click(function () {
        var cuartoServicio = $('input:checkbox[name=cuartoServicio]:checked').val();
        //alert($('input:checkbox[name=cuartoServicio]:checked').val());
        if ($('input:checkbox[name=cuartoServicio]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busquedaCaracteristicas2',
                data: {
                    cuartoServicio: cuartoServicio
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
            });
        }
	});

    $("#alberca").click(function () {
        var alberca = $('input:checkbox[name=alberca]:checked').val();
        //alert($('input:checkbox[name=cuartoServicio]:checked').val());
        if ($('input:checkbox[name=alberca]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busquedaCaracteristicas3',
                data: {
                    alberca: alberca
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
            });
        }
	});

    $("#seguridad").click(function () {
        var seguridad = $('input:checkbox[name=seguridad]:checked').val();
        //alert($('input:checkbox[name=cuartoServicio]:checked').val());
        if ($('input:checkbox[name=seguridad]:checked').val()) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>C_home/filtros_busquedaCaracteristicas4',
                data: {
                    seguridad: seguridad
                },
                success: function(respuesta) {
                    //Copiamos el resultado en #mostrar
                    $('#mostrar').html(respuesta);
                }
            });
        }
    });
</script>

</html>