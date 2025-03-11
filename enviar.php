<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    if (!$email) {
        echo "E-mail inválido!";
        exit;
    }

    $para = "celltechmix@gmail.com";  // 🔹 Defina o e-mail do destinatário
    $assunto = "Nova mensagem de contato";
    $corpo = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem";
    $cabecalhos = "From: $email\r\nReply-To: $email";

    if (mail($para, $assunto, $corpo, $cabecalhos)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
} else {
    echo "Método inválido.";
}
?>
