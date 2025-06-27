<?php
include('conexao.php');

$id = $_POST["txtId"];
$nome = $_POST["txtNome"];
$descricao = $_POST["txtDescricao"];
$atuacao = $_POST["txtAtuacao"];
$tipo = $_POST["txtTipo"];
$status = $_POST["txtStatus"];
$locais = isset($_POST["txtLocais"]) ? (array)$_POST["txtLocais"] : [];
$imagem_antiga = $_POST["imagem_antiga"] ?? "";
$imagem = $imagem_antiga; // por padrão, mantém a imagem antiga
$matriz_antiga = $_POST["matriz_antiga"] ?? "";
$plano_antigo = $_POST["plano_antigo"] ?? "";
$matriz = $matriz_antiga; // por padrão, mantém a matriz antiga
$plano = $plano_antigo; // por padrão, mantém o plano antigo

// Upload da imagem (capa)
if (isset($_FILES["txtImagem"]) && $_FILES["txtImagem"]["error"] == 0) {
    $ext = strtolower(pathinfo($_FILES["txtImagem"]["name"], PATHINFO_EXTENSION));
    $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'jfif'];

    if (in_array($ext, $permitidas)) {
        $novo_nome = uniqid() . "." . $ext;

        if (!is_dir("../uploads/")) {
            mkdir("../uploads/", 0755, true);
        }

        if (move_uploaded_file($_FILES["txtImagem"]["tmp_name"], "../uploads/" . $novo_nome)) {
            $imagem = $novo_nome;
        } else {
            echo "<script>alert('Erro ao enviar a imagem!'); window.location = 'cursos-cadastro.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Formato de imagem não permitido!'); window.location = 'cursos-cadastro.php';</script>";
        exit;
    }
}

// Upload da matriz
if (isset($_FILES["txtMatriz"]) && $_FILES["txtMatriz"]["error"] == 0) {
    $ext = strtolower(pathinfo($_FILES["txtMatriz"]["name"], PATHINFO_EXTENSION));
    $permitidas = ['pdf'];

    if (in_array($ext, $permitidas)) {
        $novo_nome = uniqid() . "." . $ext;

        if (!is_dir("../uploads/")) {
            mkdir("../uploads/", 0755, true);
        }

        if (move_uploaded_file($_FILES["txtMatriz"]["tmp_name"], "../uploads/" . $novo_nome)) {
            $matriz = $novo_nome;
        } else {
            echo "<script>alert('Erro ao enviar a matriz!'); window.location = 'cursos-cadastro.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Formato de matriz não permitido!'); window.location = 'cursos-cadastro.php';</script>";
        exit;
    }
}

// Upload do plano de curso
if (isset($_FILES["txtPlano"]) && $_FILES["txtPlano"]["error"] == 0) {
    $ext = strtolower(pathinfo($_FILES["txtPlano"]["name"], PATHINFO_EXTENSION));
    $permitidas = ['pdf'];

    if (in_array($ext, $permitidas)) {
        $novo_nome = uniqid() . "." . $ext;

        if (!is_dir("../uploads/")) {
            mkdir("../uploads/", 0755, true);
        }

        if (move_uploaded_file($_FILES["txtPlano"]["tmp_name"], "../uploads/" . $novo_nome)) {
            $plano = $novo_nome;
        } else {
            echo "<script>alert('Erro ao enviar o plano de curso!'); window.location = 'cursos-cadastro.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Formato de plano não permitido!'); window.location = 'cursos-cadastro.php';</script>";
        exit;
    }
}

// Validações obrigatórias
if (!$nome) {
    echo "<script>alert('Campo Nome Obrigatório!'); history.back();</script>";
    exit;
}
if (!$atuacao) {
    echo "<script>alert('Campo area de atuação Obrigatório!'); history.back();</script>";
    exit;
}

if (!$descricao) {
    echo "<script>alert('Campo Descrição Obrigatório!'); history.back();</script>";
    exit;
}
if (!$imagem) {
    echo "<script>alert('Campo Capa Obrigatório!'); history.back();</script>";
    exit;
}
if (!$locais) {
    echo "<script>alert('Campo Locais Obrigatório!'); history.back();</script>";
    exit;
}
if (!$matriz) {
    echo "<script>alert('Campo Matriz Obrigatório!'); history.back();</script>";
    exit;
}
if (!$plano) {
    echo "<script>alert('Campo Plano de Curso Obrigatório!'); history.back();</script>";
    exit;
}

// Converte array de locais em string separada por vírgula
$locais_string = implode(',', $locais);

// INSERIR ou ATUALIZAR
if ($id) {
    // Atualiza curso existente
    $sql = $conn->prepare("UPDATE cursos 
        SET nome = ?, descricao = ?, atuacao = ?, tipo = ?, status = ?, locais_ids = ?, imagem = ?, matriz = ?, planodecurso = ? 
        WHERE id = ?");
    $resultado = $sql->execute([$nome, $descricao, $atuacao, $tipo, $status, $locais_string, $imagem, $matriz, $plano, $id]);
} else {
    // Insere novo curso
    $sql = $conn->prepare("INSERT INTO cursos 
        (nome, descricao, atuacao, tipo, status, locais_ids, imagem, matriz, planodecurso) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $resultado = $sql->execute([$nome, $descricao, $atuacao, $tipo, $status, $locais_string, $imagem, $matriz, $plano]);
}

// Redireciona ou mostra erro
if ($resultado) {
    echo "<script>alert('Cadastro realizado com sucesso!'); window.location = 'cursos-cadastro.php';</script>";
} else {
    echo "<script>alert('Erro ao cadastrar!'); window.location = 'cursos-cadastro.php';</script>";
}
