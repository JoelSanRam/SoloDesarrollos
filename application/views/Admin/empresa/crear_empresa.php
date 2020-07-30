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
                <h4 class="panel-title">Registro de empresas</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" onsubmit="dataEntry(this, event);" data-parsley-validate="true" name="form-captura" id="form-captura" novalidate="" enctype="multipart/form-data">
                    
                    <?=isset($empresa) ? '<input type="hidden" name="key" id="key"value="'.$key.'">' : '' ?>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="fullname">Nombre * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Requerido" data-parsley-required="true"value="<?=isset($empresa) ? $empresa->Nombre : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="email">Correo * :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Email" data-parsley-required="true" value="<?=isset($empresa) ? $empresa->Correo : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="message">Teléfono :</label>
                        <div class="col-md-8 col-sm-8">
                            <input class="form-control" type="text" id="telefono" name="telefono" data-parsley-type="number" placeholder="Número de teléfono" data-parsley-required="true" value="<?=isset($empresa) ? $empresa->Telefono : '' ?>">
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="message">Logo :</label>
                        <div class="col-md-8 col-sm-8">
                            <!-- /* Es importante que el input file se llame 'userfile' para que la libreria upload funcione */ -->
                            <input class="form-control" type="file" id="userfile" name="userfile"  placeholder="Logo" data-parsley-required="true">
                        </div>
                    </div>
                    
                    <div class="form-group row m-b-15">
                        <label class="col-md-4 col-sm-4 col-form-label" for="message">Vista previa :</label>
                        <div class="col-md-8 col-sm-8">
                            <img id="preview" alt="your image" width="100" height="100" src="<?=base_url()?>recursos/logos/<?=isset($empresa) ? $empresa->Logo : '' ?>" />
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
                
                //var url = "<?=base_url()?>empresa/<?=isset($empresa) ? 'guardar' : '';?>"
                 $.ajax({
                    // la URL para la petición
                    url : '<?=base_url()?>empresa/guardar',
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
    	                        text: 'El registro se ha <?=isset($empresa) ? 'actualizado': 'guardado'?> exitosamente',
                                button: false,
                                timer: 1500
                            })
                            <?=isset($empresa) ? '': '
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
    
        var fileUpload = document.getElementById('userfile');
        fileUpload.onchange = function (e) {
            //readFile(e.srcElement);
            document.getElementById('preview').src = window.URL.createObjectURL(this.files[0]);
        }

    </script>
    