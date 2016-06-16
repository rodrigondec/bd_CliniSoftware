<nav class="navbar navbar-default navbar-static-top" role='navigation'>
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/<?php echo BASE; ?>">Página inicial</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id='navbar' class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo RECEPCIONISTA; ?>/selecionar_usuario">Visualizar Agenda</a></li>
                <li><a href="<?php echo SISTEMA; ?>/escolher_especialidade">Marcar Consulta</a></li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Conta<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo RECEPCIONISTA; ?>/selecionar_paciente?next=gerar_conta">Gerar Conta</a></li>
                        <li><a href="<?php echo RECEPCIONISTA; ?>/selecionar_paciente?next=selecionar_produto">Registrar Produto em Conta</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo RECEPCIONISTA; ?>/selecionar_paciente?next=pagar_conta">Pagar Conta</a></li>
                    </ul> 
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">                
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><i class="fa fa-cog"></i>&nbsp;Opções<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMIN; ?>meus_dados">Meus dados</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" <?php echo "onclick='log_out(\"".BASE."\")'"; ?>>Sair</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo SISTEMA; ?>/swap?tipo=administrador">Trocar para administrador</a></li>
                        <li><a href="<?php echo SISTEMA; ?>/swap?tipo=medico">Trocar para medico</a></li>
                        <li><a href="<?php echo SISTEMA; ?>/swap?tipo=paciente">Trocar para paciente</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>