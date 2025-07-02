<?php
include("conexao.php");
include("login-validar.php");

// Prepara eventos para o FullCalendar
$eventos = [];
$sqlEv = $conn->prepare("SELECT agendas.*, locais.nome AS local, locais.cor FROM agendas LEFT JOIN locais ON locais.id = agendas.local_id");
$sqlEv->execute();
$sqlEv->setFetchMode(PDO::FETCH_ASSOC);

while ($d = $sqlEv->fetch()) {
    $horaFim = (isset($d['horariofin']) && !empty($d['horariofin'])) ? $d['horariofin'] : $d['horario'];
    $eventos[] = [
        'title' => $d['local'],
        'start' => $d['data'] . 'T' . $d['horario'],
        'end'   => $d['data'] . 'T' . $horaFim,
        'color' => $d['cor']
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>INDEX</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    <?php include("app-header.php"); ?>
</head>
<body>
    <!-- Modal de Ajuda -->
    <div class="modal fade" id="modalAjuda" tabindex="-1" aria-labelledby="modalAjudaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="modalAjudaLabel">Ajuda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <h3>Bem-vindo ao calendário de agendamentos!</h3>
                    <ul>
                        <li>Aqui você encontrara o calendário com os agendamentos.</li>
                        <li>Clique no dia que você quer agendar para selecionar o dia.</li>
                        <li>Logo após isto clique em um local que pretende cadastrar um novo agendamento.</li>
                        <li>Depois disso, escolha o horario ou horarios.</li>
                        <li>Por fim se você quiser clique em (Observação) para adicionar uma observação e/ou em (Salvar Agendamentos) para salvar o agendamento.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php require("app-lateral.php");  ?>
    <div class="content-body" style="min-height: 899px;">
        <div class="container-fluid">
            <div class="card p-2">
                <div class="text-center fs-xs-5"><h3>SISTEMA DE AGENDAMENTOS</h3></div>
                <div class="text-center"><div id="calendar" style="width:100%;max-height:700px;overflow-x: auto; -webkit-overflow-scrolling: touch;"></div></div>

                <!-- Modal Locais -->
                <div class="modal fade" id="modalLocais" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Escolha o Local para <span id="dataSelecionada"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            $sqlLoc = $conn->query("SELECT id, nome FROM locais");
                            while ($loc = $sqlLoc->fetch()) {
                                echo "<button class='btn btn-outline-primary w-100 my-1 local-btn' data-id='{$loc['id']}' data-nome=\"{$loc['nome']}\">{$loc['nome']}</button>";
                            }
                            ?>
                        </div>
                    </div></div>
                </div>

                <!-- Modal Horários -->
                <div class="modal fade" id="modalHorarios" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"><form class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Escolha um horário para <span id="localSelecionado"></span> - <span id="dataSelecionada2"></span></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="inputData" name="txtData"/>
                            <input type="hidden" id="inputLocalId" name="txtLocal"/>
                            <label>Horários:</label>
                            <select id="horariosSelect" multiple class="form-control select2"></select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSalvarAgendamento" class="btn btn-primary">Salvar Agendamentos</button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalObservacao">Observação</button>
                        </div>
                    </form></div>
                </div>

                <!-- Modal Observação -->
                <div class="modal fade" id="modalObservacao" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Observação</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="observacaoHidden"/>
                            <textarea id="observacaoTexto" class="form-control" rows="5" placeholder="Digite sua observação..."></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSalvarObservacao" class="btn btn-primary">Salvar Observação</button>
                        </div>
                    </div></div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("app-footer.php"); ?>
    <?php include("app-script.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/dist/locale/pt-br.js"></script>

    <style>
    .fc-scrollgrid-section-sticky { z-index:1!important; }
    .select2-container--bootstrap4 .select2-selection--multiple {
        min-height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        border:1px solid #ced4da;
        border-radius:.375rem;
        box-sizing:border-box;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const eventos = <?php echo json_encode($eventos); ?>;
        const cal = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            headerToolbar: { left:'prev,next today', center:'title', right:'dayGridMonth,timeGridWeek,timeGridDay,listWeek' },
            dateClick: info => {
                let [y,mo,da] = info.dateStr.split('-');
                document.getElementById('dataSelecionada').innerText = `${da}/${mo}/${y}`;
                document.getElementById('dataSelecionada2').innerText = `${da}/${mo}/${y}`;
                document.getElementById('inputData').value = info.dateStr;
                new bootstrap.Modal(document.getElementById('modalLocais')).show();
            },
            events: eventos
        });
        cal.render();

        document.querySelectorAll('.local-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('localSelecionado').innerText = btn.dataset.nome;
                document.getElementById('inputLocalId').value = btn.dataset.id;
                bootstrap.Modal.getInstance(document.getElementById('modalLocais')).hide();
                carregarHorarios();
                new bootstrap.Modal(document.getElementById('modalHorarios')).show();
            });
        });

        document.getElementById('btnSalvarObservacao').addEventListener('click', () => {
            document.getElementById('observacaoHidden').value = document.getElementById('observacaoTexto').value;
            bootstrap.Modal.getInstance(document.getElementById('modalObservacao')).hide();
            new bootstrap.Modal(document.getElementById('modalHorarios')).show();
        });

        document.getElementById('btnSalvarAgendamento').addEventListener('click', async () => {
            let horarios = $('#horariosSelect').val();
            let data = document.getElementById('inputData').value;
            let local = document.getElementById('inputLocalId').value;
            let obs = document.getElementById('observacaoHidden').value || '';

            if (!horarios?.length) return alert("Selecione ao menos um horário.");
            let msgs = [];

            for (let hora of horarios) {
                let fd = new URLSearchParams({ txtData: data, txtHorario: hora, txtLocal: local, txtObservacao: obs });
                try {
                    let resp = await fetch('agendas-acao.php', {
                        method: 'POST',
                        headers:{'Content-Type':'application/x-www-form-urlencoded'},
                        body: fd.toString()
                    });
                    let text = await resp.text();
                    if (!resp.ok || text.toLowerCase().includes("erro")) msgs.push(`Erro: ${text}`);
                } catch(e){ msgs.push(`Falha rede no ${hora}`); }
            }

            if (msgs.length) alert(msgs.join("\n"));
            else { alert("Agendamentos salvos!"); location.reload(); }
        });
    });

    function carregarHorarios(){
        const horarios = {
            Matutino:["07:30","08:20","09:10","10:10","11:00"],
            Vespertino:["13:00","13:50","14:40","15:40","16:30"],
            Noturno:["18:40","19:30","20:30","21:20","22:10"]
        };
        let sel = document.getElementById('horariosSelect');
        sel.innerHTML = '';
        for (let per in horarios) {
            let grp = document.createElement('optgroup');
            grp.label = per;
            horarios[per].forEach(h => {
                let opt = document.createElement('option');
                opt.value = h; opt.text = h;
                grp.appendChild(opt);
            });
            sel.appendChild(grp);
        }
        $('#horariosSelect').select2({ placeholder:"Selecione horários", theme: 'classic', width:"100%", dropdownParent: $('#modalHorarios') });
    }
    </script>

</body>
</html>
