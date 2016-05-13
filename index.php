<?php include_once('controle/rotas.php'); ?>
<html>
    <head>
    	<meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?php echo IMGS.'ufrn.jpg'; ?>">

        <!-- Latest compiled and minified CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/<?php echo BASE; ?>estaticos/bootstrap-sweetalert/lib/sweet-alert.css">
        <link rel="stylesheet" href="/<?php echo BASE; ?>estaticos/estilo.css">   

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	    <script src="/<?php echo BASE; ?>estaticos/functions.js"></script>

        <title>PROJETO</title>
    </head>
    <body>
        <!-- Wrap all page content here -->
        <div id="wrap">
            <?php incluir_menu(); ?> <!-- mostra o menu incluído -->
            <!-- Begin page content -->
            <div class="fluid-container">
                <?php include_conteudo(); ?> <!-- mostrar o template incluído -->
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <?php include_once(TEMPLATES.'/geral/footer.php'); ?> <!-- mostrar o footer incluído -->
            </div>
        </div>
    </body>

    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>

	    <script src="/<?php echo BASE; ?>estaticos/bootstrap-sweetalert/lib/sweet-alert.min.js"></script> 

	    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.js'></script>
</html>