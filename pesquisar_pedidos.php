<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Receber o termo de pesquisa do formulário
$termo = $_GET['termo'];

// Consulta SQL para pesquisar pedidos por nome ou CPF
$sql = "SELECT id, nome, cpf, numero, email, endereco, racao, doacao FROM pedidos WHERE nome LIKE '%$termo%' OR cpf LIKE '%$termo%'";

$result = $conn->query($sql);

// Exibir os resultados da pesquisa que dificill

if ($result->num_rows > 0) {
    echo "<h2>Resultados da Pesquisa</h2>";
    echo "<table class='table table-bordered'>";
    echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Número</th><th>Email</th><th>Endereço</th><th>Ração</th><th>Doação</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["nome"]. "</td>";
        echo "<td>" . $row["cpf"]. "</td>";
        echo "<td>" . $row["numero"]. "</td>";
        echo "<td>" . $row["email"]. "</td>";
        echo "<td>" . $row["endereco"]. "</td>";
        echo "<td>" . $row["racao"]. "</td>";
        echo "<td>" . ($row["doacao"] ? 'Sim' : 'Não'). "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado para '$termo'.";
}


$conn->close();
?>
