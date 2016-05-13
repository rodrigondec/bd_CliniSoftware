<?php
	//XAMPP && C9
	define('ARQUIVOS', $_SERVER['DOCUMENT_ROOT']);
	define('BASE', 'ITDev/'); // XAMPP
	// define('BASE', ''); // C9
	define('TEMPLATES', ARQUIVOS.'/'.BASE.'templates/');
	
	define('LOGIN', ARQUIVOS.'/'.BASE.'login.php');
	define('CONFIGS', ARQUIVOS.'/'.BASE.'configs/configs.php');
	
	define('ADMIN', '/'.BASE.'index.php/admin/');
	define('HOSPITAL', '/'.BASE.'index.php/hospital/');
	define('SISTEMA', '/'.BASE.'index.php/sistema/');



	define('DB_NAME', 'name'); //Mudar para o nome do banco
	define('DB_USER', 'root');
	define('DB_PASS', '');
	// define('DB_HOST', 'localhost'); //Windows
	define('DB_HOST', 'localhost:/tmp/mysql.sock'); //Unix/OSX

	define('LINK', mysql_connect(DB_HOST, DB_USER, DB_PASS));
	mysql_select_db(DB_NAME, LINK);
	mysql_set_charset('utf8', LINK);

	ob_start(); //Criando Buffer
	session_start();
	date_default_timezone_set('America/Recife');
	include_once('functions.php');
	include_once('banco.php');
	// include_once(ARQUIVOS.'/'.BASE.'/estaticos/PHPMailer/PHPMailerAutoload.php');
?>