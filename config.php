<?php 

if(!isset($_SESSION))
    session_start();

//ATENÇÃO: APP_HOST: a partir do servidor(pasta htdocs), qual a pasta que App está localizada
define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "");
define('PATH', realpath('./'));
define('IMG', "http://".APP_HOST."/public/img/");
define('TITLE'          , "Polishop");

?>