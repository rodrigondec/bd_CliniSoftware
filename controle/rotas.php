<?php
    include_once('globais.php');

    function montar_include($pasta, $arquivo) {
        if($arquivo == 'login'){
            return LOGIN;
        }
        return TEMPLATES.'/'.$pasta.'/'.$arquivo.'.php';
    }

    function include_conteudo(){
        $include = true;

        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri); //Separando URI dos Parametros Get
        $uri = $uri[0]; //Apenas URI (ignorando Parametros Get)
        $uri = rtrim($uri, '/'); //Removendo última barra da URI
        $partes = explode('/', $uri);

        if(count($partes) >= 3){ //Tenha mais de 3 partes
            $arquivo = array_pop($partes); //Último elemento
            $pasta = array_pop($partes); //Penúltimo elemento


            // VERIFICAÇÃO DE PERMISSÃO
            try{
                if(false){
                    throw new Exception('', 1);
                }
            }
            catch (Exception $e){
                $include = false;
                if($e->getCode() == 1){
                    $mensagem = 'info de permissão!';
                    $tipo = 'info';
                }
                else{
                    $mensagem = 'Você não possui privilégio para utilizar essa funcionalidade!';
                    $tipo = 'error';
                }
                swal('Acesso Negado!', $mensagem, $tipo, '/'.BASE);
                exit("Try again!");
            }
            // END VERIFICAÇÃO
        } 
        else{
            $pasta = 'sistema';    
            $arquivo = 'home';          
        }
        $caminho = montar_include($pasta, $arquivo);
        if($include){
            include_once($caminho);
        }   
    }
?>