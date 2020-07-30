<?php $this->load->view('Master') ?>

<div class="content" id="content">
	<div class="row">
		<div class="col-md-2">
			<h2>Desarrollos</h2>
		</div>
		<div class="col-md-10">
			<a class="btn btn-success col-md-2" type="button" href="<?php echo base_url(); ?>desarrollo/nuevo" style="float: right;"><i class="fas fa-lg fa-fw m-r-10 fa-plus-circle"></i>Nuevo desarrollo</a>
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

		function update(key){
			$.redirect('<?=base_url()?>desarrollo/modificar', {'key': key });
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
                url : '<?=base_url()?>desarrollo/eliminar',
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
						$("#panel-contenido").load('<?=base_url()?>desarrollo/tabla');
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
		$("#panel-contenido").load('<?=base_url()?>desarrollo/tabla');
		function dropzone(key){
			$.redirect('<?=base_url()?>desarrollo/dropzone', {'key': key });
		}
	</script>
