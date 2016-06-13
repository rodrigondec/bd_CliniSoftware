<div class='text-center'>
	<h2>Listar Especialidades</h2>
	<hr />
</div>
<?php  
    $especialidades = run_select_many('select idespecialidade, nome from especialidade;');
    // var_dump($especialidades);
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
        <?php foreach($especialidades as $index => $especialidade): ?>
            <tr>
                <td><?php echo $especialidade['nome'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $especialidade['idespecialidade']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $especialidade['idespecialidade']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar Especialidade</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idespecialidade' value="<?php echo $especialidade['idespecialidade']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $especialidade['nome']; ?>" placeholder='Nome' required />
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

        update($dados, 'especialidade', 'idespecialidade', $_POST['idespecialidade']);
        

        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_especialidades');
    }
?>