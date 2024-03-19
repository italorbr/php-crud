<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulário de Inserção</title>
</head>
<body>

<h2>Insira Novo Usuário</h2>

<form action="index.php" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br>
    <label for="sobrenome">sobrenome:</label><br>
    <input type="text" id="sobrenome" name="sobrenome"><br><br>
    <label for="idade">idade:</label><br>
    <input type="number" id="idade" name="idade"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

<?php 

    
    $con = mysqli_connect("localhost","root","","dbpessoa");
 
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar o banco de dados " . mysqli_connect_error();
    }else{
    $sql = "INSERT INTO pessoa(nome,sobrenome,idade)VALUES('$_POST[nome]','$_POST[sobrenome]','$_POST[idade]')";
if(mysqli_query($con,$sql)){
    echo "Pessoa inserida com sucesso!!!";

    $mostrar = "select nome, sobrenome, idade from pessoa";

    echo "<h2>Pessoas</h2>";

    $resultado = mysqli_query($con,$mostrar);

    while ($pessoa = mysqli_fetch_array($resultado) ) {
        echo $pessoa['nome'] . " " . $pessoa['sobrenome'] . " " . $pessoa['idade'] . "<br />";
    }
}else{
    echo "Erro ao inserir: ".mysqli_error($con);
}



mysqli_close($con);
}

 ?>
