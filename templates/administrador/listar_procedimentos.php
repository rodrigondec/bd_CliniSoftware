<div class='text-center'>
	<h2>Listar Procedimentos</h2>
	<hr />
</div>
<?php  
    $procedimentos = run_select_many('select idprocedimento, nome, preco from procedimento;');
    // var_dump($procedimentos);
?>
<div class="table-responsive container center col-lg-5">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($procedimentos as $index => $procedimento): ?>
            <tr>
                <td><?php echo $procedimento['nome'] ?></td>
                <td><?php echo $procedimento['preco'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $procedimento['idprocedimento']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $procedimento['idprocedimento']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar procedimento</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idprocedimento' value="<?php echo $procedimento['idprocedimento']; ?>" hidden />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $procedimento['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='number' step='any' name='preco' value="<?php echo $procedimento['preco']; ?>" placeholder='Preço' data-mask="###0.00" data-mask-reverse="true" required />
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

        update($dados, 'procedimento', 'idprocedimento', $_POST['idprocedimento']);
        
        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_procedimentos');
    }
?>