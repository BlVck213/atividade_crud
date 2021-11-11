<?php

    session_start();

    require("./database/conexao.php");


    switch ($_POST["acao"]) {

        case 'cadastrar':
        
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];

            $sql = "INSERT INTO tbl_pessoa 
            (nome, sobrenome, email, celular) 
            VALUES ('$nome', '$sobrenome', '$email', '$celular')";


        $resultado = mysqli_query($conexao, $sql);

        header("location: cadastro/index.php");

            break;

        case 'editar':

            $pessoaId = $_POST["pessoaId"];


            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];
            
            $sqlUpdate = "UPDATE tbl_pessoa SET 
                          nome = '$nome',
                          sobrenome = '$sobrenome',
                          email = '$email',
                          celular = '$celular'
                          WHERE cod_pessoa = $pessoaId";



            $resultado = mysqli_query($conexao, $sqlUpdate);

            header("location: listagem/index.php");
            
            break;

        case 'deletar':

            $pessoaId = $_POST["pessoaId"];

            $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $pessoaId";

            $resultado = mysqli_query($conexao, $sql);

            header("location: listagem/index.php");

            break;
        
        default:
            # code...
            break;
    }


