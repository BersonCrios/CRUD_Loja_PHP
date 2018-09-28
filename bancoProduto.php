<?php

    function listaProdutos($connect){
        $produtos = [];
        $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id = p.categoria_id";
        $lista = mysqli_query($connect, $query);
    
        while($produto = mysqli_fetch_assoc($lista)){
            array_push($produtos, $produto);
        }
        return $produtos;
    }


    function insereProduto($connect,$nome, $preco,$descricao, $categoria_id, $usado){
            $insert = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
            return mysqli_query($connect, $insert);
    }

    function alteraProduto($connect, $id, $nome, $preco,$descricao, $categoria_id, $usado){
        $update = "update produtos set nome = '{$nome}' , preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} where id = {$id}";
        return mysqli_query($connect, $update);
    }

    function removeProduto($connect, $id){
        $delete = "delete from produtos where id = {$id}";
        return mysqli_query($connect, $delete);
    }

    function buscaProduto($connect, $id){
        $buscaPorId = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($connect, $buscaPorId);
        return mysqli_fetch_assoc($resultado);
    }