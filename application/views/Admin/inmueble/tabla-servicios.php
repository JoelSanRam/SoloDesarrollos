
								<table class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info">
									<thead>
										<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="data-table-default" rowspan="1" colspan="1" aria-label=": activate to sort column descending" width="1%" aria-sort="ascending">ID</th>
										<th data-orderable="false" class="sorting_disabled" rowspan="1" colspan="1"  aria-label="" >Titulo</th>
										<th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-default" rowspan="1" colspan="1"  width="130px" aria-label="Platform(s): activate to sort column ascending">Acciones</th>
							</tr>
									</thead>
						<tbody>
							<?php if (empty($_SESSION['servicios'])){
								echo "<tr><td valign='top' colspan='6' class='dataTables_empty'>No se encontron registros</td></tr>";
							}else{

							?>
							<?php foreach ($_SESSION['servicios'] as $key => $p) : ?>
								<tr class="gradeX odd" role="row">
									<td class="f-s-600 text-inverse sorting_1" tabindex="0" width="1%"><?php echo $p->id ?></td>
									<td class="with-img"><?php echo $p->servicio ?></td>
									<td width="120px">
										<button type="button" class="btn btn-danger btn-icon btn-sm" onclick="eliminar('<?=base64_encode($p->id)?>', 'srv')" title="Eliminar"><i class="fas fa-trash-alt fa-fw"></i></button>
									</td> 
								</tr>
							<?php endforeach; ?>
							<?php }?>
						</tbody>
					</table>