<?php
    include("_cabecalho.php");
    include("conexao.php");
    include("bancoCategoria.php");

    $categorias = listaCategorias($connect);
?>

<div class="container">
    <h1>Formulario de Produto</h1>
    <form action="adicionaProduto.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome </label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
        </div>

        <div class="form-group">
            <label for="cpf">Preço </label>
            <input type="text" class="form-control" id="preco" placeholder="Preço" name="preco">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição </label>
            <textarea class="form-control" name="descricao"></textarea>
        </div>

        <div class="form-group">
            <input type="checkbox" name="usado" value="true"> Usado
        </div>

        <div class="form-group">
            <select name="categoria_id" class="custom-select">
                <?php
                    foreach ($categorias as $categoria) {
                        ?>
                <option name="categoria_id" value="<?php echo $categoria['id']?>">
                    <?php echo $categoria['nome']?>
                </option>
                <?php
                    }
                    ?>
            </select>
        </div>
        

        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php
    include("_rodape.php");
?>