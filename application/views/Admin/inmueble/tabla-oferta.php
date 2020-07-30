<table class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info">
    <thead>
        <tr role="row">
            <th data-orderable="false" class="sorting_disabled" rowspan="1" colspan="1"  aria-label="" >Titulo</th>
            <th class="text-nowrap sorting" tabindex="0" aria-controls="data-table-default" rowspan="1" colspan="1"  width="130px" aria-label="Platform(s): activate to sort column ascending">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($_SESSION['oferta'])){
            echo "<tr><td valign='top' colspan='2' class='dataTables_empty'>No se encontron registros</td></tr>";
        }else{
            
        ?>
        <?php foreach ($_SESSION['oferta'] as $key => $p) : ?>
            <tr class="gradeX odd" role="row">
                <td class="with-img"><?php echo $p->cantidad ?></td>
                <td width="120px">
                    <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="eliminar('<?=base64_encode($p->cantidad)?>', 'sale')" title="Eliminar"><i class="fas fa-trash-alt fa-fw"></i></button>
                </td> 
            </tr>
        <?php endforeach; ?>
        <?php }?>
    </tbody>
</table>