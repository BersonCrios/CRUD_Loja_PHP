<?php

    function listaCategorias($connect){
            $categorias = [];
            $query = "select * from categorias";
            $lista = mysqli_query($connect, $query);
        
            while($categoria = mysqli_fetch_assoc($lista)){
                array_push($categorias, $categoria);
            }
            return $categorias;
        }