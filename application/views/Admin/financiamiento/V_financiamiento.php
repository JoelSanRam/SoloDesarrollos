<?php $this->load->view('Master')?>

<div class="content" id="content">
	<div class="row">
		<div class="col-md-3">
			<h2>Financiamiento</h2>
		</div>
		<div class="col-md-9">
			<a class="btn btn-success col-md-3" type="button" href="#modal-dialog" style="float: right;" data-toggle="modal" data-target="#modal-dialog"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Nuevo financiamiento</a>
		</div>
	</div>
	<div id="panel-contenido"></div>
	<input type="hidden" id="currentPage">

	<form action="" id="form-captura4" name="form-captura4">
	
		<div class="modal fade" id="modal-dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Financiamiento</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<label for="">Nuevo financiamiento: </label> 
						<input type="text" name="formaPago" id="formaPago" class="form-control m-b-5">
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cerrar</a>
						<a href="javascript:;" class="btn btn-success" onclick="insertarForma()">Agregar</a>
					</div>
				</div>
			</div>
		</div>
	</form>

	<form action="" id="form-captura3" name="form-captura3">
	<input type="hidden" name="Idforma" id="Idforma" value="0">
		<div class="modal fade" id="modal-dialog1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Financiamiento</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						
						<label for="">Actualizar: </label> 
						<input type="text" name="formaPago1" id="formaPago1" class="form-control m-b-5">
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-white" data-dismiss="modal">Cerrar</a>
						<a href="javascript:;" class="btn btn-success" onclick="updateForma()">Actualizar</a>
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
			TableManageDefault.init();
		});
	</script>
	<script>
		$("#panel-contenido").load('<?=base_url()?>Admin/C_financiamiento/tabla');

		function insertarForma(){
                $.ajax({
                    type: "POST",
                    url: '<?=base_url()?>Admin/C_financiamiento/insertarFormaPago',
                    data: $("#form-captura4").serialize(),
                    success: function(response){
                        if(response > 0){
                           //$("#contenido").load('<?=base_url()?>C_plantilla/guardar_cuestionario');
                           $("#panel-contenido").load('<?=base_url()?>Admin/C_financiamiento/tabla');
                            swal({
                                icon: 'success',
                                title: 'Exito',
    	                        text: 'El registro se ha guardado exitosamente',
                                button: false,
                                timer: 1500
                            })
                        }else{
                            swal({
                                icon: 'error',
                                title: 'Algo salio mal',
    	                        text: 'El registro no se guardó',
                                button: false,
                                timer: 1500
                            })
                        }
						//console.log(response);
                    }
                });
            }
			function updateForma(){
                $.ajax({
                    type: "POST",
                    url: '<?=base_url()?>Admin/C_financiamiento/ActualizarForma',
                    data: $("#form-captura3").serialize()+'&Id_forma='+$("#Idforma").val(),
                    success: function(response){
                        if(response > 0){
							//alert(response);
                           
                           $("#panel-contenido").load('<?=base_url()?>Admin/C_financiamiento/tabla');
                            swal({
                                icon: 'success',
                                title: 'Exito',
    	                        text: 'El registro se ha guardado exitosamente',
                                button: false,
                                timer: 1500
                            }) 
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
                    }
                });
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
						$.get("<?=base_url()?>Admin/C_financiamiento/borrar_forma/"+id, 
						function(data) {
							if(data == 1){
								$("#panel-contenido").load('<?=base_url()?>Admin/C_financiamiento/tabla');
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

			function editarForma(Idforma,e){
                e.preventDefault();
				var forma = $('#forma'+Idforma).text();
                $("#Idforma").val(Idforma);
                $('#formaPago1').val(forma);
				$("#modal-dialog1").modal();
				//console.log(forma);
            }
		</script>
