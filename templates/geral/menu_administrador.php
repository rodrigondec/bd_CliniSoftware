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
                <li><a href="/<?php echo BASE; ?>admin">PHPMyAdmin</a></li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Funcionário<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMINISTRADOR; ?>/listar_funcionarios">Listar</a></li>
                        <li>
                            <a href="<?php echo ADMINISTRADOR; ?>/selecionar_funcionario">Registrar Carga Horária</a>
                        </li>
                        <li><a href="<?php echo ADMINISTRADOR; ?>/listar_cargas">Listar Cargas Horárias</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Médicos<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_medicos">Listar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_medico">Cadastrar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/selecionar_medico_especialidade">Registrar Especialização de Médico</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_especializados">Listar Médicos Especializados</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Recepcionistas<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_recepcionistas">Listar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_recepcionista">Cadastrar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/selecionar_recepcionista">Registrar Gerencia de Médico</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_gerencias">Listar Gerencias</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Administradores<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_administradores">Listar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_administrador">Cadastrar</a></li>
                            </ul>
                        </li>
                    </ul> 
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Especialidades<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMINISTRADOR; ?>/listar_especialidades">Listar</a></li>
                        <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_especialidade">Cadastrar</a></li>
                    </ul> 
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Expediente<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMINISTRADOR; ?>/listar_expedientes">Listar</a></li>
                        <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_expediente">Cadastrar</a></li>
                    </ul> 
                </li>
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'>Mercância<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Produtos<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_produtos">Listar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_produto">Cadastrar</a></li>
                            </ul>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Procedimentos<div class='inline'><i class="fa fa-caret-right" style=''></i></div></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_procedimentos">Listar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/cadastrar_procedimento">Cadastrar</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/selecionar_procedimento">Registrar Inclusão de Produto</a></li>
                                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_inclusoes">Listar Inclusões</a></li>
                            </ul>
                        </li>
                    </ul> 
                </li>
                <li><a href="<?php echo ADMINISTRADOR; ?>/listar_pessoas">Listar Pessoas</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">                
                <li class='dropdown'>
                    <a href="#" class='dropdown-toggle' data-toggle='dropdown'><i class="fa fa-cog"></i>&nbsp;Opções<span class="caret"></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href="<?php echo ADMIN; ?>meus_dados">Meus dados</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" <?php echo "onclick='log_out(\"".BASE."\")'"; ?>>Sair</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo SISTEMA; ?>/swap?tipo=medico">Trocar para medico</a></li>
                        <li><a href="<?php echo SISTEMA; ?>/swap?tipo=paciente">Trocar para paciente</a></li>
                        <li><a href="<?php echo SISTEMA; ?>/swap?tipo=recepcionista">Trocar para recepcionista</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>