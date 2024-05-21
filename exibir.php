<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara a SQL para seleção ... estudar maiss
$sql = "SELECT id, nome, cpf, numero, email, endereco, racao, doacao FROM pedidos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<p>============================================================</p>";
    echo "<p><a href='index.html'>VOLTAR PARA REALIZAR UM NOVO PEDIDO</a></p>";
    echo "<p>============================================================</p>";
    echo "<h2>Pedidos Realizados</h2>";
    
    echo "<table class='table table-bordered'>";
    echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Número</th><th>Email</th><th>Endereço</th><th>Ração</th><th>Doação</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["cpf"]. "</td><td>" . $row["numero"]. "</td><td>" . $row["email"]. "</td><td>" . $row["endereco"]. "</td><td>" . $row["racao"]. "</td><td>" . ($row["doacao"] ? 'Sim' : 'Não'). "</td></tr>";
        
    }
    echo "</table>";
} else {
    echo "Nenhum pedido encontrado.";
}

$conn->close();
?>
