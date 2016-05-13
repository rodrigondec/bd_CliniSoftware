<nav class="navbar navbar-default navbar-static-top">
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
                <li><a href="<?php echo SISTEMA; ?>contato">Contato</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a id='entrar' data-toggle="modal"  data-target="#myModal">
                        Entrar
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">Login</h4>
            </div>
            <div class="modal-body">
                <!-- Warning de dados incorretos no login -->
                <div id='warning_entrar' class="alert alert-danger alert-dismissible hidden" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p><strong>Dados incorretos!</strong></p>Tente novamente
                </div>
                <!-- Form de login -->
                <form action="/<?php echo BASE; ?>index.php/login" method='post'>
                    <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='email' name='email' class='form-control' id='input_email' placeholder='Digite seu email'  required />
                    </div>
                    <div class='form-group'>
                        <label for='senha'>Senha</label>
                        <input type='password' name='senha' class='form-control' id='input_senha' placeholder='Digite sua senha' required />
                    </div>
                    <div>
                    	<button class='btn btn-danger' type='reset'>Apagar</button>
                        <button class='btn btn-primary' type='submit'>Entrar</button>
                        ou
                        <a href="<?php echo SISTEMA; ?>cadastro">Registre-se</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>