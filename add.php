<?php
require_once 'init.php';
 
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : null;
$dificuldade_preparo = isset($_POST['dificuldade_preparo']) ? $_POST['dificuldade_preparo'] : null;
$quanto_gosta = isset($_POST['quanto_gosta']) ? $_POST['quanto_gosta'] : null;

if (empty($nome) || empty($ingredientes) || empty($dificuldade_preparo) || empty($quanto_gosta))
{
    echo "Volte e preencha todos os campos";
    exit;
}

$PDO = db_connect();
$sql = "INSERT INTO pratos(nome, ingredientes, dificuldade_preparo, quanto_gosta) VALUES(:nome, :ingredientes, :dificuldade_preparo, :quanto_gosta)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ingredientes', $ingredientes);
$stmt->bindParam(':dificuldade_preparo', $dificuldade_preparo, PDO::PARAM_INT);
$stmt->bindParam(':quanto_gosta', $quanto_gosta, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>