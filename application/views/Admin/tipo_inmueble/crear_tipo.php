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
                <h4 class="panel-title">Registro de tipos de inmuebles</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" onsubmit="dataEntry(this, event);" data-parsley-validate="true" name="form-captura" id="form-captura" novalidate="" enctype="multipart/form-data">
                    
                    <?=isset($tipo) ? '<input type="hidden" name="key" id="key"value="'.$key.'">' : '' ?>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Tipo de inmueble * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="Tipo" name="Tipo" placeholder="Requerido" data-parsley-required="true"value="<?=isset($tipo) ? $tipo->Tipo : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="Id_modelo">Desarrolladora * :</label>
                        <div class="col-md-8 col-sm-8">
                            <select class="form-control" data-parsley-required="true" name="Id_desarrolladora" id="Id_desarrolladora">
                                <option value="">Seleccione una opción</option>
                                <?php foreach($desarrolladora as $t) : ?>
                                    <option value="<?=$t->Id_desarrolladora?>" <?php if (isset($tipo) && $tipo->Id_desarrolladora == $t->Id_desarrolladora) echo 'selected';?> ><?=$t->Nombre?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
                        <div class="col-md-8 col-sm-8">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form> 
            </div>
            <!-- end panel-body -->
            <!-- begin hljs-wrapper -->
            
        <!-- end panel -->
    </div>
</div>

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?=base_url()?>assets/assets/plugins/highlight/highlight.common.js"></script>
	<script src="<?=base_url()?>assets/assets/js/demo/render.highlight.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        function dataEntry(form, event){
            event.preventDefault();
            if( $(form).parsley().validate() ){
                
                var formData = new FormData(form);
                //formData.append('logo', file);
                
                 $.ajax({
                    // la URL para la petición
                    url : '<?=base_url()?>tipo/inmueble/guardar',
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
                        if(data > 0){
                            swal({
                                icon: 'success',
                                title: 'Exito',
    	                        text: 'El registro se ha <?=isset($tipo) ? 'actualizado': 'guardado'?> exitosamente',
                                button: false,
                                timer: 1500
                            })
                            <?=isset($tipo) ? '': '
                            $(form).trigger("reset");
                            $(form).parsley().destroy();
                            $("#preview").attr("src","");';?>
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

    </script>
    