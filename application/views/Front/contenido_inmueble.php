<!doctype html>
<html lang="en">

<style>
    /* .item {
        display: block;
        width: 450px;
        height: 450px;
    }
    .item img {
        height: 450px;
        width: 500px;
        background-image: center;
    } */
    .carousel-inner > .item > img {
        object-fit: scale-down;
        height: 50vh;
        width: 100%;
    }
</style>

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
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBUf2cDjX6QTyLvUYGe5IQs748Sn_UzBKs"></script>
    <script src="<?=base_url()?>recursos/js/jquery-gmaps-latlon-picker.js"></script>
    <title>Bi07</title>
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

                <div id="mySidenav" class="sidenav font1">
                    <div class="closebtn-wrapper">
                        <p class="closebtn">
                            <span></span>
                        </p>
                    </div>
                </div>
                </div>
                </div>
            </nav>
        </header>
    <!-- Heder End -->

    <!-- Body Start -->
        <?= isset($contenidoIn) ? '<input type="hidden" name="key" id="key"value="' . $key . '">' : '' ?>
        <section class="properties-single inner-section-padding index" style="padding-top: 125px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                        <div class="property-title">
                            <h2><?= $contenidoIn->titulo ?>, Modelo <?= $contenidoIn->modelo ?>
                                <small><?php echo $contenidoIn->colonia; ?>, <?php echo $contenidoIn->municipio; ?>, <?php echo $contenidoIn->estado; ?></small>
                            </h2>
                            <h3><i class="fa fa-dollar"></i><?= $contenidoIn->cantidad ?> <?= $contenidoIn->tipo ?></h3>
                        </div>

                        <!-- Property image Slider Start -->
                            <div class="slideshow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <?php for ($i=0; $i < count($carusel); $i++) { ?>
                                                        <li data-target="<?= "#myCarousel". $i ?>" data-slide-to="<?= $i ?>" <?php if ($i == 0) { ?> class="active"<?php } ?>></li>
                                                    <?php } ?>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                    <?php 
                                                    $j = 0;
                                                    foreach ($carusel as $showFoto) { ?>                                                        
                                                        <div <?php if ($j == 0) { ?> class="item active"<?php }else { ?> class="item"<?php } ?>>
                                                            <img src="<?= base_url() . "recursos/galeria/". $showFoto->foto ?>" alt="Foto">
                                                        </div>
                                                        <?php $j++; ?>
                                                    <?php } ?>
                                                </div>

                                                <!-- Left and right controls -->
                                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                                    <span class="fa fa-arrow-left" style="padding-top: 238px;"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                                    <span class="fa fa-arrow-right" style="padding-top: 238px;"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Property image Slider End -->

                        <!-- Property Details Start -->
                            <div class="property-detail-wrapper ">
                                <h4 class="property-single-detail-title">Características del inmueble</h4>
                                <ul>
                                    <li>
                                        <p>Construcción - <?= $contenidoIn->construccion ?> m<sup>2</sup> </p>
                                    </li>
                                    <li>
                                        <p>Superficie - <?= $contenidoIn->superficie ?> m<sup>2</sup></p>                                        
                                    </li>
                                    <li>
                                        <p>&nbsp; Frente - <?= $contenidoIn->frente ?> m</p>                                        
                                    </li>
                                    <li>
                                        <p>&nbsp; Fondo - <?= $contenidoIn->fondo ?> m</p>                                        
                                    </li>
                                    <li>
                                        <p>Cuota mantenimiento - <?= $contenidoIn->tipo ?><i class="fa fa-dollar"></i><?= $contenidoIn->cuota ?></p>
                                    </li>
                                    <li>
                                        <p>Fecha de entrega - <?= $contenidoIn->fecha_entrega ?></p>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <p>Formas de pago aceptadas</p>
                                    </li>
                                    <li>
                                        <p>&nbsp;
                                            <?php foreach ($contenidoForIn as $formasP) { ?>
                                                &nbsp; -<?= $formasP->forma ?></p>&nbsp;
                                    <?php } ?>
                                    </li>
                                    <li>
                                        <p>Servicios</p>
                                    </li>
                                    <li>
                                        <p>&nbsp;
                                            <?php foreach ($serviceIn as $serveP) { ?>
                                                &nbsp; -<?= $serveP->servicio ?></p>&nbsp;
                                    <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        <!-- Property Details End -->

                        <!-- Property Details Equipment Start -->
                            <div class="property-detail-wrapper ">
                                <h4 class="property-single-detail-title">Planta arquitectónica</h4>
                                <ul>
                                    <li>
                                        <?php foreach ($plantaIn as $plant1I) { ?>
                                            <p> Planta <?= $plant1I->nombre ?> <br>&nbsp;
                                            &nbsp;  -<?= $plant1I->detalle ?></p>&nbsp;
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        <!-- Property Details Equipment End -->

                        <!-- Property Details Equipment Start -->
                            <div class="property-detail-wrapper ">
                                <h4 class="property-single-detail-title">Equipamiento</h4>
                                <ul>
                                    <li>
                                        <p>
                                            <?php foreach ($contenidoEquiIn as $equiP) { ?>
                                                -<?= $equiP->equipamiento ?></p>&nbsp;
                                    <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        <!-- Property Details Equipment End -->

                        <!-- Termina Inmueble -->

                        <!-- Property Description Desarrollo Start -->
                            <h3><?= $contenidoIn->nombre ?></h3>
                            <div class="property-description-wrapper" style="padding-top: 0px;">
                                <h4 class="property-single-detail-title">Detalles del desarrollo</h4>
                                <p><?= $contenidoIn->descripcion ?></p>
                            </div>
                        <!-- Property Description Desarrollo End -->

                        <!-- Property image Slider Start -->
                            <h4 class="property-single-detail-title">Galería del desarrollo</h4>
                            <div class="slideshow">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <?php for ($i=0; $i < count($carusel2); $i++) { ?>
                                                        <li data-target="<?= "#myCarousel". $i ?>" data-slide-to="<?= $i ?>" <?php if ($i == 0) { ?> class="active"<?php } ?>></li>
                                                    <?php } ?>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                    <?php 
                                                    $j = 0;
                                                    foreach ($carusel2 as $showFoto) { ?>                                                        
                                                        <div <?php if ($j == 0) { ?> class="item active"<?php }else { ?> class="item"<?php } ?>>
                                                            <img src="<?= base_url() . "recursos/galeria/". $showFoto->imagen ?>" alt="Foto">
                                                        </div>
                                                        <?php $j++; ?>
                                                    <?php } ?>
                                                </div>

                                                <!-- Left and right controls -->
                                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                                    <span class="fa fa-arrow-left" style="padding-top: 238px;"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                                    <span class="fa fa-arrow-right" style="padding-top: 238px;"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Property image Slider End -->

                        <!-- Property Amenities Start -->
                            <div class="property-amenities-wrapper">
                                <h4 class="property-single-detail-title">Amenidades</h4>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <ul>
                                            <li>
                                                <?php foreach ($AmenidadesIn as $amenidad) { ?>
                                                &nbsp;<p> <?= $amenidad->nombre ?></p>&nbsp;
                                                <?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <!-- Property Amenities End -->

                        <!-- Location Start -->
                            <div id="mapa" class="property-location-wrapper index" style="padding-bottom: 0px;">
                                <h4 class="property-single-detail-title">Localización</h4>
                                <!-- AQUI VA EL MAPA!!! -->
                            </div>
                            <div id="maps" class="content" style="padding-left: 95px;">
                                <!-- <fieldset class="gllpLatlonPicker">
                                    <div class="gllpMap" style="height: 300px; width: 100%; "></div>
                                    <input type="hidden" name="Latitud" class="gllpLatitude" value="<?php //isset($contenidoIn) ? $contenidoIn->Latitud : '20.974696042580334'?>"/>
                                    <input type="hidden" name="Longitud" class="gllpLongitude" value="<?php //isset($contenidoIn) ? $contenidoIn->Longitud : '-89.62717676209414'?>"/>
                                    <input type="hidden" name="Zoom" class="gllpZoom" value="<?php //isset($contenidoIn) ? $contenidoIn->Zoom : '11'?>"/>
                                </fieldset> -->
                                <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJFw1Fq1xxVo8RCeurFVcV_F0&key=AIzaSyAI1b4riNscRWl_auaOYOiI6o22U2KeZJw" allowfullscreen>
                                </iframe>
                            </div>
                        <!-- Location End -->

                        <!-- Other Properties Start -->
                            <div class="other-properties index" style="padding-top: 50px;">
                                <h4 class="property-single-detail-title">Otras propiedades dentro de esta área</h4>
                                <ul class="other-single-slider">                                    
                                <?php foreach ($consultaOthers as $data) { ?>
                                    <li>
                                        <div class="featured-properties text-left">
                                            <figure class="featured-image">
                                                <a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>">
                                                    <img src="<?= base_url() ?>recursos/galeria/<?= $data->foto ?>" alt="Imagen" width="200px;" height="200px;">
                                                    <span class="overlay-1"></span>
                                                </a>
                                            </figure>
                                            <h5><a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>"><?php echo $data->titulo; ?></a></h5>
                                            <span><?php echo $data->colonia; ?>, <?php echo $data->municipio; ?>, <?php echo $data->estado; ?></span>
                                            <span class="price"><i class="fa fa-dollar"></i><?php echo $data->cantidad; ?></span>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <!-- Other Properties End -->
                    </div>

                    <!-- Envio de correo -->
                        <div class="col-xs-12 col-sm-5 col-md-4 side-bar">
                            <form onsubmit="enviar(this, event);">
                                <div class="search-porperties text-left">
                                    <h6 class="sidebar-title">Enviar consulta</h6>
                                    <div class="search-box">
                                        <input type="hidden" name="claveInmueble" id="claveInmueble" value="<?= $contenidoIn->inmueble_id ?>" >
                                        <input type="hidden" name="tituloInmueble" id="tituloInmueble" value="<?= $contenidoIn->titulo ?>" >
                                        <input type="hidden" name="correoAsesor" id="correoAsesor" value="<?= $contenidoIn->Correo ?>" >
                                        <input type="hidden" name="nombreAsesor" id="nombreAsesor" value="<?= $contenidoIn->Nombre ?>" >
                                        <input type="text" name="name" id="name" placeholder="Nombre *">
                                        <input type="text" name="correoElec" id="correoElec" placeholder="Correo *">
                                        <input type="text" name="numTel" id="numTel" placeholder="No. teléfono *">
                                        <textarea name="sms" id="sms">Hola, me interesa este inmueble que vi y quiero que me contacten. Gracias.</textarea>
                                        <button class="btn-1 bg2"><span>Contactar</span></button>
                                    </div>
                                </div>
                            </form>

                            <div class="popular-news text-left">
                                <h6 class="sidebar-title">Otros productos del desarrollo</h6>
                                    <?php foreach ($contentIn as $mostrarContent) { 
                                      //print_r($mostrarContent);  ?>
                                <div class="news">
                                    <figure>
                                        <a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>/<?= $data->modelo ?>/<?= $data->desarrollo_id ?>">
                                            <!-- <img src="<?= base_url() ?>assets/images/property-list-view-agent.jpg" alt="img"> -->
                                            <img src="<?= base_url() ?>recursos/galeria/<?= $data->foto ?>" alt="img" width="70px" height="70px">
                                        </a>
                                    </figure>
                                    <div class="popular-news-title">
                                        <h6><a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>/<?= $data->modelo ?>/<?= $data->desarrollo_id ?>"><?= $mostrarContent->titulo ?>, Modelo <?= $mostrarContent->modelo ?></a></h6>
                                        <span><?= $mostrarContent->colonia; ?>, <?= $mostrarContent->municipio; ?>, <?= $mostrarContent->estado; ?></span>
                                        <span class="price"><i class="fa fa-dollar"></i><?php echo $mostrarContent->cantidad; ?></span>
                                    </div>
                                </div>
                                 <?php } ?>
                            </div>
                        </div>
                    <!-- Envio de correo END -->
                </div>
            </div>
        </section>
    <!-- Body End -->

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
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
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
        </script>
</body>

</html>