<?php
// Destruir todas as variáveis de sessão
session_start();
session_destroy();

// Redirecionar para a página de login
header("Location: ../login.php");
exit();
?>

