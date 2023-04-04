<?php
require 'init.php';
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
			<h1>Cadastro de comidas favoritas</h1>
			<h2>Cadastro de Comida</h2>
			<form action="add.php" method="post">
			<div class="form-group">
				<label for ="nome">Nome: </label>
				<input type="text" class = "form-control col-sm" name="nome" id="nome" style= "width:25%;" placeholder="Informe seu nome">
			</div>
			<div class="form-group">
				<label for = "ingredientes">Ingredientes: </label>
				<input type = "text" class = "form-control col-sm" name="ingredientes" id = "ingredientes" style="width:25%" placeholder = "Informe os ingredientes">
			</div>
			<div class="form-group">
				<label for ="dificuldade_preparo">Dificuldade de preparo:  </label>
				<input type="text" class = "form-control col-sm" name="dificuldade_preparo" id="dificuldade_preparo" style= "width:25%;" placeholder="Informe o quão difícil foi preparar esse prato">
			</div>
			<div class="form-group">
				<label for = "quanto_gosta">Quanto Gosta: </label>
				<input type = "text" class = "form-control col-sm" name="quanto_gosta" id = "quanto_gosta" style="width:25%" placeholder = "Informe o quanto você gosta desse prato">		
			</div>
				<button type = "submit" class = "btn btn-primary">Cadastrar</button>
			</form>
		</div>	
		</body>
</html>
