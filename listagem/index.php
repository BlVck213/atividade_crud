<?php

    
    session_start();

    include('../componentes/header.php');

    require('../database/conexao.php');

    $sql = "SELECT * FROM tbl_pessoa";
  
    $resultado = mysqli_query($conexao, $sql);

?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($pessoa = mysqli_fetch_array($resultado)) { 
            $cod_pessoa = $pessoa["cod_pessoa"];
            $nome = $pessoa["nome"];
            $sobrenome = $pessoa["sobrenome"];
            $email = $pessoa["email"];
            $celular = $pessoa["celular"];
            ?>
            <tr>
                <th><?= $cod_pessoa ?></th>
                <th><?= $nome ?></th>
                <th><?= $sobrenome ?></th>
                <th><?= $email ?></th>
                <th><?= $celular ?></th>
                <th>
                    <button class="btn btn-warning" onclick="javascript:window.location.href = '../cadastro/editar.php?id=<?= $cod_pessoa ?>'">Editar</button>
                    <button class="btn btn-danger" onclick="deletar(<?= $cod_pessoa ?>)">Excluir</button>
                

                    <form id="formDeletar" method="post" action="../acoes.php">
                    <input type="hidden" name="acao" value="deletar" />
                    <input type="hidden" name="pessoaId" id="pessoaId" />
                </form>
                    
                </th>
            </tr>
            <?php } ?>
    </tbody>

    </table>

</div>


<script lang="javascript">
        function deletar(pessoaId) {
            if (confirm("Tem certeza que deseja deletar este produto?")) {
                document.querySelector("#pessoaId").value = pessoaId;
                document.querySelector("#formDeletar").submit();
            }
        }
</script>

<?php
    include('../componentes/footer.php');
?>