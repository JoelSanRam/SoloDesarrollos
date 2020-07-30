<?php $this->load->view('Master')?>

<div class="content" id="content">
	<div class="row">
		<div class="col-md-3">
			<h2>Gestión de plantas <?=(isset($title)) ? 'Testing' : '' ;?></h2>
		</div>
		<div class="col-md-9">
			<button class="btn btn-success col-md-3" type="button" style="float: right;" onclick="loadModal()"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Agregar planta</button>
		</div>
	</div>
	<div id="panel-contenido"></div>
	<input type="hidden" id="currentPage">

	<form id="form" name="form" onsubmit="dataEntry(event, this)">
	
		<div class="modal fade" id="modal-dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Planta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<label for="nombre">Nombre: </label> 
                        <input type="text" name="nombre" id="nombre" class="form-control m-b-5">
                        <label for="detalles">Detalles: </label>
                        <div class="col-md-12" id='detalle'>
                             
                        </div>
                        <div id="append"></div>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cerrar</a>
						<input type="submit" class="btn btn-success" value="Enviar">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?=base_url()?>assets/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url()?>assets/assets/js/demo/table-manage-default.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->


	<script>
		$(document).ready(function() {
			App.init();
			//TableManageDefault.init();
		});
	</script>
	<script>
		$("#panel-contenido").load('<?=base_url()?>planta/tabla', {'key' : '<?=$key?>'});

        function loadModal(){
            $('#modal-dialog').modal('show');
            $('#detalle').load('<?=base_url().'planta/detalles'?>');
        }
		function dataEntry(e, form){
            e.preventDefault();
            var formData = new FormData(form);
            <?=(isset($key)) ? 'formData.append("inmueble_id", "'.$key.'");' : ''?>
            if ($('#nombre').val()){
                $.ajax({
                    type: 'POST',
                    url: '<?=base_url()?>planta/insertar',
                    data: formData,
                    async: false,
                    success: function(response){
                        if(response){
                            $("#panel-contenido").load('<?=base_url()?>planta/tabla', {'key' : '<?=$key?>'});
                            swal({
                                icon: 'success',
                                title: 'Exito',
                                text: 'El registro se ha guardado exitosamente',
                                button: false,
                                timer: 1500
                            })
                            clear();
                        }else{
                            swal({
                                icon: 'error',
                                title: 'Algo salio mal',
                                text: 'El registro no se guardó',
                                button: false,
                                timer: 1500
                            })
                        }
                        console.log(response);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }else{
                swal({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'Verifique que el nombre no esta vacio',
                    button: false,
                    timer: 1500
                })
            }
        }

        function clear(){
            $('#nombre').val('');
            $('#modal-dialog').modal('hide');
        }

        function deleteForma(id){
            swal({
                title: "¿Estás seguro?",
                text: "Una vez eliminado, este registro no se puede recuperar",
                icon: "warning",
                buttons: true,
                buttons: ['Cancelar', 'Aceptar'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.get("<?=base_url()?>Admin/C_tipoPrecio/borrar_forma/"+id, 
                    function(data) {
                        if(data == 1){
                            $("#panel-contenido").load('<?=base_url()?>Admin/C_tipoPrecio/tabla');
                            swal("El registro ha sido eliminado correctamente", {
                                title: 'Exito',
                                icon: "success",
                                button: false,
                                timer: 1500
                            });
                            
                        }else{
                            swal("El registro no pudo eliminarse", {
                                title: 'Error',
                                icon: "error",
                                button: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        }

        function update(key, title){
            $('#nombre').val(title);
            $('#modal-dialog').modal('show');
            $('#detalle').load('<?=base_url().'planta/detalles'?>', { 'key': key});
            
            $(document).ready(()=>{
                $('#append').html('<input type="hidden" value="'+key+'" name="key" id="key">');
            })
        }

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
					eliminar(key);
				} else {
					swal("Operación abortada");
				}
			});
		}
		function eliminar(key){
			var formData = new FormData();
			formData.append('key', key);
			$.ajax({
                // la URL para la petición
                url : '<?=base_url()?>planta/eliminar',
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
						$("#panel-contenido").load('<?=base_url()?>planta/tabla', {'key' : '<?=$key?>'});
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
                error : function(xhr, status) {
                    alert("error");
                },
                cache: false,
        		contentType: false,
        		processData: false
            });
		}

		</script>
