<?php $this->load->view('Master') ?>
<div class="content" id="content">
    <div class="col-lg-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Registro de inmuebles</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
           
                            <form class="form-horizontal" onsubmit="dataEntry(this, event);" data-parsley-validate="true" name="form-captura" id="form-captura" novalidate="" enctype="multipart/form-data">  
                                <?=isset($inmueble) ? '<input type="hidden" name="key" id="key"value="'.base64_encode($inmueble->id).'">' : '' ?>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="Modelo">Desarrollo * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <select name="desarrollo_id" id="desarrollo_id" data-parsley-required="true" class="form-control">
                                            <option value="">Selecciona una opción</option>
                                            <?php foreach($desarrollo as $d) : ?>
                                            <option value="<?=$d->id?>" <?php if (isset($inmueble) && $inmueble->desarrollo_id == $d->id) echo 'selected';?> ><?=$d->nombre?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="id">Clave * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="id" name="id" maxlength="10" placeholder="Ingrese la clave del inmueble" data-parsley-maxlength="10" data-parsley-required="true"  value="<?=isset($inmueble) ? $inmueble->id : '' ?>" <?=isset($inmueble) ? 'disabled' : '' ?>>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="Titulo">Titulo * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Ingrese el titulo" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->titulo : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="Comision">Comisión * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="comision" name="comision" data-parsley-pattern="^[0-9]*?" data-parsley-type="number" placeholder="Ingrese la comisión" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->comision : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="Construccion">Construcción * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-pattern="^[0-9]*(\.?[0-9]{2}$)?" id="construccion" name="construccion"  placeholder="Construcción" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->construccion : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="enganche">Enganche * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-pattern="^[0-9]*(\.?[0-9]{2}$)?" id="enganche" name="enganche"  placeholder="Enganche" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->enganche : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="cuota">Cuota de mantenimiento * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-pattern="^[0-9]*(\.?[0-9]{2}$)?" id="cuota" name="cuota"  placeholder="Cuota de mantenimiento" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->cuota : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="fecha_entrega">Fecha de entrega * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="date" id="fecha_entrega" name="fecha_entrega"  placeholder="Fecha de entrega" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->fecha_entrega : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="ubicacion">Ubicación * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="ubicacion" name="ubicacion"  placeholder="Ubicación" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->ubicacion : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="modelo">Modelo * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text"  id="modelo" name="modelo"  placeholder="Modelo" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->modelo : '' ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="superficie">Superficie * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-pattern="^[0-9]*(\.?[0-9]{2}$)?" id="superficie" name="superficie"  placeholder="Superficie" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->superficie : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="frente">Frente * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-pattern="^[0-9]*(\.?[0-9]{2}$)?" id="frente" name="frente"  placeholder="Frente" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->frente : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="fondo">Fondo * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-pattern="^[0-9]*(\.?[0-9]{2}$)?" id="fondo" name="fondo"  placeholder="Fondo" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->fondo : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="recamaras">Recamaras * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-type="number" data-parsley-pattern="^[0-9]*?" id="recamaras" name="recamaras"  placeholder="Recamaras" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->recamaras : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="banos">Baños * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-type="number" data-parsley-pattern="^[0-9]*?" id="banos" name="banos"  placeholder="Baños" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->banos : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="estacionamiento">Estacionamientos * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" data-parsley-type="number" data-parsley-pattern="^[0-9]*?" id="estacionamiento" name="estacionamiento"  placeholder="Estacionamientos" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->estacionamiento : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="Modelo">Asesor * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <select name="Id_asesor" id="Id_asesor" data-parsley-required="true" class="form-control">
                                            <option value="">Selecciona una opción</option>
                                            <?php foreach($asesor as $a) : ?>
                                            <option value="<?=$a->Id_asesor?>" <?php if (isset($inmueble) && $inmueble->Id_asesor == $a->Id_asesor) echo 'selected';?> ><?=$a->Nombre?> <?=$a->Apellido?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="Modelo">Producto en * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <select name="venta" id="venta" data-parsley-required="true" class="form-control">
                                            <option value="">Selecciona una opción</option>
                                            <option value="0" <?php if (isset($inmueble) && $inmueble->venta == 0) echo 'selected'; ?>>Renta</option>
                                            <option value="1" <?php if (isset($inmueble) && $inmueble->venta == 1) echo 'selected'; ?>>Venta</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="tipo_producto_id">Tipo de producto * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <select name="tipo_producto_id" id="tipo_producto_id" data-parsley-required="true" class="form-control">
                                            <option value="">Selecciona una opción</option>
                                            <?php foreach($producto as $p) : ?>
                                            <option value="<?=$p->id?>" <?php if (isset($inmueble) && $inmueble->tipo_producto_id == $p->id) echo 'selected';?>><?=$p->tipo?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="id_tipoPrecio">Tipo de precio * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <select name="tipoprecio_id" id="tipoprecio_id" data-parsley-required="true" class="form-control">
                                            <option value="">Selecciona una opción</option>
                                            <?php foreach($tipo as $t) : ?>
                                            <option value="<?=$t->id?>" <?php if (isset($inmueble) && $inmueble->tipoprecio_id == $t->id) echo 'selected';?>><?=$t->tipo?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="video">Link del video * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="video" name="video" placeholder="Link del video" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->video : ''; ?>">
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-md-3 col-sm-3 col-form-label" for="recorrido">Link del recorrido * :</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input class="form-control" type="text" id="recorrido" name="recorrido" placeholder="Link del recorrido" data-parsley-required="true" value="<?=isset($inmueble) ? $inmueble->recorrido : ''; ?>">
                                    </div>
                                </div>
                                <!--
                                -->
                                <!-- begin panel -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        </div>
                                        <h4 class="panel-title">Servicios</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-md-4">
                                                    <label for="services">Servicio: </label>
                                                    <button class="btn btn-success form-control" type="button" style="margin-top:5px;" onclick="loadServices()">
                                                        <li class="fa fa-lg fa-fw m-r-10 fa-plus"></li>
                                                        <span>Agregar</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:10px">
                                                <div class="col-md-12">
                                                    <div class="table-responsive" id="table-services">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end panel -->
                                <!-- begin panel -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        </div>
                                        <h4 class="panel-title">Metodos de pago</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-md-4">
                                                    <label for="payment">Metodo: </label>
                                                    <button class="btn btn-success form-control" type="button" style="margin-top:5px;" onclick="loadMethods()">
                                                        <li class="fa fa-lg fa-fw m-r-10 fa-plus"></li>
                                                        <span>Agregar</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:10px">
                                                <div class="col-md-12">
                                                    <div class="table-responsive" id="table-payment">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end panel -->

                                <!-- begin panel -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        </div>
                                        <h4 class="panel-title">Equipamientos</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-md-4">
                                                    <label for="payment">Equipamiento: </label>
                                                    <button class="btn btn-success form-control" type="button" style="margin-top:5px;" onclick="loadEq()">
                                                        <li class="fa fa-lg fa-fw m-r-10 fa-plus"></li>
                                                        <span>Agregar</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:10px">
                                                <div class="col-md-12">
                                                    <div class="table-responsive" id="tb-eq">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end panel -->

                                <!-- begin panel -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        </div>
                                        <h4 class="panel-title">Financiamiento</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-md-4">
                                                    <label for="payment">Tipo de financiamiento: </label>
                                                    <button class="btn btn-success form-control" type="button" style="margin-top:5px;" onclick="loadFin()">
                                                        <li class="fa fa-lg fa-fw m-r-10 fa-plus"></li>
                                                        <span>Agregar</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:10px">
                                                <div class="col-md-12">
                                                    <div class="table-responsive" id="tb-fin">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end panel -->

                                <!-- begin panel -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-heading-btn">
                                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                        </div>
                                        <h4 class="panel-title">Precios de oferta</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-md-4">
                                                    <label for="oferta">Agregar precio: </label>
                                                    <input type="number" id="oferta" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <button class="btn btn-success form-control" type="button" style="margin-top:25px;" onclick="addOferta(event)">
                                                        <li class="fa fa-lg fa-fw m-r-10 fa-plus"></li>
                                                        <span>Agregar</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top:10px">
                                                <div class="col-md-12">
                                                    <div class="table-responsive" id="tb-oferta">
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end panel -->

                                <div class="form-group row m-b-0">
                                    <label class="col-md-5 col-sm-5 col-form-label">&nbsp;</label>
                                    <div class="col-md-2 col-sm-2">
                                        <button type="submit" class="btn btn-primary form-control">Guardar</button>
                                    </div>
                                    <div class="col-md-5 col-sm-5">
                                </div>
                            </form>
						</div>
					</div>
					<!-- end tab-content -->
            </div>
            
            <!-- end panel-body -->
            <!-- begin hljs-wrapper -->
            <!-- begin hljs-wrapper -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal fade" id="modal-container-20983" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">
                                            
                                        </h5>
                                        <input type="hidden" id="title">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form onsubmit="procesar(event, this)" id="form-modal">
                                    <div class="modal-body">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">
                                            Guardar cambios
                                        </button> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Cerrar
                                        </button>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        <!-- end panel -->
    </div>
</div>

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?=base_url()?>assets/assets/plugins/highlight/highlight.common.js"></script>
	<script src="<?=base_url()?>assets/assets/js/demo/render.highlight.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
    <script>

        $(document).ready(function(){
            $("#table-services").load('<?=base_url()?>inmueble/tabla/servicios'<?=isset($inmueble) ? ', { key : "'.base64_encode($inmueble->id).'"}': ''?>);
            $("#table-payment").load('<?=base_url()?>inmueble/tabla/metodos'<?=isset($inmueble) ? ', { key : "'.base64_encode($inmueble->id).'"}': ''?>);
            $("#tb-eq").load('<?=base_url()?>inmueble/tabla/equipamientos');
            $("#tb-fin").load('<?=base_url()?>inmueble/tabla/financiamientos');
            $('#tb-oferta').load('<?=base_url()?>inmueble/tabla/oferta');
        })

        function loadServices(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Lista de servicios');
            $('.modal-body').load('<?=base_url().'inmueble/servicios'?>');
            $("#title").val('servicios');
        }

        function loadMethods(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Lista de metodos de pago');
            $('.modal-body').load('<?=base_url().'inmueble/methods'?>');
            $("#title").val('metodos de pago');
        }

        function loadFin(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Lista de financiamientos');
            $('.modal-body').load('<?=base_url().'inmueble/financiamiento'?>');
            $("#title").val('financiamientos');
        }

        function loadEq(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Lista de equipamientos');
            $('.modal-body').load('<?=base_url().'inmueble/equipamiento'?>');
            $("#title").val('equipamientos');
        }

        function procesar(e, form){
            e.preventDefault();
            var formData = new FormData(form);
            $.ajax({
                // la URL para la petición
                url : '<?=base_url()?>inmueble/procesar',
                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data : formData,

                // especifica si será una petición POST o GET
                type : 'POST',

                // el tipo de información que se espera de respuesta
                // dataType : 'json',

                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                async: false,
                success : function(data) {
                    if(data){
                        data = JSON.parse(data);
                        title = $("#title").val();
                        am = '';
                        data.map(function(obj){
                            if (obj.forma){
                                am += obj.forma + '\n';
                            }
                            if(obj.servicio){
                                am += obj.servicio + '\n';
                            }
                            if (obj.financiamiento){
                                am += obj.financiamiento + '\n';
                            }
                            if (obj.equipamiento){
                                am += obj.equipamiento + '\n';
                            }
                        });
                        swal({
                            icon: 'success',
                            title: 'Exito',
                            text: 'Se han agregado las siguientes '+ title + '\n' + am,
                            button: false,
                            timer: 1500
                        });
                        $('#modal-container-20983').modal('hide')
                        $("#table-services").load('<?=base_url()?>inmueble/tabla/servicios'<?=isset($inmueble) ? ', { key : "'.base64_encode($inmueble->id).'"}': ''?>);
                        $("#table-payment").load('<?=base_url()?>inmueble/tabla/metodos'<?=isset($inmueble) ? ', { key : "'.base64_encode($inmueble->id).'"}': ''?>);
                        $("#tb-eq").load('<?=base_url()?>inmueble/tabla/equipamientos');
                        $("#tb-fin").load('<?=base_url()?>inmueble/tabla/financiamientos');
                    }else{
                        swal({
                            icon: 'error',
                            title: 'Algo ha salido mal',
                            text: 'La operación no pudo completarse',
                            button: false,
                            timer: 1500
                        })
                    }
                },
                // código a ejecutar si la petición falla;
                // son pasados como argumentos a la función
                // el objeto de la petición en crudo y código de estatus de la petición
                error : function(xhr, status) {
                    alert("error");
                },
                cache: false,
                contentType: false,
                processData: false
                // código a ejecutar sin importar si la petición falló o no
                //complete : function(xhr, status) {
                    //alert('Petición realizada');
                //}
            });
        }

        function eliminar(key, type){
			var formData = new FormData();
            formData.append('key', key);
            formData.append('type', type);
			$.ajax({
                // la URL para la petición
                url : '<?=base_url()?>inmueble/eliminar/extras',
                // la información a enviar
                // (también es posible utilizar una cadena de datos)
                data : formData,
                    // especifica si será una petición POST o GET
                type : 'POST',
                // el tipo de información que se espera de respuesta
                // dataType : 'json',
                // código a ejecutar si la petición es satisfactoria;
                // la respuesta es pasada como argumento a la función
                async: false,
                success : function(data) {
                    //alert(data);
                    if(data){
                        swal({
							icon: 'success',
							title: 'Exito',
							text: 'El registro se ha eliminado de la lista',
							button: false,
							timer: 1500
						});
                        $("#table-services").load('<?=base_url()?>inmueble/tabla/servicios'<?=isset($inmueble) ? ', { key : "'.base64_encode($inmueble->id).'"}': ''?>);
                        $("#table-payment").load('<?=base_url()?>inmueble/tabla/metodos'<?=isset($inmueble) ? ', { key : "'.base64_encode($inmueble->id).'"}': ''?>);
                        $("#tb-eq").load('<?=base_url()?>inmueble/tabla/equipamientos');
                        $("#tb-fin").load('<?=base_url()?>inmueble/tabla/financiamientos');
                        $('#tb-oferta').load('<?=base_url()?>inmueble/tabla/oferta');
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

        function addOferta(e){
            e.preventDefault();
            var oferta = $('#oferta').val();
            if (oferta > 0){
                var formData = new FormData();
                formData.append('oferta', oferta);
                $.ajax({
                    // la URL para la petición
                    url : '<?=base_url()?>inmueble/nueva/oferta',
                    // la información a enviar
                    // (también es posible utilizar una cadena de datos)
                    data : formData,

                    // especifica si será una petición POST o GET
                    type : 'POST',

                    // el tipo de información que se espera de respuesta
                    //dataType : 'json',

                    // código a ejecutar si la petición es satisfactoria;
                    // la respuesta es pasada como argumento a la función
                    async: false,
                    success : function(data) {
                        //alert(data);
                        //data = JSON.parse(data);
                        if(data){
                            swal({
                                icon: 'success',
                                title: 'Exito',
                                text: 'Se ha agregado la oferta exitosamente',
                                button: false,
                                timer: 1500
                            })
                            $('#oferta').val(0);
                            $('#tb-oferta').load('<?=base_url()?>inmueble/tabla/oferta');
                        }else{
                            swal({
                                icon: 'error',
                                title: 'Algo ha salido mal',
                                text: 'Compruebe que el valor no exista dentro de la tabla',
                                button: false,
                                timer: 1500
                            })
                        }
                        
                    },
                    // código a ejecutar si la petición falla;
                    // son pasados como argumentos a la función
                    // el objeto de la petición en crudo y código de estatus de la petición
                    error : function(xhr, status) {
                        alert("error");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                    // código a ejecutar sin importar si la petición falló o no
                    //complete : function(xhr, status) {
                        //alert('Petición realizada');
                    //}
                });
            }else{
                swal({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Verifique que el valor sea valido',
                    button: false,
                    timer: 1500
                })
            }
        }

        function dataEntry(form, event){
            event.preventDefault();
            if( $(form).parsley().validate() ){
                var formData = new FormData(form);
                //formData.append('logo', file);
                 $.ajax({
                    // la URL para la petición
                    url : '<?=base_url()?>inmueble/guardar',
                    // la información a enviar
                    // (también es posible utilizar una cadena de datos)
                    data : formData,

                    // especifica si será una petición POST o GET
                    type : 'POST',

                    // el tipo de información que se espera de respuesta
                    //dataType : 'json',

                    // código a ejecutar si la petición es satisfactoria;
                    // la respuesta es pasada como argumento a la función
                    async: false,
                    success : function(data) {
                        //alert(data);
                        //data = JSON.parse(data);
                        if(data['inmueble']){
                            swal({
                                icon: 'success',
                                title: 'Exito',
    	                        text: 'El registro se ha <?=isset($inmueble) ? 'actualizado': 'guardado'?> exitosamente',
                                button: false,
                                timer: 1500
                            })
                            /*
                            .then(()=> {
                                    var msgTitulo = 'Se han agregado los siguientes servicios.';
                                    var msgServicios = '';
                                    data['servicios'].forEach(function(servicio) {
                                        console.log(servicio);
                                        if (servicio['exito'] == true){
                                            msgServicios += '\nServicio: ' + servicio['servicio'];
                                        }
                                    });
                                    swal({
                                        icon: 'success',
                                        title: msgTitulo,
                                        text: msgServicios,
                                        button: false,
                                        timer: 1500
                                    })
                                    .then(()=>{
                                        var msgTitulo = 'Se han agregado los siguientes metodos.';
                                        var msgServicios = '';
                                        if (data['metodos'].length > 0){
                                            data['metodos'].forEach(function(metodo) {
                                                console.log(metodo);
                                                if (metodo['exito'] == true){
                                                    msgServicios += '\nMetodo: ' + metodo['methods'];
                                                }
                                            });
                                            swal({
                                                icon: 'success',
                                                title: msgTitulo,
                                                text: msgServicios,
                                                button: false,
                                                timer: 1500
                                            })
                                        }
                                    })
                            })*/
                            <?=isset($inmueble) ? '': '
                            $(form).trigger("reset");
                            $(form).parsley().destroy();
                            $("#preview").attr("src","");';?>
                            
                            
                        }else{
                            swal({
                                icon: 'error',
                                title: 'Algo ha salido mal',
    	                        text: 'Comprueba que el id ingresado no exista',
                                button: false,
                                timer: 1500
                            })
                        }
                        console.log(data);
                    },
                    // código a ejecutar si la petición falla;
                    // son pasados como argumentos a la función
                    // el objeto de la petición en crudo y código de estatus de la petición
                    error : function(xhr, status) {
                        alert("error");
                    },
                    cache: false,
        			contentType: false,
        			processData: false
                    // código a ejecutar sin importar si la petición falló o no
                    //complete : function(xhr, status) {
                        //alert('Petición realizada');
                    //}
                });  
            }
        }        
    </script>
    