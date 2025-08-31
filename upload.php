<?php


include "util.php";
$conn = conecta();


$varSQL = "insert into feira (nome, preco, data_colheita)
            values (:nome, :preco, :data_colheita)";


$insert = $conn->prepare($varSQL);


$insert->bindParam(':nome', $_POST['nome']);
$insert->bindParam(':preco', $_POST['preco']);
$insert->bindParam(':data_colheita', $_POST['data_colheita']);


if ($insert->execute() > 0) {


    echo "<br><br>Incluido com sucesso<br>";


    if ( $_FILES ) {


        $id = $conn->lastInsertId();
        $varArquivoRecebido = $_FILES['foto']['tmp_name'];
        $varExtensaoPadrao = 'jpg';
        $varNovoArquivo = "imagens/p$id.$varExtensaoPadrao";


        if (move_uploaded_file($varArquivoRecebido, $varNovoArquivo)){


            echo "<br><br>Arquivo de Foto foi recebido com sucesso!";
           
        }


    }


}


header("Location: produtos.php");
exit;


?>
