<?php

require_once 'Contato.php';
require_once 'GerenciadorDeContatos.php';

$gerenciadorDeContatos = new GerenciadorDeContatos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'])) {
        $gerenciadorDeContatos->adicionarContato($_POST['nome'],
        $_POST['email'], $_POST['telefone']);
    }

    if (isset($_POST['deletar'])) {
        $gerenciadorDeContatos->deletarContato($_POST['deletar']);
    }
}

$contatos = $gerenciadorDeContatos->getContatos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Contatos</title>
    <link rel="stylesheet" href="style.css"> <!--link do css-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet"> <!--link da fonte-->
</head>
<body>
    <h2>Gerenciador de Contatos</h2>

<!--formulario para adicionar um novo ctt-->
    <form method="POST" action="">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="telefone" placeholder="Telefone" required><br>
        <button type="submit">Adicionar Contato</button>
    </form>

<!--lista de contatos-->
<ul>
    <?php foreach ($contatos as $indice => $contato): ?>
        <li>
            <strong>Nome:</strong> <?= htmlspecialchars ($contato->getNome()) ?> <br>
            <strong>Email:</strong> <?= htmlspecialchars ($contato->getEmail()) ?> <br>
            <strong>Telefone:</strong> <?= htmlspecialchars ($contato->getTelefone()) ?>
            <form method="POST" action="" style="display:inline;">
                <button type="submit" name="deletar" value="<?= $indice?>">Excluir</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>