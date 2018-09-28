<?php
  
    include("conexao.php");
    include("_cabecalho.php");
    include("bancoProduto.php");
   

    $id = $_POST['id'];

    removeProduto($connect, $id);

    header("location:produtoLista.php?removido=true");

    die();  
?>