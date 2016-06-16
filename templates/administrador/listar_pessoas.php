<div class='text-center'>
	<h2>Listar pessoas</h2>
	<hr />
</div>
<?php  
    $pessoas = run_select_many('select * from pessoa;');
    // var_dump($pessoas);
?>
<div class="table-responsive container center">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($pessoas as $index => $pessoa): ?>
            <tr>
                <td><?php echo $pessoa['nome'] ?></td>
                <td><?php echo $pessoa['email'] ?></td>
                <td><?php echo $pessoa['telefone'] ?></td>
                <td><?php echo $pessoa['cpf'] ?></td>
                <td><?php echo $pessoa['data_nascimento'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $pessoa['idpessoa']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $pessoa['idpessoa']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar pessoa</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idpessoa' value="<?php echo $pessoa['idpessoa']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $pessoa['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='email' name='email' value="<?php echo $pessoa['email']; ?>" placeholder='Email' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='telefone' value="<?php echo $pessoa['telefone']; ?>" data-mask='(00) 00000-0000' placeholder='Telefone' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='cpf' value="<?php echo $pessoa['cpf']; ?>" data-mask='000.000.000-00' placeholder='cpf' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='date' name='data_nascimento' value="<?php echo $pessoa['data_nascimento']; ?>" placeholder='Data' required />
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
        var_dump($_POST);  
        $dados['nome'] = $_POST['nome'];
        $dados['email'] = $_POST['email'];
        $dados['telefone'] = $_POST['telefone'];
        $dados['cpf'] = $_POST['cpf'];
        $dados['data_nascimento'] = $_POST['data_nascimento'];

        update($dados, 'pessoa', 'idpessoa', $_POST['idpessoa']);
        
        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_pessoas');
    }
?>