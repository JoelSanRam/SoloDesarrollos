<?php $this->load->view('Master') ?>

<div class="content" id="content">
	<div class="row">
		<div class="col-md-2">
			<h2>Asesores</h2>
		</div>
		<div class="col-md-10">
			<a class="btn btn-success col-md-4" type="button" href="<?=base_url();?>Admin/C_asesor/guardarTipo" style="float: right;"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Nuevo asesor</a>
		</div> 

	</div>
	<div id="panel-contenido"></div>
	<input type="hidden" id="currentPage">
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
						$.get("<?=base_url()?>Admin/C_asesor/borrar_forma/"+id, 
						function(data) {
							if(data == 1){
								$("#panel-contenido").load('<?=base_url()?>Admin/C_asesor/tabla');
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
	</script>
	<script>
        $("#panel-contenido").load('<?=base_url()?>Admin/C_asesor/tabla');
	</script>