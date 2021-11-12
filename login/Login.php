<?php

session_start();

require('../database/conexao.php');

function realizarLogin($usuario, $senha , $conexao){


        $sql = "SELECT * FROM tbl_administrador 
                WHERE usuario = '$usuario'";
    
        $resultado = mysqli_query($conexao, $sql);
    
        $dados = mysqli_fetch_array($resultado);
    
    
        if(isset($dados["usuario"]) && isset($dados["senha"]) && password_verify($senha, $dados["senha"])) {

            $_SESSION["usuarioId"] = $dados["id"];
            $_SESSION["nome"] = $dados["nome"];

            header("location: ../listagem/index.php");

    
        } else {
            header("location: ../listagem/index.php");
        }

    }

switch ($_POST["acao"]) {
    case 'login':
        
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];


        realizarLogin($usuario, $senha, $conexao);

        break;

    case 'logout':

        session_destroy();
        header("location: ../index.php");

        break;    
    
    default:
        # code...
        break;
}