<?php foreach ($Bubuicacion as $data) { ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="property-list">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <figure>
                        <a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>/<?= $data->modelo ?>/<?= $data->desarrollo_id ?>">
                            <img src="<?= base_url() ?>recursos/galeria/<?= $data->foto ?>" alt="">
                            <span class="overlay-1"></span>
                        </a>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="property-list-detail text-left">
                        <div class="property-title">
                            <h5><a href="#"><?= $data->titulo ?></a><small><?php echo $data->colonia; ?>, <?php echo $data->municipio; ?>, <?php echo $data->estado; ?></small></h5>
                            <h6><i class="fa fa-dollar"></i><?php echo $data->cantidad; ?> <?= $data->tipo_precio ?></h6>
                        </div>
                        <p>
                            Recámaras: <?= $data->recamaras ?>
                            <br>
                            Baños: <?= $data->banos ?>
                            <br>
                            Construcción: <?= $data->construccion ?> m&#178;
                            <br>
                            Superficie: <?= $data->superficie ?> m&#178;
                            <br>
                            Fecha de entrega: <?= $data->fecha_entrega ?>
                        </p>
                        <div class="talk-to">
                            <a href="#" class="font1 btn-4 btn-1 text-uppercase" data-toggle="modal" data-target="#contactModal<?= $data->inmueble_id ?>">
                                <span>Contactar</span>
                            </a>
                            <a href="<?= base_url() ?>Front/C_contenido/contenido/<?= $data->inmueble_id ?>/<?= $data->modelo ?>/<?= $data->desarrollo_id ?>" class="font1 btn-5 btn-1 text-uppercase">
                                <span>Ver detalles</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
            </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
            </a>
        </li>
    </ul>
</nav>