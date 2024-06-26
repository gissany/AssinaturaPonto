<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Assinatura de Ponto</title>
<style>
    body {
        background-color: #f0f0f0; 
        font-family: Arial, sans-serif;
    }
    .container {
        width: 80%;
        max-width: 600px;
        margin: 50px auto; 
        background-color: #ffffff; 
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); 
    }
    h2 {
        text-align: center;
        color: #333333; 
    }
    form {
        text-align: center; 
    }
    form label {
        display: block;
        margin-bottom: 8px;
        color: #555555; 
    }
    form input[type="text"], form button {
        padding: 10px;
        margin-bottom: 15px;
        width: calc(100% - 20px);
        border: none;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }
    form button {
        background-color: #000000; 
        color: #ffffff; 
        cursor: pointer;
    }
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        background-color: #ffffff; 
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); 
    }
    table, th, td {
        border: 1px solid #dddddd; 
        padding: 12px;
        text-align: center;
    }
    table th {
        background-color: #f2f2f2; 
    }
</style>
</head>
<body>
    <div class="container">
        <h2>Assinatura de Ponto</h2>
        <form id="formAssinatura" method="post" action="">
            <label for="nome">Nome do Trabalhador:</label>
            <input type="text" id="nome" name="nome" required><br>
            
            <label for="matricula">Matrícula do Funcionário:</label>
            <input type="text" id="matricula" name="matricula" required><br>
            
            <button type="submit">Registrar Assinatura</button>
        </form>

        <h2>Registros de Assinatura</h2>
        <table id="tabelaAssinaturas">
            <thead>
                <tr>
                    <th>Nome do Trabalhador</th>
                    <th>Matrícula</th>
                    <th>Data</th>
                    <th>Horário</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verifica se o formulário foi enviado
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Coleta os dados do formulário
                    $nome = htmlspecialchars($_POST['nome']);
                    $matricula = htmlspecialchars($_POST['matricula']);
                    $data = date('d/m/Y');
                    $horario = date('H:i:s');

                    
                    $registros = [];

                    
                    session_start();
                    if (isset($_SESSION['registros'])) {
                        $registros = $_SESSION['registros'];
                    }

                    
                    $registros[] = [
                        'nome' => $nome,
                        'matricula' => $matricula,
                        'data' => $data,
                        'horario' => $horario
                    ];

                    
                    $_SESSION['registros'] = $registros;
                }

                // Exibe os registros armazenados na sessão
                if (isset($_SESSION['registros'])) {
                    foreach ($_SESSION['registros'] as $registro) {
                        echo "<tr>
                                <td>{$registro['nome']}</td>
                                <td>{$registro['matricula']}</td>
                                <td>{$registro['data']}</td>
                                <td>{$registro['horario']}</td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
