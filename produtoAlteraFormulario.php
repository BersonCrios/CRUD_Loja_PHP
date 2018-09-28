<?php
    include("_cabecalho.php");
    include("conexao.php");
    include("bancoProduto.php");
    include("bancoCategoria.php");

    $id = $_POST['id'];
    $produto = buscaProduto($connect, $id);
    $categorias = listaCategorias($connect);

    $usado = $produto['usado'] ? "checked='checked'" : "";
?>

<div class="container">
    <h1>Alterar Produto</h1>
    <form action="alteraProduto.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $produto['id']?>">
        <div class="form-group">
            <label for="nome">Nome </label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $produto['nome']?>">
        </div>

        <div class="form-group">
            <label for="cpf">Preço </label>
            <input type="text" class="form-control" id="preco" placeholder="Preço" name="preco" value="<?php echo $produto['preco']?>">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição </label>
            <textarea class="form-control" name="descricao"><?php echo $produto['descricao']?></textarea>
        </div>

        <div class="form-group">
            <input type="checkbox" name="usado" <?php echo $usado?> value="true"> Usado
        </div>

        <div class="form-group">
            <select name="categoria_id" class="custom-select">
                <?php
                    foreach ($categorias as $categoria) {
                        $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                        $selecionado = $essaEhACategoria ? "selected = 'selected'" : "";
               ?>
                <option value="<?php echo $categoria['id']?>" <?php echo $selecionado?>>
                    <?php echo $categoria['nome']?>
                </option>
                <?php
                    }
                ?>
            </select>
        </div>
        

        
        <button type="submit" class="btn btn-primary">Alterar</button>
    </form>
</div>

<?php
    include("_rodape.php");
?>