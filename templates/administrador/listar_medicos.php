<div class='text-center'>
	<h2>Listar Médicos</h2>
	<hr />
</div>
<?php  
    $medicos = run_select_many('select idmedico, nome, email, cpf, cadastro_unico, ativo from pessoa natural join funcionario natural join medico;');
    // var_dump($medicos);
?>
<div class="table-responsive container col-lg-9 center">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Cadastro Único</th>
                <th class='col-lg-1'></th>
                <th class='col-lg-1'</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($medicos as $index => $medico): ?>
            <tr>
                <td><?php echo $medico['nome'] ?></td>
                <td><?php echo $medico['email'] ?></td>
                <td><?php echo $medico['cpf'] ?></td>
                <td><?php echo $medico['cadastro_unico'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $medico['idmedico']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $medico['idmedico']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar Hopistal</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idmedico' value="<?php echo $medico['idmedico']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $medico['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='email' value="<?php echo $medico['email']; ?>" placeholder='Email' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='cpf' value="<?php echo $medico['cpf']; ?>" data-mask='00.000.000-00' placeholder='cpf' />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='cadastro_unico' value="<?php echo $medico['cadastro_unico']; ?>" placeholder='Cadastro Único' required />
                                    </div>
                                    <input type='submit' value='Alterar' class='btn btn-primary' />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php if($medico['ativo']): ?>
                <td><a href="<?php echo ADMINISTRADOR.'/invalidar_medico?idmedico='.$medico['idmedico']; ?>" class='btn btn-warning'>Invalidar</a></td>
            <?php else: ?>
                <td><a href="<?php echo ADMINISTRADOR.'/validar_medico?idmedico='.$medico['idmedico']; ?>" class='btn btn-success'>Validar</a></td>
            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php 
    if(count($_POST) > 0){

        $idmedico = $_POST['idmedico'];
        $idpessoa = run_select('select idpessoa from pessoa natural join funcionario natural join medico where idmedico='.$idmedico.';')['idpessoa'];

        $pessoa['nome'] = $_POST['nome'];
        $pessoa['email'] = $_POST['email'];
        $pessoa['cpf'] = $_POST['cpf'];

        update($pessoa, 'pessoa', 'idpessoa', $idpessoa);

        $dados['cadastro_unico'] = $_POST['cadastro_unico'];

        update($dados, 'medico', 'idmedico', $idmedico);

        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_medicos');
    }
?>