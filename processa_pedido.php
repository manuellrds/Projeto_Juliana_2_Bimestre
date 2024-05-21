<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário coisa linda 
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$numero = $_POST['numero'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$racao = $_POST['racao'];
$doacao = $_POST['doacao'];

// Prepara a SQL para inserção .. estudar mais 
$sql = "INSERT INTO pedidos (nome, cpf, numero, email, endereco, racao, doacao)
VALUES ('$nome', '$cpf', '$numero', '$email', '$endereco', '$racao', '$doacao')";

if ($conn->query($sql) === TRUE) {
    echo "<p>============================================================</p>";
    echo "<h2>Pedido realizado com sucesso!</h2>";
    echo "<p>============================================================</p>";
    echo "<p><a href='exibir.php'>Clique aqui para ver os pedidos que já foram feitos</a></p>";
    echo "<p>============================================================</p>";
    echo "<p><a href='index.html'>VOLTAR PARA REALIZAR UM NOVO PEDIDO</a></p>";
    echo "<p>============================================================</p>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
