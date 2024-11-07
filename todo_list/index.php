<?php
session_start();
require_once("conexao.php");
$sql = "SELECT * FROM todo";
$tasks = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./static.css">
    
</head>

<body>
    <div class="container-sm mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <i class="bi bi-card-checklist"></i> Tarefas para fazer:
                            <a href="task-create.php" class="btn btn-info float-end"><i class="bi bi-journal-plus"></i> Adicionar nova tarefa</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('mensagem.php'); ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Descrição:</th>
                                    <th>Data limite para finalização:</th>
                                    <th>Status da tarefa:</th>
                                    <th>Opções:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasks as $task): ?>
                                    <tr>
                                        <td><?php echo $task['nome']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($task['data_limite'])); ?></td>
                                        <td><?php echo $task['status']; ?></td>
                                        <td>
                                            <div class="float-end">
                                                <a href="task-edit.php?id=<?=$task['id']?>" class="btn btn-outline-info"><i class="bi bi-emoji-astonished"></i></i> Editar</a>
                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Tem certeza que deseja excluir essa tarefa?')" name="delete_task" type="submit" value="<?=$task['id']?>" class="btn btn-outline-dark"><i class="bi bi-emoji-dizzy-fill"></i> Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>