<?php
require_once 'config.php';

$senhaSecreta = '123';
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $senhadigitada = $_POST['senha'];

    //Digitou a senha certo
    if($senhadigitada === $senhaSecreta){
        $sql = "SELECT * FROM mensagens";
        $result = $conn->query($sql);
    }else{
        echo "<h1>Senha Incorreta</h1>";
    }

}


?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Mensagens</title>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <form method="post">
        <label for="senhs">Senha:</label>
        <input type="password" name="senha" placeholder="Digite sua senha" required>
        <button type="submit">Enviar</button>
    </form>


    <div class="mensagens">
    <?php if(isset($result) && $result->num_rows >0) : ?>
            <h2>Mensagens</h2>
                <ul>
                    <?php while($row = $result->fetch_assoc()) :?>
                        <li>
                            <strong>Nome: </strong> <?php echo $row["nome"]; ?><br>
                            <strong>email: </strong> <?php echo $row["email"]; ?><br>
                            <strong>telefone: </strong> <?php echo $row["telefone"]; ?><br>
                            <strong>data_nasc: </strong> <?php echo $row["data_nasc"]; ?><br>
                            <strong>cidade: </strong> <?php echo $row["cidade"]; ?><br>
                            <strong>estado: </strong> <?php echo $row["estado"]; ?><br>
                            <strong>endereco: </strong> <?php echo $row["endereco"]; ?><br>
                        </li>
                    <?php endwhile; ?>
            </ul>
            <?php else : ?>
                <p>Nenhuma mensagem encontrada. </p>
            <?php endif; ?>
   </div>    

</body>
</html>