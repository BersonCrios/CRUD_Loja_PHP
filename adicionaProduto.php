<?php
  
    include("conexao.php");
    include("_cabecalho.php");
    include("bancoProduto.php");
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

    if (insereProduto($connect,$nome, $preco, $descricao, $categoria_id, $usado)) { ?>

    <div class="principal">
        <p class="alert text-success"> PRODUTO <?php echo $nome;?>, <?php echo $preco;?> ADD COM SUCESSO </p>
    </div> 

   <?php   } 
    else{  ?>

    <?php
     $msgn_erro =  mysqli_error($connect);
    ?>   
    <div class="principal">
         <p class="alert text-danger"> Não foi possivel adicionar: <?php echo $msgn_erro?> </p>
    </div> 
   

    <?php }

    mysqli_close($connect);

    include("_rodape.php");
?>