<?php
session_start();
require_once('conexao.php');

$task = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $taskId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM todo WHERE id = '{$taskId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $task = mysqli_fetch_array($query);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Task</title>
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
                            Editar Tarefa
                            <a href="index.php" class="btn btn-dark float-end">Voltar</a>
                        </h4>
                        <div class="card-body">
                            <?php
                            if ($task) :
                            ?>
                            <form action="acoes.php" method="POST">
                                <input type="hidden" name="task_id" value="<?=$task['id']?>">
                                <div class="mb-3">
                                    <label for="txtNome">Descrição da tarefa</label>
                                    <input type="text" name="txtNome" id="txtNome" value="<?=$task['nome']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="txtDataLimite">Data Limite</label>
                                    <input type="date" name="txtDataLimite" id="txtDataLimite" value="<?=$task['data_limite']?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="txtStatus">Status da tarefa:</label>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="txtStatus" id="btnradio1" value="Pendente" autocomplete="off" checked>
                                        <label class="btn btn-outline-light" for="btnradio1"><i class="bi bi-emoji-neutral"></i> Pendente</label>

                                        <input type="radio" class="btn-check" name="txtStatus" id="btnradio2" value="Em andamento" autocomplete="off">
                                        <label class="btn btn-outline-light" for="btnradio2"><i class="bi bi-emoji-smile"></i> Em andamento</label>

                                        <input type="radio" class="btn-check" name="txtStatus" id="btnradio3" value="Finalizada" autocomplete="off">
                                        <label class="btn btn-outline-light" for="btnradio3"><i class="bi bi-emoji-grin"></i> Finalizada</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="edit_task" class="btn btn-info">Salvar</button>
                                </div>
                            </form>
                            <?php
                            else:
                            ?>
                            <div class="alert alert-warning alert-dismissble fade show" role="alert">
                                Tarefa não encontrada!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
                            </div>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>