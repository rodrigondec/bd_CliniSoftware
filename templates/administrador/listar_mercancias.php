<div class='text-center'>
	<h2>Listar Mercâncias</h2>
	<hr />
</div>
<?php  
    $mercancias = run_select_many('select idmercancia, nome from mercancia;');
    // var_dump($mercancias);
?>
<div class="table-responsive container center col-lg-3">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($mercancias as $index => $mercancia): ?>
            <tr>
                <td><?php echo $mercancia['nome'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $mercancia['idmercancia']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $mercancia['idmercancia']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar mercância</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idmercancia' value="<?php echo $mercancia['idmercancia']; ?>" hidden />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $mercancia['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <input type='submit' value='Alterar' class='btn btn-primary' />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php 
    if(count($_POST) > 0){
        $dados['nome'] = $_POST['nome'];

        update($dados, 'mercancia', 'idmercancia', $_POST['idmercancia']);
        
        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_mercancias');
    }
?>