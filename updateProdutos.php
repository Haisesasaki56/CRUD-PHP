<?php
include "util.php";
$conn = conecta();


$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$data_colheita = $_POST['data_colheita'];


$varSQL = "update feira set nome = :nome, preco = :preco, data_colheita = :data_colheita where id = :id";


$update = $conn->prepare($varSQL);
$update->bindParam(':nome', $nome);
$update->bindParam(':preco', $preco);
$update->bindParam(':data_colheita', $data_colheita);
$update->bindParam(':id', $id);


if ($update->execute() > 0) {


    echo "<br><br>Alterado com sucesso!<br>";


    if ($_FILES) {


        $varArquivoRecebido = $_FILES['foto']['tmp_name'];
        $varExtensaoPadrao = 'jpg';
        $varNovoArquivo = "imagens/p$id.$varExtensaoPadrao";


        if (move_uploaded_file($varArquivoRecebido, $varNovoArquivo)) {
            echo "<br<br>Arquivo de foto foi recebido e atualizado com sucesso!";
        }
    }
}


header("Location: produtos.php");
exit;
?>
