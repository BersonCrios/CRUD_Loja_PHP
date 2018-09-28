<?php
  
    include("conexao.php");
    include("_cabecalho.php");
    include("bancoProduto.php");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    if(array_key_exists('usado', $_POST)){
        $usado = "true";
    }
    else{
        $usado = "false";
    }

    if (alteraProduto($connect, $id ,$nome, $preco, $descricao, $categoria_id, $usado)) { ?>

    <div class="principal">
        <p class="alert text-success">O PRODUTO <?php echo $nome;?>, <?php echo $preco;?> ALTERADO COM SUCESSO </p>
    </div> 

   <?php   } 
    else{  ?>

    <?php
     $msgn_erro =  mysqli_error($connect);
    ?>   
    <div class="principal">
         <p class="alert text-danger"> Não foi possivel alterar: <?php echo $msgn_erro?> </p>
    </div> 
   

    <?php }

    mysqli_close($connect);

    include("_rodape.php");
?>