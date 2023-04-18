<?php
require_once 'init.php';
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM pratos ORDER BY nome ASC";
$sql = "SELECT id, nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos ORDER BY nome ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype hmtl>
<html>

<head>
  <meta charset="utf-8">
  <title>Cadastro de Comidas Favoritas</title>
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="estilo.css">
  <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src = "bootstrap/js/popper.min.js"></script>
  <script src = "bootstrap/js/jquery.min.js"></script>
  

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light-rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10"
      aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-center " id="
navbarsExample10">
      <ul class=" navbar-nav">
        <li class=" nav-item active ">
          <a class="nav-link " href=" index.html "> Início <span class="sr-only ">( atual ) </span> </a>
        </li>
        <li class="nav-item dropdown">
          <a class=" nav-link dropdown-toggle " href=" #" id="dropdown10" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"> Pratos </a>
          <div class="dropdown-menu" aria-labelledby="dropdown10">
            <a class=" dropdown-item" href="form-add.php"> Cadastrar Tarefa </a>
            <a class=" dropdown-item " href=" exibirTarefasPendentes.php"> Listar Tarefas Pendentes </a>
            <a class=" dropdown-item " href=" exibirTarefasConcluidas.php"> Listar Tarefas Realizadas </a>
            <a class=" dropdown-item " href=" pesquisarTarefas.html">
              Pesquisar Tarefas </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href=" #" id="dropdown10" data-toggle=" dropdown" aria-haspopup="true"
            aria-expanded="false"> Ingredientes  </a>
          <div class="dropdown-menu" aria-labelledby=" dropdown10">
            <a class=" dropdown-item " href = "form-add-tipo.html "> Cadastrar Tipo </a>
            <a class=" dropdown-item " href = "exibirTipos.php"> Listar Tipos </a>
            <a class=" dropdown-item " href = "pesquisarTipo.html"> Pesquisar Tipo </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid mt-5">
    <div class="card-deck justify-content-center">
      <div class="col-md-4 mb-4">
        <div class="card">
          <img
            src="https://img.freepik.com/fotos-gratis/variedade-plana-com-deliciosa-comida-brasileira_23-2148739179.jpg?w=2000"
            class="card-img-top" alt="Cadastrar">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Nova Comida</h5>
            <p class="card-text">Cadastre uma nova comida para a sua lista de comidas favoritas.</p>
            <a href="form-add.php" class="btn btn-warning">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista de Comidas Favoritas</h5>
            <?php if ($total > 0): ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Ingredientes</th>
                    <th>Dificuldade de Preparo</th>
                    <th>Quanto Gosta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($pratos = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                      <td>
                        <?php echo $pratos['nome'] ?>
                      </td>
                      <td>
                        <?php echo $pratos['ingredientes'] ?>
                      </td>
                      <td>
                        <?php echo $pratos['dificuldade_preparo'] ?>
                      </td>
                      <td>
                        <?php echo $pratos['quanto_gosta'] ?>
                      </td>
                      <td>
                        <a href="form-edit.php?id=<?php echo $pratos['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $pratos['id'] ?>" class="btn btn-danger"
                          onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else: ?>
              <p class="card-text">Nenhuma comida cadastrada ainda.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>