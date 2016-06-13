<div class='text-center'>
	<h2>Listar Funcionários</h2>
	<hr />
</div>
<?php  
    $funcionarios = run_select_many('select idfuncionario, nome, email, salario, data_pagamento from pessoa natural join funcionario;');
    // var_dump($funcionarios);
?>
<div class="table-responsive container center col-lg-8">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Salário</th>
                <th>Data de pagamento</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($funcionarios as $index => $funcionario): ?>
            <tr>
                <td><?php echo $funcionario['nome'] ?></td>
                <td><?php echo $funcionario['email'] ?></td>
                <td><?php echo $funcionario['salario'] ?></td>
                <td><?php echo $funcionario['data_pagamento'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal" data-target="#myModal<?php echo $funcionario['idfuncionario']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $funcionario['idfuncionario']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar funcionário</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idfuncionario' value="<?php echo $funcionario['idfuncionario']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $funcionario['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='email' value="<?php echo $funcionario['email']; ?>" placeholder='Email' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='number' name='salario' value="<?php echo $funcionario['salario']; ?>" placeholder='Salário' data-mask="###0.00" data-mask-reverse="true" min='500' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='number' name='data_pagamento' value="<?php echo $funcionario['data_pagamento']; ?>" placeholder='Data de pagamento' data-mask="00" min='03' max='20' required />
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

        $idfuncionario = $_POST['idfuncionario'];
        $idpessoa = run_select('select idpessoa from pessoa natural join funcionario where idfuncionario='.$idfuncionario.';')['idpessoa'];
        
        $pessoa['nome'] = $_POST['nome'];
        $pessoa['email'] = $_POST['email'];

        update($pessoa, 'pessoa', 'idpessoa', $idpessoa);
        
        $dados['salario'] = $_POST['salario'];
        $dados['data_pagamento'] = $_POST['data_pagamento'];

        update($dados, 'funcionario', 'idfuncionario', $idfuncionario);

        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_funcionarios');
    }
?>