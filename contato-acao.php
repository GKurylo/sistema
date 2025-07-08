<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza os dados
    $nome = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensagem = htmlspecialchars(trim($_POST['message']));

    // Configurações do e-mail
    $to = "matheusdegois65@gmail.com.br";
    $subject = "Mensagem do site - Contato";
    $body = "Nome: $nome\n";
    $body .= "Email: $email\n\n";
    $body .= "Mensagem:\n$mensagem";

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='contato.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar. Tente novamente mais tarde.'); window.history.back();</script>";
    }
} else {
    // Se acessado diretamente, redireciona
    header("Location: contato.php");
    exit;
}
?>
