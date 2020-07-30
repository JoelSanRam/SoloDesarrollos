<?php $this->load->view('Master') ?>

<style>
    .swal-modal .swal-text{
        text-align: center;
    }
</style>

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
                <h4 class="panel-title">Registro de desarrollos</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" onsubmit="dataEntry(this, event);" data-parsley-validate="true" name="form-captura" id="form-captura" novalidate="" enctype="multipart/form-data">
                    
                    <?=isset($desarrollo) ? '<input type="hidden" name="key" id="key"value="'.base64_encode($desarrollo->id).'">' : '' ?>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="fullname">Nombre * :</label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" data-parsley-required="true"value="<?=isset($desarrollo) ? $desarrollo->nombre : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="unidades">Unidades * :</label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="text" id="unidades" name="unidades" data-parsley-type="number" placeholder="Unidades" data-parsley-required="true" value="<?=isset($desarrollo) ? $desarrollo->unidades : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="message">Tipo de fraccionamiento :</label>
                        <div class="col-md-9 col-sm-9">
                            <select name="privado" id="privado" data-parsley-required="true" class="form-control">
                                <option value="">Seleccionar</option>
                                <option value="0" <?php if (isset($desarrollo) && $desarrollo->privado == 0) echo 'selected';?>>Público</option>
                                <option value="1" <?php if (isset($desarrollo) && $desarrollo->privado == 1) echo 'selected';?>>Privado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="message">Localización :</label>
                        <div class="col-md-3 col-sm-3">
                            
                            <select name="estado" id="estado" data-parsley-required="true" class="form-control" onchange="loadMunicipio(this)">
                                <option value="">Seleccionar estado</option>
                                <?php foreach($estado as $row){?>
                                <option value="<?=base64_encode($row->id)?>"><?=$row->estado?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            
                            <select name="municipio" id="municipio" data-parsley-required="true" class="form-control" onchange="loadColonia(this)">
                                <option value="">Seleccionar municipio</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            
                            <select name="colonia" id="colonia" data-parsley-required="true" class="form-control">
                                <option value="">Seleccionar colonia</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="direccion">Dirección * :</label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Dirección" data-parsley-required="true" value="<?=isset($desarrollo) ? $desarrollo->direccion : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="descripcion">Descripción * :</label>
                        <div class="col-md-9 col-sm-9">
                            <textarea class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción" data-parsley-required="true"><?=isset($desarrollo) ? $desarrollo->descripcion : '' ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="video">Link del video * :</label>
                        <div class="col-md-9 col-sm-9">
                        <input class="form-control" type="text" id="video" name="video" placeholder="Link del video" data-parsley-required="true" value="<?=isset($desarrollo) ? $desarrollo->video : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="recorrido">Link del recorrido * :</label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="text" id="recorrido" name="recorrido" placeholder="Link del recorrido" data-parsley-required="true" value="<?=isset($desarrollo) ? $desarrollo->recorrido : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-sm-3 col-form-label" for="maps">Mapa * :</label>
                        <div class="col-md-9 col-sm-9">
                            <fieldset class="gllpLatlonPicker">
                                <div class="gllpMap" style="height: 300px; width: 100%; "></div>
                                <input type="hidden" name="latitud" id="latitud" class="gllpLatitude" value="<?=isset($desarrollo) ? $desarrollo->latitud : '20.974696042580334'?>"/>
                                <input type="hidden" name="longitud" id="longitud" class="gllpLongitude" value="<?=isset($desarrollo) ? $desarrollo->longitud : '-89.62717676209414'?>"/>
                                <input type="hidden" name="Zoom" class="gllpZoom" value="<?=isset($inmueble) ? $inmueble->Zoom : '15'?>"/>
                            </fieldset>
                        </div>
                    </div>
                    <div>
                        <fieldset>
                            <legend class="m-b-15">Amenidades</legend>
                            <button type="button" class="btn btn-info" onclick="loadAmenidades()">Agregar amenidades</button>
                            <!-- <a id="modal-20983" href="#modal-container-20983" role="button" class="btn btn-info" data-toggle="modal"></a> -->
                            <div class="col-md-12" id="tbam">
                            </div>
                        </fieldset>
                    </div>
                    <div>
                        <fieldset>
                            <legend class="m-b-15">Caracteristicas</legend>
                            <button type="button" class="btn btn-info" onclick="loadCaracteristicas()">Agregar caracteristicas</button>
                            <!-- <a id="modal-20983" href="#modal-container-20983" role="button" class="btn btn-info" data-toggle="modal"></a> -->
                            <div class="col-md-12" id="tbca">

                            </div>
                        </fieldset>
                    </div>

                    <div>
                        <fieldset>
                            <legend class="m-b-15">Tipos de producto</legend>
                            <button type="button" class="btn btn-info" onclick="loadTP()">Agregar tipos de producto</button>
                            <!-- <a id="modal-20983" href="#modal-container-20983" role="button" class="btn btn-info" data-toggle="modal"></a> -->
                            <div class="col-md-12" id="tbtp">
                            </div>
                        </fieldset>
                    </div>

                    <div>
                        <fieldset>
                            <legend class="m-b-15">Tipos de desarrollo</legend>
                            <button type="button" class="btn btn-info" onclick="loadTD()">Agregar tipos de desarrollo</button>
                            <!-- <a id="modal-20983" href="#modal-container-20983" role="button" class="btn btn-info" data-toggle="modal"></a> -->
                            <div class="col-md-12" id="tbtd">
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group row m-b-0">
                        <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-primary form-control">Guardar</button>
                        </div>
                    </div>
                </form> 
            </div>
            <!-- end panel-body -->
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
        
        function loadAmenidades(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Lista de amenidades');
            $('.modal-body').load('<?=base_url().'desarrollo/amenidades'?>');
            $("#title").val('amenidades');
        }

        function loadCaracteristicas(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Lista de caracteristicas');
            $('.modal-body').load('<?=base_url().'desarrollo/caracteristicas'?>');
            $("#title").val('caracteristicas');
        }

        function loadTP(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Listado de tipos de productos');
            $('.modal-body').load('<?=base_url().'desarrollo/tp'?>');
            $("#title").val('tipos de productos');
        }

        function loadTD(){
            $('#modal-container-20983').modal('show');
            $('#myModalLabel').html('Listado de tipos de desarrollo');
            $('.modal-body').load('<?=base_url().'desarrollo/td'?>');
            $("#title").val('tipo de desarrollo');
        }

        function procesar(e, form){
            e.preventDefault();
            var formData = new FormData(form);
            $.ajax({
            // la URL para la petición
            url : '<?=base_url()?>desarrollo/procesar',
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
                        if (obj.nombre){
                            am += obj.nombre + '\n';
                        }
                        if(obj.caracteristica){
                            am += obj.caracteristica + '\n';
                        }else{
                            am += obj.tipo + '\n';   
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
                    $('#tbam').load('<?=base_url()?>desarrollo/tbam');
                    $('#tbca').load('<?=base_url()?>desarrollo/tbca');
                    $('#tbtp').load('<?=base_url()?>desarrollo/tbtp');
                    $('#tbtd').load('<?=base_url()?>desarrollo/tbtd');
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

        function dataEntry(form, event){
            event.preventDefault();
            if( $(form).parsley().validate() ){
                
                var formData = new FormData(form);
                //formData.append('logo', file);
                
                //var url = "<?=base_url()?>empresa/<?=isset($desarrollo) ? 'guardar' : '';?>"
                 $.ajax({
                    // la URL para la petición
                    url : '<?=base_url()?>desarrollo/guardar',
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
                        data = JSON.parse(data);
                        if(data){
                            swal({
                                icon: 'success',
                                title: 'Exito',
    	                        text: 'El registro se ha <?=isset($desarrollo) ? 'actualizado': 'guardado'?> exitosamente',
                                button: false,
                                timer: 1500
                            }).then(() => {
                                var am = '';
                                var car = '';
                                if (data['caracteristicas'].length != 0){
                                    data['caracteristicas'].map(function(obj){
                                        car += obj.caracteristica + '\n';
                                    });
                                }
                                if (data['amenidades'].length != 0){
                                    data['amenidades'].map(function(obj){
                                        am += obj.nombre + '\n';
                                    });
                                }
                                if (am.length > 0){
                                    swal({
                                        icon: 'success',
                                        title: 'Exito',
                                        text: 'Se han agregado las siguientes amenidades \n' + am,
                                        button: false,
                                        timer: 1500
                                    }).then(() => {
                                        if (car.length > 0){
                                            swal({
                                                icon: 'success',
                                                title: 'Exito',
                                                text: 'Se han agregado las siguientes caracteristicas \n' + car,
                                                button: false,
                                                timer: 1500
                                            })
                                        }
                                    })
                                }else{
                                    if (car.length > 0){
                                        swal({
                                            icon: 'success',
                                            title: 'Exito',
                                            text: 'Se han agregado las siguientes caracteristicas \n' + car,
                                            button: false,
                                            timer: 1500
                                        })
                                    }
                                }

                            })
                            <?=isset($desarrollo) ? '': '
                            $(form).trigger("reset");
                            $(form).parsley().destroy();';?>
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
        /*
        var fileUpload = document.getElementById('userfile');
        fileUpload.onchange = function (e) {
            //readFile(e.srcElement);
            document.getElementById('preview').src = window.URL.createObjectURL(this.files[0]);
        }*/

        function eliminar(key, type){
			var formData = new FormData();
            formData.append('key', key);
            formData.append('type', type);
			$.ajax({
                // la URL para la petición
                url : '<?=base_url()?>desarrollo/eliminar/extras',
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
                        $('#tbam').load('<?=base_url()?>desarrollo/tbam');
                        $('#tbca').load('<?=base_url()?>desarrollo/tbca');
                        $('#tbtp').load('<?=base_url()?>desarrollo/tbtp');
                        $('#tbtd').load('<?=base_url()?>desarrollo/tbtd');
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

        $('#tbam').load('<?=base_url()?>desarrollo/tbam');
        $('#tbca').load('<?=base_url()?>desarrollo/tbca');
        $('#tbtp').load('<?=base_url()?>desarrollo/tbtp');
        $('#tbtd').load('<?=base_url()?>desarrollo/tbtd');

        function loadMunicipio(select){
            if ($(select).val()){
                $('#municipio').load('<?=base_url()?>desarrollo/municipio', { key: $(select).val() <?=(isset($desarrollo)) ? ', selected: "'.base64_encode($municipio->id).'"' : '';?>});
            }else{
                $('#municipio').empty();
                $('#municipio').append('<option value="">Seleccionar municipio</option>');
                $('#colonia').empty();
                $('#colonia').append('<option value="">Seleccionar colonia</option>');
            }
        }

        function loadColonia(select){
            if ($(select).val()){
                $('#colonia').load('<?=base_url()?>desarrollo/colonia', { key: $(select).val() <?=(isset($desarrollo)) ? ', selected: "'.base64_encode($desarrollo->colonia_id).'"' : '';?>});
            }else{
                $('#colonia').empty();
                $('#colonia').append('<option value="">Seleccionar colonia</option>');
            }
        }

        <?php if (isset($desarrollo)){?>
        
            $('#estado').val('<?=base64_encode($municipio->estado_id)?>').change();
            
        <?php } ?>

    </script>
    
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBUf2cDjX6QTyLvUYGe5IQs748Sn_UzBKs"></script>
<script src="<?=base_url()?>recursos/js/jquery-gmaps-latlon-picker.js"></script>
