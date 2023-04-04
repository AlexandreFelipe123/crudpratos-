<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql = "SELECT nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$pratos = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($pratos))
{
    echo "Nenhum prato encontrado";
}
?>
</doctype HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Comidas Favoritas</title>
		<link href = "bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src = "bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<h1>Edite suas comidas favoritas</h1>
			<h2>Editar</h2>
			<form action="edit.php" method="post">
			<div class="form-group">
				<label for ="nome">Nome: </label>
				<input type = "text" class = "form-control col-sm" name="nome" id="nome" style= "width:25%;" value="<?php echo $pratos["nome"] ?>">
			</div>
			<div class="form-group">
				<label for = "ingredientes">Ingredientes: </label>
				<input type = "text" class = "form-control col-sm" name="ingredientes" id = "ingredientes" style="width:25%" value = "<?php echo $pratos["ingredientes"] ?>">
			</div>
			<div class="form-group">
				<label for = "dificuldade_preparo">Dificuldade de preparo:  </label>
				<input type = "number" class = "form-control col-sm" name="dificuldade_preparo" id="dificuldade_preparo" style= "width:25%;" value="<?php echo $pratos["dificuldade_preparo"] ?>">
			</div>
			<div class="form-group">
				<label for = "quanto_gosta">Quanto Gosta: </label>
				<input type = "number" class = "form-control col-sm" name="quanto_gosta" id = "quanto_gosta" style="width:25%" value="<?php echo $pratos["quanto_gosta"] ?>">		
			</div>
				<input type = "hidden" name = "id" value="<?php echo $id ?>">
                <button type = "submit" class = "btn btn-primary">Editar</button>
			</form>
		</div>	
		</body>
</html>
