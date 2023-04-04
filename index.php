<?php 
require_once 'init.php';
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM pratos ORDER BY nome ASC";
$sql = "SELECT id, nome, ingredientes, dificuldade_preparo, quanto_gosta FROM pratos ORDER BY nome ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO -> prepare($sql);
$stmt -> execute();
?>
<!doctype hmtl>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Cadastro de Comidas Favoritas</title>
        <link href = "bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src = "bootstrap/js/bootstrap.js"></script>
        <style type="text/css">
            .container{
                margin-top: 50px;
                margin-left: 100px;
            }
        </style>
    </head>
    <body>
        <div class = "container">
            <h1>Cadastro de Comidas Favoritas</h1>
            <p><a href = "form-add.php">Adicionar Comida</a></p>
            <h2>Lista de Comidas</h2>
            <p>Total de Comidas: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class =  "table table striped" width = "50%" border="1">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>ingredientes</th>
                        <th>Dificuldade de Preparo</th>
                        <th>Quanto gosta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>  
                        <td><?php echo $user['nome']?></td>
                        <td><?php echo $user['ingredientes']?></td>
                        <td><?php echo $user['dificuldade_preparo']?></td>
                        <td><?php echo $user['quanto_gosta']?></td>
                        <td>
                            <a href="form-edit.php?id=<?php echo $user['id'] ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>      
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Nenhum usuário registrado</p>
            <?php endif; ?>
        </div>
    </body>
</html>