<div class="row">
				<div class="col-sm-12">
					<div id="data-table-default_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12"> 
								<table id="data-table-default" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info">
									<thead>
										<tr role="row">
										<th>ID</th>
										<th>Nombre</th>
										<th>Acciones</th>
							</tr>
									</thead>
						<tbody>
						<?php if (empty($_SESSION['financiamiento'])){
								echo "<tr><td valign='top' colspan='3' class='dataTables_empty'>No se encontron registros</td></tr>";
							}else{?>
						<?php foreach ($_SESSION['financiamiento'] as $key => $p) : ?>
                            <tr class="gradeX odd" role="row">
								<td class="f-s-600 text-inverse sorting_1" tabindex="0" width="1%"><?php echo $p->id ?></td>
								<td><?php echo $p->financiamiento ?></td>
								<td>
                                	<button type="button" class="btn btn-danger btn-icon btn-sm" onclick="eliminar('<?=base64_encode($p->id)?>', 'fin')" title="Eliminar"><i class="fas fa-trash-alt fa-fw"></i></button>
                            	</td> 
							</tr>
							<?php endforeach; }?>  
							</tbody>
					</table></div></div>
				</div>
			</div>