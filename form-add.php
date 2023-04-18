<?php
require 'init.php';
?>
</doctype HTML>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro de Comidas Favoritas</title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="estilo.css">
	<link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
	<script src="bootstrap/js/bootstrap.js"></script>
</head>

<body>
	<div class="container-fluid">
		<header class="row" id="header">
			<a href="index.php" id="a-header">
				<h1 id="h1-header">Cadastro de Comidas Favoritas</h1>
			</a>
		</header>
	</div>
	<div class="container my-5">
		<div class="card p-3 mx-auto border border-danger" style="max-width: 500px;">
			<h2 class="text-center text-danger">Cadastro de Comida </h2>
			<form action="add.php" method="post">
				<div class="form-group">
					<label for="nome">Nome: </label>
					<input type="text" class="form-control col-sm border-danger" name="nome" id="nome" 
						placeholder="Informe o prato">
				</div>
				<div class="form-group">
					<label for="ingredientes">Ingredientes: </label>
					<input type="text" class="form-control col-sm border-danger" name="ingredientes" id="ingredientes"
						 placeholder="Informe os ingredientes">
				</div>
				<div class="form-group">
					<label for="dificuldade_preparo">Dificuldade de preparo: </label>
					<input type="text" class="form-control col-sm border-danger" name="dificuldade_preparo" id="dificuldade_preparo"
						 placeholder="Nível de dificuldade (0 a 10)">
				</div>
				<div class="form-group">
					<label for="quanto_gosta">Quanto Gosta: </label>
					<input type="text" class="form-control col-sm border-danger" name="quanto_gosta" id="quanto_gosta"
						 placeholder="Nota (0 a 10)">
				</div>
				<button type="submit" class="btn btn-warning">Cadastrar</button>
			</form>
		</div>
	</div>
</body>
</html>
