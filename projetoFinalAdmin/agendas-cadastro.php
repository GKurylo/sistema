<?php
include("conexao.php");
include("login-validar.php");

$id = isset($_GET["id"]) ? $_GET["id"] : "";
if ($id) {

    $sql = $conn->prepare("SELECT * FROM agendas WHERE id = :id");
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    $dados = $sql->fetch();
}

$horariosMarcados = [];
if (isset($id) && isset($dados['horario'])) {
    // converte e limpa os segundos
    $horariosMarcados = array_map(function ($h) {
        return substr($h, 0, 5); // pega só HH:MM
    }, explode(',', $dados['horario']));
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>
        <?php
        echo isset($_GET['id']) ? 'Edição de Agendamento' : 'Cadastro de Agendamentos';
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
        rel="stylesheet" />
    <?php include("app-header.php"); ?>
</head>

<body>

    <?php include("app-lateral.php"); ?>

    <!-- Modal de Ajuda -->
    <div class="modal fade" id="modalAjuda" tabindex="-1" aria-labelledby="modalAjudaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalAjudaLabel">Ajuda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <p>Bem-vindo ao<?php echo isset($_GET['id']) ? ' Edição de Agendamento' : ' Cadastro de Agendamentos';?>!</p>
                    <ul>
                        <li><?php echo isset($_GET['id']) ? 'Aqui você poderá editar o seu agendamento.' : 'Aqui você poderá cadastrar os agendamentos.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (SEM LOCAL) se quiser trocar de local.' : 'Clique em (SEM LOCAL) para selecionar um local.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (SEM USUÁRIO) se quiser trocar o usuário ou então selecionar o seu proprio.' : 'Clique em (SEM USUÁRIO) para selecionar um usuário ou então selecionar o seu proprio.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (dd/mm/aaaa) se quiser trocar a data do agendamento.' : 'Clique em (dd/mm/aaaa) para selecionar uma data para agendar.';?></li>
                        <li><?php echo isset($_GET['id']) ? 'Clique em (selecione os horários) se quiser trocar o horário do agendamento.' : 'Clique em (selecione os horários) para selecionar um ou mais horários do agendamento.';?></li>
                        <li>clique em (Observação) caso queria adicionar uma observação, se tiver terminado de colocar
                            todas as informações, aperte o (botão verde) Gravar.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteudo -->
    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="row">
                <div class="card p-2">

                    <h1><?php echo isset($_GET['id']) ? 'Edição de Agendamento' : 'Cadastro de Agendamentos';?></h1>
                    <p><?php echo isset($_GET['id']) ? 'Edição de Agendamento' : 'Cadastro de Agendamentos';?></p>
                    <div class="row mt-3">

                        <form action="agendas-acao.php" method="post">
                            <input type="hidden" name="txtid" value="<?php if ($id) {
                                echo $dados["id"];
                            } ?>">

                            <!-- COLUNA ESQUERDA -->
                            <div class="col-12 d-flex flex-column justify-content-start">

                                <div class="row">
                                    <!-- Local -->
                                    <div class="col-md-3">
                                        <label for="locais">Local:</label>
                                        <select name="txtLocal" id="locais" class="form-control">
                                            <option value="0" selected>SEM LOCAL</option>
                                            <?php
                                            $sqllocal = $conn->prepare("SELECT * FROM locais WHERE status = 1");
                                            $sqllocal->execute();
                                            while ($dadoslocal = $sqllocal->fetch()) {
                                                $selected = ($id && $dados["local_id"] == $dadoslocal["id"]) ? 'selected' : '';
                                                echo "<option value='{$dadoslocal["id"]}' $selected>{$dadoslocal["nome"]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Usuário -->
                                    <div class="col-md-3">
                                        <label for="usuarios">Usuário:</label>
                                        <select name="txtUsuario" id="usuarios" class="form-control">
                                            <option value="0" selected>SEM USUÁRIO</option>
                                            <?php
                                            $sqlUsuario = $conn->prepare("SELECT * FROM usuarios WHERE status = 1 AND cargo != 2");
                                            $sqlUsuario->execute();
                                            while ($dadosUsuario = $sqlUsuario->fetch()) {
                                                $selected = ($id && $dados["usuario_id"] == $dadosUsuario["id"]) ? 'selected' : '';
                                                echo "<option value='{$dadosUsuario["id"]}' $selected>{$dadosUsuario["nome"]}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- COLUNA DIREITA: -->
                                    <!-- Data -->
                                    <div class="col-md-3">
                                        <label for="data">Data:</label>
                                        <input class="form-control" id="data" name="txtData" type="date" value="<?php if ($id)
                                            echo date('Y-m-d', strtotime($dados['data'])); ?>">
                                    </div>

                                    <!-- horário -->
                                    <div class="col-md-3 d-flex flex-column justify-content-start" id="modalHorarios">
                                        <label for="horariosSelect">Horários:</label>
                                        <select class="form-control h-100" id="horariosSelect" name="txtHorario"
                                            multiple>
                                        </select>
                                    </div>
                                </div>

                                <!-- Observação -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label for="obs">Observação:</label>
                                        <textarea placeholder="*Campo Não Obrigatório"
                                            class="form-control placeholder:text-sm" id="obs" name="txtObservacao"
                                            rows="8"><?php if ($id)
                                                echo $dados["observacao"]; ?></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="mt-3 col-12 text-center">
                        <input type="submit" class="btn btn-success" value="Gravar">
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include("app-footer.php"); ?>

    <?php include("app-script.php"); ?>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script>
        const horarios = {
            "Matutino": ["07:30", "08:20", "09:10", "10:10", "11:00"],
            "Vespertino": ["13:00", "13:50", "14:40", "15:40", "16:30"],
            "Noturno": ["18:40", "19:30", "20:30", "21:20", "22:10"]
        };

        // Horários que já estavam marcados (vindo do PHP)
        const horariosMarcados = <?php echo json_encode($horariosMarcados ?? []); ?>;

        function carregarHorarios() {
            const select = document.getElementById('horariosSelect');
            select.innerHTML = ""; // Limpa

            for (let periodo in horarios) {
                const optgroup = document.createElement('optgroup');
                optgroup.label = periodo;

                horarios[periodo].forEach(function (hora) {
                    const option = document.createElement('option');
                    option.value = hora;
                    option.text = hora;

                    optgroup.appendChild(option);
                });

                select.appendChild(optgroup);
            }

            // Inicializa o Select2 APÓS adicionar os elementos
            $('#horariosSelect').select2({
                placeholder: "Selecione os horários",
                width: '100%',
                theme: 'classic',
                dropdownParent: $('#modalHorarios')
            });

            // Seta os horários marcados APÓS o select2 estar carregado
            $('#horariosSelect').val(horariosMarcados).trigger('change');
        }

        // Chama a função ao carregar a página
        document.addEventListener('DOMContentLoaded', carregarHorarios);
    </script>



</body>

</html>