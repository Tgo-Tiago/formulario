<?php
require_once 'config.php';

//Pegando os dados vindo do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['data_nasc'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];

//Preparar comando para tabela
$smtp = $conn->prepare("INSERT INTO cadastro (nome, email, telefone, data_nasc, cidade, estado, endereco) VALUES (?,?,?,?,?,?,?)");
$smtp->bind_param("sssssss",$nome, $email, $telefone, $data_nasc, $cidade, $estado, $endereco );

//Se executar corretamente
if($smtp->execute()){
    echo "Formulário enviado com sucesso!";
}else{
    echo "Erro no envio do formulário: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>

