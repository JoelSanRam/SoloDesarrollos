<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!doctype html>
<html lang="esp">

<style type="text/css">
    /* .boton_1 {
        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
    } */
    .boton_1{
        color: white;
        background: #4ea94f;
        border: 1px solid #005EB8;
        padding-top: 12px;
        padding-right: 25px;
        padding-bottom: 12px;
        padding-left: 25px;
        text-align: center;
        display: inline-block;
        font-size: 13px;
        margin: 0px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
        text-transform: uppercase;
        position: relative;
        overflow: hidden;
        font-family: sans-serif;
    }
    .boton_1:hover{
        background-color: #005EB8;
        color: white;
        border: none;
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">
    <title>Solo Desarrollos</title>
</head>

<body>
    <!-- Header Start -->
        <header class="first-header scroll">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="open-btn navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
                    </button>

                    <a class="logo" href="<?= base_url() ?>C_home">
                        <img src="<?= base_url() ?>assets/images/LOGO FINAL COLOR 24 7 TANSP.png" alt="Logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse nopad" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav text-uppercase font1">
                        <li>
                            <?php if (!isset($_SESSION[PREFIJO . '_idasesor'])) { ?>
                                <a href="#" style="left: 180px;" data-toggle="modal" data-target="#login">Iniciar sesion</a>
                            <?php } elseif (isset($_SESSION[PREFIJO . '_idasesor'])) { ?>
                                <a href="#" style="left: 180px;"><?= $_SESSION[PREFIJO . '_nombre'] ?></a>
                                <ul class="drop-menu menu-1" style="left: 100px;">
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

    <!-- Banner Start -->
        <section class="banner-wrapper index">
            <ul class="banner-slider">
                <li>
                    <figure>
                        <img src="<?= base_url() ?>assets/images/cenote-blanca-flor-1920x700.jpg" alt="">
                    </figure>
                    <div class="overlay"></div>
                </li>
                <li>
                    <figure>
                        <img src="<?= base_url() ?>assets/images/Yucatan2.jpg" alt="">
                    </figure>
                    <div class="overlay"></div>
                </li>
                <li>
                    <figure>
                        <img src="<?= base_url() ?>assets/images/Yucatan-1920X700.jpg" alt="">
                    </figure>
                    <div class="overlay"></div>
                </li>
                <li>
                    <figure>
                        <img src="<?= base_url() ?>assets/images/Yucatan3-1920X700.jpg" alt="">
                    </figure>
                    <div class="overlay"></div>
                </li>
                <li>
                    <figure>
                        <img src="<?= base_url() ?>assets/images/Yucatan4-1920X700.jpg" alt="">
                    </figure>
                    <div class="overlay"></div>
                </li>
            </ul>

            <div class="banner-text text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <form action="<?= base_url() ?>C_home/search" method="POST">
                            <div class="search">
                                <div class="col-md-3 col-sm-4 col-xs-4 nopad padding">
                                    <select name="tipoIn" id="tipoIn">
                                        <option value="0">Tipo de inmueble</option>
                                        <option value="Casa">Casa</option>
                                        <option value="Departamento">Departamento</option>
                                        <option value="Villa">Villa</option>
                                        <option value="Town House">Town House</option>
                                    </select>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12 nopad padding">
                                    <input type="text" id="buscarUbi" name="buscarUbi" placeholder="Ubicacion o palabra clave">
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-4 nopad padding">
                                    <!-- <a href="" type="submit" class="boton_1"><span><i class="fa fa-search"></i> Buscar</span></a> -->
                                    <button type="submit" class="boton_1" >
                                        <span><i class="fa fa-search"></i> Buscar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
        </section>
    <!-- Banner End -->

    <!-- Featured Properties Start -->
        <section class="featured-properties-wrapper index section-padding text-center">
            <div class="container">
                <h2 class="main-title text-center">Propiedades Destacadas</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-xs-12">
                        <div class="tab-box">
                            <div class="border"></div>
                            <ul class="nav-tabs text-uppercase font1">
                                <li class="active"><a data-toggle="tab" href="#">Desarrollos</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="first" class="tab-pane fade in active">
                                    <?php foreach ($consulta as $data) { ?>
                                        <div class="col-md-4 col-sm-6 col-xs-6">
                                            <div class="featured-properties text-left">
                                                <figure class="featured-image">
                                                    <figure class="featured-image">
                                                        <figure class="featured-image">
                                                            <a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>/<?= $data->modelo ?>/<?= $data->desarrollo_id ?>">
                                                                <img src="<?= base_url() ?>recursos/galeria/<?= $data->foto ?>" alt="Imagen">
                                                                <span class="overlay-1"></span>
                                                            </a>
                                                        </figure>
                                                        <h5><?php echo $data->titulo; ?></h5>
                                                        <span><?php echo $data->colonia; ?>, <?php echo $data->municipio; ?>, <?php echo $data->estado; ?></span>
                                                        <span class="price"><i class="fa fa-dollar"></i><?php echo $data->cantidad; ?></span>
                                                    </figure>
                                                </figure>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
    <!-- Featured Properties End -->

    <!-- Quick Links Tab start -->
        <section class="ouick-links-wrapper reveal index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <ul class="tabs font1">
                            <li class="active" rel="tab1">Popular Searches</li>
                            <li rel="tab2">Rental Properties</li>
                            <li rel="tab3">Apartments &amp; Units</li>
                            <li rel="tab4">Commercial</li>
                        </ul>
                        <div class="tab_container">
                            <h6 class="d_active tab_drawer_heading" rel="tab1">Popular Searches</h6>
                            <div id="tab1" class="tab_content">
                                <ul>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Buffalo Real Estate</a></li>
                                    <li><a href="#">Burlington Real Estate</a></li>
                                    <li><a href="#">Charleston Real Estate</a></li>
                                    <li><a href="#">Charlotte Real Estate</a></li>
                                    <li><a href="#">Chicago Real Estate</a></li>
                                    <li><a href="#">Cincinnati Real Estate</a></li>
                                    <li><a href="#">Cleveland Real Estate</a></li>
                                    <li><a href="#">Columbia Real Estate</a></li>
                                    <li><a href="#">Columbus Real Estate</a></li>
                                    <li><a href="#">Dallas Real Estate</a></li>
                                    <li><a href="#">Dayton Real Estate</a></li>
                                    <li><a href="#">Denver Real Estate</a></li>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Detroit Real Estate</a></li>
                                    <li><a href="#">El Paso Real Estate</a></li>
                                    <li><a href="#">Fort Lauderdale Real Estate</a></li>
                                    <li><a href="#">Fort Myers Real Estate</a></li>
                                    <li><a href="#">Fort Worth Real Estate</a></li>
                                    <li><a href="#">Grand Rapids Real Estate</a></li>
                                    <li><a href="#">Greenville Real Estate</a></li>
                                    <li><a href="#">Houston Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                </ul>
                            </div>

                            <!-- #tab1 -->
                            <h6 class="tab_drawer_heading" rel="tab2">Rental Properties</h6>
                            <div id="tab2" class="tab_content">
                                <ul>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Buffalo Real Estate</a></li>
                                    <li><a href="#">Burlington Real Estate</a></li>
                                    <li><a href="#">Charleston Real Estate</a></li>
                                    <li><a href="#">Charlotte Real Estate</a></li>
                                    <li><a href="#">Chicago Real Estate</a></li>
                                    <li><a href="#">Cincinnati Real Estate</a></li>
                                    <li><a href="#">Cleveland Real Estate</a></li>
                                    <li><a href="#">Columbia Real Estate</a></li>
                                    <li><a href="#">Columbus Real Estate</a></li>
                                    <li><a href="#">Dallas Real Estate</a></li>
                                    <li><a href="#">Dayton Real Estate</a></li>
                                    <li><a href="#">Denver Real Estate</a></li>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Detroit Real Estate</a></li>
                                    <li><a href="#">El Paso Real Estate</a></li>
                                    <li><a href="#">Fort Lauderdale Real Estate</a></li>
                                    <li><a href="#">Fort Myers Real Estate</a></li>
                                    <li><a href="#">Fort Worth Real Estate</a></li>
                                    <li><a href="#">Grand Rapids Real Estate</a></li>
                                    <li><a href="#">Greenville Real Estate</a></li>
                                    <li><a href="#">Houston Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                </ul>
                            </div>

                            <!-- #tab2 -->
                            <h6 class="tab_drawer_heading" rel="tab3">Apartments &amp; Units</h6>
                            <div id="tab3" class="tab_content">
                                <ul>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Buffalo Real Estate</a></li>
                                    <li><a href="#">Burlington Real Estate</a></li>
                                    <li><a href="#">Charleston Real Estate</a></li>
                                    <li><a href="#">Charlotte Real Estate</a></li>
                                    <li><a href="#">Chicago Real Estate</a></li>
                                    <li><a href="#">Cincinnati Real Estate</a></li>
                                    <li><a href="#">Cleveland Real Estate</a></li>
                                    <li><a href="#">Columbia Real Estate</a></li>
                                    <li><a href="#">Columbus Real Estate</a></li>
                                    <li><a href="#">Dallas Real Estate</a></li>
                                    <li><a href="#">Dayton Real Estate</a></li>
                                    <li><a href="#">Denver Real Estate</a></li>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Detroit Real Estate</a></li>
                                    <li><a href="#">El Paso Real Estate</a></li>
                                    <li><a href="#">Fort Lauderdale Real Estate</a></li>
                                    <li><a href="#">Fort Myers Real Estate</a></li>
                                    <li><a href="#">Fort Worth Real Estate</a></li>
                                    <li><a href="#">Grand Rapids Real Estate</a></li>
                                    <li><a href="#">Greenville Real Estate</a></li>
                                    <li><a href="#">Houston Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                </ul>
                            </div>

                            <!-- #tab3 -->
                            <h6 class="tab_drawer_heading" rel="tab4">Commercial</h6>
                            <div id="tab4" class="tab_content">
                                <ul>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Buffalo Real Estate</a></li>
                                    <li><a href="#">Burlington Real Estate</a></li>
                                    <li><a href="#">Charleston Real Estate</a></li>
                                    <li><a href="#">Charlotte Real Estate</a></li>
                                    <li><a href="#">Chicago Real Estate</a></li>
                                    <li><a href="#">Cincinnati Real Estate</a></li>
                                    <li><a href="#">Cleveland Real Estate</a></li>
                                    <li><a href="#">Columbia Real Estate</a></li>
                                    <li><a href="#">Columbus Real Estate</a></li>
                                    <li><a href="#">Dallas Real Estate</a></li>
                                    <li><a href="#">Dayton Real Estate</a></li>
                                    <li><a href="#">Denver Real Estate</a></li>
                                    <li><a href="#">Albany Real Estate</a></li>
                                    <li><a href="#">Albuquerque Real Estate</a></li>
                                    <li><a href="#">Alexandria Real Estate</a></li>
                                    <li><a href="#">Arlington Real Estate</a></li>
                                    <li><a href="#">Atlanta Real Estate</a></li>
                                    <li><a href="#">Austin Real Estate</a></li>
                                    <li><a href="#">Baltimore Real Estate</a></li>
                                    <li><a href="#">Baton Rouge Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                    <li><a href="#">Detroit Real Estate</a></li>
                                    <li><a href="#">El Paso Real Estate</a></li>
                                    <li><a href="#">Fort Lauderdale Real Estate</a></li>
                                    <li><a href="#">Fort Myers Real Estate</a></li>
                                    <li><a href="#">Fort Worth Real Estate</a></li>
                                    <li><a href="#">Grand Rapids Real Estate</a></li>
                                    <li><a href="#">Greenville Real Estate</a></li>
                                    <li><a href="#">Houston Real Estate</a></li>
                                    <li><a href="#">Bellevue Real Estate</a></li>
                                    <li><a href="#">Bethesda Real Estate</a></li>
                                    <li><a href="#">Birmingham Real Estate</a></li>
                                    <li><a href="#">Boston Real Estate</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Quick Links Tab End -->

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

    <!-- Footer Start -->
        <footer>
            <div class="container">
                <div class="footer-wrapper section-padding">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <a href="#" class="footer-logo">
                                <img src="<?= base_url() ?>assets/images/LOGO FINAL COLOR 24 7 TANSP.png" alt="Logo">
                            </a>
                            <p>190 Fifth Avenue, 3rd Floor Essex, London 10011, UK 012.822.9058
                            </p>
                            <ul class="social-icons text-center">
                                <li class="facebook">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="twitter">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="linkedin">
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li class="youtube">
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <h6>company</h6>
                            <ul class="company-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Investors</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Offices</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <h6>information</h6>
                            <ul class="info-links">
                                <li><a href="#">FAQ’s</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Copyright Issues</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <h6>subscribe newsletter</h6>
                            <p>Subscribe to our newsletter to get all new offers, discounts and news.</p>
                            <input type="Email" name="name" placeholder="Email Address">

                            <button class="btn-1 flat-btn">
                                <span>Subscribe now</span>
                            </button>
                        </div>
                    </div>
                </div>
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
    <script src="<?= base_url() ?>assets/assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/waypoints.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
</body>
<script>
    /* function Buscar(key){
			$.redirect("<?= base_url() ?>Front/C_home/search", {'key': key});
        } */

    function Buscar(f, e) {
        // var ubicacion = $("#buscarUbi").val();
        // var tipoIn = $("#tipoIn").val();
        e.preventDefault();
        //debugger;
        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>C_home/search',
            data: $(f).serialize(), /* {
                'buscarUbi': ubicacion,
                'tipoIn': tipoIn
            }, */
            //contentType: 'json',
            success: function(resp) {
                swal({
                    title: 'Éxito',
                    text: 'Éxito en la busqueda',
                    button: false,
                    timer: 1500
                });
                location.href = '<?= base_url() ?>C_home/search';
            },
            error: function(XMLHHttRequest, textStatus, errorThrown) {}
        });
        //console.log(ubicacion);
        //console.log(tipoIn);
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
                window.location.href = '<?= base_url() ?>C_home';
            },
            error: function(XMLHttpRequest, errMsg, exception) {
                console.log(errMsg, "error");
            }
        });
    }
</script>

</html>