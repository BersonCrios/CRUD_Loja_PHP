<?php
    include("_cabecalho.php");
    include("conexao.php");
    include("bancoProduto.php");
?>

<?php
  if(array_key_exists("removido",$_GET) && $_GET["removido"] == "true" ){
?>
    <p class="alert-success">Produto apagado com sucesso.</p>
<?php  
  }
?>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Descrição</th>
      <th scope="col">Categoria</th>
      <th scope="col">Alterar</th>
      <th scope="col">Remover</th>
    </tr>
  </thead>
  <tbody>

<?php
    $produtos = listaProdutos($connect);
    foreach ($produtos as $produto) {
?>
    <tr>
      <td><?php echo $produto['nome']?></td>
      <td><?php echo $produto['preco']?></td>
      <td><?php echo substr($produto['descricao'], 0,40)?></td>
      <td><?php echo $produto['categoria_nome']?></td>
      <td>
        <form action="produtoAlteraFormulario.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $produto['id']?>">
          <button class="btn btn-primary">Alterar</a>
        </form>
      </td>
      <td>
        <form action="removeProduto.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $produto['id']?>">
          <button class="btn btn-danger">Remover</a>
        </form>
      </td>
    </tr>
    
<?php
  }
?>
  </tbody>
  </table>

<?php
    include("_rodape.php");
?>