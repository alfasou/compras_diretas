<?php

require_once 'config-geral.php';

//$conexao = 'mysql:host='. HOST .';dbname='. DB .';charset=utf8';
$conexao = 'pgsql:host='. HOST .';port='. PORT .';dbname='. DB .';';

try{
    $conecta = new PDO($conexao, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $str = "host=bey.ima.sp.gov.br port=5432 dbname=bi_pmc user=bi_pmc password=M7I-GIpDEwSe";

    $conn_sis = pg_connect($str);


    //$conn_sis = mysqli_connect(HOST, USER, PASS, DB);

} catch(PDOException $error_conecta){
    echo 'Erro ao conectar '.$error_conecta->getMessage();

    // redireciono para a página de problemas de conexão
    echo "<script>location.href='view/500.php';</script>";
    

}