<div class="panel panel-inverse">
	<!-- begin panel-heading -->
	<div class="panel-heading">
		<div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		</div>
		<h4 class="panel-title">Gestión de modelos</h4>
	</div>
	<!-- end panel-heading -->
	<!-- begin panel-body -->
	<div class="panel-body" style="">
		<div id="data-table-default_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
			<div class="row">
				<div class="col-sm-12">
					<div id="data-table-default_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12"> 
								<table id="data-table-default" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info">
									<thead>
										<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="data-table-default" rowspan="1" colspan="1" style="width: 13px;" aria-label=": activate to sort column descending" width="1%" aria-sort="ascending">ID</th>
										<th data-orderable="false" class="sorting_disabled" rowspan="1" colspan="1"  aria-label="">Nombre</th>
										<th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-default" rowspan="1" colspan="1"  aria-label="Rendering engine: activate to sort column ascending">Tipo</th>
										<th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-default" rowspan="1" colspan="1" width="35px" aria-label="Platform(s): activate to sort column ascending">Acciones</th>
							</tr>
									</thead>
						<tbody>
						<?php foreach ($modelo as $key => $p) : ?>
                            <tr class="gradeX odd" role="row">
								<td class="f-s-600 text-inverse sorting_1" tabindex="0" width="1%"><?php echo $p->Id_modelo ?></td>
								<td class="with-img" ><?php echo $p->Modelo ?></td>
								<td><?php echo $p->Tipo ?></td>
								<td>
									
                                	<button type="button" class="btn btn-grey btn-icon btn-sm"  title="Editar" onclick="editarModelo('<?=base64_encode($p->Id_modelo)?>')"><i class="fas fa-pencil-alt fa-fw"></i></button>
                                
                                <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="confirmarEliminar('<?=base64_encode($p->Id_modelo)?>')" title="Eliminar"><i class="fas fa-trash-alt fa-fw"></i></button>
                            </td> 
							</tr>
							<?php endforeach; ?>  
							</tbody>
					</table></div></div>
				</div>
			</div>
		</div>
	</div>
				</div>
				<!-- end panel-body -->
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