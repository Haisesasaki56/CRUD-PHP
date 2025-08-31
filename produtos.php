<html>
    <body>
       
    <?php
   
    include "util.php";
    $conn = conecta();


    $varSQL = "select * from feira";
    $select = $conn->query($varSQL);


    ?>


    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Data da Colheita</th>
                <th>Foto</th>
            </tr>
        </thead>


        <?php
  while ( $linha = $select -> fetch() )
        {


        $id = $linha['id'];
        $varFoto = "imagens/p$id.jpg";
           
                echo "<tr>
            <td>".$linha['nome']."</td>
            <td>".$linha['preco']."</td>
            <td>".$linha['data_colheita']."</td>
            <td>";


            if (file_exists($varFoto)) {
                echo "<img src='$varFoto' width='80'>";
            } else {
                echo "<img src='imagens/psilhueta_de_vegetal.jpg' width='80'>";
            }


            echo "</td>
            <td>
            <a href='alterarProdutosFeira.php?id=".$linha['id']."'>Alterar</a>
            <a href='excluirProdutosFeira.php?id=".$linha['id']."'>Excluir</a>
            </td>
            </tr>";


        }


        ?>


    </table>


    <a href="adicionarProdutos.html">Adicionar</a>
    </body>
</html>
