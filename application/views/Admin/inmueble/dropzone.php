<?php $this->load->view('Master') ?>
<link href="<?=base_url()?>assets/assets/plugins/dropzone/min/dropzone.min.css" rel="stylesheet">
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
                <h4 class="panel-title">Galeria de inmuebles</h4>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div id="my-dropzone">
                    <form action="" class="dropzone needsclick" name='dropzone' id="dropzone">
                        <input type="hidden" name="key" value='<?=$key?>'>
                        <div class="dz-message needsclick">
                            Arrastra tus archivos <b>aqui</b> o <b> dale click</b> para subir.<br />
                                <!-- <span class="dz-note needsclick">
                                    (This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)
                                </span> -->
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- end panel-body -->
            <!-- begin hljs-wrapper -->    
        <!-- end panel -->
    </div>
</div>
<div class="container-fluid" id="list"></div>

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?=base_url()?>assets/assets/plugins/dropzone/min/dropzone.min.js"></script>
	<script src="<?=base_url()?>assets/assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?=base_url()?>assets/assets/plugins/highlight/highlight.common.js"></script>
	<script src="<?=base_url()?>assets/assets/js/demo/render.highlight.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    <script>

        $("#list").load('<?=base_url()?>inmueble/dropzone/galeria', { 'key' : '<?=$key?>' });
        
        function confirmarEliminar(key){
			swal({
				title: "¿Estás seguro?",
				text: "Estas por eliminar el registro",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
				if (willDelete) {
					eliminarImagen(key);
				} else {
					swal("Operación abortada");
				}
			});
		}
		function eliminarImagen(key){
			var formData = new FormData();
			formData.append('key', key);
			$.ajax({
                // la URL para la petición
                url : '<?=base_url()?>inmueble/dropzone/eliminar',
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
							text: 'El registro se ha eliminado exitosamente',
							button: false,
							timer: 1500
						});
						$("#list").load('<?=base_url()?>inmueble/dropzone/galeria', { 'key' : '<?=$key?>' });
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
        Dropzone.autoDiscover = false;
        // or disable for specific dropzone:
        // Dropzone.options.myDropzone = false;

        $(function() {
        // Now that the DOM is fully loaded, create the dropzone, and setup the
        // event listeners
            var myDropzone = $("#dropzone").dropzone({
                maxFiles: 2000,
                url: "<?=base_url()?>inmueble/dropzone/upload",
                success: function (file, response) {
                    var response = JSON.parse(response);
                    if (response['error']){
                        swal({
                                icon: 'error',
                                title: 'Algo ha salido mal',
    	                        text: 'El archivo: '+ response['error'] + ' no cuenta con un formato valido',
                                button: false,
                                timer: 2100
                        })
                    }else{
                        $("#list").load('<?=base_url()?>inmueble/dropzone/galeria', { 'key' : '<?=$key?>' });
                    }
                    console.log(response);
                }
            });
        })
    </script>
    