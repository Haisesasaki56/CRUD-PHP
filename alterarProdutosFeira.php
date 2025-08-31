<html>
<body>
<?php
include "util.php";
$conn = conecta();


$id = $_GET['id'];


$varSQL = "SELECT * FROM feira WHERE id = :id";
$select = $conn->prepare($varSQL);
$select->bindParam(':id', $id);
$select->execute();


$linha = $select->fetch();


$nome = $linha['nome'];
$preco = $linha['preco'];
$data_colheita = $linha['data_colheita'];


$varFoto = "imagens/p$id.jpg";
$htmlFoto = file_exists($varFoto) ? "<img src='$varFoto' width='100'>" : "<img src='imagens/psilhueta_de_vegetal.png' width='100'>";
?>


<form action="updateProdutos.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">


    Nome:
    <input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>


    Preço:
    <input type="number" name="preco" value="<?php echo $preco; ?>"><br><br>


    Data da Colheita:
    <input type="date" name="data_colheita" value="<?php echo $data_colheita; ?>"><br><br>


    Imagem atual:<br>
    <?php echo $htmlFoto; ?><br><br>


    Substituir imagem:<br>
    <input type="file" name="foto" accept="image/*"><br><br>


    <button type="submit">Salvar Alterações</button>
</form>
</body>
</html>


