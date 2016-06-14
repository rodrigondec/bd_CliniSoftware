<div class='text-center'>
	<h2>Listar Administradores</h2>
	<hr />
</div>
<?php  
    $administradores = run_select_many('select idadministrador, nome, email, cpf from pessoa natural join funcionario natural join administrador;');
    // var_dump($administradores);
?>
<div class="table-responsive container col-lg-9 center">
    <table class="table table-striped table-hover table-condensed">
        <thead> 
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th class='col-lg-1'></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($administradores as $index => $administrador): ?>
            <tr>
                <td><?php echo $administrador['nome'] ?></td>
                <td><?php echo $administrador['email'] ?></td>
                <td><?php echo $administrador['cpf'] ?></td>
                <td>
                    <a class='btn btn-info' data-toggle="modal"  data-target="#myModal<?php echo $administrador['idadministrador']; ?>">Alterar</a>
                </td>
                <!-- Modal -->
                <div id="myModal<?php echo $administrador['idadministrador']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Alterar administrador</h4>
                            </div>
                            <div class="modal-body">
                                <form method='post'>
                                    <input type='number' name='idadministrador' value="<?php echo $administrador['idadministrador']; ?>" hidden placeholder='' />
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='nome' value="<?php echo $administrador['nome']; ?>" placeholder='Nome' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='email' value="<?php echo $administrador['email']; ?>" placeholder='Email' required />
                                    </div>
                                    <div  class='form-group'>
                                        <input class='form-control' type='text' name='cpf' value="<?php echo $administrador['cpf']; ?>" data-mask='00.000.000-00' placeholder='cpf' />
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

        $idadministrador = $_POST['idadministrador'];
        $idpessoa = run_select('select idpessoa from pessoa natural join funcionario natural join administrador where idadministrador='.$idadministrador.';')['idpessoa'];

        $pessoa['nome'] = $_POST['nome'];
        $pessoa['email'] = $_POST['email'];
        $pessoa['cpf'] = $_POST['cpf'];

        update($pessoa, 'pessoa', 'idpessoa', $idpessoa);

        update($dados, 'administrador', 'idadministrador', $idadministrador);

        ob_clean();
        header('LOCATION: '.ADMINISTRADOR.'/listar_administradores');
    }
?>